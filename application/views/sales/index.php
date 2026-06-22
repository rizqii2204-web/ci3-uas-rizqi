<h2>Data Sales</h2>

<a href="<?= site_url('admin/tambah_sales'); ?>" class="btn btn-primary">Tambah</a>

<table class="table">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; foreach($sales as $s): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $s->nama; ?></td>
        <td><?= $s->telepon; ?></td>
        <td><?= $s->alamat; ?></td>
        <td>
            <a href="<?= site_url('admin/edit_sales/'.$s->id); ?>">Edit</a>
            <a href="<?= site_url('admin/hapus_sales/'.$s->id); ?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>