<?php 
require_once("config.php"); // inlclude config file 
include(INCLUDE_DIR.'head.php'); // inlclude head file?>
<?php
if(file_exists(FILE_FOLDER_PATH.'orders.txt')){
	
	$filename = FILE_FOLDER_PATH.'orders.txt';
	$data = file_get_contents($filename); //data read from json file
	$orders = json_decode($data);  //decode a data
}
?>

  <div class="container page-spec min-height">
    <div class="form-sec">
      <h2 class="top-heading text-center">Orders</h2>
      <!-- The form -->
    </div>
    <div class="clear"> </div>
    <div class="table-css">
     <table class="table">
        <thead class="table-h">
          <tr>
            <th class="left-text">Product<br> 
            ID</th>
            <th class="left-text">First <br>
            name</th>
            <th class="left-text">Last <br>
            name</th>
            <th class="left-text">City</th>
            <th class="left-text">Comments</th>
            <th class="right-text">Price</th>
            <th class="right-text">Quantity </th>
            <th class="right-text">Subtotal </th>
            <th class="right-text">Taxes </th>
            <th class="right-text">Grand total </th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order) { ?>
          <tr>
            <td class="left-text"><?=$order->ProductCode?></td>
            <td class="left-text"><?=$order->FirstName?> </td>
            <td class="left-text"><?=$order->LastName?> </td>
            <td class="left-text"><?=$order->City?></td>
            <td class="left-text"><?=$order->Comments?></td>
            <td class="right-text"><?=$order->Price?>$</td>
            <td class="right-text"><?=$order->Quantity?></td>
            <td class="right-text">
            <?php if($action=='color'){?>
            <?php if($order->Subtotal<100){?>
			<span class="red-color"><?=$order->Subtotal?>$ </span>
            <?php }elseif($order->Subtotal>=100 && $order->Subtotal<=999){?>
			<span class="orange-color"><?=$order->Subtotal?>$ </span>
            <?php }elseif($order->Subtotal>=1000){?>
			<span class="green-color"><?=$order->Subtotal?>$ </span>
            <?php }?>
            <?php }else{?>
            <?=$order->Subtotal?>$
            <?php }?>
            </td>
            <td class="right-text"><?=$order->TaxesAmount?>$</td>
            <td class="right-text"><?=$order->GrandTotal?>$ </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include(INCLUDE_DIR.'footer.php');?>