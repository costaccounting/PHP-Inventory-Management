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
if(isset($_POST['Add'])){
    if( isset($_POST["itemName"]) && isset($_POST["itemPrice"]) && !empty($_POST["itemName"])&& !empty($_POST["itemPrice"])  ){
        $query = "INSERT INTO tblItems (itemID, userName, itemName, itemPrice) VALUES ( NULL, '$username', '$item', '$price')";
        $result = mysqli_query($conn, $query);
        header('location:insert.php?add=success');
        
    }
    else{
        header('location:insert.php?add=fail');
    }

}
?>
