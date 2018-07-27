<?php

//require_once 'search_select_listing.php';
showForm();

//require_once "connect.php";



if(!empty($_POST)) {
    echo "<p>Please enter a search term";
}

if(isset($_POST['keyword']))
{
echo "I got a keyword";

returnSitterResults('keyword');
}

if(isset($_POST['field']))
{
//returnLocationResults('keyword');

echo "I got a field";

}

function showForm()
{
echo"<!DOCTYPE html>";
echo"<html>";

echo"<head>";
echo"<title>Searching for a job listing...</title>";
echo"</head>";

echo"<body bgcolor=#ffffff>";

echo"<h2>Find the perfect job listing here:</br></h2>";

echo"<h3>Try searching by pet type, location, or other key words.</br></h3>";

echo"<form name='search' method='post' action='search_select_listing.php'>";
echo"Seach for: <input type='text' name='keyword' />";
//echo"<Select NAME='field' name='field'>";
//echo"<Option VALUE='about' name='about'>All</option>";
//echo"<Option VALUE='location' name='location'>Location</option>";
//echo"<Option VALUE='availability' name='availability'>Availability</option>";

echo"</Select>";

echo"<input type='submit' name='search' value='Search' />";
echo"</form>";

echo"</body>";

echo"</html>";
}

?>