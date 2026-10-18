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
    header("Location: ../../log_reg/log_reg.php");
    exit;
}

// ✅ Total Members
$totalMembersResult = $dbconn->query("SELECT COUNT(member_id) FROM member");
$totalMembersRow = $totalMembersResult->fetch_row();
$totalMembers = $totalMembersRow[0];

// ✅ Active Trainers
$activeTrainersResult = $dbconn->query("SELECT COUNT(trainer_id) FROM trainer WHERE trainer_status='active'");
$activeTrainersRow = $activeTrainersResult->fetch_row();
$activeTrainers = $activeTrainersRow[0];

// ✅ Monthly Revenue
$monthlyRevenueResult = $dbconn->query("SELECT SUM(amount) FROM payment WHERE MONTH(payment_date)=MONTH(CURDATE()) AND YEAR(payment_date)=YEAR(CURDATE())");
$monthlyRevenueRow = $monthlyRevenueResult->fetch_row();
$monthlyRevenue = $monthlyRevenueRow[0] ?? 0;

// ✅ Attendance Today
$attendanceTodayResult = $dbconn->query("SELECT COUNT(attendance_id) FROM attendance WHERE attendance_check_in IS NOT NULL AND DATE(attendance_check_in)=CURDATE()");
$attendanceTodayRow = $attendanceTodayResult->fetch_row();
$attendanceToday = $attendanceTodayRow[0];

