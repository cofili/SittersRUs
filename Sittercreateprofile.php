  <?php

    require'SitterProfileUI.html';
 
    
	include('../ado519/adodb5/adodb.inc.php');
	include('../cosc3339/connect.php');


	
	


    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['lname'])  && isset($_POST['location'])
        && isset($_POST['age']) && isset($_POST['about']) && isset($_POST['password'])){
	$username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $location = $_POST['location'];
        $age = $_POST['age'];
        $about = $_POST['about'];
        $password = $_POST['password'];
        
        /* Open a connection to the database
        //
        $db = ADONewConnection('mysql'); // Create a connection handle to the local database
        $db->PConnect('localhost',  // Host to connect to
            'cofilicr',     // Database user name
            'FT90d41xdw',             // Password
            'cofilicr_sittersrus');   // Database */


        $query = "INSERT INTO `Sitter` (Sitter_username, Sitter_Fname, Sitter_Lname, Sitter_location, Sitter_age, Sitter_about) VALUES ('$username', '$fname', '$lname', '$location','$age', '$about')";
         $result = mysqli_query($connection, $query);
         
        $query = "INSERT INTO `Login` (Login_username, Login_password, Login_usertype) VALUES  ('$username', '$password', 'Sitter')"; 
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = "Perfect! User Created Successfully. You're in! ";
            echo "<script> window.location.assign('./SittersRUs.html'); </script>";
        }
        else{
            $fmsg ="Oops! User Registration Failed";
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    ?>