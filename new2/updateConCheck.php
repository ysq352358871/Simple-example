<?php
	include "db.php";
	session_start();
	if(!isset($_SESSION["username"])){
		$mesege="请输入账号密码！";
		$url="login.php";
		include "add_success.php";
		exit;
	}
	$sid=$_GET["id"];
	$cid=$_POST["pid"];
	$stitle=$_POST["stitle"];
	$scon=$_POST["scon"];
	$sql="update shows set stitle='$stitle',scon='$scon',cid='$cid' where sid=".$sid;
	$db->query($sql);
	if($db->affected_rows>0){
		$mesege="修改成功！";
		$url="ediCon.php";
		include "add_success.php";
		exit;
	}else{
		$mesege="修改失败！";
		$url="updateCon.php";
		include "ediCon.php";
		exit;
	}
?>