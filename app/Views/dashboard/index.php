<?= $this->extend("temp/index"); ?>
<?= $this->section("content"); ?>

<div class="row text-center mb-5">
    <div class="m-3 p-5 border rounded bg-white text-black">
        <img width="100" class="img-fluid m-2" src="/assets/img/logo.png" alt="">
        <h2 class="">Halo Admin</h2>
        <h4 class="">Selamat datang di <?= ucfirst(APP_DESC); ?></h4>
    </div>
</div>

<?php
if (in_groups('admin')) echo view("/dashboard/dashboard/admin");
if (in_groups('kepala-desa')) echo view("/dashboard/dashboard/kepaladesa");
?>

<?= $this->endSection(); ?>