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
			<th>sid</th>
			<th>标题</th>
			<th>内容</th>
			<th>cid</th>
			<th>时间</th>
			<th>作者</th>
			<th>操作</th>
		</tr>
		<?php
			$sql="select * from shows";
			$result=$db->query($sql);
			while($row=$result->fetch_assoc()){
		?>
			<tr>
				<td><?php echo $row["sid"] ?></td>
				<td><?php echo $row["stitle"] ?></td>
				<td><?php echo $row["scon"] ?></td>
				<td><?php echo $row["cid"] ?></td>
				<td><?php echo $row["stime"] ?></td>
				<td><?php echo $row["username"] ?></td>
				<td><a href="delCon.php?id=<?php echo $row["sid"] ?>">删除</a><a href="updateCon.php?id=<?php echo $row["sid"] ?>&cid=<?php echo $row["cid"] ?>">编辑</a></td>
			</tr>
		<?php
			}
		?>
	</table>
</body>
</html>