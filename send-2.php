<html>
<head>
<title>     New Conversation   </title>
</head>
<body>

<h3> Private Message System</h3>


<?php 
require_once "mydb.php"; 
require_once"../ado519/adodb5/adodb.inc.php";

$db= adConnect();
$db->debug=true;
session_start();

	$username = $_SESSION['username'];


	



if(($_GET['send'])) //if sent is pressed send the message 
{
sendMessage();
}
else  //else print the form with users to send to 
{

printRow(); 
printMessageForm();

}

//printing the form 
function printMessageForm()
{

  $self = $_SERVER['PHP_SELF'];
  print "<div> <form method='get' action='$self' >\n";
  
  print "<h3> Sending to: <input type='text' name='theName' "." value='$aName' /></h3>\n";
  print "<br/>";
  print "Enter Message : </br>";
  print "<br/>";
  print	"<textarea name = 'message' rows='7' cols = '60'></textarea>";
  
print "<br/>";

  print "<h3> <input type='submit' name='send' ".
        " value='send' /> </h3>\n";
        
  print "</form>\n</div>\n";
}

//sending message 
function sendMessage()
{



    $username = $_SESSION['username'];

	$LoggedInUser = $username; 
	

	$db = adConnect();
	
    $query = "SELECT * from Login where Login_username ='" .$LoggedInUser."'"; 
    
    
 
    $result = $db ->Execute($query);

    if($result == false)
     {
      print "failed";
    
      }
    else
        {
            while(!$result ->EOF) //checking each row
                 {
	
                    	$userType = $result-> fields['Login_usertype'];
                        $result->MoveNext();
    
                 }     
         }
    
	if($userType == "Customer")
	{
	    
	   
	    $message = $_GET['message'];
	    $recieverName = $_GET['theName'];  //i need the id from this guy  the reciver WILL have to be a sitter-- so search sitter page 
	    $flagNum = 1;
	    $db = adConnect();
        $query = "SELECT Sitter_id,Sitter_username from Sitter where Sitter_username ='" .$recieverName."'"; //this is getting the ID
         $result = $db ->Execute($query);
         
        $db = adConnect();
        $query2 = "SELECT Customer_id,Customer_username from Customer where Customer_username ='" .$LoggedInUser."'"; //this is getting the logged in user assuming they are a customer
         $result2 = $db ->Execute($query2);
        
         if($result == false) //this is getting the reciever ID
             {
                 print "failed";
    
             }//end of second if
         else
                  {
                          while(!$result ->EOF) //checking each row
                                 {
	
                                    	$RecieverID = $result-> fields['Sitter_id']; //getting reciever ID  -sitter
                                        print $RecieverID;
	                                     $result->MoveNext();
    
                                } //end of while    
                      }
            
	    
         if($result2 == false) //this is getting the reciever ID
             {
                 print "failed";
    
             }//end of second if
             
        else
        {
            while(!$result2 ->EOF) //checking each row
                                 {
	
                                    
    	                                $SenderID = $result2-> fields['Customer_id']; //getting the senderID - customer
                                    
	                                     $result2->MoveNext();
    
                                } //end of while    
            
            
        }
        
         
        //the sender is a customer. reicever is a sitter. Customer ID must be the sender Id. 
        
        print "<br/>";
        print "<br/>";
        print "ABOUT TO SEND THESE VALUES";
        print "<br/>";
        print("reciever ID   ".$RecieverID. "   ");
        print "<br/>";
         print("sender ID   ".$SenderID. "   ");
         print "<br/>";
         print("message    ".$message. "   ");
         print "<br/>";
         print("user type    ".$userType. "   ");
         print "<br/>";
          print("flag    ".$flagNum. "   ");
          print "<br/>";
         
         $db = adConnect();
         
        $query4 = "INSERT INTO message (Sitter_id, Customer_id, messageText, senderType ,flag) VALUES ( '$RecieverID','$SenderID', '$message', '$userType','$flagNum')";
       //$query = "INSERT INTO message (Sitter_id, Customer_id, messageText, senderType ,flag) VALUES (4, 3, 'yo this is a test', 'dookie head',1)";
        
        
	$result = $db->Execute($query4);
        
       if($result)
       {
       print "Message Sent";
       }
     else
       {
       print "failed to send";
       }
        
	}//end of IF
	
	
	
	///////////////////////////////////////////////////// SITTER ///////////////////////////////////////////////////////////////////////
	
	
	
	
	
else if ($userType == "Sitter")
{
       $username = $_SESSION['username'];

	$LoggedInUser2 = $username; 
    
    $message = $_GET['message'];
	    $recieverName2 = $_GET['theName'];  //i need the id from this guy  the reciver WILL have to be a customer-- so search customer
	    $flagNum = 1;
    
    $db = adConnect();
        $query = "SELECT Customer_id,Customer_username from Customer where Customer_username ='" .$recieverName2."'"; //this is getting the ID
         $result = $db ->Execute($query);
         
               $db = adConnect();
        $query2 = "SELECT Sitter_id,Sitter_username from Sitter where Sitter_username ='" .$LoggedInUser2."'"; //this is getting the logged in user assuming they are a sitter
         $result2 = $db ->Execute($query2);
         
         
    if($result == false) //this is getting the reciever ID
             {
                 print "failed";
    
             }//end of second if
         else
                  {
                          while(!$result ->EOF) //checking each row
                                 {
	
                                    	$RecieverID = $result-> fields['Customer_id']; //getting reciever ID  -customer

	                                     $result->MoveNext();
    
                                } //end of while    
                      }
    
    
     if($result2 == false) //this is getting the reciever ID
             {
                 print "failed";
    
             }//end of second if
             
        else
        {
            while(!$result2 ->EOF) //checking each row
                                 {
	
                                    
    	                                $SenderID = $result2-> fields['Sitter_id']; //getting the senderID - sitter

	                                     $result2->MoveNext();
    
                                } //end of while 
        }//end of else
        
        
        
            $db = adConnect();
    
    
    
    
    $query = "INSERT INTO message (Sitter_id, Customer_id, messageText, senderType ,flag) VALUES ( '$SenderID', '$RecieverID','$message', '$userType','$flagNum')";
    $result = $db->Execute($query);
        
       if($result)
     {
       print "Message Sent";
       }
     else
       {
       print "failed to send";
       }
    
    
}//end of else if
	
	
	

 
 

	

    


        //get the id from the username into a varialbe 
        

       
        
    
       
	 //customer ID

	 
 

    
    

	
/*	$query = "INSERT INTO message (Sitter_id, Customer_id, messageText, senderType ,flag) VALUES ('$senderId', '$recieverId', '$message', '$Usertype','$flagNum')";
THIS IS FOR SITTER

	$result = $db->Execute($query);
        
       if($result)
     {
       print "Message Sent";
       }
     else
       {
       print "failed to send";
       }
*/	
	
	

	print "<br/>";
	
	printRow(); 
printMessageForm();

}

