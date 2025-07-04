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

    <!-- Info Siswa -->
    <h3>Info Kegiatan</h3>
    <p>Informasi Kegiatan Siswa Bulan Ini : </p>
    <ul>
        <li>10 Agustus - Masa Orientasi Siswa</li>
        <li>17 Agustus - Upacara Hari Kemerdekaan</li>
    </ul>
    <p>Informasi Kegiatan Bulan Depan : </p>
    <ul>
        <li>12 September - Ujian Tengah Semester</li>
    </ul>
    


    <?= $this->endSection(''); ?>