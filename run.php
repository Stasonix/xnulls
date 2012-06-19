<?php
   include("includer.php");
   $us_name = $_POST["us_name"];
   $krest = $_POST["krest"];
   $enemy = $_POST["enemy"];
   
   switch ($_POST["funct"]) {
     case "user": 
	 $sql = "INSERT INTO `situation` (`id`,`user`,`xtable`,`mode`,`enemy`) VALUES ('','".$us_name."','000000000','w','no')";
      if ($query = mysql_query($sql))
	   {
	    echo 1;
		 }
		  else echo 0;
	 break;
	 
	 case "krest": 
	               // возьмем строку у соперника и вставим ему 1 
	               $sql = "SELECT `xtable` FROM `situation` WHERE user='".$enemy."'";
				   $query = mysql_query($sql);
				   $res_t = mysql_fetch_array($query);
				   $res_t["xtable"];
				   $res_t["xtable"][$krest] = 1;
				   
				   // update
				   $sql_u = "UPDATE `situation` SET xtable='".$res_t["xtable"]."' WHERE user='".$enemy."'";
				   if ($query_u = mysql_query($sql_u)) { 
				   
				   $sql_sel = "SELECT `xtable` FROM `situation` WHERE user='".$enemy."'";
				   $query_sel = mysql_query($sql_sel);
				   $res = mysql_fetch_array($query_sel);
				   echo $res["xtable"];
				    }
	 
	 break;
	 case "poisk": 
				   
				   // проверим нет ли уже соединенного врага
	               $sql_vr = "SELECT COUNT(user) FROM situation WHERE (enemy='".$us_name."') AND (mode='a')";
				   $query = mysql_query($sql_vr);
				   $res_vr = mysql_fetch_row($query);
				   
				    if ($res_vr[0]==0) 
					 {
 				   
				   // узнаем кол-во ждущих людей
				   $sql_w = "SELECT COUNT(mode) FROM situation WHERE mode='w'";
				   $query = mysql_query($sql_w);
				   $w_count = mysql_fetch_row($query);
				   $total = $w_count[0];
				    if ($total>1) {
	               // 1) находим ждущего врага
	               $sql1 = "SELECT user FROM situation WHERE mode='w' AND enemy='no' AND user<>'".$us_name."'";
	               $query = mysql_query($sql1);
   				   $res = mysql_fetch_array($query);
				   // 2) вставляем себе его
				   $sql2 = "UPDATE `situation` SET enemy='".$res["user"]."',mode='a' WHERE (user='".$us_name."') AND (mode='w')";
			       mysql_query($sql2);
				   // 3) вставляем врагу себя
$sql3 = "UPDATE `situation` SET enemy='".$us_name."',mode='a',`xtable`='000000000' WHERE `user`='".$res["user"]."' AND mode='w'";
                  mysql_query($sql3);
				    echo $res["user"];
				   }
				   else echo 0;
	              }
				   else {
				       $sql_f = "SELECT enemy FROM situation WHERE user='".$us_name."'";
					   $query_f = mysql_query($sql_f);
					   $res = mysql_fetch_array($query_f);
					   echo $res["enemy"];
					 }
	 break;
	 
	 case "display": $sql="SELECT `xtable` FROM `situation` WHERE user='".$us_name."'";
	                 $query = mysql_query($sql);
					 $res = mysql_fetch_array($query);
					 echo $res["xtable"];
					 
	 break;
	 
 case "newgame": $sql = "UPDATE `situation` SET `xtable`='000000000' WHERE (`user`='".$us_name."') OR (`enemy`='".$enemy."')";
                 if ($query = mysql_query($sql))
				  {
				   echo 1;
				   }
				    else echo 0;
				 
 break;
	}