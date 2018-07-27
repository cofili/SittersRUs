<?php

	include('../cosc3339/connect.php');
//	include('../cosc3339/search_select_listing.php');

    $sitter = $_GET['sitter'];
   // echo $sitter;
    

function returnSitterByListing($connection,$sitter) 
{
$sql = "select * from Sitter where Sitter_username='$sitter'";
$result = mysqli_query($connection, $sql);


if ($result->num_rows > 0) 
{
   // output data of each row     
   while($row = $result->fetch_assoc()) 
   {  
     
       echo "Sitter: " . $row["Sitter_Fname"]. "<br>".
       "UserName: " . $row["Sitter_username"]. "<br>".
      "Location: " . $row["Sitter_location"]. "<br>".
      "Pet Type: " . $row["Sitter_petType"]. "<br>".
      "Age: " . $row["Sitter_age"]. "<br>".
      "About: " . $row["Sitter_about"]. "<br>".
      " <a href='http://aalibra.create.stedwards.edu/cosc3339/send.php'>Message</a><br><br>";
      
         
     
   }
       
} //end of if

else {
    echo "0 results"; }
    
}//end of function


//$conn = dbConnect();

returnSitterByListing($connection,$sitter);


		
		?>