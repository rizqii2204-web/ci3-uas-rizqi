<h3 style="text-align:center;">LAPORAN PENJUALAN PERIODE</h3>

<?php if (!empty($awal) && !empty($akhir)) : ?>
<p style="text-align:center;">
Periode: <?= date('d-m-Y', strtotime($awal)) ?> - <?= date('d-m-Y', strtotime($akhir)) ?>
</p>
<?php endif; ?>

<br>

<table border="1" width="100%" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Sales</th>
        <th>Total</th>
    </tr>

    <?php $no = 1; $total = 0; foreach ($laporan as $row): 
        $total += $row->total;
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
        <td><?= $row->nama_sales ?? '-' ?></td>
        <td>Rp <?= number_format($row->total, 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="3"><b>Total Omzet</b></td>
        <td><b>Rp <?= number_format($total, 0, ',', '.') ?></b></td>
    </tr>
</table>