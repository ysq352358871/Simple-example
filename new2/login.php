<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<script src="jquery.min.js"></script>
	<style>
		*{
		padding: 0;
		margin: 0;
		list-style: none;
	}
	.bigbox{
		width: 500px;
		height: 355px;
		margin: 20px auto;
		border:1px solid #FA5454;
		
	}
	.box{
		height: 40px;
		width: 415px;
		line-height: 40px;
		margin: auto auto;
		margin-top: 20px;
	}
	input{
		height: 30px;;
	}
	.box_inner{
		margin-left: 91px;
	}
	form{
		display: inline-block;
		margin-top:85px;
		/*text-align: center;*/
	}
	.box_inner1{
		margin-left: 74px;
	}
	.anniu{
		width: 65px;
		height: 30px;
		margin-left:139px;
		margin-top:10px
	}
	span{
		color: red;
	}
	</style>
</head>
<body>
	<div class="bigbox">
		<form action="check.php" method="post">
			<div class="box box_inner1">
			用户名：<input type="text" name="username" flag="false" autocomplete="off"/><span></span>
			</div>
			<div class="box box_inner">
			密码：<input type="password" name="pass" flag="false" autocomplete="off"/><span></span><br/>
			</div>
			<div >
			 <input type="submit" name="btn" value="登录" class="anniu"/><br/>
			 </div>
			 还没有账号？点击此处<a href="reg.php">注册</a>
		</form>
	</div>
</body>
</html>