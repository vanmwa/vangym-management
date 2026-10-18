<?php
session_start();
include("../../config/config.php");

if(!isset($_SESSION['admin_id']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['status'=>'error','message'=>'Unauthorized']);
    exit;
}

$package_name = trim($_POST['package_name']);
$package_description = trim($_POST['package_description']);
$duration = intval($_POST['duration']);
$price = floatval($_POST['price']);

if(empty($package_name) || empty($package_description) || $duration <= 0 || $price <= 0){
    echo json_encode(['status'=>'error','message'=>'All fields are required and must be valid']);
    exit;
}

$stmt = $dbconn->prepare("INSERT INTO package (package_name, package_description, duration, price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssii", $package_name, $package_description, $duration, $price);

if($stmt->execute()){
    echo json_encode(['status'=>'success','message'=>'Package added successfully']);
}else{
    echo json_encode(['status'=>'error','message'=>'Failed to add package']);
}
?>
