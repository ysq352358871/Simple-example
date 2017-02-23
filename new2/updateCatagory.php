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
	$currentId=$_GET["id"];
	$tree=new fun();
	$tree->tree(0,1,"catagory",$db,$currentId);
	$sql="select * from catagory where cid=".$currentId;
	$result=$db->query($sql);
	$row=$result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<form action="updateCatagoryCheck.php?id=<?php echo $row["cid"] ?>" method="post">
		修改上级分类<select name="pid">
					<option value="0">一级分类</option>
					<?php 
						echo $tree->str;
					 ?>
			</select><br/><br/>
		修改分类<input type="text" name="cname" value="<?php echo $row["cname"] ?>"/><br/><br/>
				<input type="submit" value="提交" /><br/>
	</form>
</body>
</html>