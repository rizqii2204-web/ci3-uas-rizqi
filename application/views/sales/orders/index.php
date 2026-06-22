<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">Data Orders</h2>

    <a href="<?= site_url('sales/tambah_orders'); ?>" class="btn btn-primary mb-3">
        Tambah Orders
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah Barang</th>
                            <th>Total</th>
                            <th>Sales</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($orders as $o): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $o->nama_pelanggan; ?></td>
                            <td><?= $o->tanggal; ?></td>

                            <td>
                                <?php if ($o->status == 'draft'): ?>
                                    <span class="badge badge-secondary">Draft</span>

                                <?php elseif ($o->status == 'dikirim'): ?>
                                    <span class="badge badge-primary">Dikirim</span>

                                <?php elseif ($o->status == 'selesai'): ?>
                                    <span class="badge badge-success">Selesai</span>

                                <?php elseif ($o->status == 'dibatalkan'): ?>
                                    <span class="badge badge-danger">Dibatalkan</span>

                                <?php else: ?>
                                    <span class="badge badge-dark">Tidak diketahui</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $o->total_item; ?></td>
                            <td>Rp <?= number_format($o->total, 0, ',', '.'); ?></td>
                            <td><?= $o->nama_sales; ?></td>

                            <td>
                                <a href="<?= site_url('sales/edit_orders/'.$o->id); ?>" 
                                   class="btn btn-warning btn-sm">
                                   Edit
                                </a>

                                <a href="<?= site_url('sales/batalkan_order/'.$o->id); ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin mau batalkan order ini?')">
                                   Batalkan
                                </a>
                                
                                <a href="<?= site_url('sales/detail_orders/'.$o->id); ?>" 
                                   class="btn btn-info btn-sm">
                                   Detail
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        <?php if (empty($orders)): ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Tidak ada data orders
                            </td>
                        </tr>
                        <?php endif; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>