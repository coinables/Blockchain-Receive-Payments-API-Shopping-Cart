<?php
require_once('config.php');

//session 
session_start();

if($_SESSION['logged'] != 1){
   header("Location: login.php");
}

$order = $_GET['id'];

$queryOrder = "SELECT * FROM orders WHERE orderid = '$order'";
$doOrder = mysqli_query($conn, $queryOrder) or die(mysqli_error($conn));
$fetchOrder = mysqli_fetch_assoc($doOrder);
$uname = $fetchOrder['name'];
$ship = $fetchOrder['address'];
$ship2 = $fetchOrder['address2'];
$city = $fetchOrder['city'];
$state = $fetchOrder['state'];
$zip = $fetchOrder['zip'];
$country = $fetchOrder['country'];
$email = $fetchOrder['email'];
$confirmShip = $uname."<br>".$ship."<br>".$ship2."<br>".$city.", ".$state." ".$zip."<br>".$country."<br>".$email;
$address = $fetchOrder['payto'];
$items = $fetchOrder['items'];
$itemsArr = explode(" ", $items);
$orderItems = count($itemsArr);
$paid = $fetchOrder['paid'];
$recd = $fetchOrder['recd'];
$recdCalc = $recd / 100000000;
$cost = $fetchOrder['cost'];
if($cost > $recdCalc){
  $difMsg = "Under Paid";
} else if($recdCalc > $cost){
  $difMsg = "Over Paid";
} else {
  $difMsg = "None";
}
if($paid == 1){
   $paidMsg = "Yes - <a href='https://blockchain.info/address/".$address."' target='_blank'>View on Blockchain.info</a>";
} else {
   $paidMsg = "No - <a href='https://blockchain.info/address/".$address."' target='_blank'>Receiving Address</a>";
}

if(isset($_POST['complete'])){
   $queryComplete = "UPDATE orders SET complete = 1 WHERE orderid = '$order'";
   $doComplete = mysqli_query($conn, $queryComplete) or die(mysqli_error($conn));
   $message = "Order Marked Complete";
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Order</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $storeName; ?></h1>
<?php if(isset($message)){ echo "<center>".$message."</center>"; } ?>
<div id="viewCart">
  <span id="viewTitle">Order: <?php echo $order; ?></span><a href="admin.php">Back to Admin Panel</a><br><br>
     <b>Paid:</b> <?php echo $paidMsg; ?><br>
	 <b>Amount Paid:</b> <?php echo $recdCalc; ?><br>
	 <b>Order Amount:</b> <?php echo $cost; ?><br>
	 <b>Difference:</b> <?php echo $difMsg; ?><br>
	 <form method="post"><input type="submit" name="complete" value="Mark Order Complete"></form>
	 <br><br>
	 Ship To:
  <div class="confirmShip">
  <?php echo $confirmShip; ?>
  </div><br><br>
  Order:
  <div class="confirmShip">
 <?php echo $items."<br>"; 
 for($i=0; $i<$orderItems; $i++)
	{
	$queryLoopOrder = "SELECT * FROM products WHERE id = '$itemsArr[$i]'";
	$doLoopOrder = mysqli_query($conn, $queryLoopOrder);
	$rowLoopOrder = mysqli_fetch_assoc($doLoopOrder);
	$loopName = $rowLoopOrder['name'];
	$loopPrice = $rowLoopOrder['price'];
	echo $loopName." $".$loopPrice."<br>";
	}
 ?>
  
  </div><br>
</div>
<br>
</body>
</html>