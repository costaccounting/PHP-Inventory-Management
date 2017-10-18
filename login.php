<?php
    require_once 'config.php';
    
    session_start();
    
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    
    $query = "SELECT username FROM tblUsers WHERE username = '$username' AND "
            . "password = '$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        
        $_SESSION['username']= $username;
        header('location:view.php');
    }
    else{
        header('location:index.php?result=fail');
    }
            
?>
