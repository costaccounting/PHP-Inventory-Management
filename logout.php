<?php
    session_start();// write your code here
    header('location:login.php?result=logout');
    session_destroy();
    
?>
