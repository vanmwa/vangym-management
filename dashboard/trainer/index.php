<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trainer Dashboard</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    body {
      background-color: #f4f6f9;
      font-family: "Poppins", sans-serif;
    }

    #page-content-wrapper {
      margin-left: 250px;
      padding: 40px;
    }

    .dashboard-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 30px;
    }

    .dashboard-header h2 {
      font-weight: 600;
      color: #333;
    }

    .time-display {
      text-align: right;
    }

    .clock {
      font-size: 1.6rem;
      color: #007bff;
      font-weight: 700;
    }

    .date {
      font-size: 1rem;
      color: #666;
    }

    .stat-card {
      border: none;
      border-radius: 16px;
      padding: 25px;
      text-align: center;
      background: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: transform 0.2s;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-card i {
      font-size: 2rem;
      color: #007bff;
      margin-bottom: 10px;
    }

    .recent-activity {
      margin-top: 40px;
    }

    .recent-activity h4 {
      font-weight: 600;
      margin-bottom: 15px;
    }

    table {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    }

    @media (max-width: 768px) {
      #page-content-wrapper {
        margin-left: 0;
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <?php include("sidebar.php"); ?>

  <div id="page-content-wrapper">
    <div class="dashboard-header">
      <h2>Welcome, Trainer 👋</h2>
      <div class="time-display">
        <div class="clock" id="clock"></div>
        <div class="date" id="date"></div>
      </div>
    </div>

    <!-- ✅ Dashboard Stats -->
    <div class="row g-4">
      <div class="col-md-4">
        <div class="stat-card">
          <i class="fa-solid fa-users"></i>
          <h5>Total Students</h5>
          <h3><?= $total_students ?></h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <i class="fa-solid fa-dumbbell"></i>
          <h5>Assigned Classes</h5>
          <h3><?= $total_classes ?></h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <i class="fa-solid fa-clipboard-check"></i>
          <h5>Attendance This Week</h5>
          <h3><?= $total_attendance ?></h3>
        </div>
      </div>
    </div>

    <!-- ✅ Recent Activity -->
    <div class="recent-activity">
      <h4>Recent Attendance Activity</h4>
      <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
          <thead class="table-primary">
            <tr>
              <th>Member</th>
              <th>Class</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($activities->num_rows > 0): ?>
              <?php while ($row = $activities->fetch_assoc()): ?>
                <tr>
                  <td><?= htmlspecialchars($row['member_first_name'] . " " . $row['member_last_name']) ?></td>
                  <td><?= htmlspecialchars($row['class_name']) ?></td>
                  <td><?= htmlspecialchars($row['attendance_date']) ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr><td colspan="3" class="text-center text-muted">No recent attendance activity</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ✅ Real-time Clock Script -->
  <script>
    function updateClock() {
      const now = new Date();
      document.getElementById('clock').textContent = now.toLocaleTimeString();
      document.getElementById('date').textContent = now.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    }
    setInterval(updateClock, 1000);
    updateClock();
  </script>
</body>
</html>
