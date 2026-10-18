<?php
// Copy this file to config.php and fill in your local database details.
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "final_gym_system";

$dbconn     = new mysqli($servername,$username,$password,$dbname);

if($dbconn->connect_error){
    echo json_encode([
        "status" => "Error",
        "message" => "Database connection failed"
    ]);
}
?>
