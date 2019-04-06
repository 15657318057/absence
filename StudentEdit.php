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
$sno = $_POST['sno'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$class = $_POST['class'];
$academy = $_POST['academy'];
$mac_address = $_POST['mac_address'];
$sql  = "update student set name='".$name."',phone='".$phone."',class='".$class."',academy='".$academy."',mac_address='".$mac_address."' where id=".$id;
$result=mysql_query($sql);
header("Location:index.php?frame=3"); 
?>