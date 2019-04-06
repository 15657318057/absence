<?php
require_once('./json.php');
error_reporting(E_ALL || ~E_NOTICE);
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
$link=mysql_connect('localhost','root','123456');
$sno = $_POST['sno'];
if(!$link){
die("mysql_connect_failed".mysql_connect_error());
}
mysql_select_db("checkattendance");
mysql_query("set names utf8"); 
$sql = "select count(*) as num from arrive_time where sno=".$sno." and is_late=1";

$result=mysql_query($sql);          
$data =array(); 
class PersonAbsence
{
	public $num;
}
while ($row= mysql_fetch_array($result))
{
	$PersonAbsence =new PersonAbsence();
	$PersonAbsence->num = $row['num'];
	$data[]=$PersonAbsence;
}
	$test = json_encode($data);
	echo $test;
	// Response::json(200,'success',$test);
?>