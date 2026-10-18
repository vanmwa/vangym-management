<?php
include("../../config/config.php");
session_start();

// Simulate logged-in member
$member_id = 1; // Replace with $_SESSION['member_id'] once login is set up

// Fetch all available classes
$classes = $dbconn->query("
    SELECT cs.class_id, cs.class_name, cs.class_date, cs.class_start, cs.class_end,
           t.trainer_first_name, t.trainer_last_name
    FROM class_schedule cs
    INNER JOIN trainer t ON cs.trainer_id = t.trainer_id
    ORDER BY cs.class_date ASC
");

// Fetch member's booked classes
$booked = $dbconn->query("
    SELECT class_id FROM class_booking 
    WHERE member_id = $member_id AND status = 'reserved'
");
$booked_ids = [];
while ($row = $booked->fetch_assoc()) {
    $booked_ids[] = $row['class_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member | Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
        }

        .container {
            margin-top: 40px;
        }

        .class-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }

        .class-card:hover {
            transform: translateY(-5px);
        }

        .class-card .card-body {
            padding: 20px;
        }

        .btn {
            border-radius: 8px;
        }

        .booked {
            background-color: #d1ecf1;
        }

        .status-label {
            font-size: 0.85rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<?php include("sidebar.php");?>
<div id="page-content-wrapper" class="p-3">
    <h2 class="fw-bold mb-4"><i class="fa-solid fa-dumbbell"></i> Available Classes</h2>

    <div class="row">
        <?php while ($row = $classes->fetch_assoc()): ?>
            <?php $is_booked = in_array($row['class_id'], $booked_ids); ?>
            <div class="col-md-4 mb-4">
                <div class="card class-card <?= $is_booked ? 'booked' : '' ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['class_name']) ?></h5>
                        <p class="card-text">
                            <i class="fa-solid fa-user-tie"></i> Trainer: <?= htmlspecialchars($row['trainer_first_name'] . " " . $row['trainer_last_name']) ?><br>
                            <i class="fa-solid fa-calendar"></i> <?= date("F d, Y", strtotime($row['class_date'])) ?><br>
                            <i class="fa-solid fa-clock"></i> <?= date("g:i A", strtotime($row['class_start'])) ?> - <?= date("g:i A", strtotime($row['class_end'])) ?>
                        </p>

                        <?php if ($is_booked): ?>
                            <form action="../../php/class/cancel_class.php" method="POST">
                                <input type="hidden" name="class_id" value="<?= $row['class_id'] ?>">
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fa-solid fa-xmark"></i> Cancel Booking
                                </button>
                            </form>
                            <p class="text-center mt-2 text-info status-label">You are booked</p>
                        <?php else: ?>
                            <form action="../../php/class/book_class.php" method="POST">
                                <input type="hidden" name="class_id" value="<?= $row['class_id'] ?>">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fa-solid fa-calendar-check"></i> Book Class
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
