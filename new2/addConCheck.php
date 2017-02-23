<?php
	include "db.php";
	session_start();
	if(!isset($_SESSION["username"])){
		$mesege="请输入账号密码！";
		$url="login.php";
		include "add_success.php";
		exit;
	}
	$cid=$_GET["pid"];
	$stitle=$_GET["stitle"];
	$scon=$_GET["scon"];
	$username=$_SESSION["username"];
	$sql="insert into shows (stitle,scon,cid,username) values ('$stitle','$scon','$cid','$username')";
	$db->query($sql);
	if($db->affected_rows>0){
		$mesege="添加成功！";
		$url="addCon.php";
		include "add_success.php";
		exit;
	}
?>