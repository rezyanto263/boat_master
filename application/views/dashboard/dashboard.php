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
                            <div class="card-name">Boat</div>
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
                        <canvas id="myChartByStatus" width="400" height="400"></canvas>
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
        const statusCounts = <?php echo json_encode($statusCounts); ?>;
        const selectedYear = <?php echo json_encode($selectedYear); ?>;
        const monthlyDataByStatus = <?php echo json_encode($monthlyDataByStatus); ?>;

        // Pemetaan bulan ke nama bulan
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        // Proses data untuk line chart berdasarkan status
        const statusDataByMonth = {};
        monthlyDataByStatus.forEach(data => {
            const month = monthNames[parseInt(data.month.split('-')[1]) - 1];
            if (!statusDataByMonth[data.bookStatus]) {
                statusDataByMonth[data.bookStatus] = Array(12).fill(0);
            }
            statusDataByMonth[data.bookStatus][monthNames.indexOf(month)] = data.bookings;
        });

        const statusColors = {
            'Waiting': 'rgba(255, 206, 86, 1)',
            'Enjoy': 'rgba(103,223,49, 1)',
            'Searching Guides': 'rgba(41,134,204,1)',
            'Done': 'rgba(75, 192, 192, 1)',
            'Not Paid': 'rgba(116,71,0,1)',
            'Cancelled': 'rgba(244,67,54, 1)',
        };

        const datasetsByStatus = Object.keys(statusDataByMonth).map(status => ({
            label: status,
            data: statusDataByMonth[status],
            borderWidth: 1,
            backgroundColor: statusColors[status],
            borderColor: statusColors[status]
        }));

        // Inisialisasi line chart berdasarkan status
        const ctxLineByStatus = document.getElementById('myChartByStatus').getContext('2d');
        new Chart(ctxLineByStatus, {
            type: 'line',
            data: {
                labels: monthNames,
                datasets: datasetsByStatus
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return Number(value).toFixed(0);
                            } // Format sebagai integer
                        }
                    }
                },
                maintainAspectRatio: false,
                tension: 0.2
            }
        });

        // Ekstraksi label dan nilai data untuk pie chart
        const statusLabels = statusCounts.map(data => data.bookStatus ?? 'Unknown');
        const statusData = statusCounts.map(data => data.count ?? 0);

        // Log data status untuk debugging
        console.log('Status Labels:', statusLabels);
        console.log('Status Data:', statusData);

        // Inisialisasi pie chart
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
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>

<!-- Content Section End -->