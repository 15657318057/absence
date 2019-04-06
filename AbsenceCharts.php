<?php
require_once('./json.php');
error_reporting(E_ALL || ~E_NOTICE);
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
$link=mysql_connect('localhost','root','123456');
$item = $_POST['item'];
if(!$link){
die("mysql_connect_failed".mysql_connect_error());
}
mysql_select_db("checkattendance");
mysql_query("set names utf8"); 
if ($item=='academy') {
	$sql = "select academy as name,count(*) as num from arrive_time left join student on arrive_time.sno=student.sno where is_late=1 group by academy";
}else{
	$sql =  "select class as name,count(*) as num from arrive_time left join student on arrive_time.sno=student.sno where is_late=1 group by class";
}

$result=mysql_query($sql);          
$data =array(); 
class Absence
{
	public $name;
	public $num;
}
while ($row= mysql_fetch_array($result))
{
	$Absence =new Absence();
	$Absence->name = $row['name'];
	$Absence->num = $row['num'];
	$data[]=$Absence;
}
	$test = json_encode($data);
	echo $test;
	// Response::json(200,'success',$test);
?>