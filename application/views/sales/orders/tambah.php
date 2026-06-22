<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">Tambah Orders</h2>

    <form method="post" action="<?= site_url('sales/tambah_orders'); ?>">

        <!-- Pelanggan -->
        <div class="form-group">
            <label>Pelanggan</label>
            <select name="id_pelanggan" class="form-control" required>
                <option value="">-- pilih pelanggan --</option>
                <?php foreach ($pelanggan as $p): ?>
                    <option value="<?= $p->id; ?>">
                        <?= $p->nama; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Tanggal -->
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <!-- Status -->
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

        <!-- Produk -->
        <div class="form-group">
            <label>Produk</label>
            <select name="id_produk" class="form-control" required>
                <option value="">-- pilih produk --</option>
                <?php foreach ($produk as $p): ?>
                    <option value="<?= $p->id; ?>">
                        <?= $p->nama_produk; ?> - Rp <?= number_format($p->harga); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Jumlah -->
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="1" required>
        </div>

        <!-- Tombol -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('sales/orders'); ?>" class="btn btn-secondary">Kembali</a>

    </form>

</div>