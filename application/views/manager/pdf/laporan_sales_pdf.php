<h3 style="text-align:center;">LAPORAN PENJUALAN PER SALES</h3>

<?php if (!empty($awal) && !empty($akhir)) : ?>
<p style="text-align:center;">
Periode: <?= date('d-m-Y', strtotime($awal)) ?> - <?= date('d-m-Y', strtotime($akhir)) ?>
</p>
<?php endif; ?>

<br>

<table border="1" width="100%" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Sales</th>
        <th>Total Penjualan</th>
    </tr>

    <?php $no = 1; $total_sales = 0; foreach ($laporan_sales as $row): 
        $total_sales += $row->total;
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row->nama ?? '-' ?></td>
        <td>Rp <?= number_format($row->total, 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="2"><b>Total</b></td>
        <td><b>Rp <?= number_format($total_sales, 0, ',', '.') ?></b></td>
    </tr>
</table>