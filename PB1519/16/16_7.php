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
	$lanmu_id=$_GET['lanmu_id'];
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
				<ul data-role="listview" data-inset="true">
					<li data-role="list-divider" data-theme="a">视频分类</li>
					<?php
						while($row = mysql_fetch_array($result))
						{
							if($lanmu_id==$row['lanmu_id'])
							{
								echo "<li data-theme='a'><a href='zhuanji.php?zhuanji_id=";
								echo $row['lanmu_id'];
								echo "'>";
								echo $row['lanmu_name'];
								echo "</a></li>";
								$title=$row['lanmu_name'];
							}
							else
							{
								echo "<li><a href='zhuanji.php?zhuanji_id=";
								echo $row['lanmu_id'];
								echo "'>";
								echo $row['lanmu_name'];
								echo "</a></li>";
							}
						}
					?>
				</ul>
			</div>
			<div class="ui-block-b">
				<ul data-role="listview" data-inset="true">
					<li data-role="list-divider" >
						<?php echo $title; ?>
					</li>
					<?php
						$sql_query="SELECT * FROM lanmu,zhuanji_info WHERE $lanmu_id=lanmu.lanmu_id AND zhuanji_info.zhuanji_id=lanmu.zhuanji_id";
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
