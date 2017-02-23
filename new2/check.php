<?php
	include "db.php";
	session_start();
	$username=$_POST["username"];
	$password=md5($_POST["pass"]);
	$_SESSION["username"]=$username;
	$sql="select * from user";
	$result=$db->query($sql);
	while($row=$result->fetch_assoc()){
		if($row["username"]==$username){
			if($row["password"]==$password){
				$_SESSION["username"]=$username;
				include "main.php";
			}else{
				$mesege="账号或密码错误！";
				$url="login.php";
				include "add_success.php";
			}
		}else{
			$mesege="账号或密码错误！";
			$url="login.php";
			include "add_success.php";
		}
	}
?>