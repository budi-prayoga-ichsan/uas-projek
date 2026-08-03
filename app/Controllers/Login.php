<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $session = session();
        helper('form');
        if($session->get('isLogin') === true){
            return redirect()->to('/dashboard');
        }
        return view('login/index');
    }

    public function authenticate()
    {
        $model = new UserModel();
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Nama Wajib diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');

        $user = $model->where('nama', $nama)->first();
        if($user !== null){
            if(password_verify($password, $user['password'])){
                session()->set([
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'role' => $user['role'],
                    'isLogin' =>true
                ]);
                return redirect()->to('/dashboard');
            }

        }
        return redirect()->back()->withInput();
    }

    public function register()
    {
        helper('form');
        return view('login/register');
    }

    public function registerStore()
    {
        $model = new UserModel();
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => ' Nama Wajib diisi',
                    'min_length' => 'Minimal 3 huruf',
                    'max_lenngth' => 'Maksimal 100 huruf'
                ]
            ],
            'email' => [
                'rules' => 'required|min_length[3]|max_length[100]|is_unique[users.email]',
                'errors' => [
                    'required' => ' Email Wajib diisi',
                    'min_length' => 'Minimal 3 huruf',
                    'max_lenngth' => 'Maksimal 100 huruf',
                    'valid_email' => 'Input harus email',
                    'is_unique' => 'Email sudah ada terpakai'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Minimal 6 karakter'
                ]
            ],
            'password_confirmation' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Wajib diisi',
                    'matches' => 'Password harus sama'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }
        $password = $this->request->getPost('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => $passwordHash,
            'role' => 'user'
        ]);

        return redirect()->to('/login')->with('success', 'Register Berhasi, silahkan Login');
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
