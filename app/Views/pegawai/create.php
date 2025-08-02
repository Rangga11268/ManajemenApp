<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between border-bottom py-2">
        <h3 class="pb-2 mb-0">Tambah Data pegawai</h3>
        <a href="/pegawai" class="btn btn-dark">Kembali</a>
    </div>
    <div class="pt-3">
        <form action="/pegawai/store" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="" class="form-label">Nama pegawai:</label>
                <input type="text" class="form-control" name="nama_pegawai" placeholder="Masukan nama pegawai ">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Alamat:</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat pegawai ">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">NO Telepon:</label>
                <input type="text" class="form-control" name="telepon" placeholder="Masukan telepon pegawai ">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Jabatan:</label>
                <select name="jabatan_id" id="" class="form-control">
                    <?php foreach ($jabatan as $j) { ?>
                        <option value="<?= $j->id; ?>"><?= $j->nama_jabatan; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-dark">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>