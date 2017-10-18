<?php
        session_start();
?>        
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css"/>
        <title></title>
    </head>
    <body>
        <?php
        if(isset($_SESSION['username']))
            require_once 'header.php';
        else 
            require_once 'header_1.php';
        ?>
        <div id="register">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <table id="mainTable">
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Register"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <table id="mainTable">
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Login"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div>
            <?php
                if(isset($_REQUEST['result'])){
                    if($_REQUEST['result']="fail"){
                        echo '<p>Login Failed</p>';
                    }
                    elseif($_REQUEST['result']="logout"){
                        echo '<p>Logged out successfully</p>';
                    }
                    else{
                        echo "";
                    }
                    
                }
            ?>
        </div>
    </body>
</html>
