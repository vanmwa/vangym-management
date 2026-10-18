<?php
session_start();
include("../../config/config.php");

// ✅ Session check
if (
    !isset($_SESSION['admin_id']) ||
    !isset($_SESSION['admin_username']) ||
    !isset($_SESSION['admin_email']) ||
    !isset($_SESSION['role']) ||
    $_SESSION['role'] !== 'admin'
) {
    header("Location: ../log_reg/log_reg.php");
    exit;
}

// ✅ Total Members
$totalMembersResult = $dbconn->query("SELECT COUNT(member_id) FROM member");
$totalMembersRow = $totalMembersResult->fetch_row();
$totalMembers = $totalMembersRow[0];

// ✅ Active Members
$activeMembersResult = $dbconn->query("SELECT COUNT(member_id) FROM member WHERE member_status='active'");
$activeMembersRow = $activeMembersResult->fetch_row();
$activeMembers = $activeMembersRow[0];

// ✅ Total Trainers
$totalTrainersResult = $dbconn->query("SELECT COUNT(trainer_id) FROM trainer");
$totalTrainersRow = $totalTrainersResult->fetch_row();
$totalTrainers = $totalTrainersRow[0];

// ✅ Monthly Revenue
$monthlyRevenueResult = $dbconn->query("SELECT SUM(amount) FROM payment WHERE MONTH(payment_date)=MONTH(CURDATE()) AND YEAR(payment_date)=YEAR(CURDATE())");
$monthlyRevenueRow = $monthlyRevenueResult->fetch_row();
$monthlyRevenue = $monthlyRevenueRow[0] ?? 0;

// ✅ Monthly Attendance & New Members
$attendanceData = [];
$newMembersData = [];
$months = [];
for ($m = 1; $m <= 12; $m++) {
    $months[] = date("M", mktime(0, 0, 0, $m, 1));
    
    $attResult = $dbconn->query("SELECT COUNT(attendance_id) FROM attendance WHERE MONTH(attendance_check_in)=$m AND YEAR(attendance_check_in)=YEAR(CURDATE())");
    $attRow = $attResult->fetch_row();
    $attendanceData[] = $attRow[0] ?? 0;
    
    $newMemResult = $dbconn->query("SELECT COUNT(member_id) FROM member WHERE MONTH(member_date_join)=$m AND YEAR(member_date_join)=YEAR(CURDATE())");
    $newMemRow = $newMemResult->fetch_row();
    $newMembersData[] = $newMemRow[0] ?? 0;
}

// ✅ Most Popular Plan
$popularPlanResult = $dbconn->query("
    SELECT p.package_name, COUNT(m.membership_id) AS total
    FROM membership m
    JOIN package p ON m.package_id = p.package_id
    GROUP BY m.package_id
    ORDER BY total DESC
    LIMIT 1
");
$popularPlanRow = $popularPlanResult->fetch_assoc();
$popularPlanName = $popularPlanRow['package_name'] ?? "N/A";
$popularPlanPercent = round(($popularPlanRow['total'] ?? 0) / max($totalMembers,1) * 100);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin | Reports & Analysis</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    background-color: #f8f9fa;
    font-family: "Poppins", sans-serif;
    margin: 0;
    padding: 0;
}

#page-content-wrapper {
    margin: 20px;
}

.card-stat {
    border-left: 5px solid #1e2a38;
    transition: transform 0.2s;
}
.card-stat:hover { transform: translateY(-3px); }
.card-icon { font-size: 2rem; opacity: 0.7; }

.card-chart { padding: 15px; }
canvas { max-height: 250px !important; }

@media (max-width: 768px) { #page-content-wrapper { margin: 10px; } }
</style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div id="page-content-wrapper">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
        <h3 class="fw-bold mb-2 mb-md-0">Reports & Analysis</h3>
        <button class="btn btn-primary"><i class="fa-solid fa-download me-1"></i> Download Report</button>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card card-stat shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Members</h6>
                        <h4 class="fw-bold mb-0"><?= number_format($totalMembers); ?></h4>
                    </div>
                    <i class="fa-solid fa-users card-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card card-stat shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Active Members</h6>
                        <h4 class="fw-bold mb-0 text-success"><?= number_format($activeMembers); ?></h4>
                    </div>
                    <i class="fa-solid fa-user-check card-icon text-success"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card card-stat shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Trainers</h6>
                        <h4 class="fw-bold mb-0"><?= number_format($totalTrainers); ?></h4>
                    </div>
                    <i class="fa-solid fa-dumbbell card-icon text-primary"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card card-stat shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Monthly Revenue</h6>
                        <h4 class="fw-bold mb-0 text-info">₱<?= number_format($monthlyRevenue); ?></h4>
                    </div>
                    <i class="fa-solid fa-coins card-icon text-info"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card card-chart shadow-sm">
                <h5 class="fw-bold mb-3">Monthly Attendance Overview</h5>
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-chart shadow-sm">
                <h5 class="fw-bold mb-3">New Members per Month</h5>
                <canvas id="newMembersChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Most Popular Plan -->
    <div class="card shadow-sm p-4">
        <div class="row align-items-center">
            <div class="col-lg-4 mb-3 mb-lg-0">
                <h5 class="fw-bold mb-2"><i class="fa-solid fa-crown text-warning me-2"></i>Most Popular Plan</h5>
                <p class="mb-1">Most availed plan:</p>
                <h4 class="fw-bold text-primary mb-1"><?= $popularPlanName; ?></h4>
                <p class="text-muted mb-0"><?= $popularPlanPercent; ?>% of total members</p>
            </div>
            <div class="col-lg-8">
                <canvas id="planChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const months = <?= json_encode($months); ?>;
const attendanceData = <?= json_encode($attendanceData); ?>;
const newMembersData = <?= json_encode($newMembersData); ?>;
const popularPlanPercent = <?= $popularPlanPercent; ?>;
const popularPlanName = "<?= $popularPlanName; ?>";

// Monthly Attendance Chart
new Chart(document.getElementById('attendanceChart').getContext('2d'), {
    type: 'line',
    data: { labels: months, datasets: [{ label: 'Attendance', data: attendanceData, fill: true, borderColor: '#1e2a38', backgroundColor: 'rgba(30,42,56,0.1)', tension: 0.3 }] },
    options: { responsive: true, plugins: { legend: { display: true } }, scales: { y: { beginAtZero: true } } }
});

// New Members Chart
new Chart(document.getElementById('newMembersChart').getContext('2d'), {
    type: 'bar',
    data: { labels: months, datasets: [{ label: 'New Members', data: newMembersData, backgroundColor: '#1e2a38' }] },
    options: { responsive: true, scales: { y: { beginAtZero: true }, x: {} } }
});

// Most Popular Plan Doughnut
new Chart(document.getElementById('planChart').getContext('2d'), {
    type: 'doughnut',
    data: { labels: [popularPlanName, 'Other Plans'], datasets: [{ data: [popularPlanPercent, 100-popularPlanPercent], backgroundColor: ['#0d6efd','#dee2e6'], borderWidth: 1 }] },
    options: { responsive: true, plugins: { legend: { position: 'bottom' } }, cutout: '70%' }
});
</script>

</body>
</html>
