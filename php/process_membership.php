<?php
session_start();
include("config/config.php");

if (!isset($_SESSION['member_id'])) {
    header("Location: login.php");
    exit;
}

$member_id = $_SESSION['member_id'];
$package_id = $_POST['package_id'];
$payment_method = $_POST['payment_method'];

// Get package info
$pkgQuery = $dbconn->prepare("SELECT * FROM package WHERE package_id = ?");
$pkgQuery->bind_param("i", $package_id);
$pkgQuery->execute();
$pkg = $pkgQuery->get_result()->fetch_assoc();

if (!$pkg) {
    die("Invalid package.");
}

$start_date = date('Y-m-d');
$end_date = date('Y-m-d', strtotime("+{$pkg['duration']} days"));

// Insert membership
$insertMembership = $dbconn->prepare("INSERT INTO membership (member_id, package_id, start_date, end_date, member_status) VALUES (?, ?, ?, ?, 'active')");
$insertMembership->bind_param("iiss", $member_id, $package_id, $start_date, $end_date);
$insertMembership->execute();
$membership_id = $dbconn->insert_id;

// Insert payment
$insertPayment = $dbconn->prepare("INSERT INTO payment (membership_id, admin_id, amount, payment_date, payment_method, status) VALUES (?, 1, ?, NOW(), ?, 'paid')");
$insertPayment->bind_param("ids", $membership_id, $pkg['price'], $payment_method);
$insertPayment->execute();

header("Location: membership.php?success=1");
exit;
?>
