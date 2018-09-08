<!DOCTYPE html>     
<html>     
<head>       
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />   
<meta name='viewport' content='width=device-width, initial-scale=0.5'>  
<link rel='stylesheet' href='jquery.mobile.min.css' />     
<script src='jquery-1.7.1.min.js'></script>     
<script src='jquery.mobile.min.js'></script>   
</head>               
<body>  
<?php include('sql_connect.php'); ?>
<?php
	$pid=$_GET['pid'];
	$high_case=($pid+1)*20;
	$low_case=$pid*20;
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();
		
	$sql_query="SELECT * FROM word_info LIMIT $low_case,$high_case";
	$result=mysql_query($sql_query,$sql->con);
	$num=1;
?>   
<?php
while($row = mysql_fetch_array($result))
{
	echo "<div data-role='page' id='word_";
	echo $num;
	$num=$num+1;
	echo "'>";
	echo "<div data-role='header' data-position='fixed'>";
	echo "<a data-role='button' href='index.php'>返回</a>";
	echo "<h1>英语6级核心词汇 （";
	echo $pid+1;
	echo "_";
	echo $num-1;
	echo "）</h1>";
	echo "</div>";
	echo "<div data-role='content'>";
	echo "<h1>";
	echo $row['word_english'];
	echo "</h1>";
	$num_id=$row['word_id'];
	$sql_query="SELECT * FROM word_chinese WHERE word_id=$num_id";
	$result1=mysql_query($sql_query,$sql->con);
	while($row1 = mysql_fetch_array($result1))
	{
	echo "<p>";
	echo $row1['word_type'];
	echo ".";
	echo $row1['word_chinese'];
	echo "</p>";
	}
	echo "</div>";
	echo "<div data-role='footer' data-position='fixed'><div data-role='navbar'><ul><li>";
	if(num<20)
	{
		echo "<a id='chat' href='#word_";
		echo $num;
	}
	else
	if(num<20)
	{
		echo "<a id='chat' href='index.php";
	}
	echo "' data-icon='check' class='ui-icon-nodisc' data-iconshadow='false'>下一个</a>";
	echo "</li></ul></div></div></div>";
}
?>
</body> 
<?php
	$sql->disconnect();
?>    
</html>
