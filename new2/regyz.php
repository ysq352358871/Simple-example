<?php
	include "db.php";
	$username=$_GET["username"];
	$sql="select username from user";
	$result=$db->query($sql);
	while($row=$result->fetch_assoc()){
		if($row["username"]==$username){
			echo "error";
			exit;
		}
	}
?>