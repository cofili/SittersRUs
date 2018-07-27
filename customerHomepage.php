<?php


    include('../cosc3339/customerHomepage.html');
	include('../ado519/adodb5/adodb.inc.php');
	include('../cosc3339/connect.php');
	
	session_start();
	
	$username = $_SESSION['username'];
	$newUser = $username; 

	
	if (isset($username)){
	
	$username = $_SESSION['$username'];
	printUserInfo($newUser);
	    
	}
	  function printUserInfo($newUser){
	     // print "inside function";
			  // Open a connection to the database
     	 		  //
     		   $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'aalibrac',     // Database user name
        		    'yR6160svXv',             // Password
        		    'aalibrac_sitterRus');   // Database
	
	$sql = "";
	$sql = "select * from Customer where Customer_username = '" .$newUser . "' ";
	$rs = $db->Execute($sql);
	
	
	
		if($rs == false) {
	
	
		print_r($rs);
		print "<br> SQL selected failed \n";
	}
	
	
	
	else{
	
		while(!$rs->EOF){
		
		$customerID = $rs->fields['Customer_id'];
		$Fname = $rs->fields['Customer_Fname'];		
		$Lname = $rs->fields['Customer_Lname'];
		$Location = $rs->fields['Customer_location'];
		$petType = $rs->fields['Customer_petType'];
		$Age = $rs->fields['Customer_age'];
		$About = $rs->fields['Customer_about'];
		
		print "<h4>";
		print "ID # :".$customerID."<br> <br> ";
		Print "User name:	@" .$newUser ."<br> <br>";
		print "First:	"    .$Fname ."<br> <br>";
		print "Last:	" .$Lname  ."<br> <br>";	
		print "Location	: "	 .$Location ."<br> <br>";
		print "Pet type :	" .$petType ."<br> <br>";
		print "Age :	" .$Age ."<br> <br>";
		print "About :	" .$About ."<br> <br>";
		print "</h4>";
	
		
		
		  $rs->MoveNext();
		
	
		}
	
	}
	
	}	

?>