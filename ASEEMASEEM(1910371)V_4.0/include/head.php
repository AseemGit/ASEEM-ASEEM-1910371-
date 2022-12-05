<!-- 
#DEVELOPER  DATE  COMMENTS
#ASEEM ASEEM(1910371) 1 Dec 2022  Created Project - Three pages, index, orders, and buy design
--> 
 
<?php
//cache control
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$pageName = basename($_SERVER['PHP_SELF'], '.php');
$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : '';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>
<?php if($pageName=='buying'){?>
Foodie : Buying
<?php }elseif($pageName=='orders'){?>
Foodie : Orders
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
    <?php if($action=='print'){?>
      <div class="logo-wrap-print"> <a href="index.php"><img src="images/logo.png" width="120" alt="Logo Image"></a> </div>
      <?php }else{?>
      <div class="logo-wrap"> <a href="index.php"><img src="images/logo.png" width="120" alt="Logo Image"></a> </div>
      <?php }?>
      <div class="nav-wrap">
        <nav class="nav-desktop">
          <ul class="menu-list">
            <li><a href="index.php">HOME</a></li>
            <li><a href="buying.php">BUY FOOD </a></li>
            <li><a href="orders.php">ORDERS</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>