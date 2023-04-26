<?= $this->extend("temp/index"); ?>
<?= $this->section("content"); ?>

<div class="row text-center mb-5">
    <div>
        <h2 class="text-white">Halo Admin</h2>
        <h4 class="text-white">Selamat datang di <?= APP_NAME; ?></h4>
        <img width="100" class="img-fluid" src="/assets/img/logo.png" alt="">
    </div>
</div>

<?php
if (in_groups('admin')) echo view("/dashboard/dashboard/admin");
if (in_groups('kepala-desa')) echo view("/dashboard/dashboard/kepaladesa");
?>

<?= $this->endSection(); ?>