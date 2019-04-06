<?php
	error_reporting(E_ALL || ~E_NOTICE);
	header("Content-Type:application/json;charset=UTF-8");
	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "checkattendance";
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} else {
	$sql = "INSERT INTO student(sno,name,phone,class,academy,mac_address)  VALUES(?,?,?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);	
if (mysqli_stmt_prepare($stmt, $sql)) {
	mysqli_stmt_bind_param($stmt, 'ssssss', $sno,$name,$phone,$class,$academy,$mac_address);
	$sno = $_POST['sno'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$class = $_POST['class'];
	$academy = $_POST['academy'];
	$mac_address = $_POST['mac_address'];
	mysqli_stmt_execute($stmt);
    }
}
header("Location:index.php?frame=3"); 
?>