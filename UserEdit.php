<?php
error_reporting(E_ALL || ~E_NOTICE);
header("Content-Type:application/json;charset=UTF-8");
$link=mysql_connect('localhost','root','123456');
if(!$link){
echo "fail";
}
mysql_select_db("checkattendance");
mysql_query("set names utf8");
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$sql  = "update user set name='".$name."',phone='".$phone."',email='".$email."' where id=".$id;
$result=mysql_query($sql);
session_start();	
$_SESSION['username'] = $name;
header('Content-Type:text/html;charset=utf-8');
echo '<script type="text/javascript">';
echo 'alert("修改成功！");';
echo 'window.location.href="personinfo.html"';
echo '</script>';
?>