<?php
// include check_session.php to check if the session exists  
require_once 'check_session.php';
require_once 'config.php';
session_start();
$username = $_SESSION['username'];
$item = $_SESSION['item'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Member's Page - List of Items</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <?php
        require_once 'header.php';
        ?>

        <h2>Welcome <?php echo $username; ?></h2>

        <p>Add or find items for your list</p>
        <form name="itemList" method="post" action="view1.php">
            <input type="text" placeholder="Type the name of product" name="itemName">
            <input type="submit" name="Search" value="Search">
            
        </form><br><br>
        

<?php
    echo "<table id=\"listTable\">";
    echo "<tr><th>Item</th><th>Price</th></tr> ";
    if (isset($_REQUEST['search'])){
        if ($_REQUEST['search'] == "success"){
            $query = "SELECT itemName, itemPrice FROM tblItems WHERE userName = '$username' AND "
                    . "LOWER(itemName) LIKE LOWER('%$item%')";
            $result = mysqli_query($conn, $query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["itemName"] . "</td><td>" . $row["itemPrice"] . "</td></tr>";
            }
            echo "</table>";
            echo '<br><p>'.mysqli_num_rows ($result).' fields found.</p>';
        }
        elseif($_REQUEST['search'] == "all"){
            $query = "SELECT itemName, itemPrice FROM tblItems WHERE userName = '$username'";
            $result = mysqli_query($conn, $query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["itemName"] . "</td><td>" . $row["itemPrice"] . "</td></tr>";
            }
            echo "</table>";
            echo '<br><p>Showing all fields</p>';
            
        }
        else{
            echo "</table>";
            echo '<br><p>Search faied</p>';
            
        }
        
    }
    
            
?>


        <form action="logout.php" method="post">
            <input type="submit" value="Logout">
        </form>
    </body>
</html>