// ✅ Recent Member Activity (last 5 check-ins)
$activityResult = $dbconn->query("
    SELECT m.member_first_name, m.member_last_name, 'Checked In' AS action, a.attendance_check_in AS timestamp
    FROM attendance a
    JOIN member m ON a.member_id = m.member_id
    ORDER BY a.attendance_check_in DESC
    LIMIT 5
");

// ✅ Calendar data: fetch class schedules for current month
$year = date('Y');
$month = date('m');
$classResult = $dbconn->query("
    SELECT class_name, class_date 
    FROM class_schedule 
    WHERE YEAR(class_date) = $year AND MONTH(class_date) = $month
");
$classes = [];
while($row = $classResult->fetch_assoc()) {
    $day = date('j', strtotime($row['class_date']));
    $classes[$day][] = $row['class_name'];
}

// ✅ Daily revenue for current month
$daysInMonth = date('t');
$dailyRevenueLabels = [];
$dailyRevenueData = [];
for ($day = 1; $day <= $daysInMonth; $day++) {
    $date = date('Y-m-d', strtotime("$year-$month-$day"));
    $dailyRevenueLabels[] = $day; // x-axis: day numbers
    $revResult = $dbconn->query("SELECT SUM(amount) FROM payment WHERE payment_date = '$date'");
    $revRow = $revResult->fetch_row();
    $dailyRevenueData[] = $revRow[0] ?? 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background-color: #f8f9fa; font-family: "Poppins", sans-serif; margin:0; }
.calendar-container { width: 100%; background: #ffffff; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); overflow: hidden; }
.calendar-header { background: #1e2a38; color: #fff; text-align: center; padding: 10px; font-size: 18px; font-weight: bold; }
.calendar-body { display: grid; grid-template-columns: repeat(7, 1fr); padding: 10px; }
.calendar-day { text-align: center; padding: 8px 0; border-radius: 8px; transition: background 0.2s; cursor: pointer; }
.calendar-day:hover { background: #eaeaea; }
.calendar-day-name { font-weight: bold; background: #f4f4f4; }
.calendar-day.empty { background: transparent; cursor: default; }
.calendar-day div { font-size: 12px; color: #0d6efd; margin-top: 2px; }
@media (max-width: 500px) { .calendar-header { font-size: 16px; } .calendar-day { font-size: 13px; padding: 6px 0; } }
</style>
</head>
<body>
<?php include("sidebar.php"); ?>
<main id="page-content-wrapper" class="p-3">

<!-- Welcome Section -->
<div class="card shadow-sm mb-4">
  <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
    <div>
      <h4 class="fw-bold mb-1">Welcome Back, <span class="text-primary"><?= $_SESSION['admin_username']; ?></span></h4>
      <p class="text-muted mb-0">Here’s a quick overview of what’s happening today.</p>
    </div>
    <button class="btn btn-primary mt-3 mt-md-0">
      <i class="fa-solid fa-gear me-1"></i> Manage Settings
    </button>
  </div>
</div>

<!-- Quick Stats Row -->
<div class="row g-3 mb-4">
  <div class="col-md-3 col-sm-6">
    <div class="card shadow-sm border-0 text-center bg-light">
      <div class="card-body">
        <i class="fa-solid fa-users fa-2x text-primary mb-2"></i>
        <h6 class="text-muted">Total Members</h6>
        <p class="fs-4 fw-bold mb-0"><?= number_format($totalMembers); ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="card shadow-sm border-0 text-center bg-light">
      <div class="card-body">
        <i class="fa-solid fa-dumbbell fa-2x text-success mb-2"></i>
        <h6 class="text-muted">Active Trainers</h6>
        <p class="fs-4 fw-bold mb-0"><?= number_format($activeTrainers); ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="card shadow-sm border-0 text-center bg-light">
      <div class="card-body">
        <i class="fa-solid fa-coins fa-2x text-warning mb-2"></i>
        <h6 class="text-muted">Monthly Revenue</h6>
        <p class="fs-4 fw-bold mb-0">₱<?= number_format($monthlyRevenue); ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class="card shadow-sm border-0 text-center bg-light">
      <div class="card-body">
        <i class="fa-solid fa-calendar-check fa-2x text-danger mb-2"></i>
        <h6 class="text-muted">Attendance Today</h6>
        <p class="fs-4 fw-bold mb-0"><?= number_format($attendanceToday); ?></p>
      </div>
    </div>
  </div>
</div>

<!-- Main Row: Left Column = Activity + Calendar, Right Column = Revenue -->
<div class="row g-4 mb-4">
  <!-- Left Column -->
  <div class="col-lg-6">
    <!-- Recent Member Activity -->
    <div class="card shadow-sm border-0 mb-4">
      <div class="card-body">
        <h5 class="card-title text-muted mb-3">
          <i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i> Recent Member Activity
        </h5>
        <ul class="list-group list-group-flush">
          <?php while($row = $activityResult->fetch_assoc()): ?>
          <li class="list-group-item d-flex justify-content-between">
            <span><strong><?= $row['member_first_name'] . ' ' . $row['member_last_name']; ?></strong> <?= $row['action']; ?></span>
            <span class="text-muted small"><?= date("h:i a", strtotime($row['timestamp'])); ?></span>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>

    <!-- Calendar -->
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="card-title text-muted mb-3">
          <i class="fa-solid fa-calendar-days me-2 text-primary"></i> Class & Event Calendar
        </h5>
        <div class="calendar-container">
          <div class="calendar-header"><?= date("F Y"); ?></div>
          <div class="calendar-body">
            <?php
            $daysOfWeek = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
            foreach($daysOfWeek as $day) echo "<div class='calendar-day calendar-day-name'>$day</div>";

            $firstDay = date('w', strtotime("$year-$month-01"));
            for($i=0;$i<$firstDay;$i++) echo "<div class='calendar-day empty'></div>";

            for($d=1;$d<=$daysInMonth;$d++){
                echo "<div class='calendar-day'>$d";
                if(isset($classes[$d])){
                    foreach($classes[$d] as $className){
                        echo "<div>$className</div>";
                    }
                }
                echo "</div>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Column: Revenue Chart -->
  <div class="col-lg-6">
    <div class="card shadow-sm border-0 h-100">
      <div class="card-body">
        <h5 class="card-title text-muted mb-3">
          <i class="fa-solid fa-chart-line me-2 text-success"></i> Revenue Overview (Daily)
        </h5>
        <canvas id="revenueChart" height="250"></canvas>
      </div>
    </div>
  </div>
</div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('revenueChart').getContext('2d');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?= json_encode($dailyRevenueLabels); ?>,
    datasets: [{
      label: 'Revenue (₱)',
      data: <?= json_encode($dailyRevenueData); ?>,
      borderColor: 'rgba(40,167,69,1)',
      backgroundColor: 'rgba(40,167,69,0.2)',
      tension: 0.3,
      fill: true
    }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: false } },
    scales: { y: { beginAtZero: true } }
  }
});
</script>
</body>
</html>
