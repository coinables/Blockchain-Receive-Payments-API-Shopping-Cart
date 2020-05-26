<?php

//database login info
$dbuser = "username";
$dbpw = "password";
$db = "databse_Name";

//blockchain info API Key and your xpub BIP32 public key
$api_key = "Y2BhjljBRMdoWUeSQRq75RyHtlNJBd8FRLa1BT5oL2Vr3zaHGoumNnI8i87BJkhZ";
$xpub = "xpub6BgyETiwKAAbFLS1so6AqCaoVzqmh3KNnxiZmExjwZPfwMxc7TBqnFiqGhVEvFSzQqMdnpnPQ3pRGzqiRWgRCk39XnvkccQnR6te63cPps4";
$secret = "Hell Mary, All Eyes On Me"; //this can be anything you want

//Specific to you the store owner
$storeName = "BlocMoney";
$rootURL = "https://github.com/godbody93/Blockchain-Receive-Payments-API-Shopping-Cart"; //example https://mysite.org  or http://yourhomepage.com/store
$yourEmail = "ladon.loggins@gmail.com";  //email notifications will be sent to this email when a new order is placed

//pw to access the admin pages
$adminPW = "Hell Mary, All Eyes On Me"; 

//connect to the database
$conn = mysqli_connect("localhost", $dbuser, $dbpw, $db);
if(!$conn){
  die('Connection Error: '.mysqli_errno());
}
