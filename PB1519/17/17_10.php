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
	$( "#mypanel" ).trigger( "updatelayout" );  
</script> 
<script type="text/javascript">
    $(document).ready(function(){
      $("div").bind("swiperight", function(event) {
        $( "#mypanel" ).panel( "open" );
      });  
    });
</script>
<script>
function login()
{
	$zhanghao=$("#zhanghao").val();
	$mima=$("#mima").val();
	$site="index.php?zhanghao="+$zhanghao+"+"&mima="+$mima;
	location.href=$site;
}
function login()
{
	$replay_text=$("#replay_text").val();
	$bianhao=$("#bianhao").val();
	$site="replay.php?replay_text="+$replay_text+"+"&bianhao="+$bianhao;
	location.href=$site;
}
</script>
</head>               
<body>   
<?php include('sql_connect.php'); ?> 
<?php header("Content-Type:text/html;charset=UTF-8"); ?>
<?php
	$is_login=0;
	$sql=new SQL_CONNECT();
	$sql->connection();
	$sql->set_laugue();
	$sql->choice();
	if(isset($_GET['zhanghao'])&isset($_GET['mima']))
	{
		$zhanghao=$_GET['zhanghao'];
		$mima=$_GET['mima'];
		$sql_query="SELECT * FROM user WHERE user_name=$zhanghao";
		$result=mysql_query($sql_query,$sql->con);
		while($row = mysql_fetch_array($result))
		{
			if($mima==$row['password'])
			{
				$is_login=1;
				$id=$row['user_id'];
				$username=$row['user_name'];
				$name=$row['user_nicheng'];
				$password=$row['password'];
				setcookie("id", $id, time()+3600);
				setcookie("username", $username, time()+3600);
				setcookie("name", $name, time()+3600);
				setcookie("password", $password, time()+3600);
			}
		}
	}
	if(isset($_COOKIE['id']))
	{
		$is_login=1;
		$id=$_COOKIE['id'];
		$username=$_COOKIE['username'];
		$name=$_COOKIE['name'];
		$password=$_COOKIE['password'];
	}
?>  
<div data-role="page">
	<div data-role="panel" id="mypanel">
	<?php
		if(0=$is_login)
		{
			echo "<form>";
			echo "<label for='zhanghao'>账号:</label>";
			echo "<input name='zhanghao' id='zhanghao' value='' type='text'>";
			echo "<label for='zhanghao'>密码:</label>";
			echo "<input name='mima' id='mima' value='' type='text'>";
			echo "<fieldset class='ui-grid-a'>";
			echo "<div class='ui-block-a'>";
			echo "<a data-role='button' onclick='login();'>登陆</a>";
			echo "</div>";
			echo "<div class='ui-block-b'>";
			echo "<a href='regist.php' data-role='button'>注册</a>";
			echo "</div>";
			echo "</fieldset>";
			echo "</form>";
		}
		else
		{
			echo "<h4>已登录</h4>";
			echo "<p>";
			echo $username;
			echo "</p>";
			echo "<p>";
			echo $name;
			echo "</p>";
		}
	?>
	</div>
	<div data-role="header" data-position="fixed">
		<h1>XX大学表白墙</h1>
	</div>
	<div data-role="content">
		<div data-role="collapsible-set">
		<?php
			$sql_query="SELECT * FROM message,user_messagem,user 
			WHERE user_message.message_id=message.message_id 
			AND user_message.user_id=user.user_id";
			$result=mysql_query($sql_query,$sql->con);
		?>
		<?php
			while($row = mysql_fetch_array($result))
			{
				echo "<div data-role='collapsible'>";
				echo "<h4>";
				echo " $row['user_name']+"向"+"$row['message_demo']"+"表白";
				echo "</h4>";
				echo "<h4>";
				echo $row["message_neirong"];
				echo "</h4>";
				$sql_query="SELECT * FROM replay,replay_info,user WHERE 
				replay.message_id=replay_info.message_id
				AND user.user_id=replay.user_id,
				AND message_id=$row['message_id']";
				$result1=mysql_query($sql_query,$sql->con);
				while($row1 = mysql_fetch_array($result1))
				{
					echo "<p><b>";
					echo $row1['user_name'];
					echo "</b>";
					echo $row1['replay_neirong'];
					echo "</p>";
				}
				if(1=$is_login)
				{
					echo "<form>";
					echo "<input type='text' id='replay_text'>";
					echo "<input type='hiden' id='bianhao' value='";
					echo $row1['message_id'];
					echo "'>";
					echo "<a href='' data-role='button' onclick='replay();'>发表回复</a>";
					echo "</form>";
				}
			</div>
			}
		?>
		</div>
	</div>
	<div data-role="footer" data-position="fixed">
		<div  data-role="navbar" data-position="fixed">    
			<ul>        
				<li><a href="#">表白墙</a></li>        
				<li><a href="#">登陆</a></li>        
				<li><a href="#">注册</a></li>          
			</ul>    
		</div>
	</div>
</div>
</body>     
</html>
