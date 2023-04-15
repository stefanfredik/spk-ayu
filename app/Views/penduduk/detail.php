<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $penduduk['nama_penduduk']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">Nama Penduduk</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $penduduk['nama_penduduk'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">NIK</label>
                    </div>

                    <div class="col-md-8">
                        <p><?= $penduduk['nik'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">No. KK</label>
                    </div>

                    <div class="col-md-8">
                        <p><?= $penduduk['no_kk'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">Jenis Kelamin</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $penduduk['jenis_kelamin'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">RT</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $penduduk['rt'] ?></p>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-md-4">
                        <label class="form-label">RW</label>
                    </div>
                    <div class="col-md-8">
                        <p><?= $penduduk['rw'] ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button onclick="edit('<?= $meta['url'] ?>',this)" data-id="<?= $penduduk['id']; ?>" type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>