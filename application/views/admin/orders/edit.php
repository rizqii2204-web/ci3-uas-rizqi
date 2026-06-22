<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
    <div class="card-body">

        <form action="" method="post">

            <div class="form-group">
                <label>Pelanggan</label>
                <select name="id_pelanggan" class="form-control">
                    <?php foreach ($pelanggan as $p): ?>
                        <option value="<?= $p->id; ?>"
                            <?= ($orders->id_pelanggan == $p->id) ? 'selected' : ''; ?>>
                            <?= $p->nama; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="draft" <?= ($orders->status == 'draft') ? 'selected' : ''; ?>>Draft</option>
        <option value="dikirim" <?= ($orders->status == 'dikirim') ? 'selected' : ''; ?>>Dikirim</option>
        <option value="selesai" <?= ($orders->status == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
        <option value="dibatalkan" <?= ($orders->status == 'dibatalkan') ? 'selected' : ''; ?>>Dibatalkan</option>
    </select>
</div>

            <button type="submit" class="btn btn-success">update</button>
            <a href="<?= site_url('admin/orders'); ?>" class="btn btn-secondary">kembali</a>

        </form>

    </div>
</div>

</div>