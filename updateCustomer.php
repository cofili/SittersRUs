<?php
	include('../ado519/adodb5/adodb.inc.php');
	include('../cosc3339/connect.php');
	include('../cosc3339/updateCustomer.html');
	session_start();

	$username = $_SESSION['username'];
	
	$newUser = $username; 
	
	
	if (isset($username)  && isset($_POST['fname']) && isset($_POST['lname'])  && isset($_POST['location'])
        && isset($_POST['petType']) && isset($_POST['age']) && isset($_POST['about']) ){

	$username = $_SESSION['$username'];
	updateCustomer($connection, $newUser);
	}
	
	function updateCustomer($connection, $newUser ){
	   
	    $username = $_SESSION['username'];
	
	   $newUser = $username;
	    
	
	 // Open a connection to the database
        //
        $db = ADONewConnection('mysql'); // Create a connection handle to the local database
        $db->PConnect('localhost',  // Host to connect to
            'aalibrac',     // Database user name
            'yR6160svXv',             // Password
            'aalibrac_sitterRus');   // Database
	
	
	
    // If the values are posted, insert them into the database.
 
	
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $location = $_POST['location'];
        $petType = $_POST['petType'];
        $age = $_POST['age'];
        $about = $_POST['about'];
        

        $query = "UPDATE Customer SET Customer_Fname = '".$fname ."'  where Customer_username = '" .$newUser . "' "; 
         $result = mysqli_query($connection, $query);
        $query = "UPDATE Customer SET Customer_Lname = '".$lname ."'  where Customer_username = '" .$newUser . "'"; 
         $result = mysqli_query($connection, $query);
        $query = "UPDATE Customer SET Customer_location = '".$location ."'  where Customer_username = '" .$newUser . "'"; 
         $result = mysqli_query($connection, $query);
        $query = "UPDATE Customer SET Customer_petType = '".$petType ."'  where Customer_username = '" .$newUser . "'"; 
         $result = mysqli_query($connection, $query);
        $query = "UPDATE Customer SET Customer_age = '".$age ."'  where Customer_username = '" .$newUser . "'"; 
         $result = mysqli_query($connection, $query);  
        $query = "UPDATE Customer SET Customer_about = '".$about ."'  where Customer_username = '" .$newUser . "'"; 
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "Updated Successfully.";
            print $smsg;
            echo "<script> window.location.assign('customerHomepage.php'); </script>";
        }
        else{
            $fmsg ="User UPDATE Failed";
            print $fmsg;
        }
    }
	
	
	
?>	