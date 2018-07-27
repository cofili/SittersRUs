<html>
<head>
<title>     Reading Message   </title>
</head>
<body>

<h3> Recieving Message</h3>

<?php 
require_once "mydb.php"; 
require_once"../ado519/adodb5/adodb.inc.php";

$db= adConnect();
$db->debug=true;

session_start();
//right after logging in check if there are any messages
//

if(numOfMessages() == 0)
{
    print "You have No Messages";
    
}

else 
{
    printForm();
    
    if(($_GET['view']))
    {
        printMessage();
        reply();
    
        
    }
    if(($_GET['Edit']))
    {
        reply();
        
    }
    
}

//prints all messages the logged in user has 
function printMessage()
{
    // so print all the messages that the current user has
    $username = $_SESSION['username'];  //check who the user is 

    $LoggedInUser = $username;
    
    $db = adConnect();
	
    $query = "SELECT * from Login where Login_username ='" .$LoggedInUser."'"; 
 
    $result = $db ->Execute($query); //getting the username of the logged in user
    
        if($result == false)
     {
      print "failed";
    
      }// end of if
    else
        {
            while(!$result ->EOF) //checking each row
                 {
	
                    	$userType = $result-> fields['Login_usertype'];    //getting the usertype of the logged in user
                        $result->MoveNext();
    
                 }     // end of while
         } //end of else
         
         
         
    if($userType == "Customer")
         {
           
           $db = adConnect();
           $query = "SELECT Customer_id,Customer_username from Customer where Customer_username ='" .$LoggedInUser."'"; //this is getting the ID
           $result = $db ->Execute($query);
           
           if($result == false)
           {
               print "failed";
               
           }
           else
           {
              
               while(!$result ->EOF) //checking each row
                               {
	
                                    
    	                            $LoggedInUserId = $result-> fields['Customer_id']; //getting the id of the logged in user
                            
	                                $result->MoveNext();
                                        
                                    
                                } //end of while 
                                
                                
                                
                                
            }//end of else
            
           
               $db = adConnect();
               $query = "SELECT messageText, Sitter_id, Customer_id from message where Customer_id ='" .$LoggedInUserId."'";
             
            //selecr customer_username from Customer where message.customer_id = customer.customer_id
               $result = $db ->Execute($query);
               
           
               
               if($result == false)
                 {
                     print "failed";
    
                  }
               else
                      {
                          while(!$result ->EOF) //checking each row
                             {
	
                            	$message = $result-> fields['messageText'];
                            	
                            	$senderID = $result-> fields['Sitter_id'];
  
                                
                    	
                                $result->MoveNext();
                               // print $senderID;
                               
                                print "<br/>";
                                print $message; 
                                
                                print "<br/>";
                                 
             $db = adConnect();
          
        $query2=  "SELECT distinct(Sitter_username) from Sitter, message where message.Sitter_id = Sitter.Sitter_id and message.Sitter_id = '" .$senderID."' and message.Customer_id='".$LoggedInUserId."'";
         
               $result2 = $db ->Execute($query2);
               
             $TheSender =  $result2-> fields['Sitter_username'];
             
             print $TheSender;
              
                print "<br/>";
                 print "<br/>";
                  print "<br/>";
    
                           }     
                
                 
                 
                 
         }// end of else
    }//end of customer if
         
         
          if ($userType == "Sitter")
          {
              print"im a sitter";
              
            $db = adConnect();
           $query = "SELECT Sitter_id,Sitter_username from Sitter where Sitter_username ='" .$LoggedInUser."'"; //this is getting the ID
           $result = $db ->Execute($query);
           
           if($result == false)
           {
               print "failed";
               
           }
           else
           {
              
               while(!$result ->EOF) //checking each row
                               {
	
                                    
    	                            $LoggedInUserId = $result-> fields['Sitter_id']; //getting the id of the logged in user
                            
	                                $result->MoveNext();
                                        
                                    
                                } //end of while 
                                
                                
                                
                                
            }//end of else
            
           
               $db = adConnect();
               $query = "SELECT messageText, Sitter_id, Customer_id from message where Sitter_id ='" .$LoggedInUserId."'";
             
            //selecr customer_username from Customer where message.customer_id = customer.customer_id
               $result = $db ->Execute($query);
               
           
               
               if($result == false)
                 {
                     print "failed";
    
                  }
               else
                      {
                          while(!$result ->EOF) //checking each row
                             {
	
                            	$message = $result-> fields['messageText'];
                            	
                            	$senderID = $result-> fields['Customer_id'];
  
                                
                    	
                                $result->MoveNext();
                               // print $senderID;
                               
                                print "<br/>";
                                print $message; 
                                
                                print "<br/>";
                                 
             $db = adConnect();
          
        $query2=  "SELECT distinct(Customer_username) from Customer, message where message.Customer_id = Customer.Customer_id and message.Customer_id = '" .$senderID."' and message.Sitter_id='".$LoggedInUserId."'";
         
               $result2 = $db ->Execute($query2);
               
             $TheSender =  $result2-> fields['Customer_username'];
             
             print $TheSender;
              
                print "<br/>";
                 print "<br/>";
                  print "<br/>";
    
                           }     
                
                 
                 }//end of while
            } //end of else
          }//end of function
         
         
         
         
    
