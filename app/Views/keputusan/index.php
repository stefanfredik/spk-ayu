<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>

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
                                <th>Nilai</th>
                                <th>Keputusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rank = 1;
                            foreach ($peserta as $ps) :
                            ?>
                                <tr>
                                    <td class="text-center "><span class="badge bg-success rounded-circle p-2"><?= $rank++; ?></span></td>
                                    <td><?= $ps['nik'] ?></td>
                                    <td><?= $ps['no_kk'] ?></td>
                                    <td><?= $ps['nama_penduduk'] ?></td>
                                    <td><?= $ps['jenis_kelamin'] ?></td>
                                    <td><?= $ps['rt'] ?></td>
                                    <td><?= $ps['rw']; ?></td>
                                    <td><?= $ps['nilaiAkhir']; ?></td>
                                    <th><?= @$ps['keputusan']; ?></th>
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