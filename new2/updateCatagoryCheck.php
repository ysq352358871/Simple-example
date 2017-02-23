<?php
	include "db.php";
	session_start();
	if(!isset($_SESSION["username"])){
		$mesege="请输入账号密码！";
		$url="login.php";
		include "add_success.php";
		exit;
	}
	include "function.php";
	$cid=$_GET["id"];
	$pid=$_POST["pid"];
	$cname=$_POST["cname"];
	$sql="update catagory set cname='$cname',pid='$pid' where cid=".$cid;
	$db->query($sql);
	if($db->affected_rows>0){
		$mesege="修改成功！";
		$url="ediCatagory.php";
		include "add_success.php";
		exit;
	}
?>