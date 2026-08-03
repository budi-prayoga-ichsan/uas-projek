<?php

namespace App\Controllers;

use App\Models\BobotPreferensiModel;
use App\Models\HasilRankingModel;
use App\Models\KriteriaModel;
use App\Models\NilaiAlternatifModel;
use App\Models\PreferensiModel;

class Rekomendasi extends BaseController
{
    public function index()
    {
        helper('form');

        $kriteriaModel = new KriteriaModel();

        $data['kriteria'] = $kriteriaModel->findAll();

        return view('rekomendasi/index', $data);
    }

    public function proses()
    {

        $preferensiModel = new PreferensiModel();

        $idUser = session()->get('id_user');

        $preferensiModel->save([
            'id_user' => $idUser,
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        $idPreferensi = $preferensiModel->getInsertID();

        $bobotModel = new BobotPreferensiModel();

        foreach ($this->request->getPost('bobot') as $idKriteria => $bobot) {

            $bobotModel->save([
                'id_preferensi' => $idPreferensi,
                'id_kriteria'   => $idKriteria,
                'bobot'         => $bobot
            ]);
        }
        return $this->hitungSAW($idPreferensi);
    }
    private function hitungSAW($idPreferensi)
    {
        $nilaiModel = new NilaiAlternatifModel();
        $kriteriaModel = new KriteriaModel();
        $bobotModel = new BobotPreferensiModel();
        $hasilModel = new HasilRankingModel();

        $kriteria = $kriteriaModel
            ->orderBy('id_kriteria')
            ->findAll();

        $bobot = $bobotModel
            ->where('id_preferensi', $idPreferensi)
            ->orderBy('id_kriteria')
            ->findAll();

        $nilaiAlternatif = $nilaiModel
            ->orderBy('id_kost')
            ->orderBy('id_kriteria')
            ->findAll();

        // =========================
        // Membentuk Matriks
        // =========================

        $matriks = [];

        foreach ($nilaiAlternatif as $n) {
            $matriks[$n['id_kost']][$n['id_kriteria']] = $n['nilai'];
        }

        // =========================
        // Mencari Min / Max
        // =========================

        $minMax = [];

        foreach ($kriteria as $k) {

            $nilaiKolom = [];

            foreach ($matriks as $idKost => $baris) {
                $nilaiKolom[] = $baris[$k['id_kriteria']];
            }

            if ($k['atribut'] == 'Cost') {
                $minMax[$k['id_kriteria']] = min($nilaiKolom);
            } else {
                $minMax[$k['id_kriteria']] = max($nilaiKolom);
            }
        }

        // =========================
        // Mapping Kriteria
        // =========================

        $kriteriaMap = [];

        foreach ($kriteria as $k) {
            $kriteriaMap[$k['id_kriteria']] = $k;
        }

        // =========================
        // Normalisasi
        // =========================

        $normalisasi = [];

        foreach ($matriks as $idKost => $baris) {

            foreach ($baris as $idKriteria => $nilai) {

                if ($kriteriaMap[$idKriteria]['atribut'] == 'Cost') {

                    $normalisasi[$idKost][$idKriteria] =
                        $minMax[$idKriteria] / $nilai;
                } else {

                    $normalisasi[$idKost][$idKriteria] =
                        $nilai / $minMax[$idKriteria];
                }
            }
        }

        // =========================
        // Normalisasi Bobot
        // =========================

        $bobotMap = [];

        $totalBobot = 0;

        foreach ($bobot as $b) {
            $totalBobot += $b['bobot'];
        }

        foreach ($bobot as $b) {
            $bobotMap[$b['id_kriteria']] =
                $b['bobot'] / $totalBobot;
        }

        // =========================
        // Hitung Nilai Preferensi
        // =========================

        $preferensi = [];

        foreach ($normalisasi as $idKost => $baris) {

            $total = 0;

            foreach ($baris as $idKriteria => $nilai) {

                $total +=
                    $nilai * $bobotMap[$idKriteria];
            }

            $preferensi[$idKost] = $total;
        }

        // =========================
        // Ranking
        // =========================

        arsort($preferensi);

        // =========================
        // Simpan ke hasil_ranking
        // =========================

        $hasilModel
            ->where('id_preferensi', $idPreferensi)
            ->delete();

        $ranking = 1;

        foreach ($preferensi as $idKost => $nilaiPreferensi) {

            $hasilModel->save([
                'id_preferensi'     => $idPreferensi,
                'id_kost'           => $idKost,
                'nilai_preferensi'  => $nilaiPreferensi,
                'ranking'           => $ranking
            ]);

            $ranking++;
        }

        return redirect()->to('/rekomendasi/hasil/' . $idPreferensi);
    }
    public function hasil($idPreferensi)
    {
        $hasilModel = new HasilRankingModel();

        $data['hasil'] = $hasilModel
            ->select('hasil_ranking.*, kost.nama_kost, kost.alamat, kost.foto')
            ->join('kost', 'kost.id_kost = hasil_ranking.id_kost')
            ->where('id_preferensi', $idPreferensi)
            ->orderBy('ranking', 'ASC')
            ->findAll();

        return view('rekomendasi/hasil', $data);
    }
}
