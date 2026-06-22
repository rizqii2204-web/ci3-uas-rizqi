<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

    <!-- CARDS -->
    <div class="row">

        <!-- PRODUK -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Produk
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $total_produk ?? 0; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- PELANGGAN -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Pelanggan
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $total_pelanggan ?? 0; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ORDERS -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Orders
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= $total_orders ?? 0; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- CHART -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Statistik Data
                    </h6>
                </div>

                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="chartDashboard"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- STYLE BIAR GAK NGAMBANG -->
<style>
.chart-bar {
    position: relative;
    height: 320px;
}
</style>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById("chartDashboard").getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Produk', 'Pelanggan', 'Orders'],
        datasets: [{
            label: 'Jumlah Data',
            data: [
                <?= $total_produk ?? 0 ?>,
                <?= $total_pelanggan ?? 0 ?>,
                <?= $total_orders ?? 0 ?>
            ],
            backgroundColor: [
                '#4e73df',
                '#1cc88a',
                '#f6c23e'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                min: 0,
                ticks: {
                    stepSize: 1,
                    precision: 0
                }
            }
        }
    }
});
</script>