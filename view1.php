<?php

// include check_session.php to check if the session exists  
require_once 'check_session.php';
require_once 'config.php';
session_start();
$username = $_SESSION['username'];
$item = $_POST['itemName'];
$price = $_POST['itemPrice'];
$_SESSION['item'] = $_POST['itemName'];
$_SESSION['price'] = $_POST['itemPrice'];
if(isset($_POST['Search'])){
    if( isset($_POST["itemName"]) && !empty($_POST["itemName"])){
        $query = "SELECT itemName, itemPrice FROM tblItems WHERE userName = '$username' AND "
                . "LOWER(itemName) LIKE LOWER('%$item%');";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            header('location:view.php?search=success');
        } else {
            header('location:view.php?search=fail');
        }
        
    }
    else{
        header('location:view.php?search=all');
    }
}
?>
