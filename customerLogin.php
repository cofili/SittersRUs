<?php
	    
	include('../ado519/adodb5/adodb.inc.php');

	include('../cosc3339/connect.php');
	include('../cosc3339/customerLogin.html');


	session_start();
	
	if (isset($_POST['username'], $_POST['password'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	customerLogin($uername, $password);
	
	}
	
	
	function customerLogin($username, $password){
	
		$username = $_POST['username'];
	$password = $_POST['password'];
	 // Open a connection to the database
        //
        $db = ADONewConnection('mysql'); // Create a connection handle to the local database
        $db->PConnect('localhost',  // Host to connect to
            'aalibrac',     // Database user name
            'yR6160svXv',             // Password
            'aalibrac_sitterRus');   // Database
	

	$sql = "select * from Login where Login_username = '" .$username . "'";
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
	$dbuserType = $rs->fields['Login_usertype'];
	$rs->MoveNext();
	
	}
	
		}
	

	
	if($dbusername == $username  && $dbpassword == $password && $dbuserType == "Customer") {
	
	
	$_SESSION['loggedIn']=1;
	$_SESSION["username"] = $username; 
	 echo "<script> window.location.assign('customerHomepage.php'); </script>";
	
	
	}
	
	
	else {
	    if($dbusername == $username  && $dbpassword == $password && $dbuserType != "Customer"){
	        print "Login failed.    Only CUSTOMERS can login here !!!";
	       
	        
	    }
	else if($dbusername != $username  && $dbpassword != $password){
	 print "<p>Login failed.  Try correct username & password</p> \n";
	}
		}//end else
		}

?>