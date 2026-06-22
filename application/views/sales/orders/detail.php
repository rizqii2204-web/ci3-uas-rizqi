<div class="container-fluid">

    <h3>Detail Order</h3>

    <!-- FORM TAMBAH PRODUK -->
    <form method="post" action="<?= site_url('sales/tambah_detail/'.$order->id); ?>">

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

        <?php if ($detail): ?>
            <?php foreach ($detail as $d): ?>
            <form method="post" action="<?= site_url('sales/update_detail/'.$d->id.'/'.$order->id); ?>">
            <tr>
                <td><?= $d->nama_produk; ?></td>

                <td>
                    <input type="number" name="jumlah" value="<?= $d->jumlah; ?>" class="form-control" style="width:80px;">
                </td>

                <td>Rp <?= number_format($d->harga, 0, ',', '.'); ?></td>
                <td>Rp <?= number_format($d->subtotal, 0, ',', '.'); ?></td>

                <td>
                    <button type="submit" class="btn btn-warning btn-sm">Simpan</button>

                    <a href="<?= site_url('sales/hapus_detail/'.$d->id.'/'.$order->id); ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus?')">
                       Hapus
                    </a>
                </td>

            </tr>
            </form>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada produk</td>
            </tr>
        <?php endif; ?>

    </table>

    <a href="<?= site_url('sales/orders'); ?>" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

</div>