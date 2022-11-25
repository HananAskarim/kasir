<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $users;
    function __construct()
    {
        $this->users = new UsersModel();
    }

    public function index()
    {
        $data = [
            "title" => "Datat Users",
            "users" => $this->users->findAll()
        ];
        return view('users/index', $data);
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Data",

        ];
        return view('users/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]|max_length[255]',
                'errors' => [
                    'required' => ' {field} Harus diisi',
                    'is_unique' => 'Username telah digunakan, gunakan yang lainnya',
                    'max_length' => 'Maksimal 255 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => 'Maksimal 255 karakter'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nama' => $this->request->getVar('nama'),
            'level' => $this->request->getVar('level'),
            'is_aktif' => $this->request->getVar('is_aktif')
        ]);

        session()->setFlashdata('message', 'Tambah Data Users Berhasil');
        return redirect()->to('/user');
    }
}
