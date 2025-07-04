<?php

namespace App\Controllers;

class MenuController extends BaseController
{
    public function home(): string
    {
        return view('beranda');
    }

    public function info_kegiatan(): string
    {
        return view('info');
    }

    public function data_siswa(): string
    {
        return view('siswa');
    }
}
