<?php

namespace App\Controllers;

use App\Models\KriteriaModel;

class Kriteria extends BaseController
{
    public function index()
    {
        $model = new KriteriaModel();

        $data['kriteria'] = $model->paginate(5);
        $data['pager'] = $model->pager;

        return view('kriteria/index', $data);
    }

    public function create()
    {
        helper('form');
        return view('kriteria/create');
    }

    public function store()
    {
        $rules = [

            'kode' => 'required|max_length[5]',

            'nama_kriteria' => 'required|max_length[100]',

            'atribut' => 'required|in_list[Benefit,Cost]',

            'bobot_default' => 'required|decimal'

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $model = new KriteriaModel();

        $model->save([

            'kode' => $this->request->getPost('kode'),
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'atribut' => $this->request->getPost('atribut'),
            'bobot_default' => $this->request->getPost('bobot_default'),

        ]);

        return redirect()->to('/kriteria')
            ->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        helper('form');

        $model = new KriteriaModel();

        $data['kriteria'] = $model->find($id);

        return view('kriteria/edit', $data);
    }

    public function update()
    {
        $rules = [

            'kode' => 'required|max_length[5]',

            'nama_kriteria' => 'required|max_length[100]',

            'atribut' => 'required|in_list[Benefit,Cost]',

            'bobot_default' => 'required|decimal'

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $model = new KriteriaModel();

        $model->save([

            'id_kriteria' => $this->request->getPost('id_kriteria'),
            'kode' => $this->request->getPost('kode'),
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'atribut' => $this->request->getPost('atribut'),
            'bobot_default' => $this->request->getPost('bobot_default'),

        ]);

        return redirect()->to('/kriteria')
            ->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $model = new KriteriaModel();

        $model->delete($id);

        return redirect()->to('/kriteria')
            ->with('success', 'Data berhasil dihapus');
    }
}