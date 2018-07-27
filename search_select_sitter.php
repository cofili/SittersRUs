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

//If they did and they are a Customer, we send the keyword to returnSitterResults

function returnSitterResults($connection,$keyword) 
{
$sql = "SELECT * FROM Sitter where Sitter_about like '%$keyword%' or Sitter_location like '%$keyword%' or Sitter_Fname like '%$keyword%' or Sitter_Lname like '%$keyword%'" ;


//$result = $connection->query($sql);

$result = mysqli_query($connection, $sql);

if ($result->num_rows > 0) {
   // output data of each row     
   while($row = $result->fetch_assoc()) 
   {  
       $sitter= $row["Sitter_username"];
       //echo $sitter;
       echo "Name: " . $row['Sitter_Fname']. " " . $row['Sitter_Lname']."  About:". $row['Sitter_about']. "<br>".
    
       " <a href='http://aalibra.create.stedwards.edu/cosc3339/publicSitter.php?sitter=$sitter'>View Sitter</a><br><br>";
       
   }
       
} //end of if

else {
    echo "0 results"; }
    
}//end of function


//$conn = dbConnect();

returnSitterResults($connection,$keyword);

//And we remind them what they searched for
echo "<br><b>Searched For:</b> " .$keyword;
//}
?>


</body>
</html>