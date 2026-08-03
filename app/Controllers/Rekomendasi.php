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

        $kriteria = $kriteriaModel->orderBy('id_kriteria')->findAll();

        $bobot = $bobotModel->where('id_preferensi', $idPreferensi)->orderBy('id_kriteria')->findAll();

        $nilaiAlternatif = $nilaiModel->orderBy('id_kost')->orderBy('id_kriteria')->findAll();

        $matriks = [];

        foreach ($nilaiAlternatif as $n) {
            $matriks[$n['id_kost']][$n['id_kriteria']] = $n['nilai'];
        }

        foreach ($kriteria as $k) {

            echo $k['nama_kriteria'];

            echo "<br>";
        }
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
    }
}
