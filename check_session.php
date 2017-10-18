<?php
    // write PHP code that checks if a session exists
session_start();
    if(empty($_SESSION['username'])){
        header('location:index.php');
    }
	