<?php
ob_start();// turn on output buffering
session_start();//start new or resume existing session
require_once('config.php'); // config file
require_once(MYSQL_CLASS_DIR.'DBConnection.php'); // file to make database connection
require_once(PHP_FUNCTION_DIR.'phpfunctions.php'); // file to access predefine php funtion
$dbObj = new DBConnection();// database connection object

$mode = $_REQUEST['mode'];//requested mode

//mode to save_order
if($mode=='save_order'){
		
	  //select data for products table in database
	  $dbObj->dbQuery="select * from products where id='".$dbObj->sc_mysql_escape($_REQUEST['productId'])."'";
   	  $dbProduct = $dbObj->SelectQuery();
	  
	  $subtotal = $dbProduct[0]['retail_price'] * $_REQUEST['quantity'];// calculate subtotal
	  $tax_amount = $subtotal * TAX_RATE/100;//calculate tax
	  $grand_total = $subtotal + $tax_amount;//calculate grand total
	
	  //requested data to insert database
	  $info['customerId'] = $_SESSION['user']['userid'];
	  $info['productId'] = $dbObj->sc_mysql_escape($_REQUEST['productId']);
	  $info['comments'] = $dbObj->sc_mysql_escape($_REQUEST['comments']);
	  $info['quantity'] = $dbObj->sc_mysql_escape($_REQUEST['quantity']);
	  $info['price'] = $dbObj->sc_mysql_escape($dbProduct[0]['retail_price']);
	  $info['subtotal'] = $subtotal;
	  $info['tax_amount'] = $tax_amount;
	  $info['grand_total'] = $grand_total;
	  $info['order_date_time'] = date("Y-m-d H:i:s");
	  
	  add_record($dbObj,'orders',$info); //insert data in database
	  
	  header("location:orders.php");//redirect page url
	  exit;
}

//mode to get orders
if($mode=="getOrders"){
	
	$search_date = $dbObj->sc_mysql_escape($_REQUEST['search_date']);//request date
	
	//select order data in database
	$dbObj->dbQuery="select * from orders where customerId='".$_SESSION['user']['userid']."'";
	if(!empty($search_date)) {
		$dbObj->dbQuery .= " and date(order_date_time)='".$search_date."'";
	}
   	$dbOrders = $dbObj->SelectQuery();
	
	//select customers data in database
	$dbObj->dbQuery = "select * from customers WHERE id='".$_SESSION['user']['userid']."'";
	$dbUser = $dbObj->SelectQuery();
	
	//display orders table action performed in ajax 
	$data='<table class="table">
      <thead class="table-h">
        <tr>
          <th class="left-text">Delete</th>
          <th class="left-text">Date</th>
          <th class="left-text">Product<br>code</th>
          <th class="left-text">First<br>name</th>
          <th class="left-text">Last<br>name</th>
          <th class="left-text">City</th>
          <th class="left-text">Comments</th>
          <th class="right-text">Price</th>
          <th class="right-text">Qty</th>
          <th class="right-text">Subtotal</th>
          <th class="right-text">Taxes</th>
          <th class="right-text">Total</th>
        </tr>
      </thead>
      <tbody>';
	    if(count((array)$dbOrders)>0){ //count table data
        for($i=0;$i<count((array)$dbOrders);$i++) { //for loop repeat order data
			
			//select products table data using product id
			$dbObj->dbQuery = "select * from products where id='".$dbOrders[$i]['productId']."'";
			$dbProducts = $dbObj->SelectQuery();
			
		//display order data
        $data.='<tr>
          <td class="left-text"><a href="orderController.php?mode=delete_order&orderId='.$dbOrders[$i]['id'].'" class="delete-btn">Delete</a></td>
          <td class="left-text">'.date('Y-m-d',strtotime($dbOrders[$i]['order_date_time'])).'</td>
          <td class="left-text">'.$dbProducts[0]['product_code'].'</td>
          <td class="left-text">'.$dbUser[0]['firstname'].'</td>
          <td class="left-text">'.$dbUser[0]['lastname'].'</td>
          <td class="left-text">'.$dbUser[0]['city'].'</td>
          <td class="left-text">'.$dbOrders[$i]['comments'].'</td>
          <td class="right-text">'.$dbOrders[$i]['price'].'$</td>
          <td class="right-text">'.$dbOrders[$i]['quantity'].'</td>
          <td class="right-text">'.$dbOrders[$i]['subtotal'].'$</td>
          <td class="right-text">'.$dbOrders[$i]['tax_amount'].'$</td>
          <td class="right-text">'.$dbOrders[$i]['grand_total'].'$</td>
        </tr>';
         }}else{
			 //if count order data 0
			$data.='<tr>
          <td colspan="12" class="text-center red-color">No orders found</td>
        </tr>';
		}
      $data.='</tbody>
    </table>';
	
	echo $data;//display table
	exit;
}


//mode to delete orders
if($mode=='delete_order'){  //to delete seleted record

	$orderId = $dbObj->sc_mysql_escape($_REQUEST['orderId']);  // id of selected record to delete
	
	delete_record($dbObj,'orders','id='.$orderId); //delete query
	
	header("location:orders.php");//redirect page url
	exit;	
}
?>