<?php
require_once('./json.php');
error_reporting(E_ALL || ~E_NOTICE);
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
$id = $_GET['id'];
$link=mysql_connect('localhost','root','123456');
if(!$link){
echo "fail";
}
mysql_select_db("checkattendance");
mysql_query("set names utf8");
$sql = "select * from student where id=".$id;
$result=mysql_query($sql);
$data =array(); 
class Student
{
	public $id ;
	public $sno;
	public $name;
	public $phone;
	public $class;
	public $academy;
	public $mac_address;
}
while ($row= mysql_fetch_array($result))
{
	$Student =new Student();
	$Student->id = $row["id"];
	$Student->sno = $row['sno'];
	$Student->name = $row['name'];
	$Student->phone = $row['phone'];
	$Student->class = $row['class'];
	$Student->academy = $row['academy'];
	$Student->mac_address = $row['mac_address'];
	$data[]=$Student;
	}
	$test = json_encode($data);
	echo $test;
	// Response::json(200,'success',$test);
?>