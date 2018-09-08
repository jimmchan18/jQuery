<!DOCTYPE html>     
<html>     
<head>       
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<meta name="viewport" content="width=device-width, initial-scale=0.5">  
<!--<script src="cordova.js"></script>-->     
<link rel="stylesheet" href="jquery.mobile.min.css" />  
<link rel="stylesheet" href="video.min.css" />    
<script src="jquery-1.7.1.min.js"></script>     
<script src="jquery.mobile.min.js"></script>   
<style>
.ui-grid-a .ui-block-a
{
	width:37%;
}
.ui-grid-a .ui-block-b
{
	width:57%;
	margin-left:5%;
}
</style> 
</head>               
<body>   
<?php include("sql_connect.php"); ?>
<?php
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();
		
	$sql_query="SELECT * FROM lanmu_info";
	$result=mysql_query($sql_query,$sql->con);
?>  
<div data-role="page">
	<div data-role="header" data-theme="a" data-position="fixed">
	</div>
	<div data-role="content">
		<fieldset class="ui-grid-a">
			<div class="ui-block-a">
				<img src="images/logo.png" width="100%" height="100%" />
				<ul data-role="listview" data-inset="true">
					<li data-role="list-divider" data-theme="a">关于</li>
					<li><a href="#">项目介绍</a></li>
					<li><a href="#">关于作者</a></li>
					<li><a href="#">jQuery Mobile</a></li>
					<li><a href="#">视频点播</a></li>
				</ul>
			</div>
			<div class="ui-block-b">
				<ul data-role="listview" data-inset="true">
					<li data-role="list-divider">视频分类</li>
					<?php
						while($row = mysql_fetch_array($result))
						{
							echo "<li><a href='lanmu.php?lanmu_id=";
							echo $row['lanmu_id'];
							echo "'>";
							echo $row['lanmu_name'];
							echo "</a></li>";
						}
					?>
					<li data-role="list-divider">热门分类</li>
					<?php
						$sql_query="SELECT * FROM zhuanji_info ORDER BY zhuanji_id DESC LIMIT 4";
						$result=mysql_query($sql_query,$sql->con);
						while($row = mysql_fetch_array($result))
						{
							echo "<li><a href='zhuanji.php?zhuanji_id=";
							echo $row['zhuanji_id'];
							echo "'>";
							echo $row['zhuanji_name'];
							echo "</a></li>";
						}
					?>
				</ul>
			</div>
		</fieldset>
	</div>
	<div data-role="footer"data-theme="c" data-position="fixed">
		<h1>基于jQuery Mobile的视频点播系统</h1>
	</div>
</div>
<?php
	$sql->disconnect();
?>
</body>     
</html>
