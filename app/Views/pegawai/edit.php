<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between border-bottom py-2">
        <h3 class="pb-2 mb-0">Edit Data pegawai</h3>
        <a href="/pegawai" class="btn btn-dark">Kembali</a>
    </div>
    <div class="pt-3">
        <form action="/pegawai/update/<?= $pegawai->id; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="" class="form-label">Nama pegawai:</label>
                <input type="text" class="form-control <?= isset(session('errors')['nama_pegawai']) ? 'is-invalid' : ''; ?>"
                    name="nama_pegawai" placeholder="Masukan nama pegawai" value="<?= $pegawai->nama_pegawai; ?>">
                <div class="invalid-feedback">
                    <?= session('errors.nama_pegawai') ?? ''; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Alamat:</label>
                <input type="text" class="form-control <?= isset(session('errors')['alamat']) ? 'is-invalid' : '' ?>"
                    name="alamat" placeholder="Masukan alamat pegawai " value="<?= $pegawai->alamat; ?>">
                <div class="invalid-feedback">
                    <?= session('errors.alamat') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">NO Telepon:</label>
                <input type="text" class="form-control <?= isset(session('errors')['telepon']) ? 'is-invalid' : '' ?>"
                    name="telepon" placeholder="Masukan telepon pegawai" value="<?= $pegawai->telepon; ?>">
                <div class="invalid-feedback">
                    <?= session('errors.telepon') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="jabatan_id" class="form-label">Jabatan:</label>
                <select name="jabatan_id" id="jabatan_id" class="form-control">
                    <option value="">-- Pilih Jabatan --</option>
                    <?php foreach ($jabatan as $j) : ?>
                        <option value="<?= $j->id; ?>"
                            <?= (old('jabatan_id', $pegawai->jabatan_id) == $j->id) ? 'selected' : ''; ?>>
                            <?= $j->nama_jabatan; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset(session('errors')['jabatan_id'])) : ?>
                    <div class="invalid-feedback d-block">
                        <?= session('errors')['jabatan_id']; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto pegawai:</label>
                <?php if ($pegawai->image) : ?>
                    <div class="mb-2">
                        <img src="<?= site_url() ?>uploads/<?= $pegawai->image; ?> "
                            class="img-thumbnail <?= isset(session('errors')['file_foto']) ? 'is-invalid' : '' ?>" width="150">
                        <div class="invalid-feedback">
                            <?= session('errors.file_foto') ?? ''; ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="mb-2">
                        <h4>No image yet</h3>
                    </div>
                <?php endif ?>
                <input type="file" name="file_foto" class="form-control">
            </div>
            <input type="hidden" name="fotoLama" value="<?= $pegawai->image; ?>">
            <button type="submit" class="btn btn-dark">Update</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>