<!DOCTYPE html>
<html>
<body>
<?php
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "deleteAll":
	{
	$con=mysqli_connect("localhost","root","","cart");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query($con,"DELETE FROM cart_details ORDER BY user_name");
header("Location: viewAllTransaction.php");
mysqli_close($con);
}
	break;
}
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT  * FROM cart_details";
$result = $conn->query($sql);
?>
<a id="btnEmpty" href="cartDetail.php?action=deleteAll">Empty Cart</a>
<form method = "post" action = "<?php $_PHP_SELF ?>">


<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;" width="10%;">Name</th>
<th style="text-align:left;" width="10%;">Code</th>
<th style="text-align:left;" width="10%;">Quantity</th>
<th style="text-align:left;" width="10%;">Unit Price</th>
<th style="text-align:left;" width="10%;">Price</th>
<th style="text-align:left;" width="10%;">User Name</th>
<th style="text-align:left;" width="10%;">Time</th>
<th style="text-align:left;" width="10%;">Category</th>
<th style="text-align:left;" width="10%;">Amount</th>
<th style="text-align:left;" width="10%;">Delete</th>
</tr>	

			              <?php

                  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   
                ?>
				
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
th {
  text-align: left;
}
</style>


				<!--<table style="width:100%">

                 <tbody>-->
				 
				<tr>
                <td style="text-align:left;" width="10%;"><?php echo $row['name']; ?></td> 
                  <td style="text-align:left;" width="10%;"><?php echo $row['code']; ?></td> 
                  <td style="text-align:left;"width="10%;"><?php echo $row['quantity']; ?></td> 
				  <td style="text-align:left;" width="10%;"><?php echo $row['unit_price']; ?></td> 
                  <td style="text-align:left;"width="10%;"><?php echo $row['price']; ?></td> 
				  <td style="text-align:left;"width="10%;"><?php echo $row['user_name']; ?></td> 
				  <td style="text-align:left;"width="10%;"><?php echo $row['time']; ?></td> 
				  <td style="text-align:left;"width="10%;"><?php echo $row['category']; ?></td>
				  <td style="text-align:left;"width="10%;"><?php echo $row['amount']; ?></td>
				  <td style="text-align:center;"width="10%;"><a href='delete.php?id=<?php echo $row['code']; ?>'><img src="icon-delete.png" alt="Remove Item" /></td> 
				  </tr>
				  
                <?php

                }
                }
                 ?>
				</tbody>
				  </table>
              </form>

</body>
</html>