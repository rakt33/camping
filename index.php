<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$users = "";
$orders = "";
// Include config file
require_once "config/config.php";


/*
// Query for the users
$sql = "SELECT COUNT(id) FROM users";
$results = $link->query($sql);

if ($results->num_rows > 0) {
// output data of each row
while($row_users = $results->fetch_assoc()) {
	$users = $row_users;
}
} else {
// nothing | 0 results
}
*/
?>

<!DOCTYPE html>
<html>
<!-- Get header from header.php -->
<?php
    include ("files/head.php");
?>

<body>
<div class="wrapper">
	
	<!-- Get header from header.php -->
	<?php
	    include ("files/header.php");
	?>
    
	<!-- Get menu from menu.php -->
	<?php
	    include ("files/menu.php");
	?>

    <!-- Content Wrapper. Contains page content -->
    <?php
	    include ("files/footer.php");
	?>
</div>

</body>
</html>
