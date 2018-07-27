<?php


	include('../ado519/adodb5/adodb.inc.php');
	include('../cosc3339/connect.php');
	
	require'sitterloginUI.html';
	
	session_start();
	
	
	
	
	if (isset($_POST['username'], $_POST['password'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
			  // Open a connection to the database
     	 		  //
     		   $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'aalibrac',     // Database user name
        		    'yR6160svXv',             // Password
        		    'aalibrac_sitterRus');   // Database
	
	
	$sql = "select Login_username, Login_password from Login where Login_username = '" .$username . "'";
	$rs = $db->Execute($sql);
	
	$dbusername = "";
	$dbpassword = "";
	
	if($rs == false) {
	
	
		print_r($rs);
		print "<br> SQL selected failed \n";
	}
	
	
	else{
	
	while(!$rs->EOF){
	
	$dbusername = $rs->fields['Login_username'];
	$dbpassword = $rs->fields['Login_password'];
	if($dbpassword == $password && $dbusername == $username ) {
	
	$_SESSION["username"] = $username;
	}
	$rs->MoveNext();
	
	}
	
		}
	
	
	
	if($dbusername == $username  && $dbpassword == $password) {
	
	
	$_SESSION['loggedIn']=1;
	$_SESSION['$username']=dbusername; 
	 echo "<script> window.location.assign('SitterHomepage.php'); </script>";
	
	
	}
	
	
	else {
	
	 print "<p>Login failed.  Try correct username & password</p> \n";
 
         printloginForm();
		}
	
	}
	
	
	else{
	
	//	printloginForm();
	}
	
//	printBottom(); 
	
	


 


?>