<?php

require_once('config.php');

//session 
session_start();
//create empty array for cart
if(!isset($_SESSION['tedi'])){
$_SESSION['tedi'] = array();
}
//get current exchange rate
if(!isset($_SESSION['exr'])){
$url = "https://coinbase.com/api/v1/prices/spot_rate";
$json = json_decode(file_get_contents($url), true);
$price = $json["amount"];
$_SESSION['exr'] = $price;
}

//count items in array
$cartItems = count($_SESSION['tedi']);
$cart = $_SESSION['tedi'];

$queryProducts2 ="SELECT * FROM products WHERE in_stock > 0 ORDER BY id ASC";
$resultH2=mysqli_query($conn, $queryProducts2) or die (mysqli_error($conn));
while($outputsH2=mysqli_fetch_assoc($resultH2)){
if(isset($_POST[$outputsH2['id']])){
       array_push($_SESSION['tedi'], $outputsH2['id']);
	   $cartItems = count($_SESSION['tedi']);
       $cart = $_SESSION['tedi'];
   }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Shop</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $storeName; ?></h1>

<div id="cartCont">
   <div id="cartHeader">Your Cart</div>
    <div id="cartSpace">
	
	<?php
 $usdOwed = 0;
	for($i=0; $i<$cartItems; $i++)
	{
	$queryLoopCart = "SELECT * FROM products WHERE id = '$cart[$i]'";
	$doLoopCart = mysqli_query($conn, $queryLoopCart);
	$rowLoopCart = mysqli_fetch_assoc($doLoopCart);
	$loopName = $rowLoopCart['name'];
	$loopPrice = $rowLoopCart['price'];
	$usdOwed += $loopPrice;
	echo $loopName."<span class='cartPrice'>$".$loopPrice."</span>";
	echo"<br><br>";
	}
	
	echo "</div>";
	echo "<div id='cartCost'>$".$usdOwed."</div>";
		
?>
   <form action="cart.php"><input type="submit" value="View Cart"></form>
</div>
<?php
$queryProducts ="SELECT * FROM products WHERE in_stock > 0 ORDER BY id ASC";
$resultH=mysqli_query($conn, $queryProducts) or die (mysqli_error($conn));
while($outputsH=mysqli_fetch_assoc($resultH)){
   echo "<div class='shopCont'>";
   echo "<div class='shopImg'><img src='".$outputsH['image']."'></div>";
   echo "<div class='shopDesc'>";
   echo "<span class='itemName'>".$outputsH['name']."</span>";
   echo "<span class='itemCost'>$".$outputsH['price']."</span>";
   echo $outputsH['description']."</div>";   
   echo "<div class='shopAdd'><form method='post'><input type='submit' value='Add To Cart' name='".$outputsH['id']."'></form></div>";
   echo "</div>";
   echo "<div class='shopCont'><hr></div>";
}
?>
<br>
</body>
</html>