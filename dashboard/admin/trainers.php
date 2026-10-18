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

// ✅ Fetch all trainers
$trainerQuery = $dbconn->query("SELECT trainer_id, trainer_first_name, trainer_last_name, trainer_username, trainer_email, trainer_contact_number, trainer_specialty, trainer_status FROM trainer ORDER BY trainer_id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin | Trainers</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<style>
body { background-color: #f8f9fa; font-family: "Poppins", sans-serif; margin:0; }
#page-content-wrapper { margin: 30px; }
.table thead th { background-color: #1e2a38; color: #fff; }
@media (max-width: 768px) { #page-content-wrapper { margin: 15px; } }
</style>
</head>
<body>

<?php include("sidebar.php"); ?>

<div id="page-content-wrapper">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h3 class="fw-bold mb-3 mb-md-0">Trainer Management</h3>
        <button class="btn btn-primary">
            <i class="fa-solid fa-user-plus"></i> Add Trainer
        </button>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm text-center bg-light">
                <div class="card-body">
                    <i class="fa-solid fa-users fa-2x text-primary mb-2"></i>
                    <h6 class="text-muted">Total Trainers</h6>
                    <p class="fs-4 fw-bold mb-0"><?= $trainerQuery->num_rows; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm text-center bg-light">
                <div class="card-body">
                    <i class="fa-solid fa-user-check fa-2x text-success mb-2"></i>
                    <h6 class="text-muted">Active Trainers</h6>
                    <?php
                    $activeTrainersResult = $dbconn->query("SELECT COUNT(trainer_id) AS active_count FROM trainer WHERE trainer_status='active'");
                    $activeTrainers = $activeTrainersResult->fetch_assoc()['active_count'];
                    ?>
                    <p class="fs-4 fw-bold mb-0"><?= $activeTrainers; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="trainersTable" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Specialization</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($trainer = $trainerQuery->fetch_assoc()): ?>
                <tr>
                    <td><?= $trainer['trainer_id'] ?></td>
                    <td><?= $trainer['trainer_first_name'] . ' ' . $trainer['trainer_last_name'] ?></td>
                    <td><?= $trainer['trainer_username'] ?></td>
                    <td><?= $trainer['trainer_email'] ?></td>
                    <td><?= $trainer['trainer_contact_number'] ?></td>
                    <td><?= $trainer['trainer_specialty'] ?></td>
                    <td>
                        <?php if ($trainer['trainer_status'] === 'active'): ?>
                            <span class="badge bg-success">Active</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#trainersTable').DataTable({
        responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        columnDefs: [{ orderable: false, targets: [7] }]
    });
});
</script>

</body>
</html>
