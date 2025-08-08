<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between border-bottom py-2">
        <h3 class="pb-2 mb-0">Detail pegawai</h3>
        <a href="/pegawai" class="btn btn-dark">Kembali</a>
    </div>
    <div class="pt-3">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center">
                <?php if ($pegawai->image): ?>
                     <img src="<?= site_url(); ?>uploads/<?= $pegawai->image ?>" class="img-fluid rounded-pill" style="max-width: 300px;">
                <?php else: ?>
                    <h3 class="text-center">No image yet</h3>
                <?php endif ?>
               
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <th width="150px">Nama Pegawai</th>
                        <th width="2px">:</th>
                        <th><?= $pegawai->nama_pegawai ?></th>
                    </tr>
                      <tr>
                        <th>jabatan</th>
                        <th>:</th>
                        <th><?= $pegawai->nama_jabatan ?></th>
                    </tr>
                      <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <th><?= $pegawai->alamat ?></th>
                    </tr>
                     <tr>
                        <th>Nomor Telepon</th>
                        <th>:</th>
                        <th><?= $pegawai->telepon ?></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>