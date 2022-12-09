<!--Head-->
<?php 
ob_start();// turn on output buffering
session_start();//start new or resume existing session
require_once("config.php"); // inlclude config file 
require_once(MYSQL_CLASS_DIR.'DBConnection.php'); // file to make database connection
require_once(PHP_FUNCTION_DIR.'phpfunctions.php'); // file to access predefine php funtion
$dbObj = new DBConnection();// database connection object
include(INCLUDE_DIR.'head.php'); // inlclude head file

//check login
if(!isset($_SESSION['user']['is_login'])) {
	header('location:login.php');
	exit;
}

//select v data in database
$dbObj->dbQuery="select * from orders where customerId='".$_SESSION['user']['userid']."' order by order_date_time";
$dbOrders = $dbObj->SelectQuery();

//select customers data in database
$dbObj->dbQuery = "select * from customers WHERE id='".$_SESSION['user']['userid']."'";
$dbUser = $dbObj->SelectQuery();
?>
<!--end of Head-->
<!--container-->
<div class="container page-spec min-height">
<!--Orders-->
  <div class="form-sec">
    <h2 class="top-heading text-center">Orders</h2>
  </div>
  <!--end of heading Orders-->
  <div class="clear"> </div>
  <div class="table-css">
    <div class="form-sec">
      <!-- order search form-->
      <form method="post" id="searchForm">
        <div class="form-css">
          <div class="float-left w-49">
            <input type="text" name="search_date" id="search_date" class="input-css2" placeholder="2022-03-13">
          </div>
          <div class="float-left w-49">
            <input type="button" onClick="get_orders();" class="delete-btn mt" value="Search">
          </div>
        </div>
      </form>
      <!--order search form end-->
    </div>
    <!--orders table-->
    <div id="orderData">
    <table class="table">
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
      <tbody>
      <?php
	    if(count((array)$dbOrders)>0){ //count table data
        for($i=0;$i<count((array)$dbOrders);$i++) {  //for loop repeat order data
			
			//select products table data using product id
			$dbObj->dbQuery = "select * from products where id='".$dbOrders[$i]['productId']."'";
			$dbProducts = $dbObj->SelectQuery();
		?>
        <!--display order data-->
        <tr>
          <td class="left-text"><a href="orderController.php?mode=delete_order&orderId=<?=$dbOrders[$i]['id']?>" class="delete-btn">Delete</a></td>
          <td class="left-text"><?=date('Y-m-d',strtotime($dbOrders[$i]['order_date_time']))?></td>
          <td class="left-text"><?=$dbProducts[0]['product_code']?></td>
          <td class="left-text"><?=$dbUser[0]['firstname']?></td>
          <td class="left-text"><?=$dbUser[0]['lastname']?></td>
          <td class="left-text"><?=$dbUser[0]['city']?></td>
          <td class="left-text"><?=$dbOrders[$i]['comments']?></td>
          <td class="right-text"><?=$dbOrders[$i]['price']?>$</td>
          <td class="right-text"><?=$dbOrders[$i]['quantity']?></td>
          <td class="right-text"><?=$dbOrders[$i]['subtotal']?>$</td>
          <td class="right-text"><?=$dbOrders[$i]['tax_amount']?>$</td>
          <td class="right-text"><?=$dbOrders[$i]['grand_total']?>$</td>
        </tr>
         <?php }}else{ ?>
         <!--if count order data 0-->
			<tr>
          <td colspan="12" class="text-center red-color">No orders found</td>
        </tr>
		<?php }?>
      </tbody>
    </table>
    </div>
    <!--end of orders table-->
  </div>
</div>
<!-- end of container-->
</div>
<script type="text/javascript">
//function get orders
function get_orders(){
	
	var form_data=$('#searchForm').serialize(); //get form data
	
	$.ajax({
		url:"orderController.php?mode=getOrders", //send data to controller
		data:form_data,
		cache:false,
		async:false,
		success: function(data){
			document.getElementById("orderData").innerHTML = data; //display fetch data in controller
		}
	});
}
</script>
<!--footer-->
<?php include(INCLUDE_DIR.'footer.php');//include footer file ?>
<!--end of footer-->