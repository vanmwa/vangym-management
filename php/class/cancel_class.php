<?php
include("../../config/config.php");
session_start();

$member_id = 1; // Replace with $_SESSION['member_id']
$class_id = intval($_POST['class_id']);

$stmt = $dbconn->prepare("DELETE FROM class_booking WHERE member_id = ? AND class_id = ?");
$stmt->bind_param("ii", $member_id, $class_id);

if ($stmt->execute()) {
    header("Location: classes.php?success=cancelled");
} else {
    echo "Error: " . $stmt->error;
}
?>
