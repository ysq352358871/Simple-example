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
	$tree=new fun();
	$tree->table(0,1,"catagory",$db);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<style>
		*{
				margin: 0;
				padding: 0;
		}
		table{
			width:600px;
			border: 1px solid red;
			border-collapse: collapse;
			margin: 0 auto;
			table-layout:fixed ;
		}
		td,th{
			border: 1px solid red;
			text-align: center;
			height: 30px;
		}
		a{
			text-decoration:none;
		}
			
	</style>
</head>
<body>
	<table>
		<tr>
			<th>id</th>
			<th>分类名称</th>
			<th>父类id</th>
			<th>操作</th>
		</tr>
		<?php 
			echo $tree->str;
		?>
	</table>
</body>
</html>