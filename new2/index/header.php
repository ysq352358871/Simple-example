<?php
	include "../db.php";
	session_start();
	if(!isset($_SESSION["username"])){
		$mesege="请输入账号密码！";
		$url="login.php";
		include "add_success.php";
		exit;
	}
	if(!isset($_GET["id"])){
		$id=null;
	}else{
		$id=$_GET["id"];
	}
	$sql="select * from catagory where pid=0";
	$result=$db->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<script src="../jquery.min.js"></script>
		<style type="text/css">
			*{
				padding: 0;
				margin: 0;
				list-style: none;
				text-decoration: none;
			}
			header{
				height: 200px;width: 800px;
				border: 1px solid #ccc;
				margin: auto;
			}
			nav{
				height: 30px;
				width: 800px;
				background-color:#6495ED;
				margin: auto;
			}
			.opt{
				position: relative;
				float: left;
				width: 20%;
				height: 100%;
				line-height: 30px;
				text-align: center;
			}
			.opt.select{
				background-color: red;
			}
			.opt .catagory{
				display: block;
				width: 100%;
				height: 100%;
				color: #fff;
			}
			.opt .son{
				width: 100%;
				height: auto;
				position: absolute;
				top: 30px;
				left: 0;
				display: none;
				/*background: red;*/
			}
			.opt .son li{
				width: 100%;
				height: 30px;
				text-align: center;
				line-height: 30px;
				border: 1px solid #CCCCCC;
				border-top:none;
			}
			.wrap{
				width: 800px;
				height: auto;
				margin: auto;
				
			}
			.wrap .con{
				float: left;
				margin-top: 20px;
				width: 20%;
				height: 100px;
				background: #E6E6FA;
				margin-right: 40px;
			}
			.wrap .con a{
				display: block;
				width: 100%;
				height: 100%;
				line-height:100px;
				text-align: center;
			}
			.list{
				height: 30px;
				width: 100%;
				line-height: 30px;
			}
			.list a{
				color: #666;
			}
			.list a:hover .one{
				color: #FFA500;
			}
			.show .title{
				width: 100%;
				height: 30px;
				line-height: 30px;
				text-align: center;
			}
			.show .inner{
				width: 100%;
				height: auto;
				word-wrap: break-word;
				word-break: normal;
				text-indent: 17px;
			}
			.wrap_box{
				width: 100%;
				height: auto;
			}
			.wrap_box span{
				display: block;
				margin: auto;
				height: 20px;
				line-height: 20px;
				text-align: center;
			}
		</style>
		<script type="text/javascript">
			$(function(){
				$(".opt").hover(function(){
					$(this).find(".son").slideDown();
				},function(){
					$(this).find(".son").slideUp();
				})
			})
		</script>
	</head>
	<body>
		<header>我是顶部</header>
		<nav>
			<ul class="menu">
				<li class="opt <?php if(!isset($_GET["id"])){ echo "select"; } ?>">
					<a href="index.php?" class="catagory">首页</a>
				</li>
			<?php 
				while($row=$result->fetch_assoc()){
			?>
				<li class="opt <?php if($id==$row["cid"]){ echo "select"; } ?>">
					<a href="catagory.php?id=<?php echo $row["cid"] ?>" class="catagory"><?php echo $row["cname"] ?></a>
					<ul class="son">
						<?php
							$sql="select * from catagory where pid=".$row["cid"];
							$result1=$db->query($sql);
							while($row1=$result1->fetch_assoc()){
						?>	
						<li><a href="list.php?id=<?php echo $row1["cid"];?>"><?php echo $row1["cname"] ?></a></li>
						<?php
							}
						?>
						
					</ul>
				</li>
			<?php 
				}
			?>
				
			</ul>
		</nav>