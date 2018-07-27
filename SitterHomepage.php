<?php


	include('../ado519/adodb5/adodb.inc.php');
	include('../cosc3339/connect.php');
	
	session_start();
	print $newUser;
	printTop();
	
	$username = $_SESSION['username'];
	
	$newUser = $username; 
	
	
	if (isset($_SESSION['$username'])){
	
	$username = $_SESSION['$username'];
	
 // Open a connection to the database
     	 		  //
     		   $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'aalibrac',     // Database user name
        		    'yR6160svXv',             // Password
        		    'aalibrac_sitterRus');   // Database
	
	  $sql = "";
	$sql = "select * from Sitter where Sitter_username = '" .$newUser . "' ";
	
	$rs = $db->Execute($sql);
	
	
	
		if($rs == false) {
	
	
		print_r($rs);
		print "<br> SQL selected failed \n";
	}
	
	
	
	else{
	
		while(!$rs->EOF){
		printTop();
		print $newUser;
		$Fname = $rs->fields['Sitter_Fname'];		
		$Lname = $rs->fields['Sitter_Lname'];
		$Location = $rs->fields['Sitter_location'];
		$Age = $rs->fields['Sitter_age'];
		$About = $rs->fields['Sitter_about'];
		
		print "<h4>";
		Print "User name:	@" .$newUser ."<br> <br>";
		print  "First Name:	"    .$Fname ."<br> <br>";
		print "Last Name:	" .$Lname  ."<br> <br>";	
		print "Location	: "	 .$Location ."<br> <br>";
		print "Age :	" .$Age ."<br> <br>";
		print "About :	" .$About ."<br> <br>";
		print "</h4>";
		
		printUpdate();
		  $rs->MoveNext();
		
	
	
	
	}
	
		}
	
	
	
	
	
	
	
	}
	
	
	function printUpdate() {
	
	print "<p> Click <a href='./UpdateSitter.php'>here</a> to update</p> \n";
	
		print "<p> Click <a href='./search_main_listing.php'>here</a> to search for jobs</p> \n";
	
	            
       	print   "  <p> Click <a href='./send.php'>here</a> to send message</p>\n "	;

       	print    " <p> Click <a href='./ReadMessage.php'>here</a> to view messages</p>\n";
	
	
	
	}
	
	
	
	

    
	// -------------------------------------------------------    
	// Print the login form for userName and userPassword	
	// -------------------------------------------------------    
	function printTop() {
    
	print    
	   
    "	<!DOCTYPE html>".
    "	<html lang='en'>".
    "	<head>".
    " <meta charset='utf-8'>".
    "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'> ".
  "  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script> ".
  "  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script> ".
    " <meta http-equiv='X-UA-Compatible' content='IE=edge'>".
    "<meta name='viewport' content='width=device-width, initial-scale=1'>".
    "<meta name='description' content=''>".
    " <meta name='author' content=''>".
    "    <meta charset='UTF-8'>".
    "	<title> Sitter Profile </title>".
    "</head>".
    
    "<body>".
    "<h1> Sitter Information : </h1>".	
	
	 "</body> \n".
        "</html> \n";
	}

?>