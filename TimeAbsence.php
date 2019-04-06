<?php
require_once('./json.php');
error_reporting(E_ALL || ~E_NOTICE);
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
$link=mysql_connect('localhost','root','123456');
$time = $_POST['time'];
// $time='week';
if(!$link){
die("mysql_connect_failed".mysql_connect_error());
}
mysql_select_db("checkattendance");
mysql_query("set names utf8"); 
if ($time=='week') {
	$sql = "select DATE_FORMAT(time,'%w') as name,COUNT(*) as num FROM arrive_time where is_late=1 GROUP BY name ORDER BY name ASC";
}elseif($time=='day'){
	$sql = "select DATE_FORMAT(time,'%e')-'0' as name,COUNT(*) as num FROM arrive_time where is_late=1 GROUP BY name ORDER BY name ASC";
}else{
	$sql= "select DATE_FORMAT(time,'%m') as name,COUNT(*) as num FROM arrive_time where is_late=1 GROUP BY name ORDER BY name ASC";
}

$result=mysql_query($sql);          
$data =array(); 
function getName($time,$name){
	if ($time=='week') {
	switch ($name) {
	case '0':return '周日';
	break;
	case '1':return '周一';
	break;
	case '2':return '周二';
	break;
	case '3':return '周三';
	break;
	case '4':return '周四';
	break;
	case '5':return '周五';
	break;	
	default:return '周六';
		break;
	}
	}elseif ($time=='month') {
	switch ($name) {
	case '01':return '一月';
	break;
	case '02':return '二月';
	break;
	case '03':return '三月';
	break;
	case '04':return '四月';
	break;
	case '05':return '五月';
	break;
	case '06':return '六月';
	break;	
	case '07':return '七月';
	break;
	case '08':return '八月';
	break;
	case '09':return '九月';
	break;
	case '10':return '十月';
	break;
	case '11':return '十一月';
	break;	
	default:return '十二月';
		break;
	}
	}else{
		return $name;
	}
}
class Absence
{
	public $name;
	public $num;
}
while ($row= mysql_fetch_array($result))
{
	$Absence =new Absence();
	$Absence->name = getName($time,$row['name']);
	$Absence->num = $row['num'];
	$data[]=$Absence;
}
	$test = json_encode($data);
	echo $test;
	// Response::json(200,'success',$test);
?>