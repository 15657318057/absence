<?php
require_once('./json.php');
error_reporting(E_ALL || ~E_NOTICE);
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
session_start();
$id = $_SESSION['id'];
$link=mysql_connect('localhost','root','123456');
if(!$link){
echo "fail";
}
mysql_select_db("checkattendance");
mysql_query("set names utf8");
$sql = "select * from user where id=".$id;
$result=mysql_query($sql);
$data =array(); 
class User
{
	public $id ;
	public $name;
	public $phone;
	public $email;
}
while ($row= mysql_fetch_array($result))
{
	$User =new User();
	$User->id = $row["id"];
	$User->name = $row['name'];
	$User->phone = $row['phone'];
	$User->email = $row['email'];
	$data[]=$User;
	}
	$test = json_encode($data);
	echo $test;
	// Response::json(200,'success',$test);
?>