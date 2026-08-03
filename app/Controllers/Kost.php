<?php

namespace App\Controllers;

use App\Models\KategoriKostModel;
use App\Models\KostModel;
use App\Models\NilaiAlternatifModel;
use App\Models\KriteriaModel;

class Kost extends BaseController
{
    public function index()
    {
        $model = new KostModel();
        $keyword = $this->request->getGet('keyword');
        if(!empty($keyword)){
            $model->like('nama_kost', $keyword);
        }

        $data['kost'] = $model
            ->select('kost.*, kategori_kost.nama_kategori')
            ->join(
                'kategori_kost',
                'kategori_kost.id_kategori = kost.id_kategori'
            )
            ->paginate(5);

        $data['pager'] = $model->pager;

        return view('kost/index', $data);
    }

    public function create()
    {
        $model = new KategoriKostModel();
        $data['kategori'] = $model->findAll();

        helper('form');
        return view('kost/create', $data);
    }

    public function store()
    {
        $rules = [

            'id_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori wajib dipilih.'
                ]
            ],

            'nama_kost' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama kost wajib diisi.',
                    'min_length' => 'Nama kost minimal 3 karakter.',
                    'max_length' => 'Nama kost maksimal 100 karakter.'
                ]
            ],

            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi.'
                ]
            ],

            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga wajib diisi.',
                    'numeric' => 'Harga harus berupa angka.'
                ]
            ],

            'jarak' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jarak wajib diisi.',
                    'numeric' => 'Jarak harus berupa angka.'
                ]
            ],

            'fasilitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih minimal satu fasilitas.'
                ]
            ],

            'keamanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai keamanan wajib dipilih.'
                ]
            ],

            'wifi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wifi wajib dipilih.'
                ]
            ],

            'ukuran_kamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ukuran kamar wajib dipilih.'
                ]
            ],

            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status kamar wajib dipilih.'
                ]
            ],

            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|max_size[foto,2048]|mime_in[foto,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'uploaded' => 'Foto wajib diupload.',
                    'is_image' => 'File harus berupa gambar.',
                    'max_size' => 'Ukuran foto maksimal 2 MB.',
                    'mime_in' => 'Format Harus JPG, PNG, JPEG'
                ]
            ]

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $model = new KostModel();
        $file = $this->request->getFile('foto');
        $namaBaru = $file->getRandomName();

        $file->move('uploads', $namaBaru);
        $fasilitas = implode(',', $this->request->getPost('fasilitas'));

        $model->save([
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_kost' => $this->request->getPost('nama_kost'),
            'alamat' => $this->request->getPost('alamat'),
            'harga' => $this->request->getPost('harga'),
            'jarak' => $this->request->getPost('jarak'),
            'fasilitas' => $fasilitas,
            'keamanan' => $this->request->getPost('keamanan'),
            'wifi' => $this->request->getPost('wifi'),
            'ukuran_kamar' => $this->request->getPost('ukuran_kamar'),
            'status' => $this->request->getPost('status'),
            'foto' => $namaBaru

        ]);
        $idKost = $model->getInsertID();

        $this->sinkronNilaiAlternatif($idKost);

        return redirect()->to('/kost/kamar')->with('success', 'Data Kost Berhasil ditambah');
    }


    public function edit($id)
    {
        helper('form');
        $model = new KostModel();
        $Kostmodel = new KategoriKostModel();
        $data['kategori'] = $Kostmodel->findAll();

        $data['kost'] = $model->find($id);
        return view('kost/edit', $data);
    }

    public function update()
    {
        $rules = [

            'id_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori wajib dipilih.'
                ]
            ],

            'nama_kost' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama kost wajib diisi.',
                    'min_length' => 'Nama kost minimal 3 karakter.',
                    'max_length' => 'Nama kost maksimal 100 karakter.'
                ]
            ],

            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi.'
                ]
            ],

            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga wajib diisi.',
                    'numeric' => 'Harga harus berupa angka.'
                ]
            ],

            'jarak' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jarak wajib diisi.',
                    'numeric' => 'Jarak harus berupa angka.'
                ]
            ],

            'fasilitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih minimal satu fasilitas.'
                ]
            ],

            'keamanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai keamanan wajib dipilih.'
                ]
            ],

            'wifi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wifi wajib dipilih.'
                ]
            ],

            'ukuran_kamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ukuran kamar wajib dipilih.'
                ]
            ],

            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status kamar wajib dipilih.'
                ]
            ],

            'foto' => [
                'rules' => 'is_image[foto]|max_size[foto,2048]|mime_in[foto,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'max_size' => 'Ukuran foto maksimal 2 MB.',
                    'mime_in' => 'Format Harus JPG, PNG, JPEG'
                ]
            ]

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $file = $this->request->getFile('foto');
        $fotoLama = $this->request->getPost('foto_lama');

        if ($file->getError() == 4) {
            $namaFoto = $fotoLama;
        } else {
            $namaFoto = $file->getRandomName();
            $file->move('uploads', $namaFoto);
            if (!empty($fotoLama) && file_exists(FCPATH . 'uploads/' . $fotoLama)) {
                unlink(FCPATH . 'uploads/' . $fotoLama);
            }
        }
        $fasilitas = implode(',', $this->request->getPost('fasilitas'));

        $model = new KostModel();

        $model->save([
            'id_kost' => $this->request->getPost('id_kost'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_kost' => $this->request->getPost('nama_kost'),
            'alamat' => $this->request->getPost('alamat'),
            'harga' => $this->request->getPost('harga'),
            'jarak' => $this->request->getPost('jarak'),
            'fasilitas' => $fasilitas,
            'keamanan' => $this->request->getPost('keamanan'),
            'wifi' => $this->request->getPost('wifi'),
            'ukuran_kamar' => $this->request->getPost('ukuran_kamar'),
            'status' => $this->request->getPost('status'),
            'foto' => $namaFoto

        ]);
        $this->sinkronNilaiAlternatif(
            $this->request->getPost('id_kost')
        );

        return redirect()->to(site_url('/kost/kamar'))->with('success', 'Data Kost Berhasil diedit');
    }

    public function delete($id)
    {
        $model = new KostModel();
        $data = $model->find($id);

        if (!empty($data['foto']) && file_exists(FCPATH . 'uploads/' . $data['foto'])) {
            unlink(FCPATH . 'uploads/' . $data['foto']);
        }

        $nilaiModel = new NilaiAlternatifModel();

        $nilaiModel->where('id_kost', $id)->delete();
        $model->delete($id);
        return redirect()->to('/kost/kamar')->with('success', 'Data Kost Berhasil dihapus');
    }

    private function sinkronNilaiAlternatif($idKost)
    {
        $kostModel = new KostModel();
        $kriteriaModel = new KriteriaModel();
        $nilaiModel = new NilaiAlternatifModel();

        $kost = $kostModel->find($idKost);

        $nilaiModel->where('id_kost', $idKost)->delete();

        $kriteria = $kriteriaModel->findAll();

        foreach ($kriteria as $k) {

            switch ($k['nama_kriteria']) {

                case 'Harga':
                    $nilai = $kost['harga'];
                    break;

                case 'Jarak':
                    $nilai = $kost['jarak'];
                    break;

                case 'Keamanan':
                    $nilai = $kost['keamanan'];
                    break;

                case 'Wifi':
                    $nilai = ($kost['wifi'] == 'Ya') ? 1 : 0;
                    break;

                case 'Fasilitas':
                    $nilai = count(explode(',', $kost['fasilitas']));
                    break;

                case 'Ukuran Kamar':

                    switch ($kost['ukuran_kamar']) {
                        case '2x3':
                            $nilai = 1;
                            break;

                        case '3x3':
                            $nilai = 2;
                            break;

                        case '3x4':
                            $nilai = 3;
                            break;

                        case '4x4':
                            $nilai = 4;
                            break;

                        default:
                            $nilai = 0;
                    }

                    break;

                default:
                    $nilai = 0;
            }

            $nilaiModel->insert([
                'id_kost' => $idKost,
                'id_kriteria' => $k['id_kriteria'],
                'nilai' => $nilai
            ]);
        }
    }
}
