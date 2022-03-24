<?php

class Database
{
	private $con;
	
	public function connect(){
		include_once("constants.php");
		$dsn = "mysql:host=".HOST.";dbname=".DB.";charset=UTF8";
		$this->con = new PDO($dsn,USER,PASS);
		
		if ($this->con) {	
			return $this->con;
			}
		return "DATABASE_CONNECTION_FAIL";
	}
}
?>