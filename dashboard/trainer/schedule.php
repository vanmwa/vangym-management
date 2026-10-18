

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trainer | Class Schedule</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    .container {
      margin-top: 30px;
    }

    .page-title {
      font-weight: 700;
      color: #007bff;
      margin-bottom: 20px;
    }

    .table thead {
      background-color: #007bff;
      color: white;
    }

    .table tbody tr:hover {
      background-color: #eaf3ff;
    }

    .badge-upcoming {
      background-color: #00b894;
    }

    .badge-past {
      background-color: #d63031;
    }
  </style>
</head>

<body>
    <?php include("sidebar.php");?>
<div id="page-content-wrapper">
  <h2 class="page-title"><i class="bi bi-calendar-week"></i> My Class Schedule</h2>

  <div class="card shadow-sm border-0">
    <div class="card-body">
      <table id="classTable" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>#</th>
            <th>Class Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Created By</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $count = 1;
          $today = date('Y-m-d');
          while ($row = $result->fetch_assoc()):
            $classStatus = ($row['class_date'] >= $today) ? 
              "<span class='badge badge-upcoming'>Upcoming</span>" : 
              "<span class='badge badge-past'>Completed</span>";
          ?>
          <tr>
            <td><?= $count++; ?></td>
            <td><?= htmlspecialchars($row['class_name']); ?></td>
            <td><?= htmlspecialchars(date('F d, Y', strtotime($row['class_date']))); ?></td>
            <td><?= htmlspecialchars(date('h:i A', strtotime($row['class_start'])) . " - " . date('h:i A', strtotime($row['class_end']))); ?></td>
            <td><?= htmlspecialchars($row['created_by']); ?></td>
            <td><?= $classStatus; ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
    $('#classTable').DataTable({
      "order": [[2, "asc"]],
      "pageLength": 7
    });
  });
</script>

</body>
</html>
