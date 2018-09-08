<!DOCTYPE html>     
<html>     
<head>     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<meta name="viewport" content="width=device-width, initial-scale=1">  
<!--<script src="cordova.js"></script>-->   
<link rel="stylesheet" href="jquery.mobile.min.css" />     
<script src="jquery-1.7.1.min.js"></script>     
<script src="jquery.mobile.min.js"></script>    
<script type="text/javascript">
$(document).ready(function()
{
	$screen_width=$(window).width();
	$pic_height=$screen_width*2/3;
	$pic_height=$pic_height+"px";
	$("div[data-role=top_pic]").width("100%").height($pic_height);
});
</script> 
</head>               
<body>
<?php include("sql_connect.php"); ?>
	<div data-role="page" data-theme="a">
        <div data-role="top_pic" style="background-color:#000; width:100%;">
		<?php
			$sql=new SQL_CONNECT();
			$sql->connection();
			$sql->set_laugue();
			$sql->choice();
		
			$sql_query="SELECT * FROM theme_info ORDER BY theme_id DESC";
			$result=mysql_query($sql_query,$sql->con);
			while($row = mysql_fetch_array($result))
			{
				$abc=$row['theme_pic'];
			}
			echo "<img src='";
			echo $abc;
			echo "' width='100%' height='100%'/>";
		?>
        </div>
        <div data-role="content">
        	<ul data-role="listview" data-inset="true">
			<?php
				$sql_query="SELECT * FROM theme_info ORDER BY theme_id DESC LIMIT 3";
				$result=mysql_query($sql_query,$sql->con);
				while($row = mysql_fetch_array($result))
				{
					echo "<li><a href='";
					echo "theme.php?theme_id=";
					echo $row['theme_id'];
					echo "'><h1>";
					echo $row['theme_name'];
					echo "</h1></a></li>";
				}
			?>
			</ul>
        </div>
		<div data-role="footer" data-position="fixed" data-fullscreen="true">
			<div data-role="navbar">
				<ul>
					<li><a href="list50.php">Top 50</a></li>        
					<li><a href="singer.php">歌手</a></li>        
					<li><a href="zhuanji.php">专辑</a></li>        
					<li><a href="about.php">关于</a></li>         
				</ul>
			</div>
		</div>
	</div>
<?php
	$sql->disconnect();
?>
</body>
</html>
