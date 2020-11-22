<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="container mt-5">
        <div class="row text-center justify-content-center">
            <div class="col-md-6">
                <img src="/img/logo-arka.png" width="100">
                <br><br>
                <h2 style="color:#0E98CE">Pendaftaran Berhasil</h2>
                <p style="font-size:20px;color:#5C5C5C;">Kami telah mengirimkan email ke alamat email Anda. Silakan buka email Anda sekarang.</p>
                <a href="https://arkalearn.com/login/index.php" class="btn btn-primary">Log in</a>
                <br><br>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>