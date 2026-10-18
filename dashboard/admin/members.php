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

// ✅ Fetch all members from DB
$memberQuery = $dbconn->query("SELECT member_id, member_first_name, member_last_name, member_username, member_email, member_contact_number, role, member_status FROM member ORDER BY member_id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin | Members</title>
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

<?php include("sidebar.php");?>

<div id="page-content-wrapper">
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h4 class="fw-bold mb-1">Member Management</h4>
                <p class="text-muted mb-0">Members details.</p>
            </div>
            <button class="btn btn-primary mt-3 mt-md-0">
                <i class="fa-solid fa-user-plus"></i> Add Member
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table id="membersTable" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($m = $memberQuery->fetch_assoc()): ?>
                <tr>
                    <td><?= $m['member_id'] ?></td>
                    <td><?= htmlspecialchars($m['member_first_name'] . ' ' . $m['member_last_name']) ?></td>
                    <td><?= htmlspecialchars($m['member_username']) ?></td>
                    <td><?= htmlspecialchars($m['member_email']) ?></td>
                    <td><?= htmlspecialchars($m['member_contact_number']) ?></td>
                    <td><?= ucfirst($m['role']) ?></td>
                    <td>
                        <?php if ($m['member_status'] === "active"): ?>
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
    $('#membersTable').DataTable({
        responsive: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        columnDefs: [
            { orderable: false, targets: [7] } // Disable sorting on Actions
        ]
    });
});
</script>

</body>
</html>
