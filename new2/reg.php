<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<script src="jquery.min.js"></script>
	<script src="ajax.js"></script>
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
		border:1px solid #F60;
		background-color: #FA5454;
	}
	.box{
		height: 40px;
		width: 430px;
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
	}
	.box_inner1{
		margin-left: 74px;
	}
	.box_inner2{
		margin-left: 60px;
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
	<script type="text/javascript">
		$(function(){
			var reg=/^\w{5,10}$/;
			/*用户名检测*/
			$("input[name=username]").keydown(function(){
				$(this).keyup(function(){
					var value=$(this).val();
					
					if(!reg.test(value)){
						$(".box_inner1 span").html("格式不正确！").css("color","red");
						$(this).attr("flag","false");
						$("input[name=btn]").attr("disabled","disabled");
					}else{
						$(".box_inner1 span").html("格式正确！").css("color","green");
						ajax({
							url:"regyz.php",
//							type:"post",
							data:{username:value},
							success:function(obj){
								if(obj=="error"){
									$(".box_inner1 span").html("用户名已存在！").css("color","red");
									$("input[name=username]").attr("flag","false");
									$("input[name=btn]").attr("disabled","disabled");
								}else{
									$(".box_inner1 span").html("用户名可用！").css("color","green");
									$("input[name=username]").attr("flag","true");
									if($("input[name=username]").attr("flag")=="true"&&$("input[name=pass]").attr("flag")=="true"){
										$("input[name=btn]").removeAttr("disabled");
									}
								}
							}
						})
					}
				})
			})
			/*密码检测*/
		  	$("input[name=pass]").keydown(function(){
		  		$(this).keyup(function(){
		  			var value=$(this).val();
					if(!reg.test(value)){
						$(".box_inner span").html("格式不正确！").css("color","red");
						$(this).attr("flag","false");
						$("input[name=btn]").attr("disabled","disabled");
					}else{
						$(".box_inner span").html("格式正确！").css("color","green");
						$(this).attr("flag","true");
						if($("input[name=username]").attr("flag")=="true"&&$("input[name=pass]").attr("flag")=="true"){
							$("input[name=btn]").removeAttr("disabled");
						}
					}
		  		})
		  	})	
		})
	</script>
</head>
<body>
	<div class="bigbox">
		<form action="add.php" method="post">
			<div class="box box_inner1">
			用户名：<input type="text" name="username"/><span></span>
			</div>
			<div class="box box_inner">
			密码：<input type="text" name="pass"/><span></span><br/>
			</div>
			<!--<div class="box box_inner2">
			再次密码：<input type="password" name="passtwo" flag="false"/><span></span><br/>
			</div>-->
			<div >
			 <input type="submit" name="btn" value="注册" class="anniu" /><br/>
			 </div>
		</form>
	</div>
</body>
</html>