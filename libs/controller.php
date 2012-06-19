<?php session_start();

include ("model.php");


if (isset($_POST['action']))
{
	switch ($_POST['action'])
	{

		case 'start': 
		
			$name=$_POST['name'];
		
			if (isset($_COOKIE['postid']))
			{
				
				$player = new Model();
				$postid = (int)$_COOKIE['postid'];
				$player->updateName($name,$postid);
				$player->setStatus('a',$postid);
				
				
				echo $postid;
	
			}
			else
			{
				
				$player = new Model();
				$player->setUser($name);
							
				echo $player->ident;
			
			}
		
		break;
		
		
		// searching enemy
		case 'search':
		
				$postid = $_COOKIE['postid'];
		
				$player = new Model();
				
				$player->ident = $postid;
				
				$rivalid = $player->getNewEnemy();
				
				// установим себе этого врага
				$player->setNewEnemy($postid,$rivalid);
				
				// установим врагу себя
				$player->setNewEnemy($rivalid,$postid);
				
				$enemy = $player->getUserNameById($rivalid);
			
				echo $enemy;
		
			break;
		
		
		
		case 'xtble': 
		
			$xtable = $_POST['xtable'];
			$enemy = $_SESSION['enemy'];
			$player->setXTable($xtable,$enemy);
		
		
		break;
		
		
		case 'situation':
		
			$plid = $_COOKIE['postid'];
			
			if ($situation = $player->getXTableById($plid))
			{
			
				echo $sitation;
			
			}
		
		break;
		
	}
}	





