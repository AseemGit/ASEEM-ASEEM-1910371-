<!-- 
#DEVELOPER  DATE  COMMENTS
#ASEEM ASEEM(1910371) 1 Dec 2022  Created Project - Three pages, index, orders, and buy design
-->

<?php
ob_start(); // turn on output buffering
session_start(); //start new or resume existing session

//cache control
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//get page name
$pageName = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>
<?php if($pageName=='buy'){ //set title according to page?>
Foodie : Buy
<?php }elseif($pageName=='orders'){ //set title according to page?>
Foodie : Orders
<?php }elseif($pageName=='register'){ //set title according to page?>
Foodie : Register
<?php }elseif($pageName=='login'){ //set title according to page?>
Foodie : Login
<?php }elseif($pageName=='account'){ //set title according to page?>
Foodie : Account
<?php }else{?>
Foodie : Home
<?php }?>
</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
</head>
<body>
<div>
<header class="site-header"> 
  <!-- Top header Close -->
  <div class="main-header">
    <div class="container">
      <div class="logo-wrap"> <a href="index.php"><img src="images/logo.png" width="120" alt="Logo Image"></a> </div>
      <div class="nav-wrap">
        <nav class="nav-desktop">
          <ul class="menu-list">
            <li><a href="index.php">HOME</a></li>
            <!--check user login-->
            <?php if(!isset($_SESSION['user']['is_login'])) {?>
            <li><a href="login.php">BUY FOOD </a></li>
            <li><a href="login.php">ORDERS</a></li>
            <?php }else{?>
            <li><a href="buy.php">BUY FOOD </a></li>
            <li><a href="orders.php">ORDERS</a></li>
            <?php }?>
            
            <!--check user login-->
            <?php if(!isset($_SESSION['user']['is_login'])) {?>
            <li><a href="login.php">LOGIN</a></li>
            <?php }else{?>
            <li><a href="loginController.php?mode=logout">LOGOUT</a></li>
            <?php }?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>