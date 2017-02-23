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
	$tree=new fun();
	$tree->tree(0,1,"catagory",$db);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<form action="addConCheck.php">
		上级分类<select name="pid">
					<option value="0">一级分类</option>
					<?php 
						echo $tree->str;
					 ?>
			</select><br/><br/>
		标题<input type="text" name="stitle" value="" /><br/>
		内容<br/><textarea name="scon" rows="" cols=""></textarea><br/><br/>
		<input type="submit" name="" id="" value="提交" />
	</form>
</body>
</html>