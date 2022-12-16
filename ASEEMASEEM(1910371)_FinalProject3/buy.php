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

//select data in database
$dbObj->dbQuery = "select * from products";
$dbProduct = $dbObj->SelectQuery();
?>
  <div class="container page-spec min-height">
  <!-- heading --> 
    <h2 class="top-heading text-left"> BUY FOOD </h2>
    <!-- end of heading -->
    <!--form-->
    <form action="orderController.php" id="accForm" method="post" onSubmit="return checkForm();" autocomplete="off">
    <input type="hidden" name="mode" value="save_order">
   <table class="table">
      <tr>
        <td width="60%">
        <div class="form-css">
            <p>Product <span class="red-color">*</span></p>
            <select name="productId" id="productId" class="input-css2" onchange="productcodeFunction()">
            <option value="">Choose</option>
            <?php for($i=0;$i<count((array)$dbProduct);$i++){?>
            <option value="<?=$dbProduct[$i]['id']?>"><?=$dbProduct[$i]['product_code']?></option>
            <?php }?>
            </select>
            <p id="errorProduct" class="red-color"></p>
            <div class="clear"></div>
            <p>Comments </p>
            <textarea name="comments" id="comments" cols="10" class="input-css2" rows="5" maxlength="<?=COMMENTS_MAX_LENGTH?>"></textarea>
            <div class="clear"></div>
            <p>Quantity <span class="red-color">*</span></p>
            <input name="quantity" id="quantity" type="text" class="input-css2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*)\./g, '$1');" onblur="qtyFunction()">
            <p id="errorqty" class="red-color"></p>
            <div class="clear"></div>
            <div class="text-center">
              <input class="submit-btn" type="submit" value="Submit">
            </div>
          </div>
          <div class="clear"></div></td>
        <td width="40%" class="v-top"><img src="images/home-img2.jpg"></td>
      </tr>
    </table>
    </form>
    <!--end of form-->
  </div>
</div>
<!--footer-->
<?php include(INCLUDE_DIR.'footer.php'); //include footer file ?>
<!--end of footer-->
<!--validation javascript-->
<script src="js/Validation.js"></script>
<script>
//this function hide error
function productcodeFunction() {
	if(!isEmpty(" ",document.getElementById("productId").value)) {
 		document.getElementById("errorProduct").style.display = "none";
	}else{
		document.getElementById("errorProduct").style.display = "block";	
	}
}

function qtyFunction() {
	if(!isEmpty(" ",document.getElementById("quantity").value)) {
 		document.getElementById("errorqty").style.display = "none";
		var qtyval = document.getElementById("quantity").value;
		if(qtyval>99){
			document.getElementById("errorqty").style.display = "block";
		}
	}
}

//validation
function checkForm() {

	if(isEmpty(" ",document.getElementById("productId").value)) {
		document.getElementById("errorProduct").style.display = "block";
		document.getElementById("productId").focus();
		document.getElementById("errorProduct").innerHTML=(" Product code cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("quantity").value)) {
		document.getElementById("errorqty").style.display = "block";
		document.getElementById("quantity").focus();
		document.getElementById("errorqty").innerHTML=(" Quantity cannot be empty. ");
		return false;
	}
	
	var qtyval = document.getElementById("quantity").value;
	if(qtyval>99){
		document.getElementById("errorqty").style.display = "block";
		document.getElementById("quantity").focus();
		document.getElementById("errorqty").innerHTML=(" Quantity must be a numeric value between 1 and 99 ");
		return false;
	}
	
	return true;
}

//after validation form submit
function submit_host(){
	if(checkForm() == true){ //check validation
		document.getElementById("accForm").submit(); //submit form
	}
}
</script>