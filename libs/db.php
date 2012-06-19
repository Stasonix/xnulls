<?php include("config.php");

class DB extends Config {

	public function __construct()
	{
	
		try
		{
		
			$str = "mysql:host=".$this->HOST.";dbname=".$this->DB;
		
			$this->db = new PDO($str,$this->ROOT,$this->PSW);
		
		}
		catch(PDOException $e)
		{
		
			die("Error: ".$e->getMessage());
		
		}
	
	}

}

$conn = new DB();