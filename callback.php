<?php

require_once('config.php');

if($_GET['secret'] != $secret)
{
  die('Stop doing that');
} 
else 
{
//update DB
$order_num = $_GET['invoice'];
$amount = $_GET['value'];
$amountCalc = $amount / 100000000;
$queryOrder = "SELECT * FROM orders WHERE orderid = '$order_num'";
$doOrder = mysqli_query($conn, $queryOrder);
$fetchOrder = mysqli_fetch_assoc($doOrder);
$costOrder = $fetchOrder['cost'];
   $queryUpdate = "UPDATE orders SET paid = 1, recd = $amount WHERE orderid = '$order_num'";
   $doUpdate = mysqli_query($conn, $queryUpdate) or die(mysqli_error($conn));
   echo "*ok*";
}

?>