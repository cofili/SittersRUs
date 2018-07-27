    <?php
    /**
     * Created by PhpStorm.
     * User: Aziz
     * Date: 3/30/17
     * Time: 2:31 PM
     */

    
	include('../ado519/adodb5/adodb.inc.php');
	include('../cosc3339/connect.php');
	include('../cosc3339/createCustomer.html');


    
    if (isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['lname'])  && isset($_POST['location'])
        && isset($_POST['petType']) && isset($_POST['age']) && isset($_POST['about']) && isset($_POST['password'] )){
    	$username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $location = $_POST['location'];
        $petType = $_POST['petType'];
        $age = $_POST['age'];
        $about = $_POST['about'];
        $password = $_POST['password'];
        createCustomer($connection, $username, $fname, $lname, $location, $petType, $age, $about, $password);
        }
        
            function createCustomer($connection, $username, $fname, $lname, $location, $petType, $age, $about, $password){
                 // print "inside function";
			  // Open a connection to the database
     	 		  //
     		   $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'aalibrac',     // Database user name
        		    'yR6160svXv',             // Password
        		    'aalibrac_sitterRus');   // Database
                
                $username = $_POST['username'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $location = $_POST['location'];
                $petType = $_POST['petType'];
                $age = $_POST['age'];
                $about = $_POST['about'];
                $password = $_POST['password'];
                
        $query = "INSERT INTO `Customer` (Customer_username, Customer_Fname, Customer_Lname, Customer_location, Customer_petType, Customer_age, Customer_about, Customer_password) 
        VALUES ('$username', '$fname', '$lname', '$location', '$petType', '$age', '$about',  '$password' )";
         $result = mysqli_query($connection, $query);
        $query = "INSERT INTO `Login` (Login_username, Login_password, Login_usertype) VALUES  ('$username', '$password', 'Customer')"; 
        $result = mysqli_query($connection, $query);
        
        
        if($result){
            $smsg = "User Created Successfully.";
            echo $smsg;
             echo "<script> window.location.assign('customerLogin.php'); </script>";
            
        }
        else{
            
            $fmsg ="User Registration Failed";
            echo $fmsg;
        }  
              
        }
    ?>