<div class="container-fluid"> 

<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
    <div class="card-body">

        <form action="" method="post">

            <!-- Hidden ID -->
            <input type="hidden" name="id" value="<?= $pelanggan->id; ?>">

            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama" class="form-control"
                    value="<?= $pelanggan->nama; ?>">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control"
                    value="<?= $pelanggan->alamat; ?>">
            </div>

            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="telepon" class="form-control"
                    value="<?= $pelanggan->telepon; ?>">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="<?= site_url('admin/pelanggan'); ?>" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

</div>