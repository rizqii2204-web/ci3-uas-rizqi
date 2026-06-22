<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
    <div class="card-body">

        <form action="" method="post">

            <div class="form-group">
                <label>Kode Produk</label>
                <input type="text" name="kode_produk" class="form-control" placeholder="Masukkan kode produk">
            </div>

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukkan harga">
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" placeholder="Masukkan stok">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('admin/produk'); ?>" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

</div>