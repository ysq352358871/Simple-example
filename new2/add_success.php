<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<style>
		.box{
			width: 400px;
			height: 200px;
			margin: auto;
			border: 1px solid #ccc;
		}
		.title{
			width: 100%;
			height: 30px;
			line-height: 30px;
			text-align: center;
			background: #f80;
			border: 1px solid #ccc;
		}
		.con{
			width: 100%;
			height: 170px;
			line-height: 30px;
			text-align: center;
		}
	</style>
	<script>
		window.onload=function(){
			var span=document.getElementsByTagName("span")[0];
			var num=5;
			var url=document.querySelector("a").href;
			var t=setInterval(function(){
				num--;
				if(num<0){
					clearInterval(t);
					location.href=url;
				}else{
					span.innerHTML=num;
				}
			},1000)
		}
	</script>
	<!--<?php session_start(); ?>-->
	<div class="box">
		<div class="title">提示信息</div>
		<div class="con">
			<p><?php echo $mesege; ?></p>
			<span>5</span>秒后自动跳转
			<p>如果不跳转，<a href="<?php echo $url; ?>">点击此处</a></p>
		</div>
	</div>
</head>
</html>