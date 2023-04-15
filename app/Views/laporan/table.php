<div class="table-responsive">
    <table class="table table-bordered" id="table" width="100%" colspacing="0">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIK</th>
                <th class="text-center">No. KK</th>
                <th class="text-center">Nama Penduduk</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Periode</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            // dd($dataPeserta);
            foreach ($dataPeserta as $dt) : ?>
                <?php if ($dt['status_layak'] != 'Tidak Layak') : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $dt['nik']; ?></td>
                        <td><?= $dt['no_kk']; ?></td>
                        <td><?= $dt['nama_penduduk']; ?></td>
                        <td><?= $dt['jenis_kelamin'] ?></td>
                        <td><?=
                            "RT : " . $dt['rt'] . " " .
                                "RW : " . $dt['rw']; ?></td>
                        <td>1</td>
                    </tr>

                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>