<?php

$connection = mysqli_connect('localhost', 'aalibrac', 'yR6160svXv');
    if (!$connection){
        die("Database Connection Failed" . mysqli_error($connection));
    }
    $select_db = mysqli_select_db($connection, 'aalibrac_sitterRus');
    if (!$select_db){
        die("Database Selection Failed" . mysqli_error($connection));
    }
    ?>