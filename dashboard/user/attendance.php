<?php
include("../../config/config.php");
session_start();

if (!isset($_SESSION['member_id'])) {
    header("Location: ../../login.php");
    exit();
}

$member_id = $_SESSION['member_id'];

// ✅ Fetch today’s attendance record
$today_stmt = $dbconn->prepare("SELECT * FROM attendance WHERE member_id = ? AND DATE(attendance_date) = CURDATE()");
$today_stmt->bind_param("i", $member_id);
$today_stmt->execute();
$today_record = $today_stmt->get_result()->fetch_assoc();

$has_timed_in = isset($today_record['attendance_check_in']);
$has_timed_out = isset($today_record['attendance_check_out']);

// ✅ Handle Time In
if (isset($_POST['time_in']) && !$has_timed_in) {
    $stmt = $dbconn->prepare("INSERT INTO attendance (member_id, attendance_date, attendance_check_in) VALUES (?, CURDATE(), NOW())");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    header("Location: attendance.php");
    exit();
}

// ✅ Handle Time Out
if (isset($_POST['time_out']) && $has_timed_in && !$has_timed_out) {
    $stmt = $dbconn->prepare("UPDATE attendance SET attendance_check_out = NOW() WHERE member_id = ? AND DATE(attendance_date) = CURDATE()");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    header("Location: attendance.php");
    exit();
}

// ✅ Fetch all attendance records
$attendance = $dbconn->query("SELECT * FROM attendance WHERE member_id = $member_id ORDER BY attendance_date DESC");

// ✅ Calculate total days attended this month
$month_attendance = $dbconn->query("SELECT COUNT(*) AS total FROM attendance WHERE member_id = $member_id AND MONTH(attendance_date) = MONTH(CURDATE())");
$total_month = $month_attendance->fetch_assoc()['total'];

// ✅ Calculate weekly attendance (last 7 days)
$week_attendance = $dbconn->query("SELECT COUNT(*) AS total FROM attendance WHERE member_id = $member_id AND attendance_date >= (CURDATE() - INTERVAL 7 DAY)");
$total_week = $week_attendance->fetch_assoc()['total'];

// ✅ Calculate attendance streak
$streak_query = "
    SELECT MAX(streak) AS current_streak FROM (
        SELECT COUNT(*) AS streak
        FROM (
            SELECT attendance_date,
                   DATE_SUB(attendance_date, INTERVAL ROW_NUMBER() OVER (ORDER BY attendance_date) DAY) AS grp
            FROM attendance
            WHERE member_id = $member_id
        ) sub
        GROUP BY grp
    ) s
";
$streak_result = $dbconn->query($streak_query);
$streak = $streak_result ? $streak_result->fetch_assoc()['current_streak'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Member | Attendance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f8fa;
      font-family: 'Poppins', sans-serif;
    }
    .attendance-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      padding: 50px 40px;
      margin: 50px auto;
      max-width: 950px;
    }
    .attendance-card h2 {
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 10px;
    }
    .clock {
      font-size: 2.2rem;
      font-weight: 700;
      color: #007bff;
      margin-top: 10px;
    }
    .date {
      font-size: 1rem;
      color: #666;
      margin-bottom: 20px;
    }
    .btn {
      border-radius: 25px;
      font-weight: 600;
      padding: 12px 30px;
    }
    .btn:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }
    .stats-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 40px;
    }
    .stat-card {
      background: #f9fbff;
      border: 2px solid #e5e9f0;
      border-radius: 15px;
      padding: 25px 20px;
      flex: 1 1 220px;
      text-align: center;
      min-width: 230px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.04);
      transition: transform 0.2s ease;
    }
    .stat-card:hover {
      transform: translateY(-6px);
    }
    .stat-card h4 {
      font-size: 1.3rem;
      color: #007bff;
      margin-bottom: 10px;
    }
    .stat-card p {
      font-size: 1.1rem;
      color: #333;
      font-weight: 500;
      margin: 0;
    }
    h4.mt-5 {
      margin-top: 60px !important;
      margin-bottom: 15px;
      font-weight: 600;
      color: #2c3e50;
    }
    table {
      margin-top: 15px;
      border-radius: 12px;
      overflow: hidden;
    }
    thead th {
      background: #007bff;
      color: white;
    }
    tbody td {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <?php include("sidebar.php");?>
  <div id="page-content-wrapper" class="p-3">
    <div class="attendance-card text-center">
      <h2>Attendance Tracker</h2>
      <p class="date" id="current-date"></p>
      <p class="clock" id="clock"></p>

      <!-- ✅ Time In / Out Buttons -->
      <form method="POST" class="d-flex justify-content-center gap-4 mt-4 mb-4">
        <button type="submit" name="time_in" class="btn btn-success px-4" <?= $has_timed_in ? 'disabled' : '' ?>>Time In</button>
        <button type="submit" name="time_out" class="btn btn-danger px-4" <?= (!$has_timed_in || $has_timed_out) ? 'disabled' : '' ?>>Time Out</button>
      </form>

      <!-- ✅ Stats Cards -->
      <div class="stats-row">
        <div class="stat-card">
          <h4>🔥 Attendance Streak</h4>
          <p><?= $streak ? $streak : 0 ?> Days</p>
        </div>
        <div class="stat-card">
          <h4>📅 Weekly Visits</h4>
          <p><?= $total_week ?> Days</p>
        </div>
        <div class="stat-card">
          <h4>📈 Monthly Attendance</h4>
          <p><?= $total_month ?> Days</p>
        </div>
      </div>

      <!-- ✅ Attendance History -->
      <h4 class="mt-5">Attendance History</h4>
      <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
          <thead>
            <tr>
              <th>Date</th>
              <th>Time In</th>
              <th>Time Out</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $attendance->fetch_assoc()): ?>
            <tr>
              <td><?= $row['attendance_date'] ?></td>
              <td><?= $row['attendance_check_in'] ?: '-' ?></td>
              <td><?= $row['attendance_check_out'] ?: '-' ?></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ✅ Real-Time Clock -->
  <script>
    function updateClock() {
      const now = new Date();
      const time = now.toLocaleTimeString();
      const date = now.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
      document.getElementById('clock').textContent = time;
      document.getElementById('current-date').textContent = date;
    }
    setInterval(updateClock, 1000);
    updateClock();
  </script>
</body>
</html>
