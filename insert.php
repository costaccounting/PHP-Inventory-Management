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
        <form name="itemList" method="post" action="insert1.php">
            <input type="text" placeholder="Type the name of product" name="itemName">
            <input type="text" placeholder="Type the price" name="itemPrice">
            <input type="submit" name="Add" value="Add">
            
        </form><br><br>
        

<?php
    echo "<table id=\"listTable\">";
    echo "<tr><th>Item</th><th>Price</th></tr> ";
    if (isset($_REQUEST['add'])) {
        if($_REQUEST['add']=="success"){
            $query = "SELECT itemName, itemPrice FROM tblItems where userName = '$username'";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>". $row["itemName"] . "</td><td>" . $row["itemPrice"] . "</td></tr>";
                }
                echo "</table>";
                echo '<br><p>1 field added.</p>';
            }
            
        }else{
            $query = "SELECT itemName, itemPrice FROM tblItems where userName = '$username'";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>". $row["itemName"] . "</td><td>" . $row["itemPrice"] . "</td></tr>";
                }
                echo "</table>";
                echo '<br><p>0 field added.</p>';
            }
        }
      
    }
    
            
?>


        <form action="logout.php" method="post">
            <input type="submit" value="Logout">
        </form>
    </body>
</html>
