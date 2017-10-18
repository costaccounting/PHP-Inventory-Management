<?php
    ob_start();
    require_once 'config.php';
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $query = "SELECT username FROM tblUsers WHERE username = '$username';";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result)>0){
        header('location:index.php?result=userexists');
    }
    else{
        $query = "INSERT INTO tblUsers(username,password) VALUES('$username','$password');";

        $result = mysqli_query($conn, $query);

        if($result == 1)
            header('location:index.php?result=success');
        else
            header('location:index.php?result=fail');
    }

?>
