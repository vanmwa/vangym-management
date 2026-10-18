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

// ✅ Fetch attendance logs
$attendanceQuery = "
    SELECT 
        a.attendance_id,
        m.member_first_name,
        m.member_last_name,
        'Member' AS role,
        DATE(a.attendance_check_in) AS date_in,
        a.attendance_check_in AS time_in,
        a.attendance_check_out AS time_out
    FROM attendance a
    JOIN member m ON a.member_id = m.member_id

    UNION ALL

    SELECT 
        a.attendance_id,
        t.trainer_first_name,
        t.trainer_last_name,
        'Trainer' AS role,
        DATE(a.attendance_check_in) AS date_in,
        a.attendance_check_in AS time_in,
        a.attendance_check_out AS time_out
    FROM attendance a
    JOIN trainer t ON a.member_id = t.trainer_id

    ORDER BY date_in DESC, time_in DESC
";
$attendanceResult = $dbconn->query($attendanceQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Attendance Logs</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
    }

    #page-content-wrapper {
      margin: 30px;
    }

    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 25px;
    }

    .table thead th {
      background-color: #1e2a38;
      color: #fff;
    }

    @media (max-width: 768px) {
      #page-content-wrapper {
        margin: 15px;
      }
    }
  </style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div id="page-content-wrapper">
  <div class="page-header">
    <h3 class="fw-bold mb-3 mb-md-0">Attendance Logs</h3>
    <button class="btn btn-primary">
      <i class="fa-solid fa-download"></i> Export Logs
    </button>
  </div>

  <div class="card shadow-sm">
    <div class="card-body table-responsive">
      <table id="attendanceTable" class="table table-striped align-middle">
        <thead>
          <tr>
            <th>#</th>
            <th>Member Name</th>
            <th>Role</th>
            <th>Date</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $attendanceResult->fetch_assoc()): ?>
            <?php
                $fullName = $row['member_first_name'] . " " . $row['member_last_name'];
                $timeIn = $row['time_in'] ? date("h:i A", strtotime($row['time_in'])) : "--";
                $timeOut = $row['time_out'] ? date("h:i A", strtotime($row['time_out'])) : "--";
                $dateIn = date("Y-m-d", strtotime($row['date_in']));

                // Determine status
                if (!$row['time_in']) {
                    $status = '<span class="badge bg-danger">Absent</span>';
                } elseif (strtotime($row['time_in']) > strtotime("07:15:00")) {
                    $status = '<span class="badge bg-warning text-dark">Late</span>';
                } else {
                    $status = '<span class="badge bg-success">On Time</span>';
                }
            ?>
          <tr>
            <td><?= $row['attendance_id'] ?></td>
            <td><?= $fullName ?></td>
            <td><?= $row['role'] ?></td>
            <td><?= $dateIn ?></td>
            <td><?= $timeIn ?></td>
            <td><?= $timeOut ?></td>
            <td><?= $status ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $('#attendanceTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100]
    });
});
</script>

</body>
</html>
