<html>
<head><title>Searching...</title>
</head>
<body bgcolor=#ffffff>

<?php
include_once ('connect.php');

session_start();

$keyword=$_POST['keyword'];
echo "<h2>Search Results:</h2><p>";

//If they did not enter a search term we give them an error
if ($keyword == "")
{
echo "<p>Please enter a search term";
exit;
}

//If they did and they are a Sitter, we send the keyword to returnListingResults

function returnListingResults($connection,$keyword) 
{
$sql = "select * from List where List_location like '%$keyword%' or List_description like '%$keyword%'" ;


$result = mysqli_query($connection, $sql);
if ($result->num_rows > 0) {
   // output data of each row     
   while($row = $result->fetch_assoc()) 
   {  
       $poster= $row["List_username"];
       //echo $poster;
       echo "Listing: " . $row["List_description"]. " <br>". " <a href='http://aalibra.create.stedwards.edu/cosc3339/publicCustomer.php?poster=$poster'>View Listing</a><br><br>"  ."<br>";   
       //return $poster;
       //Link function here
   }
       
} //end of if

else {
    echo "0 results"; }
    
}//end of function


//$conn = dbConnect();

returnListingResults($connection,$keyword);


//And we remind them what they searched for
echo "<b>Searched For:</b> " .$keyword;
//}
?>


</body>
</html>