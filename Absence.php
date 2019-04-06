<?php
require_once('./json.php');
error_reporting(E_ALL || ~E_NOTICE);
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
$link=mysql_connect('localhost','root','123456');
if(!$link){
die("mysql_connect_failed".mysql_connect_error());
}
mysql_select_db("checkattendance");
mysql_query("set names utf8");
$page=$_GET['page'];
$pagesize=$_GET['pagesize'];              
$sql=($page-1)*$pagesize;    
$result=mysql_query("select arrive_time.id,arrive_time.sno,name,time,roomname,is_late from arrive_time left join student on arrive_time.sno = student.sno order by time asc limit {$sql},{$pagesize}");          
$data =array(); 
class Arrive
{
	public $id;
	public $sno;
	public $name;
	public $time;
	public $roomname;
	public $is_late;
}
while ($row= mysql_fetch_array($result))
{
	$Arrive =new Arrive();
	$Arrive->id = $row[0];
	$Arrive->sno = $row['sno'];
	$Arrive->name = $row['name'];
	$Arrive->time = $row['time'];
	$Arrive->roomname = $row['roomname'];
	$Arrive->is_late = $row['is_late']=="1"?"是":"否";
	$data[]=$Arrive;
	}
	$test = json_encode($data);
	echo $test;
	// Response::json(200,'success',$test);
?>