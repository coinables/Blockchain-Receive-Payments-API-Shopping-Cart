<?php
require_once('config.php');

//session 
session_start();

if($_SESSION['logged'] != 1){
   header("Location: login.php");
}

if(isset($_POST['add']))
{
   
  $name = mysqli_real_escape_string($conn, $_POST['pname']);
  $cost = mysqli_real_escape_string($conn, $_POST['price']);
  if($cost < 0.00001){ $cost = 0.00001; }
  $desc = mysqli_real_escape_string($conn, $_POST['description']);
  $image = mysqli_real_escape_string($conn, $_POST['image']);
  $instock = 1;
  $queryAdd = "INSERT INTO products (name, price, description, image, in_stock) VALUES ('$name', '$cost', '$desc', '$image', '$instock')";
  $doAdd = mysqli_query($conn, $queryAdd) or die(mysqli_error($conn));
  $message = "New Item Added";
}

if(isset($_POST['logout'])){
   session_destroy();
   header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $storeName; ?></h1>
<?php if(isset($message)){ echo "<center>".$message."</center>"; } ?>
<div id="viewCart">
<form method="post"><input type="submit" id="logout" name="logout" value="Logout"></form>
  <span id="viewTitle">Recent Orders</span><a href="orders.php">(view all)</a><br>
     <table class="productTable">
	 <tr>
	    <td class="tableHeader">Order ID</td>
		<td class="tableHeader">Items</td>
		<td class="tableHeader">Amount</td>
		<td class="tableHeader">Paid?</td>
		<td class="tableHeader">Completed?</td>
	 </tr>
	 <?php 
	 $queryOrders = "SELECT * FROM orders ORDER BY time DESC LIMIT 10";
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
	 </table><br><br>
  <span id="viewTitle">Manage Inventory</span><br>
     <table class="productTable">
	 <tr>
	    <td class="tableHeader">Product ID</td>
		<td class="tableHeader">Name</td>
		<td class="tableHeader">Price in BTC</td>
		<td class="tableHeader">Description</td>
		<td class="tableHeader">Image Link</td>
		<td class="tableHeader">In Stock</td>
		<td class="tableHeader">Manage</td>
	 </tr>
	 <?php
	 $queryProducts = "SELECT * FROM products ORDER BY id ASC";
	 $doProducts = mysqli_query($conn, $queryProducts) or die(mysqli_error($conn));
	 while($loopProducts = mysqli_fetch_assoc($doProducts))
	 {
	 echo "<tr>";
	 echo "<td>".$loopProducts['id']."</td>";
	 echo "<td>".$loopProducts['name']."</td>";
	 echo "<td>&#x0E3F;".$loopProducts['price']."</td>";
	 echo "<td>".substr($loopProducts['description'], 0, 250)."</td>";
	 echo "<td>".$loopProducts['image']."</td>";
	 if($loopProducts['in_stock'] == 1){ $loopStock = "Yes"; } else { $loopStock = "No"; }
	 echo "<td>".$loopStock."</td>";
	 echo "<td><a href='product.php?item=".$loopProducts['id']."'>Edit/Remove</a></td>";
	 echo "<tr>";
	 }
	 ?>
	 </table>
     <br><br>
	  <span id="viewTitle">Add Item</span><br>
	  <b>Product Name</b><br>
	  <form method="post">
	  <input type="text" class="text" name="pname"><br>
	  <b>Price BTC (0.00001 Minimum)</b><br>
	  <input type="text" class="text" name="price"><br>
	  <b>Description</b><br>
	  <textarea class="inputArea" name="description"></textarea><br><br>
	  <b>Image Link</b> example: http://i.stack.imgur.com/m9uaE.png<br>
	  <input type="url" class="text" name="image"><br>
	  <input type="submit" id="add" name="add" value="Add Product">
	  </form>
	  <br><br>
</div>
<br>
</body>
</html>