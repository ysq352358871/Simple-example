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
	$sid=$_GET["id"];
	$currentId=$_GET["cid"];
	$tree=new fun();
	$tree->treeCon(0,1,"catagory",$db,$currentId);
	$sql="select * from shows where sid=".$sid;
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
	<form action="updateConCheck.php?id=<?php echo $sid ?>" method="post">
		上级分类<select name="pid">
					<option value="0">一级分类</option>
					<?php 
						echo $tree->str;
					 ?>
			</select><br/><br/>
		标题<input type="text" name="stitle" value="<?php echo $row["stitle"] ?>" /><br/>
		内容<br/><textarea name="scon" rows="" cols=""><?php echo $row["scon"] ?></textarea><br/><br/>
		<input type="submit" name="" id="" value="提交" />
	</form>
</body>
</html>