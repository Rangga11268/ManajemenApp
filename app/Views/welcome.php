<?= $this->extend('layouts/main.php'); ?>
<?= $this->section('content'); ?>
<?php if (session()->get('login')) : ?> 
    <div class="alert alert-success">
        Selamat datang, <strong><?= session()->get('name'); ?></strong>
    </div>
<?php endif ?>
<div class="p-5 text-center bg-white rounded-3">
    <h1 class="text-body-emphasis">Manajemen APP</h1>
    <p class="lead">
        Selamat datan di aplikasi manajemen. Aplikasi ini di gunakan untuk manajemen data pegawai
    </p>
</div>
<?= $this->endSection(); ?>