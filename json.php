<?php
/*
*按json方式输出
*@param integer $code 状态码
*@param string $message 提示信息
*@param array $data 数据
*return string
*/
class Response{
	public static function json($code,$message ="",$data=array()){
	if(!is_numeric($code)){
		return"";
	}
	$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data,
	);
	echo json_encode($result);
	exit;
	}
}
?>