<?php
	require_once 'sql.php';
	class Controller {
	
		protected $db;
	
		function __construct() {
	
			if($_SERVER['HTTP_HOST']=='127.0.0.1' or $_SERVER['SERVER_NAME']=='localhost' )
			{
				$db=new DB\SQL('mysql:host=localhost;port=3306;dbname=kistyle','root','password');
			}
			else
			{
				$db=new DB\SQL('mysql:host=localhost;port=3306;dbname=kistyle','kistyle','kistyle');
			}
	
			$this->db=$db;
		}
	}