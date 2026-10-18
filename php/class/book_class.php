<?php
include("../../config/config.php");
session_start();

$member_id = 1; // Replace with $_SESSION['member_id']
$class_id = intval($_POST['class_id']);

$stmt = $dbconn->prepare("INSERT INTO class_booking (member_id, class_id, booking_date, status) VALUES (?, ?, CURDATE(), 'reserved')");
$stmt->bind_param("ii", $member_id, $class_id);

if ($stmt->execute()) {
    header("Location: classes.php?success=booked");
} else {
    echo "Error: " . $stmt->error;
}
?>
