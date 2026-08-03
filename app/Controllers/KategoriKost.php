<?php

namespace App\Controllers;

use App\Models\KategoriKostModel;

class KategoriKost extends BaseController
{
    public function index()
    {
        $model = new KategoriKostModel();
        $keyword = $this->request->getGet('keyword');
        if(!empty($keyword)){
            $model->like('nama_kategori', $keyword);
        }
        $data['kategoriKost'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        return view('kategoriKost/index', $data);
    }

    public function create()
    {
        helper('form');
        return view('/kategoriKost/create');
    }


    public function store()
    {
        $rules = [
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Wajib diisi'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $model = new KategoriKostModel();

        $model->save([
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to('/kost/kategori')->with('success', 'Kategori Kost Berhasil ditambah');
    }

    public function edit($id)
    {
        helper('form');
        $model = new KategoriKostModel();

        $data['kategoriKost'] = $model->find($id);
        return view('/kategoriKost/edit', $data);
    }

    public function update()
    {
        $model = new KategoriKostModel();
        $rules = [
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Wajib diisi'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        };

        $model->save([
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to('/kost/kategori')->with('success', 'Kategori Kost Berhasil diedit');
    }

    public function delete($id){
        $model = new KategoriKostModel();

        $model->delete($id);
        return redirect()->to(site_url('/kost/kategori'));
    }
}
