<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>

<div class="row mb-2">
    <div class="col-lg-12">
        <div class="card border shadow">
            <div class="card-header">
                <h3>Kriteria Kelayakan</h3>
            </div>
            <div class="card-body">
                <?php foreach ($kelayakan as $kl) : ?>
                    <div class="row">
                        <div class="col-md-4">
                            >= <span class="fw-bold mx-2"><?= $kl['nilai']; ?></span><?= $kl['keterangan']; ?>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card  shadow">
            <div class="card-header">
                <h3>Daftar Peserta</h3>
            </div>
            <div id="data" class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered" width="100%" colspacing="0">
                        <thead>
                            <tr class="align-middle">
                                <th class="text-center">Rangking</th>
                                <th>NIK</td>
                                <th>No. KK</td>
                                <th>Nama Penduduk</th>
                                <th>Jenis Kelamin</td>
                                <th>RT</td>
                                <th>RW</td>
                                <th>Status Layak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rank = 1;
                            foreach ($peserta as $ps) :
                            ?>
                                <tr>
                                    <td class="text-center"><?= $rank++; ?></td>
                                    <td><?= $ps['nik'] ?></td>
                                    <td><?= $ps['nama_penduduk'] ?></td>
                                    <td><?= $ps['jenis_kelamin'] ?></td>
                                    <td><?= $ps['rt'] ?></td>
                                    <td><?= $ps['rw']; ?></td>
                                    <th><?= @$ps['status_layak']; ?></th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>