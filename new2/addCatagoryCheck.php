<?php
	include "db.php";
	session_start();
	if(!isset($_SESSION["username"])){
		$mesege="请输入账号密码！";
		$url="login.php";
		include "add_success.php";
		exit;
	}
	$pid=$_POST["pid"];
	$cname=$_POST["cname"];
	$sql="insert into catagory (cname,pid) values ('$cname','$pid')";
	$db->query($sql);
	if($db->affected_rows>0){
		$mesege="添加分类成功！";
		$url="addCatagory.php";
		include "add_success.php";
		exit;
	}
?>