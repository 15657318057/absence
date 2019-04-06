<?php
require_once('./json.php');
error_reporting(E_ALL || ~E_NOTICE);
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
$link=mysql_connect('localhost','root','123456');
if(!$link){
echo "fail";
}
mysql_select_db("checkattendance");
$sql = "select * from classroom";
mysql_query("set names utf8");
$result=mysql_query($sql);
$data =array(); 
class Classroom
{
	public $id ;
	public $roomname;
}
while ($row= mysql_fetch_array($result))
{
	$Classroom =new Classroom();
	$Classroom->id = $row["id"];
	$Classroom->roomname = $row['roomname'];
	$data[]=$Classroom;
	}
	$test = json_encode($data);
	echo $test;
	// Response::json(200,'success',$test);
?>