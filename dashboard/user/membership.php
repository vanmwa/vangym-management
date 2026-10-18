<?php
session_start();
include("../../config/config.php");

// Check if member is logged in
if (!isset($_SESSION['member_id'])) {
    header("Location: login.php");
    exit;
}

$member_id = $_SESSION['member_id'];

// Get member info
$memberQuery = $dbconn->prepare("SELECT * FROM member WHERE member_id = ?");
$memberQuery->bind_param("i", $member_id);
$memberQuery->execute();
$member = $memberQuery->get_result()->fetch_assoc();

// Get current membership info
$membershipQuery = $dbconn->prepare("
    SELECT m.*, p.package_name, p.duration, p.price
    FROM membership m
    JOIN package p ON m.package_id = p.package_id
    WHERE m.member_id = ?
    ORDER BY m.membership_id DESC
    LIMIT 1
");
$membershipQuery->bind_param("i", $member_id);
$membershipQuery->execute();
$membership = $membershipQuery->get_result()->fetch_assoc();

// Get payment history
$paymentQuery = $dbconn->prepare("
    SELECT pay.*, p.package_name
    FROM payment pay
    JOIN membership mem ON pay.membership_id = mem.membership_id
    JOIN package p ON mem.package_id = p.package_id
    WHERE mem.member_id = ?
    ORDER BY pay.payment_date DESC
");
$paymentQuery->bind_param("i", $member_id);
$paymentQuery->execute();
$payments = $paymentQuery->get_result();

// Get available packages
$packageQuery = $dbconn->query("SELECT * FROM package");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Membership | Gym System</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
        background-color: #f9fafb;
        font-family: 'Poppins', sans-serif;
    }
    .membership-card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        background: #fff;
        padding: 25px;
    }
    .section-title {
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }
  </style>
</head>

<body>
    <?php include("sidebar.php");?>
<div id="page-content-wrapper" class="p-3">
    <h2 class="text-center mb-4">My Membership</h2>

    <!-- MEMBER INFO -->
    <div class="membership-card mb-4">
        <h4 class="section-title">Member Information</h4>
        <p><strong>Name:</strong> <?= $member['member_first_name'] . " " . $member['member_last_name']; ?></p>
        <p><strong>Email:</strong> <?= $member['member_email']; ?></p>
        <p><strong>Status:</strong> <span class="badge bg-<?= $member['member_status'] == 'active' ? 'success' : 'secondary'; ?>"><?= ucfirst($member['member_status']); ?></span></p>
    </div>

    <!-- CURRENT MEMBERSHIP -->
    <div class="membership-card mb-4">
        <h4 class="section-title">Current Membership</h4>
        <?php if ($membership): ?>
            <p><strong>Package:</strong> <?= $membership['package_name']; ?></p>
            <p><strong>Start Date:</strong> <?= $membership['start_date']; ?></p>
            <p><strong>End Date:</strong> <?= $membership['end_date']; ?></p>
            <p><strong>Status:</strong> <span class="badge bg-info"><?= ucfirst($membership['member_status']); ?></span></p>
        <?php else: ?>
            <p>No active membership. You can join below!</p>
        <?php endif; ?>
    </div>

    <!-- PACKAGE SELECTION -->
    <div class="membership-card mb-4">
        <h4 class="section-title">Join / Renew Membership</h4>
        <form action="../../php/process_membership.php" method="POST">
            <div class="mb-3">
                <label for="package" class="form-label">Select Package</label>
                <select name="package_id" id="package" class="form-select" required>
                    <option value="">-- Select a Package --</option>
                    <?php while ($pkg = $packageQuery->fetch_assoc()): ?>
                        <option value="<?= $pkg['package_id']; ?>">
                            <?= $pkg['package_name']; ?> - ₱<?= number_format($pkg['price'], 2); ?> / <?= $pkg['duration']; ?> days
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-select" required>
                    <option value="cash">Cash</option>
                    <option value="card">Card</option>
                    <option value="online payment">Online Payment</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Confirm Membership</button>
        </form>
    </div>

    <!-- PAYMENT HISTORY -->
    <div class="membership-card">
        <h4 class="section-title">Payment History</h4>
        <?php if ($payments->num_rows > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Package</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($p = $payments->fetch_assoc()): ?>
                <tr>
                    <td><?= $p['package_name']; ?></td>
                    <td>₱<?= number_format($p['amount'], 2); ?></td>
                    <td><?= ucfirst($p['payment_method']); ?></td>
                    <td><span class="badge bg-<?= $p['status'] == 'paid' ? 'success' : 'warning'; ?>"><?= ucfirst($p['status']); ?></span></td>
                    <td><?= $p['payment_date']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>No payment records yet.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