//end of printMessage function

//returns the number of messages
function numOfMessages()
{

	$username = $_SESSION['username'];  //check who the user is 

    $LoggedInUser = $username;
    
    print("hello    " . $LoggedInUser . "         
    ");
    
    
    
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
             $numOfMessages = 0;
           $db = adConnect();
           $query = "SELECT Customer_id,Customer_username from Customer where Customer_username ='" .$LoggedInUser."'"; //this is getting the ID
           $result = $db ->Execute($query);
           
           if($result == false)
           {
               print "failed";
               
           }
           else
           {
              
               while(!$result ->EOF) //checking each row
                               {
	
                                    
    	                            $LoggedInUserId = $result-> fields['Customer_id']; //getting the id of the logged in user
                            $numOfMessages ++;
	                                $result->MoveNext();
                                        
                                    
                                } //end of while 
            }//end of else
            
            $numOfMessages = 0;
               $db = adConnect();
               $query = "SELECT messageText, Sitter_id, Customer_id from message where Customer_id ='" .$LoggedInUserId."'";
               $result = $db ->Execute($query);
               
               if($result == false)
                 {
                     print "failed";
    
                  }
               else
                      {
                          while(!$result ->EOF) //checking each row
                             {
	
                            	$message = $result-> fields['messageText'];
                            	
                            	$numOfMessages ++;
                    	
                    	
                                $result->MoveNext();
                               // print $message;
                                
                             
    
                 }     
                 print "<br/>";
                 print "you have     " .$numOfMessages. "      messages";
         }
           }//end of customer if
            
            
         
         else if ($userType == "Sitter" )
         {
             
           $db = adConnect();
           $query = "SELECT Sitter_id,Sitter_username from Sitter where Sitter_username ='" .$LoggedInUser."'";
           $result = $db ->Execute($query);
           
           if($result == false)
            {
                print "failed";
            
            }
            else
            {
                while(!$result ->EOF) //checking each row
                                {
	
                                    
    	                                $LoggedInUserId = $result-> fields['Sitter_id']; //getting the id of the logged in user--if they are a sitter

                                $numOfMessages ++;

	                                     $result->MoveNext();
                                        
                                       
                                } //end of while 
                
            }// end of else
         } //end of else if for sitter
        return $numOfMessages; 
}

function reply()
{
         $self = $_SERVER['PHP_SELF'];
     print "<div> <form method='get' action='$self' >\n";
     
 
  print "Reply : </br>";

 
  //print "<h3> <input type ='submit' value ='reply' onclick='href ='https://aalibra.create.stedwards.edu/cosc3339/send.php' /> </h3>\n";
//  type="button" value="reply" onclick="window.location.href='http://aalibra.create.stedwards.edu/cosc3339/send.php'"

 // print "<a href='https://aalibra.create.stedwards.edu/cosc3339/ReadMessage.php'><input type='submit; value='Edit'></a>";
  
  echo "<a href='https://aalibra.create.stedwards.edu/cosc3339/send.php'>Link</a>";
        
  print "</form>\n</div>\n";
  //
  print "<br/>";
    
    
    
}
//will print the button to view messages 
function printForm()
{
    
     $self = $_SERVER['PHP_SELF'];
     print "<div> <form method='get' action='$self' >\n";
     
 
  print "View Messages : </br>";

 
  print "<h3> <input type='submit' name='view' ".
        " value='view' /> </h3>\n";
        
  print "</form>\n</div>\n";
  //
  print "<br/>";
}