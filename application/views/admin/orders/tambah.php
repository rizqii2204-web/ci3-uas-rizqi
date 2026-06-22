<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">tambah orders</h2>

    <form method="post" action="<?= site_url('admin/tambah_orders'); ?>">

<div class="form-group">
    <label>Pelanggan</label>
    <select name="id_pelanggan" class="form-control">
        <?php foreach ($pelanggan as $p): ?>
            <option value="<?= $p->id; ?>">
                <?= $p->nama; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required>
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="draft">Draft</option>
        <option value="dikirim">Dikirim</option>
        <option value="selesai">Selesai</option>
        <option value="dibatalkan">Dibatalkan</option>
    </select>
</div>

<hr>

<div class="form-group">
    <label>Produk</label>
    <select name="id_produk" class="form-control">
        <option value="">-- pilih produk --</option>
        <?php foreach ($produk as $p): ?>
            <option value="<?= $p->id; ?>">
                <?= $p->nama_produk; ?> - Rp <?= $p->harga; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label>Sales</label>
    <select name="id_sales" class="form-control">
        <?php foreach ($sales as $s): ?>
            <option value="<?= $s->id; ?>">
                <?= $s->nama; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control">
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= site_url('admin/orders'); ?>" class="btn btn-secondary">Kembali</a>

</form>

</div>