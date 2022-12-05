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
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <thead class="table-h">
          <tr>
            <th align="left">Product<br> 
            ID</th>
            <th align="left">First <br>
            name</th>
            <th align="left">Last <br>
            name</th>
            <th align="left">City</th>
            <th align="left">Comments</th>
            <th align="right">Price</th>
            <th align="right">Quantity </th>
            <th align="right">Subtotal </th>
            <th align="right">Taxes </th>
            <th align="right">Grand total </th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order) { ?>
          <tr>
            <td align="left"><?=$order->ProductCode?></td>
            <td align="left"><?=$order->FirstName?> </td>
            <td align="left"><?=$order->LastName?> </td>
            <td align="left"><?=$order->City?></td>
            <td align="left"><?=$order->Comments?></td>
            <td align="right"><?=$order->Price?>$</td>
            <td align="right"><?=$order->Quantity?></td>
            <td align="right">
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
            <td align="right"><?=$order->TaxesAmount?>$</td>
            <td align="right"><?=$order->GrandTotal?>$ </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include(INCLUDE_DIR.'footer.php');?>