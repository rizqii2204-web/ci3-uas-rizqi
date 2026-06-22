<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Pelanggan</h1>

    <a href="<?= site_url('admin/tambah_pelanggan'); ?>" class="btn btn-primary mb-3">
        Tambah Pelanggan
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($pelanggan as $p): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $p->nama; ?></td>
                <td><?= $p->alamat; ?></td>
                <td><?= $p->telepon; ?></td>
                <td>
                    <a href="<?= site_url('admin/edit_pelanggan/'.$p->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= site_url('admin/hapus_pelanggan/'.$p->id); ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
