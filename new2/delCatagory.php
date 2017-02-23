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
	$cid=$_GET["id"];
	$tree=new fun();
	$tree->delete($cid,"catagory",$db);
?>