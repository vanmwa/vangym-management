<?php
session_start();
include("../../config/config.php");

// ✅ Example: Member authentication (optional, remove if handled elsewhere)
$member_id = $_SESSION['member_id'] ?? 1; // temporary fallback for testing

// ✅ Fetch member payments
$query = "
    SELECT 
        p.payment_id,
        pk.package_name,
        p.amount,
        p.payment_date,
        p.payment_method,
        p.status
    FROM payment p
    JOIN membership m ON p.membership_id = m.membership_id
    JOIN package pk ON m.package_id = pk.package_id
    WHERE m.member_id = ?
    ORDER BY p.payment_date DESC
";
$stmt = $dbconn->prepare($query);
$stmt->bind_param("i", $member_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Member | Payments</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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

    .card {
        border-radius: 10px;
        border: none;
    }

    .table thead th {
        background-color: #1e2a38;
        color: #fff;
    }

    .badge {
        font-size: 0.85rem;
        padding: 6px 10px;
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
        <h3 class="fw-bold mb-3 mb-md-0">Payment History</h3>
        <button class="btn btn-primary">
            <i class="fa-solid fa-credit-card"></i> Make Payment
        </button>
    </div>

    <div class="card shadow-sm">
      <div class="card-body table-responsive">
        <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>Package</th>
              <th>Amount (₱)</th>
              <th>Date</th>
              <th>Method</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$count}</td>
                        <td>{$row['package_name']}</td>
                        <td>" . number_format($row['amount'], 2) . "</td>
                        <td>{$row['payment_date']}</td>
                        <td>{$row['payment_method']}</td>
                        <td>";

                    if ($row['status'] === 'paid') {
                        echo "<span class='badge bg-success'>Paid</span>";
                    } else {
                        echo "<span class='badge bg-warning text-dark'>Pending</span>";
                    }

                    echo "</td></tr>";
                    $count++;
                }
            } else {
                echo "<tr><td colspan='6' class='text-center text-muted'>No payment records found.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
