<!DOCTYPE html>     
<html>     
<head>       
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<meta name="viewport" content="width=device-width, initial-scale=0.5">  
<!--<script src="cordova.js"></script>-->     
<link rel="stylesheet" href="jquery.mobile.min.css" />     
<script src="jquery-1.7.1.min.js"></script>     
<script src="jquery.mobile.min.js"></script>  
</head>               
<body>     
<div data-role="page">
<?php include('sql_connect.php'); ?> 
<?php header("Content-Type:text/html;charset=UTF-8"); ?>
<?php 
	$zhanghao=$_GET["zhanghao"];		//获取注册的账号
	$nicheng=$_GET["nicheng"];			//获取注册的昵称
	$mima=$_GET["mima"];				//获取注册的密码
19	?>
<?php
	$sql=new SQL_CONNECT();			//连接到数据库
	$sql->connection();					//连接
	$sql->set_laugue();					//设置编码
	$sql->choice();						//选择数据库
	
	$sql_query="SELECT * FROM user";
	$result=mysql_query($sql_query,$sql->con);
	$num=1;
	while($row = mysql_fetch_array($result))
	{
		$num=$num+1;
	}
	$sql_query="INSERT INTO user 
			(user_id,user_name,user_nicheng,password) 
				VALUES 	($num,$zhanghao,$nicheng,$mima)";
	mysql_query($sql_query);
	$sql->disconnect();
?>
<script>
	location.href="index.php";				//跳转回主页
</script>
</div>
</body>     
</html>