<!DOCTYPE html>     
<html>     
<head>     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<meta name="viewport" content="width=device-width, initial-scale=1">  
<!--<script src="cordova.js"></script>-->   
<link rel="stylesheet" href="jquery.mobile.min.css" />     
<script src="jquery-1.7.1.min.js"></script>     
<script src="jquery.mobile.min.js"></script>    
<?php 
	include("sql_connect.php"); 
?>
<?php
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();
	$i=5;
?>
<script type="text/javascript">
$(document).ready(function()
{
	$screen_width=$(window).width();
	$pic_height=$screen_width*2/3;
	$pic_height=$pic_height+"px";
	$("div[data-role=top_pic]").width("100%").height($pic_height);
});
</script> 
<script>
var Is_play=0;
var Played_id=0;
var Music_docname=new Array(); 
function onmusicplay()
{
	var myVideo=document.getElementById("music_player");
	var btn_paly=document.getElementById("btn_play");
	if(Is_play==0)
	{
		myVideo.play();
		Is_play=1;
		btn_paly.innerHTML="暂停";
	}else
	{
		myVideo.pause();
		Is_play=0;
		btn_paly.innerHTML="播放";
	}
}
function play_pre()
{
	if(Played_id==0)
	{
		Played_id=<?php echo $i; ?>;
	}
	else
	{
		Played_id=Played_id-1;
	}
	var ogg_s=document.getElementById("source_ogg");
	var ogg_m=document.getElementById("source_mp3");
	ogg_s.src=Music_docname[Played_id]+".ogg";
	ogg_m.src=Music_docname[Played_id]+".mp3";
	document.getElementById("music_player").load();
	document.getElementById("music_player").play();
	var Is_play=1;
	document.getElementById("btn_play").innerHTML="暂停";
}
function play_next()
{
	if(Played_id==<?php echo $i; ?>)
	{
		Played_id=0;
	}
	else
	{
		Played_id=Played_id+1;
	}
	var ogg_s=document.getElementById("source_ogg");
	var ogg_m=document.getElementById("source_mp3");
	ogg_s.src=Music_docname[Played_id]+".ogg";
	ogg_m.src=Music_docname[Played_id]+".mp3";
	document.getElementById("music_player").load();
	document.getElementById("music_player").play();
	var Is_play=1;
	document.getElementById("btn_play").innerHTML="暂停";
}
function play_random()
{
	Played_id=parseInt(Math.random()*5);
	var ogg_s=document.getElementById("source_ogg");
	var ogg_m=document.getElementById("source_mp3");
	ogg_s.src=Music_docname[Played_id]+".ogg";
	ogg_m.src=Music_docname[Played_id]+".mp3";
	document.getElementById("music_player").load();
	document.getElementById("music_player").play();
	var Is_play=1;
	document.getElementById("btn_play").innerHTML="暂停";
}
function list_play(id)
{
	var ogg_s=document.getElementById("source_ogg");
	var ogg_m=document.getElementById("source_mp3");
	ogg_s.src=Music_docname[id]+".ogg";
	ogg_m.src=Music_docname[id]+".mp3";
	document.getElementById("music_player").load();
	document.getElementById("music_player").play();
	var Is_play=1;
	document.getElementById("btn_play").innerHTML="暂停";
}
</script>
</head>               
<body>
	<audio id="music_player" preload="auto" style=" display:none;">
    	<source id="source_ogg" src="song.ogg" type="audio/ogg" />
  		<source id="source_mp3" src="song.mp3" type="audio/mpeg" />
    </audio>
	<div data-role="page" data-theme="a">
		<div data-role="header" data-position="fixed" data-fullscreen="true">
			<a href="#">返回</a>
			<?php
				$theme_id=$_GET["theme_id"];
			
				$sql_query="SELECT * FROM theme_info WHERE theme_id=$theme_id";
				$result=mysql_query($sql_query,$sql->con);
				while($row = mysql_fetch_array($result))
				{
					echo "<h1>";
					echo $row['theme_name'];
					echo "</h1>";
					$top_pic=$row['theme_pic'];
					$jieshao=$row['theme_jieshao'];
				}
			?>
		</div>
        <div data-role="top_pic" style="background-color:#000; width:100%;">
        	<img src="<?php echo $top_pic; ?>" width="100%" height="100%" style="float:left;"/>
            <div style="width:100%; height:60px; margin-top:-60px; background:url(images/info.png) repeat; float:left;">
            	<span style="font-size:18px; line-height:30px; font-weight:bold; color:#CCC;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $jieshao; ?></span>
            </div>
        </div>
        <div data-role="content">
        	<ul data-role="listview" data-inset="true">
			<?php 
				$sql_query="SELECT * FROM theme_info,music_info,theme WHERE theme.theme_id=theme_info.theme_id AND theme.music_id=music_info.music_id";
				$result=mysql_query($sql_query,$sql->con);
				while($row = mysql_fetch_array($result))
				{
					echo "<li><a href='#'>";
					echo $row['music_name'];
					echo "</a></li>";
				}
			?>
			</ul>
        </div>
		<div data-role="footer" data-position="fixed">
			<div data-role="navbar">
				<ul>
					<li onClick="play_pre();"><a href="#">上一首</a></li>        
					<li onClick="onmusicplay();"><a href="#">播放</a></li>        
					<li onClick="play_next();"><a href="#">下一首</a></li>        
					<li onClick="play_random();"><a href="#">随便听听</a></li>        
				</ul>
			</div>
		</div>
	</div>
	<?php
		$sql->dis_connect();
	?>
</body>
</html>