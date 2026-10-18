<?php
session_start();
include("../../config/config.php");

if(!isset($_SESSION['admin_id']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['status'=>'error','message'=>'Unauthorized']);
    exit;
}

$package_id = intval($_POST['package_id']);

if($package_id <= 0){
    echo json_encode(['status'=>'error','message'=>'Invalid package ID']);
    exit;
}

// Optional: Check if package is assigned to any membership
$check = $dbconn->prepare("SELECT COUNT(*) AS total FROM membership WHERE package_id=?");
$check->bind_param("i", $package_id);
$check->execute();
$result = $check->get_result()->fetch_assoc();

if($result['total'] > 0){
    echo json_encode(['status'=>'error','message'=>'Cannot delete. Plan is assigned to a member']);
    exit;
}

$stmt = $dbconn->prepare("DELETE FROM package WHERE package_id=?");
$stmt->bind_param("i", $package_id);

if($stmt->execute()){
    echo json_encode(['status'=>'success','message'=>'Package deleted successfully']);
}else{
    echo json_encode(['status'=>'error','message'=>'Failed to delete package']);
}
?>
