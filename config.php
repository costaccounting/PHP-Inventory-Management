<?php
    $host = 'localhost';
    $user = 'mitrapro_admin';
    $pswd = "(celeste1234)";
    $dbName = "mitrapro_db1";
    $conn = mysqli_connect($host, $user, $pswd, $dbName);
    
    if(empty($conn)) {
        die("connection error<br>". mysqli_connect_error());
    }
    
