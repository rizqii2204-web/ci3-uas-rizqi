<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
    <div class="card-body">

        <form action="" method="post">

            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pelanggan">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat">
            </div>

            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="telepon" class="form-control" placeholder="Masukkan no hp">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('admin/pelanggan'); ?>" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

</div>