<?php
@$connect = mysql_connect('localhost','root','123456');
mysql_set_charset("utf8",$connect);
if (!$connect) {
	die('数据库连接失败！'.mysql_error());
}
$link = mysql_select_db('checkattendance',$connect);
mysql_query("set names utf8");
if (!$link) {
	die('无法连接'.mysql_error());
}
$username = $_POST['username'];
$userpwd = md5($_POST['password']);
if (!empty($username)&&!empty($userpwd)) {
	$sql = "select count(*) from user where id = '".$username."'";
	$result = mysql_query($sql);
	$count = mysql_fetch_array($result);
	if ($count[0]<1) {
		echo "<meta charset='utf-8'>";
		echo "<script language=javascript>alert('此用户不存在');</script>";
		echo "<script language=javascript>window.location.href='login.html'</script>";
	}
	else{
		$sql = "select * from user where id = '".$username."'";
		$result = mysql_query($sql);
		$user = mysql_fetch_array($result,MYSQL_ASSOC);
		if ($user['password']!=$userpwd) {
			echo "<meta charset='utf-8'>";
			echo "<script language=javascript>alert('密码错误');</script>";
			echo "<script language=javascript>window.location.href='login.html'</script>";
		}
		else{
			session_start();
			$_SESSION['id'] = $user['id'];	
			$_SESSION['username'] = $user['name'];			
			echo "<meta charset='utf-8'>";
			echo "<script language=javascript>window.location.href='index.php?frame=1'</script>";			
		}
	}	
}else{
	echo "<meta charset='utf-8'>";
	echo "<script language=javascript>alert('用户名，密码不能为空。');</script>";
	echo "<script language=javascript>window.location.href='login.html'</script>";
}
?>