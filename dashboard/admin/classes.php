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

// ✅ Fetch trainers for dropdown
$trainersResult = $dbconn->query("SELECT trainer_id, trainer_first_name, trainer_last_name FROM trainer WHERE trainer_status='active'");
$trainers = [];
while($t = $trainersResult->fetch_assoc()) {
    $trainers[] = $t;
}

// ✅ Fetch classes for table
$classesResult = $dbconn->query("
    SELECT cs.class_id, cs.class_name, cs.class_date, cs.class_start, cs.class_end, t.trainer_first_name, t.trainer_last_name
    FROM class_schedule cs
    JOIN trainer t ON cs.trainer_id = t.trainer_id
    ORDER BY cs.class_date, cs.class_start
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin | Class & Schedule</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- ✅ DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<!-- ✅ FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">

<style>
body { background-color: #f8f9fa; font-family: "Poppins", sans-serif; margin:0; }
#page-content-wrapper { margin: 20px; }
.table thead th { background-color: #1e2a38; color: #fff; }
.fc .fc-toolbar-title { font-size: 1.2rem; }
.modal .form-label { font-weight: 500; }
@media (max-width:768px){ #page-content-wrapper{ margin:10px; } }
</style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div id="page-content-wrapper">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h3 class="fw-bold mb-3 mb-md-0">Class & Schedule Management</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClassModal">
            <i class="fa-solid fa-plus"></i> Add Class
        </button>
    </div>

    <!-- Class Table -->
    <div class="table-responsive mb-4">
        <table id="classesTable" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Class Name</th>
                    <th>Trainer</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($cls = $classesResult->fetch_assoc()): ?>
                <tr>
                    <td><?= $cls['class_id'] ?></td>
                    <td><?= $cls['class_name'] ?></td>
                    <td><?= $cls['trainer_first_name'] . " " . $cls['trainer_last_name'] ?></td>
                    <td><?= date("M d, Y", strtotime($cls['class_date'])) ?></td>
                    <td><?= date("h:i a", strtotime($cls['class_start'])) ?></td>
                    <td><?= date("h:i a", strtotime($cls['class_end'])) ?></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Calendar -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- Add Class Modal -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="addClassForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Class Name</label>
            <input type="text" class="form-control" name="class_name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Trainer</label>
            <select class="form-select" name="trainer_id" required>
              <option value="">Select Trainer</option>
              <?php foreach($trainers as $t): ?>
                <option value="<?= $t['trainer_id'] ?>"><?= $t['trainer_first_name'] . " " . $t['trainer_last_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" class="form-control" name="class_date" required>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label class="form-label">Start Time</label>
              <input type="time" class="form-control" name="class_start" required>
            </div>
            <div class="col mb-3">
              <label class="form-label">End Time</label>
              <input type="time" class="form-control" name="class_end" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add Class</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<!-- FullCalendar -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>

<script>
$(document).ready(function(){
    $('#classesTable').DataTable({ responsive:true, pageLength:5, lengthMenu:[5,10,25,50], columnDefs:[{orderable:false, targets:[6]}] });
});

// ✅ FullCalendar
document.addEventListener('DOMContentLoaded', function() {
    const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialView: 'timeGridWeek',
        height: 450,
        slotMinTime: "06:00:00",
        slotMaxTime: "22:00:00",
        allDaySlot: false,
        headerToolbar: { left: 'prev,next today', center:'title', right:'timeGridWeek,dayGridMonth' },
        eventDidMount: function(info){ info.el.setAttribute('title', `${info.event.title}\nTrainer: ${info.event.extendedProps.trainer}`); },
        events: [
            <?php
            $classesQuery = $dbconn->query("
                SELECT cs.class_name, cs.class_date, cs.class_start, cs.class_end, t.trainer_first_name
                FROM class_schedule cs
                JOIN trainer t ON cs.trainer_id = t.trainer_id
            ");
            $colors = ["#4e54c8","#1abc9c","#f39c12","#e74c3c","#8e44ad"];
            $i=0;
            while($cls = $classesQuery->fetch_assoc()):
                $title = addslashes($cls['class_name']);
                $trainer = addslashes($cls['trainer_first_name']);
                $color = $colors[$i % count($colors)];
                echo "{ title: '$title', start: '{$cls['class_date']}T{$cls['class_start']}', end: '{$cls['class_date']}T{$cls['class_end']}', backgroundColor:'$color', borderColor:'$color', extendedProps:{trainer:'$trainer'} },";
                $i++;
            endwhile;
            ?>
        ]
    });
    calendar.render();
});
</script>

</body>
</html>
