<?php 
    $dbhost = "localhost";
    $dbname = "testyt"; 
    $dbuser = "root";
    $dbpass = "";

    $baza = mysqli_connect($dbhost,$dbuser,$dbpass);
    if (mysqli_connect_errno()) {
        exit();
    }
    
    mysqli_select_db($baza, $dbname);
    mysqli_query($baza, "SET CHARACTER SET UTF8");


?>