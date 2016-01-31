<?php
require_once('config.php');

//session 
session_start();

//count items in array
$cartItems = count($_SESSION['tedi']);
$cart = $_SESSION['tedi'];


function escapeInput ($input){
$escaped = mysqli_real_escape_string($conn, $input);
return $escaped;
}

//redirect if self navigating pages
if($cartItems < 1)
   {
   header("Location: cart.php");
   }

if(isset($_POST['submit'])){
        $_SESSION['email'] = escapeInput($_POST['email']);
        $_SESSION['name'] = escapeInput(trim($_POST['name']));
        $_SESSION['address'] = escapeInput(trim($_POST['address']));
		$_SESSION['address2'] = escapeInput(trim($_POST['address2']));
        $_SESSION['city'] = escapeInput(trim($_POST['city']));
        $_SESSION['state'] = escapeInput(trim($_POST['state']));
        $_SESSION['zip'] = escapeInput(trim($_POST['zip']));
		$_SESSION['country'] = escapeInput(trim($_POST['country']));
		
		if(empty($_SESSION['email']) || empty($_SESSION['name']) || empty($_SESSION['address']) || empty($_SESSION['city']) || empty($_SESSION['zip'])){
		$message = "<span class='errMsg'>Form is incomplete!</span>";
		} else {
		header('Location: confirm.php');
		}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $storeName; ?></h1>

<div id="viewCart">
  <span id="viewTitle">Shipping Information</span><br>
  <form method="post">
  EMAIL<br>
  <input type="email" class="text" name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?>"><br>
  NAME<br>
  <input type="text" class="text" name="name" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; }?>"><br>
  ADDRESS<br>
  <input type="text" class="text" name="address" value="<?php if(isset($_SESSION['address'])){ echo $_SESSION['address']; }?>"><br>
  ADDRESS 2<br>
  <input type="text" class="text" name="address2" value="<?php if(isset($_SESSION['address2'])){ echo $_SESSION['address2']; }?>"><br>
  CITY<br>
  <input type="text" class="text" name="city" value="<?php if(isset($_SESSION['city'])){ echo $_SESSION['city']; }?>"><br>
  STATE/PROVINCE/REGION<br>
  <input type="text" class="text" name="state" value="<?php if(isset($_SESSION['state'])){ echo $_SESSION['state']; }?>"><br>
  ZIP/POSTAL CODE<br>
  <input type="text" class="text" name="zip" value="<?php if(isset($_SESSION['zip'])){ echo $_SESSION['zip']; }?>"><br>
  COUNTRY<br>
  <input type="text" class="text" name="country" value="<?php if(isset($_SESSION['country'])){ echo $_SESSION['country']; }?>"><br><br>
  <div id="checkCont"><input type="submit" class="button" value="SUBMIT" name="submit"></form></div>
  <a href="cart.php">Go Back</a><br>
  <?php if(isset($message)){ echo $message; } ?>
</div>
<br>
</body>
</html>