

<div class="container-fluid px-4">

<h1 class="h3 mb-4 text-gray-800">Laporan Per Sales</h1>

<!-- FILTER -->
<form method="get" action="<?= base_url('index.php/manager/laporan_sales') ?>" class="mb-4">
    <div class="row align-items-end">

        <div class="col-md-3">
            <label>Awal</label>
            <input type="date" name="awal" class="form-control"
                value="<?= $this->input->get('awal') ?>">
        </div>

        <div class="col-md-3">
            <label>Akhir</label>
            <input type="date" name="akhir" class="form-control"
                value="<?= $this->input->get('akhir') ?>">
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary mt-4">Filter</button>

            <a href="<?= base_url('index.php/manager/laporan_sales') ?>" class="btn btn-secondary mt-4">
                Reset
            </a>
        </div>

        <?php
        $awal  = $this->input->get('awal');
        $akhir = $this->input->get('akhir');

        $link_pdf = base_url('index.php/manager/export_pdf_sales');

        if ($awal && $akhir) {
            $link_pdf .= '?awal=' . $awal . '&akhir=' . $akhir;
        }
        ?>

        <div class="col-md-3 text-right">
            <a href="<?= $link_pdf ?>" class="btn btn-danger mt-4" target="_blank">
                Export PDF
            </a>
        </div>

    </div>
</form>

<!-- DATA -->
<div class="card shadow mb-4">
    <div class="card-header">Data Sales</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Sales</th>
                    <th>Total Penjualan</th>
                </tr>
            </thead>

            <tbody>
<?php if (!empty($laporan_sales)) : ?>
    <?php $no = 1; foreach ($laporan_sales as $row) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row->nama ?? '-' ?></td>
        <td>Rp <?= number_format($row->total, 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="3" class="text-center">Data belum ada</td>
    </tr>
<?php endif; ?>
</tbody>

        </table>
    </div>
</div>

</div>