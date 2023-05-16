<?= $this->extend('temp/cetak/index'); ?>
<?= $this->section("table"); ?>
<table class="table table-bordered" id="table" width="100%" colspacing="0">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Tahun</th>
            <th class="text-center">NIK</th>
            <th class="text-center">No. KK</th>
            <th class="text-center">Nama</th>
            <th class="text-center">RT</th>
            <th class="text-center">RW</th>
            <th class="text-center">Nilai</th>
            <th class="text-center">Rangking</th>
            <th class="text-center">Status</th>
            <th class="text-center">Periode</th>
            <th class="text-center">Waktu Terima</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0;
        // dd($dataPeserta);
        foreach ($peserta as $dt) : ?>
            <tr>
                <td class="text-center"><?= ++$no; ?></td>
                <td><?= $dt['tahun']; ?></td>
                <td><?= $dt['nik']; ?></td>
                <td><?= $dt['no_kk']; ?></td>
                <td><?= $dt['nama_penduduk']; ?></td>
                <td><?= $dt['rt']; ?></td>
                <td><?= $dt['rw']; ?></td>
                <td><?= $dt['nilaiAkhir']; ?></td>
                <td><?= $no; ?></td>
                <td><?= $dt['status']; ?></td>
                <td><?= 'Periode ' . $dt['periode']; ?></td>
                <td><?= $dt['tanggalTerima']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>