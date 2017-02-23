<?php
	include "db.php";
	$username=$_POST["username"];
	$password=md5($_POST["pass"]);
	$sql="insert into user (username,password,role) values ('$username','$password','1')";
	$db->query($sql);
	if($db->affected_rows>0){
		$mesege="注册成功！";
		$url="login.php";
		include "add_success.php";
	}
?>