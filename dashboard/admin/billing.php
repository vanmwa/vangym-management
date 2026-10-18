<?php
session_start();
include("../../config/config.php"); // DB connection

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

// Fetch all membership plans
$plans = $dbconn->query("SELECT * FROM package ORDER BY package_id ASC");

// Fetch payments with member and plan info
$payments = $dbconn->query("
    SELECT p.payment_id, m.member_first_name, m.member_last_name, pk.package_name, p.amount, p.status, p.payment_date
    FROM payment p
    JOIN membership ms ON p.membership_id = ms.membership_id
    JOIN member m ON ms.member_id = m.member_id
    JOIN package pk ON ms.package_id = pk.package_id
    ORDER BY p.payment_date DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Billing & Membership</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<?php include("sidebar.php"); ?>

<div id="page-content-wrapper" class="p-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Billing & Membership</h3>
    <div>
      <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addPlanModal">
        <i class="fa-solid fa-plus"></i> Add Plan
      </button>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
        <i class="fa-solid fa-plus"></i> Add Payment
      </button>
    </div>
  </div>

  <!-- Membership Plans -->
  <div class="card mb-4 p-3">
    <h5 class="fw-bold mb-3"><i class="fa-solid fa-layer-group me-2"></i> Membership Plans</h5>
    <div class="table-responsive">
      <table class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>#</th>
            <th>Plan Name</th>
            <th>Description</th>
            <th>Duration (Days)</th>
            <th>Price (₱)</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while($plan = $plans->fetch_assoc()): ?>
          <tr>
            <td><?= $plan['package_id'] ?></td>
            <td><?= htmlspecialchars($plan['package_name']) ?></td>
            <td><?= htmlspecialchars($plan['package_description']) ?></td>
            <td><?= $plan['duration'] ?></td>
            <td><?= number_format($plan['price'],2) ?></td>
            <td class="text-center">
              <button class="btn btn-sm btn-danger delete-plan" data-id="<?= $plan['package_id'] ?>">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Payments Table -->
  <div class="card p-3">
    <h5 class="fw-bold mb-3"><i class="fa-solid fa-receipt me-2"></i> Recent Payments</h5>
    <div class="table-responsive">
      <table class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>#</th>
            <th>Member</th>
            <th>Plan</th>
            <th>Amount (₱)</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php while($payment = $payments->fetch_assoc()): ?>
          <tr>
            <td><?= $payment['payment_id'] ?></td>
            <td><?= htmlspecialchars($payment['member_first_name'] . " " . $payment['member_last_name']) ?></td>
            <td><?= htmlspecialchars($payment['package_name']) ?></td>
            <td><?= number_format($payment['amount'],2) ?></td>
            <td>
              <?php if($payment['status']=="paid"): ?>
                <span class="badge bg-success">Paid</span>
              <?php else: ?>
                <span class="badge bg-warning text-dark">Pending</span>
              <?php endif; ?>
            </td>
            <td><?= $payment['payment_date'] ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Add Plan Modal -->
<div class="modal fade" id="addPlanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title"><i class="fa-solid fa-plus me-2"></i>Add Membership Plan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addPlanForm">
          <div class="mb-3">
            <label class="form-label">Plan Name</label>
            <input type="text" name="package_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="package_description" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Duration (Days)</label>
            <input type="number" name="duration" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Price (₱)</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Save Plan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Add Payment Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="fa-solid fa-plus me-2"></i>Add Payment</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addPaymentForm">
          <div class="mb-3">
            <label class="form-label">Member</label>
            <select name="membership_id" class="form-select" required>
              <?php
              $memberships = $dbconn->query("SELECT ms.membership_id, m.member_first_name, m.member_last_name, pk.package_name
                                             FROM membership ms
                                             JOIN member m ON ms.member_id = m.member_id
                                             JOIN package pk ON ms.package_id = pk.package_id");
              while($ms = $memberships->fetch_assoc()):
              ?>
              <option value="<?= $ms['membership_id'] ?>">
                <?= htmlspecialchars($ms['member_first_name'] . " " . $ms['member_last_name'] . " - " . $ms['package_name']) ?>
              </option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Amount (₱)</label>
            <input type="number" step="0.01" name="amount" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
              <option value="paid">Paid</option>
              <option value="pending">Pending</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="payment_date" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Save Payment</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {

  // Add Plan
  $("#addPlanForm").submit(function(e){
    e.preventDefault();
    $.post("../../php/package/add_package.php", $(this).serialize(), function(data){
      if(data.status=="success"){ location.reload(); }
      else{ alert(data.message); }
    }, "json");
  });

  // Delete Plan
  $(".delete-plan").click(function(){
    if(confirm("Are you sure you want to delete this plan?")){
      var id = $(this).data("id");
      $.post("../../php/package/delete_package.php", {package_id:id}, function(data){
        if(data.status=="success"){ location.reload(); }
        else{ alert(data.message); }
      }, "json");
    }
  });

  // Add Payment
  $("#addPaymentForm").submit(function(e){
    e.preventDefault();
    $.post("../../php/package/method.php", $(this).serialize(), function(data){
      if(data.status=="success"){ location.reload(); }
      else{ alert(data.message); }
    }, "json");
  });

});
</script>
</body>
</html>
