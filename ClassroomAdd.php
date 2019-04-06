<?php
	error_reporting(E_ALL || ~E_NOTICE);
	header("Content-Type:application/json;charset=UTF-8");
	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "checkattendance";
	$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} else {
	$sql = "INSERT INTO classroom(roomname)  VALUES(?)";
	$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
	mysqli_stmt_bind_param($stmt, 's', $roomname);
	$roomname = $_POST['roomname'];
	mysqli_stmt_execute($stmt);
    }
}
header("Location:index.php?frame=4"); 
?>