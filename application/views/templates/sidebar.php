<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<?php $role = $this->session->userdata('role'); ?>

<!-- BRAND -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" 
   href="<?= site_url($role) ?>">
    <div class="sidebar-brand-icon rotate-15">
        <i class="fas fa-box"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Sales Order</div>
</a>

<hr class="sidebar-divider my-0">

<!-- DASHBOARD -->
<li class="nav-item">
    <a class="nav-link" href="<?= site_url($role) ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<hr class="sidebar-divider">

<?php if ($role == 'admin'): ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/produk') ?>">
            <i class="fas fa-box"></i>
            <span>Produk</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/pelanggan') ?>">
            <i class="fas fa-users"></i>
            <span>Pelanggan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/orders') ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
    </li>

<?php elseif ($role == 'sales'): ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('sales/orders') ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders Saya</span>
        </a>
    </li>

<?php elseif ($role == 'manager'): ?>

<!-- JUDUL LAPORAN (tidak bisa diklik) -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan">
        <i class="fas fa-chart-bar"></i>
        <span>Laporan</span>
    </a>

    <div id="collapseLaporan" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="<?= site_url('manager/laporan_periode') ?>">
                Laporan Periode
            </a>

            <a class="collapse-item" href="<?= site_url('manager/laporan_sales') ?>">
                Laporan Sales
            </a>

            <a class="collapse-item" href="<?= site_url('manager/laporan_produk') ?>">
                Laporan Produk
            </a>

        </div>
    </div>
</li>

<?php endif; ?>

<hr class="sidebar-divider d-none d-md-block">

</ul>

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">