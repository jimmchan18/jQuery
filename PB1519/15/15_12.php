<!DOCTYPE html>     
<html>     
<head>     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<meta name="viewport" content="width=device-width, initial-scale=1">  
<!--<script src="cordova.js"></script>-->   
<link rel="stylesheet" href="jquery.mobile.min.css" />     
<script src="jquery-1.7.1.min.js"></script>     
<script src="jquery.mobile.min.js"></script>    
</head> 
<body>
<?php 
	include("sql_connect.php"); 
?>
<?php
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();
	
	$sql_query="SELECT * FROM zhuanji_info,zhuanji,singer_info,music_info WHERE zhuanji.zhuanji_id=zhuanji_info.zhuanji_id AND zhuanji.music_id=music_info.music_id AND zhuanji_info.singer_id=singer_info.singer_id";
	$result=mysql_query($sql_query,$sql->con);
?>	
	<div data-role="page" data-theme="a">
		<div data-role="header" data-position="fixed">
			<a href="#">返回</a>
			<h1>最新专辑</h1>
		</div>
        <ul data-role="listview" data-inset="true">
		<?php
			while($row = mysql_fetch_array($result))
			{
			echo "<li><a href='";
			echo "list_zhuanji.php?zhuanji_id=";
			echo $row['zhuanji_id'];
			echo "'>";
			echo "<img src='images/";
			echo $row['zhuanji_pic'];
			echo ".jpg'>";
			echo "<h2>";
			echo $row['zhuanji_name'];
			echo "</h2>";
			echo "<p>";
			echo $row['zhuanji_singer'];
			echo "</p></a>";
			echo "</li>";
			}
		?>
		</ul>
	</div>
	<?php 		
		$sql->dis_connect(); 	
	?> 
</body>
</html>
