 <?php
    /**
     * Created by PhpStorm.
     * User: Aziz
     * Date: 3/30/17
     * Time: 2:31 PM
     */

	include('../ado519/adodb5/adodb.inc.php');
	include('../cosc3339/connect.php');
	include('../cosc3339/customerPostaList.html');
	session_start();
	$username = $_SESSION['username'];
    $newUser = $username;
   
               
               
      // If the values are posted, insert them into the database.
    if (isset($username) && isset($_POST['startTime']) && isset($_POST['endTime'])  && isset($_POST['location'])
        && isset($_POST['description'])){
            
            
         postAlist($newUser, $username, $startTime, $endTime, $location, $description);   
            
        }
        
        function postAlist($newUser, $username, $startTime, $endTime, $location, $description){
	   	$username = $_SESSION['$username'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        
     
        
        
			  // Open a connection to the database
     	 		  //
     		   $db = ADONewConnection('mysql'); // Create a connection handle to the local database
     		   $db->PConnect('localhost',  // Host to connect to
      		      	'aalibrac',     // Database user name
        		    'yR6160svXv',             // Password
        		    'aalibrac_sitterRus');   // Database
	    $sql="";
        $sql = "INSERT INTO `List` ( List_starttime, List_endtime, List_location, List_description, List_username) VALUES
        ('$startTime', '$endTime', '$location', '$description', '$newUser')";
    	$rs = $db->Execute($sql);
        $sql1 = "select * from Customer where Customer_username = '" .$newUser . "'";
    	$rs = $db->Execute($sql1);
        $sql2 = "select * from List, Customer where Customer_username = '" .$newUser . "' and List.List_starttime = '" .$startTime . "'
        and List.List_endtime = '" .$endTime . "'  
        and List.List_location = '" .$location . "' and List.List_description = '" .$description . "'";
        $rs = $db->Execute($sql2);

        
        
		if($rs == false) {
	
	
		print_r($rs);
		print "<br> SQL selected failed \n";
                	}
        else{
                
                print "Posted Successfully ";
      
        }
    }



?>
	
