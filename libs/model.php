<?php

include("db.php");

class Model extends DB {

	public $ident;
	

	public function __construct()
	{
	
		parent::__construct();
	
	}
	
	public function getXTableById($id_in)
	{
	
		if ($result = $this->db->prepare("SELECT `xtable` FROM `situation` WHERE `id`=:id") )
		{
		
			$result->bindValue(':id',$id_in);
			$result->execute();
			$xT = $result->fetch(PDO::FETCH_ASSOC);
			
			return $xT['xtable'];
		
		}
		
	}
	
	public function getStatusById($id_st)
	{
	
		if ($result = $this->db->prepare("SELECT `mode` FROM `situation` WHERE `id`=:id") )
		{
		
			$result->bindValue(':id',$id_st);
			$result->execute();
			$xSt = $result->fetch(PDO::FETCH_ASSOC);
			
			return $xSt['mode'];
		
		}
	
	}
	
	
	public function getUserNameById($id_st)
	{
	
		if ($result = $this->db->prepare("SELECT `user` FROM `situation` WHERE `id`=:id") )
		{
		
			$result->bindValue(':id',$id_st);
			$result->execute();
			$xSt = $result->fetch(PDO::FETCH_ASSOC);
			
			return $xSt['user'];
		
		}
	
	}
	
	public function setStatus($st,$uid)
	{
	
		if ($result = $this->db->prepare("UPDATE `situation` SET `mode`=:st WHERE `id`=:uid"))
		{
		
			$result->bindParam(':st',$st,PDO::PARAM_STR);
			$result->bindParam(':uid',$uid,PDO::PARAM_INT);
			$result->execute();
		
		}
	
	}
	
	public function setXTable($xt,$uid)
	{
	
		if ($result = $this->db->prepare("UPDATE `situation` SET `xtable`=:xt WHERE `id`=:uid"))
		{
		
			$result->bindParam(':xt',$xt,PDO::PARAM_STR);
			$result->bindParam(':uid',$uid,PDO::PARAM_INT);
			$result->execute();
		
		}
	
	}
	
	public function setUser($name)
	{
		
		$name = trim($name);
		$name = htmlspecialchars($name);
			
		if ($result = $this->db->prepare("INSERT INTO `situation`(`user`,`mode`) VALUES (?,'a'); SELECT MAX(`id`) AS `id` FROM `situation`"))
		{
			
			//$result->bindParam(1,$name,PDO::PARAM_STR);
			$result->execute(array($name));
			
			$this->ident = $this->db->lastInsertId();
		
		}
	
	}
	
	public function getNewEnemy()
	{
	
		if ($result = $this->db->prepare("SELECT `id` FROM `situation` WHERE (`mode`='a') AND (`id`<>?) LIMIT 1"))
		{

			$result->execute(array($this->ident));
			$data = $result->fetch(PDO::FETCH_ASSOC);
			
			return $data['id'];
			
		}
	
	}
	
	public function setNewEnemy($enm,$uid)
	{
		
		if ($result = $this->db->prepare("UPDATE `situation` SET `enemy`=:enm,`mode`='b' WHERE `id`=:uid"))
		{
		
			$result->bindParam(':enm',$enm,PDO::PARAM_INT);
			$result->bindParam(':uid',$uid,PDO::PARAM_INT);
			$result->execute();
		
			
			return TRUE;
			
		}
		else
		{
		
			return FALSE;
		
		}
	
	}

	
	public function updateName($nm,$uid)
	{
		
		if ($result = $this->db->prepare("UPDATE `situation` SET `user`=:nm WHERE `id`=:uid"))
		{
		
			$result->bindParam(':nm',$nm,PDO::PARAM_STR);
			$result->bindParam(':uid',$uid,PDO::PARAM_INT);
			$result->execute();
			
		}
	
	}
	
}
