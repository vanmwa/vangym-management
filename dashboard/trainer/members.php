
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trainer | Members</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 30px;
    }
    .table thead {
      background-color: #007bff;
      color: #fff;
    }
    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 10px;
    }
    .card-header {
      background-color: #007bff;
      color: white;
      font-weight: bold;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
  </style>
</head>

<body>
  <?php include("sidebar.php");?>
  <div id="page-content-wrapper">
    <div class="card">
      <div class="card-header">
        <i class="bi bi-people-fill"></i> Member List
      </div>
      <div class="card-body">
        <table id="membersTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Date of Birth</th>
              <th>Role</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row['member_id'] ?></td>
                <td><?= htmlspecialchars($row['member_first_name'] . ' ' . $row['member_last_name']) ?></td>
                <td><?= htmlspecialchars($row['member_email']) ?></td>
                <td><?= htmlspecialchars($row['member_contact_number']) ?></td>
                <td><?= htmlspecialchars($row['member_date_of_birth']) ?></td>
                <td><?= ucfirst($row['member_role']) ?></td>
                <td>
                  <?php if ($row['member_status'] == 'active'): ?>
                    <span class="badge bg-success">Active</span>
                  <?php else: ?>
                    <span class="badge bg-secondary">Inactive</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- JS Libraries -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#membersTable').DataTable({
        "pageLength": 10,
        "order": [[0, "desc"]],
        "language": {
          "search": "Search Members:",
          "lengthMenu": "Show _MENU_ entries per page",
          "info": "Showing _START_ to _END_ of _TOTAL_ members"
        }
      });
    });
  </script>
</body>
</html>
