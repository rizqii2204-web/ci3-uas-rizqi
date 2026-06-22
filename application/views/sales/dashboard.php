<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Dashboard Sales</h1>

    <!-- WELCOME -->
    <div class="card shadow mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
            <h5>Halo, <?= $sales->nama ?? 'Sales'; ?> 👋</h5>
                <p class="mb-0">
                    Role: <strong><?= $this->session->userdata('role'); ?></strong>
                </p>
            </div>
            <div>
                <small class="text-muted"><?= date('d M Y'); ?></small>
            </div>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="row">

        <!-- TOTAL ORDER -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Orders
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $total_orders ?? 0; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOTAL PENJUALAN -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Penjualan
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Rp <?= number_format($total_penjualan ?? 0, 0, ',', '.'); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ORDER HARI INI -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Order Hari Ini
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $order_hari_ini ?? 0; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- QUICK ACTION -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h6 class="mb-3">Aksi Cepat</h6>

            <a href="<?= site_url('sales/orders'); ?>" class="btn btn-primary btn-sm">
                📦 Lihat Orders
            </a>

            <a href="<?= site_url('sales/tambah_orders'); ?>" class="btn btn-success btn-sm">
                ➕ Buat Order
            </a>
        </div>
    </div>

</div>