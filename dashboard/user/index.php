<?php
session_start();
include("../../config/config.php"); // mysqli connection

// --- Session check (no redirect for preview)
if (!isset($_SESSION['member_id'])) {
  $_SESSION['member_id'] = 1; // for test
  $_SESSION['member_username'] = 'demo_user';
  $_SESSION['role'] = 'member';
}

$member_id = intval($_SESSION['member_id']);

// --- Member profile
$stmt = $dbconn->prepare("SELECT member_first_name, member_last_name, member_email, member_contact_number, member_date_join FROM member WHERE member_id = ?");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$member = $stmt->get_result()->fetch_assoc();
$stmt->close();

// --- Current membership
$stmt = $dbconn->prepare("
  SELECT ms.*, pk.package_name, pk.price
  FROM membership ms
  JOIN package pk ON ms.package_id = pk.package_id
  WHERE ms.member_id = ?
  ORDER BY ms.end_date DESC
  LIMIT 1
");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$currentMembership = $stmt->get_result()->fetch_assoc();
$stmt->close();

// --- Booked classes
$stmt = $dbconn->prepare("
  SELECT cb.booking_id, cs.class_id, cs.class_name, cs.class_date, cs.class_start, cs.class_end, t.trainer_first_name, t.trainer_last_name, cb.status
  FROM class_booking cb
  JOIN class_schedule cs ON cb.class_id = cs.class_id
  JOIN trainer t ON cs.trainer_id = t.trainer_id
  WHERE cb.member_id = ? AND cs.class_date >= CURDATE() AND cb.status = 'reserved'
  ORDER BY cs.class_date, cs.class_start
  LIMIT 6
");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$bookedClasses = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// --- Available classes
$availableClasses = $dbconn->query("
  SELECT cs.class_id, cs.class_name, cs.class_date, cs.class_start, cs.class_end, t.trainer_first_name, t.trainer_last_name
  FROM class_schedule cs
  JOIN trainer t ON cs.trainer_id = t.trainer_id
  WHERE cs.class_date >= CURDATE()
  ORDER BY cs.class_date, cs.class_start
  LIMIT 8
");

// --- Payments
$stmt = $dbconn->prepare("
  SELECT p.payment_id, p.amount, p.status, p.payment_date, pk.package_name
  FROM payment p
  JOIN membership ms ON p.membership_id = ms.membership_id
  JOIN package pk ON ms.package_id = pk.package_id
  WHERE ms.member_id = ?
  ORDER BY p.payment_date DESC
  LIMIT 6
");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$payments = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// --- Attendance
$stmt = $dbconn->prepare("
  SELECT COUNT(*) AS cnt FROM attendance
  WHERE member_id = ? AND MONTH(attendance_check_in)=MONTH(CURDATE()) AND YEAR(attendance_check_in)=YEAR(CURDATE())
");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$attendanceCount = $stmt->get_result()->fetch_assoc()['cnt'] ?? 0;
$stmt->close();

// --- Notifications
$stmt = $dbconn->prepare("
  SELECT n.notification_id, n.title, n.message, n.created_at, n.receiver_role, n.receiver_id, a.admin_username AS sender_name
  FROM notifications n
  JOIN admin a ON n.sender_id = a.admin_id
  WHERE n.receiver_role IN ('all','member') OR (n.receiver_role='member' AND n.receiver_id = ?)
  ORDER BY n.created_at DESC
  LIMIT 8
");
$stmt->bind_param("i", $member_id);
$stmt->execute();
$notifications = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

function shortDate($d) { return date("M d, Y", strtotime($d)); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Member Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
body {
  background: #f8f9fa;
  font-family: "Poppins", sans-serif;
  overflow-x: hidden;
}
.card {
  border-radius: 10px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}
.small-note { font-size: 0.9rem; color: #6c757d; }
.table-sm td, .table-sm th { padding: .5rem; }
.dashboard-grid { display: flex; gap: 1.5rem; flex-wrap: wrap; }
.dashboard-grid > div { flex: 1 1 350px; }
@media (max-width: 768px) {
  .dashboard-grid { flex-direction: column; }
}
</style>
</head>

<body>
<?php include("sidebar.php"); ?>

<main id="page-content-wrapper" class="p-3">
  <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap">
    <div>
      <h4>Welcome back, 
        <span class="text-primary">
          <?= htmlspecialchars($member['member_first_name'] . ' ' . $member['member_last_name']); ?>
        </span>
      </h4>
      <div class="small-note">Member since <?= shortDate($member['member_date_join'] ?? date('Y-m-d')) ?></div>
    </div>
    <div class="d-flex gap-2 mt-2">
      <a href="profile.php" class="btn btn-outline-secondary btn-sm"><i class="fa fa-user"></i> Profile</a>
      <a href="memberships.php" class="btn btn-primary btn-sm"><i class="fa fa-id-card"></i> My Membership</a>
    </div>
  </div>

  <!-- Top Cards -->
  <div class="row g-3 mb-3">
    <div class="col-md-4">
      <div class="card p-3 h-100">
        <h6 class="text-muted mb-1">Current Plan</h6>
        <?php if($currentMembership): ?>
          <h5><?= htmlspecialchars($currentMembership['package_name']); ?></h5>
          <div class="small-note">Expires: <?= shortDate($currentMembership['end_date']); ?></div>
          <div class="mt-2"><span class="badge bg-success"><?= htmlspecialchars($currentMembership['member_status']); ?></span></div>
        <?php else: ?>
          <h5 class="text-danger">No active membership</h5>
          <div class="small-note">Choose a plan to get started.</div>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card p-3 text-center h-100">
        <div class="small-note">Attendance (this month)</div>
        <h4><?= intval($attendanceCount); ?></h4>
        <div class="small-note">Check-ins</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center h-100">
        <div class="small-note">Booked Classes</div>
        <h5><?= count($bookedClasses) ?></h5>
        <div class="small-note">Upcoming Sessions</div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center h-100">
        <div class="small-note">Pending Payments</div>
        <?php
          $pendingCount = 0;
          foreach($payments as $p) if($p['status']==='pending') $pendingCount++;
        ?>
        <h5><?= $pendingCount ?></h5>
        <div class="small-note">To be settled</div>
      </div>
    </div>
  </div>

  <div class="dashboard-grid">
    <!-- LEFT -->
    <div>
      <!-- Booked Classes -->
      <div class="card mb-3 p-3">
        <div class="d-flex justify-content-between mb-2">
          <h6>Your Bookings</h6>
          <a href="bookings.php" class="small-note">Manage</a>
        </div>
        <?php if(empty($bookedClasses)): ?>
          <div class="small-note">No upcoming bookings.</div>
        <?php else: ?>
          <?php foreach($bookedClasses as $b): ?>
            <div class="border-bottom py-2">
              <strong><?= htmlspecialchars($b['class_name']) ?></strong><br>
              <span class="small-note"><?= shortDate($b['class_date']) ?> · 
                <?= date("h:i A", strtotime($b['class_start'])) ?> -
                <?= date("h:i A", strtotime($b['class_end'])) ?>
              </span><br>
              <span class="small-note">Trainer: <?= htmlspecialchars($b['trainer_first_name'].' '.$b['trainer_last_name']) ?></span>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <!-- Available Classes -->
      <div class="card p-3 mb-3">
        <div class="d-flex justify-content-between mb-2">
          <h6>Available Classes</h6>
          <a href="classes.php" class="small-note">Browse</a>
        </div>
        <div class="table-responsive">
          <table class="table table-sm">
            <tbody>
              <?php while($cls = $availableClasses->fetch_assoc()): ?>
                <tr>
                  <td><?= date("M d", strtotime($cls['class_date'])) ?></td>
                  <td>
                    <div><strong><?= htmlspecialchars($cls['class_name']) ?></strong></div>
                    <div class="small-note"><?= date("h:i A", strtotime($cls['class_start'])) ?> · <?= htmlspecialchars($cls['trainer_first_name'].' '.$cls['trainer_last_name']) ?></div>
                  </td>
                  <td class="text-end">
                    <form method="POST" action="actions/book_class.php">
                      <input type="hidden" name="class_id" value="<?= intval($cls['class_id']) ?>">
                      <button class="btn btn-sm btn-primary">Book</button>
                    </form>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- RIGHT -->
    <div style="max-width: 400px;">
      <!-- Payments -->
      <div class="card p-3 mb-3">
        <h6>Recent Payments</h6>
        <?php if(empty($payments)): ?>
          <div class="small-note">No recent payments.</div>
        <?php else: ?>
          <?php foreach($payments as $p): ?>
            <div class="border-bottom py-2 d-flex justify-content-between">
              <div>
                <strong><?= htmlspecialchars($p['package_name']) ?></strong><br>
                <span class="small-note"><?= shortDate($p['payment_date']) ?></span>
              </div>
              <div class="text-end">
                ₱ <?= number_format($p['amount'], 2) ?><br>
                <span class="badge <?= $p['status']=='paid' ? 'bg-success' : 'bg-warning text-dark' ?>">
                  <?= ucfirst($p['status']) ?>
                </span>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <!-- Notifications -->
      <div class="card p-3 mb-3">
        <div class="d-flex justify-content-between">
          <h6>Notifications</h6>
          <a href="notifications.php" class="small-note">View all</a>
        </div>
        <?php if(empty($notifications)): ?>
          <div class="small-note">No notifications yet.</div>
        <?php else: ?>
          <?php foreach($notifications as $n): ?>
            <div class="border-bottom py-2">
              <strong><?= htmlspecialchars($n['title']) ?></strong><br>
              <span class="small-note"><?= htmlspecialchars($n['message']) ?></span><br>
              <span class="small-note text-muted">From: <?= htmlspecialchars($n['sender_name']) ?> • <?= date("M d", strtotime($n['created_at'])) ?></span>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <!-- Quick Actions -->
      <div class="card p-3">
        <h6>Quick Actions</h6>
        <div class="d-grid gap-2">
          <a href="bookings.php" class="btn btn-outline-primary btn-sm">My Bookings</a>
          <a href="payments.php" class="btn btn-outline-success btn-sm">Make Payment</a>
          <a href="profile.php" class="btn btn-outline-secondary btn-sm">Edit Profile</a>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
