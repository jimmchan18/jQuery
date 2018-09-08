<!DOCTYPE html>     
<html>     
<head>       
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />   
<meta name='viewport' content='width=device-width, initial-scale=0.5'>  
<!--<script src='cordova.js'></script>-->     
<link rel='stylesheet' href='jquery.mobile.min.css' />     
<script src='jquery-1.7.1.min.js'></script>     
<script src='jquery.mobile.min.js'></script>   
</head>               
<body>  
<?php include('sql_connect.php'); ?>
<?php
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();
		
	$sql_query="SELECT * FROM word_info";
	$result=mysql_query($sql_query,$sql->con);
	$num=0;
	while($row = mysql_fetch_array($result))
	{
		$num=$num+1;
	}
	$num=($num-($num%20))/20 + 1;
	$i=0;
?>   
<div data-role="page">
	<div data-role="header" data-position="fixed">
		<h1>英语6级核心词汇</h1>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-inset="true">
		<?php
			for($i=0;$i<$num;$i++)
			{
				echo "<li><a href='";
				echo "word.php?pid=";
				echo $i;
				echo "'>第";
				echo $i+1;
				echo "部分</a></li>";
			}
		?>
		</ul>
	</div>
	<div data-role="footer" data-position="fixed">
		<h1>好好学习 天天向上</h1>
	</div>
</div>
<?php
	$sql->disconnect();
?>
</body>     
</html>
