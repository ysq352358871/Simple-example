<?php
	include "db.php";
	include "function.php";
	session_start();
	if(!isset($_SESSION["username"])){
		$mesege="请输入账号密码！";
		$url="login.php";
		include "add_success.php";
		exit;
	}
	$sid=$_GET["id"];
	$sql="delete from shows where sid=".$sid;
	$db->query($sql);
	if($db->affected_rows>0){
		$mesege="删除成功！";
		$url="ediCon.php";
		include "add_success.php";
		exit;
	}else{
		$mesege="删除失败！";
		$url="ediCon.php";
		include "add_success.php";
		exit;
	}
?>