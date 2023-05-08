<?= $this->extend('/temp/index'); ?>
<?= $this->section("content"); ?>

<div class="row ">
    <div class="col bg-white rounded p-2">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data Kriteria</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Peserta</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Bobot Peserta</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    <div class="col">
                        <div class="cardy">
                            <div class="card-header">
                                <h3>Tabel Kriteria</h3>
                            </div>
                            <div id="data" class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" colspacing="0">
                                        <thead>
                                            <tr>
                                                <td>Kode</td>
                                                <td>Keterangan</td>
                                                <td>Nilai</td>
                                                <td>Perbaikan Bobot</td>
                                                <td>Kepentingan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($dataKriteria as $dk) :
                                            ?>
                                                <tr>
                                                    <td><?= $dk['keterangan'] ?></td>
                                                    <td><?= $dk['kriteria']; ?></td>
                                                    <td><?= $dk['nilai']; ?></td>
                                                    <?php foreach ($bobotKriteria as $key => $db) {
                                                        if ($dk['keterangan'] == $key) {
                                                            echo '<td>' . $db . '</td>';
                                                        }
                                                    } ?>
                                                    <td>
                                                        <?php
                                                        echo match ($dk['nilai']) {
                                                            '5' => 'Sangat Penting',
                                                            '4' => 'Penting',
                                                            '3' => 'Cukup Penting',
                                                            '2' => 'Tidak Penting',
                                                            '1' => 'Sangat Tidak Penting',
                                                            default => 'Tidak Diketahui'
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3>Tabel Data</h3>
                            </div>
                            <div id="data" class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" colspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="80px">No</th>
                                                <th>Peserta</th>
                                                <?php foreach ($dataKriteria as $dt) : ?>
                                                    <th><?= $dt['keterangan']; ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($peserta as $ps) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $ps['nama_penduduk']; ?></td>
                                                    <?php foreach ($ps['kriteria_keterangan'] as $key => $dk) : ?>
                                                        <td><?= $dk; ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3>Tabel Bobot Kriteria</h3>
                            </div>
                            <div id="data" class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" colspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="80px">No</th>
                                                <th>Peserta</th>
                                                <?php foreach ($dataKriteria as $dt) : ?>
                                                    <th><?= $dt['keterangan']; ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($peserta as $ps) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $ps['nama_penduduk']; ?></td>

                                                    <?php foreach ($ps['kriteria_nilai'] as $key => $dk) : ?>
                                                        <td><?= $dk; ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>

</script>
<?= $this->endSection(); ?>