//checks the usertype of the person logged in and prints out the users they can send to
//this function helps avoid the problem of sending to the same usertype
function printRow() 
{
    

    $username = $_SESSION['username'];

	$newUser = $username; 
	
	print $newUser;
	$db = adConnect();
	
$query = "SELECT * from Login where Login_username ='" .$newUser."'"; 
 
$result = $db ->Execute($query);

    if($result == false)
     {
      print "failed";
    
        }
    else
        {


            while(!$result ->EOF) //checking each row
                 {
	
                    	$userType = $result-> fields['Login_usertype'];
    	                print ($userType);
    	
	
	                      $result->MoveNext();
    
                 }     


         }
	
	if($userType == "Customer")
	{
	    //if who ever is logged in is a customer, print all sitters
    $db = adConnect();
$query = "SELECT Sitter_id,Sitter_username from Sitter ";

$result = $db ->Execute($query);


	print "<br/>";
		print "<br/>";
		
  
  

print"List of Sitters";

	print "<br/>";
		print "<br/>";
		
		
        while($row = $result ->FetchRow())
                {
    
                     $sitterId = $row['Sitter_id'];
                        $sitterUser = $row['Sitter_username'];
    
                        print($sitterUser . "     ");
    
   

	
                }//end of while
    }//end of if

else if ($userType == "Sitter")
{   
    $db = adConnect();
$query = "SELECT Customer_id,Customer_username from Customer ";

$result = $db ->Execute($query);


print "<br/>";
		print "<br/>";
		
  
  

print"List of Customers";

	print "<br/>";
		print "<br/>";
		
		while($row = $result ->FetchRow())
{
    
    $CustId = $row['Customer_id'];
    $CustUser = $row['Customer_username'];
    
    print($CustId ." - " .$CustUser . "     " );
    	print "<br/>";
    
   

	
} //end of while
    
}//end of else if
	    


	print "<br/>";
	print "<br/>";
	
	
print "</form>\n</div>\n";	
	
}//end of function




?>
</div>
</body>
</html>