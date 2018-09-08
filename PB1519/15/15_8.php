<?php
	class SQL_CONNECT							//声明一个类
	{
		public $con;								//连接
		public $host="localhost";						//计算机名
		public $username="root";						//用户名
		public $password="";							//密码
		public $database_name="music";				//数据库名
		//连接数据库
		public function connection()					
		{
			$this->con=mysql_connect($this->host,$this->username,$this->password);
		}
		//断开与数据库的连接
		public function disconnect()
		{
			mysql_close($this->con);
		}
		//设置编码方式
		public function set_laugue()
		{
			if($this->con)
			{
				mysql_query("set names utf8");
			}
		}
		//选择数据库
		public function choice()
		{
			if($this->con)
			{
				mysql_select_db($database_name, $this->con);
			}
		}
	}
?>