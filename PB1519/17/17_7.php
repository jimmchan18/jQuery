<!DOCTYPE html>     
<html>     
<head>       
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<meta name="viewport" content="width=device-width, initial-scale=0.5">  
<!--<script src="cordova.js"></script>-->     
<link rel="stylesheet" href="jquery.mobile.min.css" />     
<script src="jquery-1.7.1.min.js"></script>     
<script src="jquery.mobile.min.js"></script>  
<script>
function post()
{
	//获取账号的值
	$zhanghao=$("#zhanghao").val();
     //获取昵称的值
	$nicheng=$("#nicheng").val();
	//获取密码的值
	$mima=$("#mima").val();
	//将获取的值通过URL传送给reg.php
	$site="reg.php?zhanghao="+$zhanghao+"&nicheng="+$nicheng+"&mima="+$mima;
	location.href=$site;
}
</script> 
</head>               
<body>     
<div data-role="page">
	<div data-role="header" data-position="fixed">
		<h1>XX大学表白墙</h1>
	</div>
	<!--内容栏，用来填写注册信息-->
	<div data-role="content">
		<form>
			<label for="zhanghao">账号:</label>
			<input name="zhanghao" id="zhanghao" value="" type="text">
			<label for="nicheng">昵称（请尽量使用真实姓名）:</label>
			<input name="nicheng" id="nicheng" value="" type="text">
			<label for="zhanghao">密码:</label>
			<input name="mima" id="mima" value="" type="text">
			<a data-role="button" onclick="post()">注册</a>
		</form>
	</div>
	<div data-role="footer" data-position="fixed">
		<div  data-role="navbar" data-position="fixed">    
			<ul>        
				<li><a href="index.php">表白墙</a></li>        
				<li><a href="login.php">登录</a></li>        
				<li><a href="regist.php">注册</a></li>          
			</ul>    
		</div>
	</div>
</div>
</body>     
</html>