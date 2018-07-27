<?php
    include('../ado519/adodb5/adodb.inc.php');
	include('../cosc3339/connect.php');
	include('../cosc3339/UpdateSitterUI.html');
	
	session_start();
//	printTop();
	$username = $_SESSION['username'];



	
	$newUser = $username; 
	

	
	if (isset($newUser))
	{
	
	$username = $_SESSION['$username'];
	
	
	
	 // Open a connection to the database
        //
       $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'aalibrac',     // Database user name
        		    'yR6160svXv',             // Password
        		    'aalibrac_sitterRus');   // Database
	
	
	
    // If the values are posted, insert them into the database.
    if ( isset($_POST['fname']) && isset($_POST['lname'])  && isset($_POST['location'])
        && isset($_POST['age']) && isset($_POST['about']) )
        {
	
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $location = $_POST['location'];
        $age = $_POST['age'];
        $about = $_POST['about'];
        

        $query = "UPDATE Sitter SET Sitter_Fname = '".$fname ."'  where Sitter_username = '" .$newUser . "' "; 
         $result = mysqli_query($connection, $query);
        $query = "UPDATE Sitter SET Sitter_Lname = '".$lname ."'  where Sitter_username = '" .$newUser . "'"; 
         $result = mysqli_query($connection, $query);
        $query = "UPDATE Sitter SET Sitter_location = '".$location ."'  where Sitter_username = '" .$newUser . "'"; 
         $result = mysqli_query($connection, $query);
        $query = "UPDATE Sitter SET Sitter_age = '".$age ."'  where Sitter_username = '" .$newUser . "'"; 
         $result = mysqli_query($connection, $query);  
        $query = "UPDATE Sitter SET Sitter_about = '".$about ."'  where Sitter_username = '" .$newUser . "'"; 
        $result = mysqli_query($connection, $query);
        if($result)
        {
            $smsg = " Done! Profile Updated Successfully!";
            print $smsg;
            echo "<script> window.location.assign('SitterHomepage.php'); </script>";
        }
        else
        {
            $fmsg ="User Registration Failed";
            print $fmsg;
        }
    }
	}
	
	?>