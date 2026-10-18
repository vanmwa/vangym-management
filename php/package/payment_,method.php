<?php
session_start();
include("../../config/config.php");

if(!isset($_SESSION['admin_id']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['status'=>'error','message'=>'Unauthorized']);
    exit;
}

$membership_id = intval($_POST['membership_id']);
$amount = floatval($_POST['amount']);
$status = $_POST['status'];
$payment_date = $_POST['payment_date'];
$admin_id = $_SESSION['admin_id'];

if($membership_id <= 0 || $amount <= 0 || !in_array($status,['paid','pending']) || empty($payment_date)){
    echo json_encode(['status'=>'error','message'=>'Invalid input']);
    exit;
}

$stmt = $dbconn->prepare("INSERT INTO payment (membership_id, admin_id, amount, status, payment_date, payment_method) VALUES (?, ?, ?, ?, ?, 'cash')");
$stmt->bind_param("iisss", $membership_id, $admin_id, $amount, $status, $payment_date);

if($stmt->execute()){
    echo json_encode(['status'=>'success','message'=>'Payment added successfully']);
}else{
    echo json_encode(['status'=>'error','message'=>'Failed to add payment']);
}
?>
