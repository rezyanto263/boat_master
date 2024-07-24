<!-- Content Section Start -->
<section class="content-section">
    <div class="container-fluid 100vh p-5">
        <div class="row">
            <div class="col-3">
                <a href="<?= base_url('dashboard/bookings') ?>" class="card-link">
                    <div class="card-dashboard">
                        <div class="card-body">
                            <div class="number"><?= $bookCount ?></div>
                            <div class="card-name">Bookings</div>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-ticket"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <div class="card-dashboard">
                    <div class="card-body">
                        <div class="number"><?= $customerCount ?></div>
                        <div class="card-name">Customers</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <a href="<?= base_url('dashboard/boats') ?>" class="card-link">
                    <div class="card-dashboard">
                        <div class="card-body">
                            <div class="number"><?= $boatCount ?></div>
                            <div class="card-name">Boats</div>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-ship"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <div class="card-dashboard">
                    <div class="card-body">
                        <div class="number">Rp. <?= number_format($earnings) ?></div>
                        <div class="card-name">Earnings</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-9">
                <div class="table-content">
                    <span>Bookings</span>

                    <form method="POST" action="<?= base_url('dashboard/dashboard'); ?>">
                        <select class="selectpicker" name="year" id="year" onchange="this.form.submit()">
                            <?php
                            $currentYear = date('Y');
                            $startYear = $currentYear - 3;
                            $endYear = $currentYear + 3;
                            for ($i = $startYear; $i <= $endYear; $i++) {
                                $selected = ($i == $selectedYear) ? 'selected' : '';
                                echo "<option value=\"$i\" $selected>$i</option>";
                            }
                            ?>
                        </select>
                    </form>

                    <div class="chart-line">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="table-content">
                    <span class="text-start">Bookings Status</span>
                    <div class="chart-pie">
                        <canvas id="statusChart" width="400" height="450"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const graph = <?php echo json_encode($graph); ?>;
        const statusCounts = <?php echo json_encode($statusCounts); ?>;
        const selectedYear = <?php echo json_encode($selectedYear); ?>;

        // Map dari number ke Bulan
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];


        const labels = graph.map(data => {
            const month = data.month.split('-')[1]; // Get the month part
            return monthNames[parseInt(month) - 1]; // Convert to month name
        });
        const dataValues = graph.map(data => data.bookings ?? 0);

        // console.log('Graph Labels:', labels);
        // console.log('Graph Data:', dataValues);

        // Inisialisai line chart
        const ctxLine = document.getElementById('myChart').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: `Bookings per Month (${selectedYear})`,
                    data: dataValues,
                    borderWidth: 1,
                    backgroundColor: 'rgba(34,72,112, 0.1)',
                    borderColor: 'rgba(34,72,112, 1)',
                    fill: true,
                    tension: 0.1

                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,

                    }
                },
                maintainAspectRatio: false
            }
        });



        // Extract labels and data values for the pie chart
        const statusLabels = statusCounts.map(data => data.bookStatus ?? 'Unknown');
        const statusData = statusCounts.map(data => data.count ?? 0);

        // Log the status data for debugging
        console.log('Status Labels:', statusLabels);
        console.log('Status Data:', statusData);

        // Initialize the pie chart
        const ctxPie = document.getElementById('statusChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'polarArea',
            data: {
                labels: statusLabels,
                datasets: [{
                    label: 'Booking Status',
                    data: statusData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                resposive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>




<!-- Content Section End -->