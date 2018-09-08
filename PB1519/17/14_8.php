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
	$zhanghao=$_GET["zhanghao"];
	$nicheng=$_GET["nicheng"];
	$mima=$_GET["mima"];
?>
<?php
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();
	
	$sql_query="SELECT * FROM user";
	$result=mysql_query($sql_query,$sql->con);
	$num=1;
	while($row = mysql_fetch_array($result))
	{
		$num=$num+1;
	}
	$sql_query="INSERT INTO user (user_id,user_name,user_nicheng,password) VALUES ($num,$zhanghao,$nicheng,$mima)";
	mysql_query($sql_query);
	$sql->disconnect();
?>
<script>
	location.href="index.php";
</script>
</div>
</body>     
</html>