<?php
error_reporting(E_ALL || ~E_NOTICE);
header("Content-Type:application/json;charset=UTF-8");
 $id= $_POST['delitems'];
$link=mysql_connect('localhost','root','123456');
if(!$link){
echo "fail";
}
mysql_select_db("checkattendance");
mysql_query("set names utf8");
$sql  = "delete from arrive_time where id in (".$id.")";
$result=mysql_query($sql);
?>