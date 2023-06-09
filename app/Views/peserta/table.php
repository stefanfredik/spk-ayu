<div class="table-responsive">
    <table class="table table-bordered" id="table" width="100%" colspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun Bantuan</th>
                <th>NIK</th>
                <th>NO. KK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            // dd($dataPeserta);
            foreach ($dataPeserta as $dt) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dt['tahun']; ?></td>
                    <td><?= $dt['nik']; ?></td>
                    <td><?= $dt['no_kk']; ?></td>
                    <td><?= $dt['nama_penduduk']; ?></td>
                    <td><?= $dt['jenis_kelamin']; ?></td>

                    <td style="text-align: center" width="120px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button onclick="remove('<?= $meta['url']; ?>', this)" class="btn text-white btn-danger" data-id="<?= $dt['id'] ?>"><i class="bi bi-trash mr-2"></i></button>
                            <button onclick="edit('<?= $meta['url']; ?>', this)" class="btn  btn-primary" data-id="<?= $dt['id'] ?>"><i class="bi bi-pencil-square mr-2"></i></button>
                            <button onclick="detail('<?= $meta['url']; ?>', this)" class="btn btn-info" data-id="<?= $dt['id'] ?>">Detail</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>