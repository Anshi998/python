<?php
$con=mysqli_connect("localhost","root","","cart");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($con,"DELETE FROM cart_details WHERE code='".$id."'");
mysqli_close($con);
header("Location: userSpecificCard.php");
?> 