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
<?php if (session()->get('role') === 'admin') : ?>

    <!-- Data Siswa -->
    <h3>Data Siswa</h3>
    <table class="table-bordered table-striped">
        <tr>
            <th>Nama</th>
            <th>NIS</th>
            <th>Tanggal Lahir</th>
        </tr>
        <tr>
            <td>Andi Saputra</td>
            <td>101</td>
            <td>2003-12-22</td>
        </tr>
        <tr>
            <td>Budi Cahya</td>
            <td>102</td>
            <td>2004-01-30</td>
        </tr>
    </table>
<?php else : ?>
    <div class="alert alert-danger" role="alert">
        Anda tidak mempunyai akses untuk melihat data siswa, silahkan login sebagai Admin untuk melihat data.
    </div>
<?php endif; ?>


<?= $this->endSection(''); ?>