<?php
require_once('config.php');

//session 
session_start();

if($_SESSION['logged'] != 1){
   header("Location: login.php");
}

if(isset($_POST['logout'])){
   session_destroy();
   header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<title>All Orders</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $storeName; ?></h1>
<div id="viewCart">
<form method="post"><input type="submit" id="logout" name="logout" value="Logout"></form>
  <span id="viewTitle">All Orders</span><a href="admin.php">Back to Admin Panel</a><br><br>
     <table class="productTable">
	 <tr>
	    <td class="tableHeader">Order ID</td>
		<td class="tableHeader">Items</td>
		<td class="tableHeader">Amount</td>
		<td class="tableHeader">Paid?</td>
		<td class="tableHeader">Completed?</td>
	 </tr>
	 <?php 
	 $queryOrders = "SELECT * FROM orders ORDER BY time DESC";
	 $doOrders = mysqli_query($conn, $queryOrders) or die(mysqli_error($conn));
	 while($loopOrders = mysqli_fetch_assoc($doOrders))
	 {
	 echo "<tr>";
	 echo "<td><a href='order.php?id=".$loopOrders['orderid']."'>".$loopOrders['orderid']."</a></td>";
	 echo "<td>".$loopOrders['items']."</td>";
	 echo "<td>".$loopOrders['cost']."</td>";
	 if($loopOrders['paid'] == 1){ $loopPaid = "Yes"; } else { $loopPaid = "No"; }
	 echo "<td>".$loopPaid."</td>";
	 if($loopOrders['complete'] == 1){ $loopComplete = "Yes"; } else { $loopComplete = "No"; }
	 echo "<td>".$loopComplete."</td>";
	 echo "</tr>";
	 }
	 ?>
	 </table><br>
</div>
<br>
</body>
</html>