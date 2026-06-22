<div class="container-fluid px-4">

<h1 class="h3 mb-4 text-gray-800">Dashboard Manager</h1>

<!-- CARD -->
<div class="row">

    <div class="col-md-4">
        <div class="card shadow border-left-primary">
            <div class="card-body">
                <h6>Total Omzet</h6>
                <h4>Rp <?= number_format($total_omzet,0,',','.') ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow border-left-success">
            <div class="card-body">
                <h6>Total Transaksi</h6>
                <h4><?= $total_transaksi ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow border-left-warning">
            <div class="card-body">
                <h6>Total Sales</h6>
                <h4><?= $total_sales ?></h4>
            </div>
        </div>
    </div>

</div>

<!-- CHART -->
<div class="card shadow mt-4">
    <div class="card-header">
        Grafik Penjualan per Bulan
    </div>
    <div class="card-body">
        <canvas id="chartPenjualan" height="100"></canvas>
    </div>
</div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
window.onload = function() {

    const ctx = document.getElementById('chartPenjualan').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($bulan) ?>,
            datasets: [{
                label: 'Total Penjualan',
                data: <?= json_encode($total_per_bulan) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

};
</script>