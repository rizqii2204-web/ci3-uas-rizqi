<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">Edit Orders</h2>

    <form method="post" action="<?= site_url('sales/update_orders'); ?>">

        <input type="hidden" name="id" value="<?= $order->id; ?>">

        <div class="form-group">
            <label>Id Pelanggan</label>
            <input type="text" name="id_pelanggan" class="form-control"
                   value="<?= $order->id_pelanggan; ?>" required>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control"
                   value="<?= $order->tanggal; ?>" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">

                <option value="draft" <?= $order->status == 'draft' ? 'selected' : ''; ?>>Draft</option>
                <option value="dikirim" <?= $order->status == 'dikirim' ? 'selected' : ''; ?>>Dikirim</option>
                <option value="selesai" <?= $order->status == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                <option value="dibatalkan" <?= $order->status == 'dibatalkan' ? 'selected' : ''; ?>>Dibatalkan</option>

            </select>
        </div>

        <div class="form-group">
            <label>Total</label>
            <input type="number" name="total" class="form-control"
                   value="<?= $order->total; ?>" required>
        </div>

        <br>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= site_url('sales/orders'); ?>" class="btn btn-secondary">Kembali</a>

    </form>

</div>