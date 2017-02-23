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
	<form action="addCatagoryCheck.php" method="post">
		上级分类<select name="pid">
					<option value="0">一级分类</option>
					<?php 
						echo $tree->str;
					 ?>
			</select><br/><br/>
		添加分类<input type="text" name="cname"/><br/><br/>
				<input type="submit" value="提交" /><br/>
	</form>
</body>
</html>