<div class="container-fluid">

    <h3>Detail Order</h3>

    <!-- FORM TAMBAH PRODUK -->
    <form method="post" action="<?= site_url('admin/tambah_detail/'.$orders->id); ?>">

        <div class="form-group">
            <label>Produk</label>
            <select name="id_produk" class="form-control">
                <?php foreach ($produk as $p): ?>
                    <option value="<?= $p->id; ?>">
                        <?= $p->nama_produk; ?> - Rp <?= $p->harga; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>

    </form>

    <hr>

    <!-- TABEL DETAIL -->
    <table class="table table-bordered">
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($detail as $d): ?>
<form method="post" action="<?= site_url('admin/update_detail/'.$d->id.'/'.$orders->id); ?>">
<tr>
    <td><?= $d->nama_produk; ?></td>

    <td>
        <input type="number" name="jumlah" value="<?= $d->jumlah; ?>" class="form-control" style="width:80px;">
    </td>

    <td><?= $d->harga; ?></td>
    <td><?= $d->subtotal; ?></td>

    <td>
        <button type="submit" class="btn btn-warning btn-sm">Simpan</button>

        <a href="<?= site_url('admin/hapus_detail/'.$d->id.'/'.$orders->id); ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin hapus?')">
           Hapus
        </a>
    </td>

</tr>
</form>
<?php endforeach; ?>

    </table>

    <a href="<?= site_url('admin/orders'); ?>" class="btn btn-secondary mb-3">
    ← Kembali
    </a>

</div>