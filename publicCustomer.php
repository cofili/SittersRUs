<?php

	include('../cosc3339/connect.php');
//	include('../cosc3339/search_select_listing.php');

    $poster = $_GET['poster'];
   echo $poster;
    




function returnCustomerByListing($connection,$poster) 
{
$sql = "select * from Customer where Customer_username='$poster'";
$result = mysqli_query($connection, $sql);


if ($result->num_rows > 0) 
{
   // output data of each row     
   while($row = $result->fetch_assoc()) 
   {  
     
       echo "Customer: " . $row["Customer_Fname"]. "<br>".
      "Location: " . $row["Customer_location"]. "<br>".
      "Pet Type: " . $row["Customer_petType"]. "<br>".
      "Age: " . $row["Customer_age"]. "<br>".
      "About: " . $row["Customer_about"]. "<br>".
      " <a href='http://aalibra.create.stedwards.edu/cosc3339/send.php'>Message</a><br><br>";
      
         
     
   }
       
} //end of if

else {
    echo "0 results"; }
    
}//end of function


//$conn = dbConnect();

returnCustomerByListing($connection,$poster);


		
		?>