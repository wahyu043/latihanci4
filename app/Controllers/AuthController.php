<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\Database\Query;
use Error;

class AuthController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new AuthModel();
    }

    public function registrasi()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('auth/registrasi', $data);
    }

    public function SimpanRegistrasi()
    {
        /* Validasi sebelum simpan data dengan rulesRegistrasi */
        if ($this->validate($this->rulesRegistrasi())) {

            /* Apabila sukses tervalidasi, simpan ke databse */
            $this->model->save([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'role' => 'siswa',
            ]);

            /* Set session flash (One Time Session) sebagai pesan registrasi berhasil
            yang ditampung di dalam variabel 'registrasi sukses'
            */
            session()->setFlashdata('registrasi_sukses', 'Registrasi Berhasil');

            /* Redirect tetap ke halaman registrasi, untuk menunjukkan pesan registrasi */
            return redirect()->to('/registrasi');
        } else {
            /*
            Apabila inputan tidak valid dengan aturan rulesRegistrasi
            redirect ke halaman registrasi dengan inputan datanya, sehingga inputan yang sudah benar
            ter-input tidak hilang
            */
            return redirect()->to('/registrasi')->withInput();
        }
    }

    /* rules untuk registrasi */
    public function rulesRegistrasi()
    {
        $setRules = [
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email anda tidak valid',
                    'is_unique' => 'Email {value} sudah ada'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Pssword minimal {param} karakter'
                ]
            ],
            'konfirmasi_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi',
                    'matches' => 'Konfirmasi password berbeda dengan {param}',
                ]
            ]
        ];
        return $setRules;
    }

    /* function login */
    public function login()
    {
        $data = [
            'validation' => \config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    /* function proses login */
    public function prosesLogin()
    {
        if ($this->validate($this->rulesLogin())) {

            $query = $this->model->where('email', $this->request->getPost('email'));
            $count  = $query->countAllResults(false);
            $data = $query->get()->getRow();

            if ($count > 0) {

                $hasPassword = $data->password;

                if (password_verify($this->request->getPost('password'), $hasPassword)) {

                    $session = [
                        'role' => $data->role,
                        'logged_in' => TRUE
                    ];
                    session()->set($session);

                    return redirect()->to(base_url('home'));
                } else {

                    return redirect()->to(base_url('login'))->with('login_failed', 'Username / password anda salah');
                }
            } else {
                return redirect()->to(base_url('login'))->with('login_failed', 'Username tidak ditemukan');
            }
        } else {
            return redirect()->to(base_url('login'))->withInput();
        }
    }

    /* function rulesLogin */
    public function rulesLogin()
    {
        $setRules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email anda tidak valid'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ]
        ];
        return $setRules;
    }

    /* function logout */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
