<?php
//	session_start();
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
	<title>内容管理系统</title>
	<script src="jquery.min.js"></script>
</head>
<style>
	*{
		box-sizing: border-box;
		padding: 0;
		margin: 0;
		list-style: none;
	}
	html,body{
		width: 100%;
		height: 100%;
	}
	.header{
		width:100%;
		height:20%;
		border-bottom:2px solid #000;
		text-align:center;
	}
	.main{
		width:100%;
		height:80%;
	}
	.left{
		width:20%;
		height:100%;
		float:left;
		border-right:2px solid #000;
	}
	.right{
		width:80%;
		height:100%;
		float:right;
	}
	.opt{
		cursor: pointer;
	}
	iframe{
		width: 100%;
		height: 100%;
	}
</style>
<body>
	<div class="header">
		<h1>欢迎来到内容管理系统</h1>
	</div>
	<div class="main">
		<div class="left">
			<ul class="menu">
				<li class="opt">
					用户管理
					<ul class="son">
						<li><a href="1.html" target="right">添加用户</a></li>
						<li><a href="2.html" target="right">管理用户</a></li>
					</ul>
				</li>
				<li class="opt">
					分类管理
					<ul class="son">
						<li><a href="addCatagory.php" target="right">添加分类</a></li>
						<li><a href="ediCatagory.php" target="right">管理分类</a></li>
					</ul>
				</li>
				<li class="opt">
					内容管理
					<ul class="son">
						<li><a href="addCon.php" target="right">添加内容</a></li>
						<li><a href="ediCon.php" target="right">管理内容</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="right">
			<iframe src="" frameborder="0" name="right"></iframe>
		</div>
	</div>
</body>
<script>
	$(function(){
		$(".opt").click(function(){
			$(this).find(".son").toggle();
		})
		$("a").on("click",function(event){
			event.stopPropagation();
		})
	})
</script>
</html>