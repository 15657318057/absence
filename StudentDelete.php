<?php
error_reporting(E_ALL || ~E_NOTICE);
header("Content-Type:application/json;charset=UTF-8");
$id = $_POST['id'];
$link=mysql_connect('localhost','root','123456');
if(!$link){
echo "fail";
}
mysql_select_db("checkattendance");
$sql  = "delete from student where id=".$id;
$result=mysql_query($sql);
header("Location:index.php"); 
?>