<!-- 
    * Extend artinya setiap view ini dipanggil, maka akan memanggil view lain
    * disini kita akan memanggil view template.php yang ada di folder 
    * Views/layout/template.php
--> 
    <?= $this->extend('layout/template'); ?>

<!--
    * Section adalah setiap kita melakukan extend (dalam hal ini layout/template)
    * maka dia akan mencari function renderSection() yang akan di layout/template
    * berarti semua code yang ada diantara $this->section('content') dan $this->endSection()
    * akan disisipkan di renderSection('content')
-->

    <?= $this->section('content'); ?>

    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <h1>Portal Kegiatan Siswa</h1>
        <p>Selamat Datang di Portal Informasi Kegiatan Siswa SMA 404</p>
        <a class="btn btn-dark" href="<?= base_url('info_kegiatan') ?>" role="button">Info Kegiatan</a>
        <a class="btn btn-primary" href="<?= base_url('data_siswa') ?>" role="button">Data Siswa</a>
    </div>
    


    <?= $this->endSection(''); ?>