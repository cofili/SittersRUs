<?php

require_once"../ado519/adodb5/adodb.inc.php";

function adConnect()
{

	$host= "localhost";
	$database= "aalibrac_sitterRus";
	$user = "aalibrac";
	$password = "yR6160svXv";
	
	//establishing connection
	$db= ADONewConnection("mysqli");
	$db->Connect($host,$user,$password, $database);
	
	return $db;

}




/*if(!$db)
{
  die("could not connect" . mysql_error());
}
else
{
echo "connected successfully";
}
*/
	//return $db;



?>