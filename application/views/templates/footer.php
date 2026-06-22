</div> <!-- End of Content -->
    </div> <!-- End of Content Wrapper -->
</div> <!-- End of Wrapper -->

<!-- JS WAJIB SB ADMIN -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js');?>"></script>

<!-- Chart.js (cukup SEKALI) -->
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js');?>"></script>


<!-- ===================== -->
<!-- 📊 CHART DASHBOARD ADMIN -->
<!-- ===================== -->
<?php if (isset($total_produk)): ?>
<script>
document.addEventListener("DOMContentLoaded", function() {

    var ctx = document.getElementById("chartDashboard");

    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Produk', 'Pelanggan', 'Orders'],
                datasets: [{
                    label: 'Jumlah Data',
                    data: [
                        <?= (int)$total_produk ?>,
                        <?= (int)$total_pelanggan ?>,
                        <?= (int)$total_orders ?>
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
                maintainAspectRatio: false
            }
        });
    }

});
</script>
<?php endif; ?>


<!-- ===================== -->
<!-- 📈 CHART MANAGER (OMZET) -->
<!-- ===================== -->
<?php if (isset($bulan)): ?>
<script>
document.addEventListener("DOMContentLoaded", function() {

    var ctx = document.getElementById("chartOmzet");

    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($bulan) ?>,
                datasets: [{
                    label: 'Omzet Bulanan',
                    data: <?= json_encode($omzet_bulanan) ?>,
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }

});
</script>
<?php endif; ?>


</body>
</html>