<!--Head-->
<?php
require_once("config.php"); // inlclude config file 
include(INCLUDE_DIR.'head.php'); // inlclude head file
$msg = !empty($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
?>
<!--end of Head-->
<div class="container page-spec min-height">
  <!-- heading -->
  <h2 class="top-heading text-left"> BUY FOOD </h2>
  <!-- end of heading -->
  <!--form-->
  <p class="red-color">
    <?=base64_decode($msg)?>
  </p>
  <form action="save_order.php" id="accForm" method="post" onSubmit="return checkForm();" autocomplete="off">
    <table class="table">
      <tr>
        <td width="60%"><div class="form-css">
            <p>Product code <span class="red-color">*</span></p>
            <input name="product_code" id="product_code" type="text" class="input-css2" maxlength="<?=CUSTOMER_PRODUCT_CODE_MAX_LENGTH?>" onblur="productcodeFunction()">
            <p id="errorProduct" class="red-color"></p>
            <div class="float-left w-49">
              <p>Customer First name <span class="red-color">*</span></p>
              <input name="fname" id="fname" type="text" class="input-css2" maxlength="<?=CUSTOMER_FIRSTNAME_MAX_LENGTH?>" onblur="fnameFunction()">
              <p id="errorfname" class="red-color"></p>
            </div>
            <div class="float-left w-49">
              <p>Customer Last name <span class="red-color">*</span></p>
              <input name="lname" id="lname" type="text" class="input-css2" maxlength="<?=CUSTOMER_LASTNAME_MAX_LENGTH?>" onblur="lnameFunction()">
              <p id="errorlname" class="red-color"></p>
            </div>
            <div class="clear"></div>
            <p>Customer City <span class="red-color">*</span></p>
            <input name="city" id="city" type="text" class="input-css2" maxlength="<?=CUSTOMER_CITY_MAX_LENGTH?>" onblur="cityFunction()">
            <p id="errorcity" class="red-color"></p>
            <div class="clear"></div>
            <p>Comments </p>
            <textarea name="comments" id="comments" cols="10" class="input-css2" rows="5" maxlength="<?=CUSTOMER_COMMENTS_MAX_LENGTH?>"></textarea>
            <div class="clear"></div>
            <div class="float-left w-49">
              <p>Price <span class="red-color">*</span></p>
              <input name="price" id="price" type="text" class="input-css2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onblur="priceFunction()">
              <p id="errorprice" class="red-color"></p>
            </div>
            <div class="float-left w-49">
              <p>Quantity <span class="red-color">*</span></p>
              <input name="quantity" id="quantity" type="text" class="input-css2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*)\./g, '$1');" onblur="qtyFunction()">
              <p id="errorqty" class="red-color"></p>
            </div>
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
<?php include(INCLUDE_DIR.'footer.php');?>
<!--end of footer-->
<script src="js/Validation.js"></script>
<script>
function productcodeFunction() {
	if(!isEmpty(" ",document.getElementById("product_code").value)) {
 		document.getElementById("errorProduct").style.display = "none";
		var productcode = document.getElementById("product_code").value;
		var checkproductcode = "prd";
		if (productcode.toLowerCase().includes(checkproductcode.toLowerCase())) {
		document.getElementById("errorProduct").style.display = "none";
		} else {
			document.getElementById("errorProduct").style.display = "block";
		}
	}
}
function fnameFunction() {
	if(!isEmpty(" ",document.getElementById("fname").value)) {
 		document.getElementById("errorfname").style.display = "none";
	}
}
function lnameFunction() {
	if(!isEmpty(" ",document.getElementById("lname").value)) {
 		document.getElementById("errorlname").style.display = "none";
	}
}
function cityFunction() {
	if(!isEmpty(" ",document.getElementById("city").value)) {
 		document.getElementById("errorcity").style.display = "none";
	}
}
function priceFunction() {
	if(!isEmpty(" ",document.getElementById("price").value)) {
 		document.getElementById("errorprice").style.display = "none";
		var priceval = document.getElementById("price").value;
		if(priceval>10000){
			document.getElementById("errorprice").style.display = "block";
		}
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
function checkForm() {

	if(isEmpty(" ",document.getElementById("product_code").value)) {
		document.getElementById("errorProduct").style.display = "block";
		document.getElementById("product_code").focus();
		document.getElementById("errorProduct").innerHTML=(" Product code cannot be empty. ");
		return false;
	}
	
	var productcode = document.getElementById("product_code").value;
	var checkproductcode = "prd";
	
	if (productcode.toLowerCase().includes(checkproductcode.toLowerCase())) {
		document.getElementById("errorProduct").style.display = "none";
	} else {
		document.getElementById("errorProduct").style.display = "block";
		document.getElementById("errorProduct").innerHTML=("Product-code must always contain the letters PRD. For example: 45-Prd-MOUSE is a valid product code.");
		document.getElementById("product_code").focus();
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("fname").value)) {
		document.getElementById("errorfname").style.display = "block";
		document.getElementById("fname").focus();
		document.getElementById("errorfname").innerHTML=(" First name cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("lname").value)) {
		document.getElementById("errorlname").style.display = "block";
		document.getElementById("errorfname").style.display = "none";
		document.getElementById("lname").focus();
		document.getElementById("errorlname").innerHTML=(" Last name cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("city").value)) {
		document.getElementById("errorcity").style.display = "block";
		document.getElementById("city").focus();
		document.getElementById("errorcity").innerHTML=(" City cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("price").value)) {
		document.getElementById("errorprice").style.display = "block";
		document.getElementById("price").focus();
		document.getElementById("errorprice").innerHTML=(" Price cannot be empty. ");
		return false;
	}
	
	var priceval = document.getElementById("price").value;
	if(priceval>10000){
		document.getElementById("errorprice").style.display = "block";
		document.getElementById("price").focus();
		document.getElementById("errorprice").innerHTML=(" Price cannot be higher than 10000$ ");
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


function submit_host(){
	if(checkForm() == true){
		document.getElementById("accForm").submit();
	}
}
</script>
