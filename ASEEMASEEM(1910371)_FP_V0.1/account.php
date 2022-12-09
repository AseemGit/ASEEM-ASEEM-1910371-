<!--Head-->
<?php 
ob_start(); // turn on output buffering
session_start(); //start new or resume existing session
require_once("config.php"); // inlclude config file
require_once(MYSQL_CLASS_DIR.'DBConnection.php'); // file to make database connection
require_once(PHP_FUNCTION_DIR.'phpfunctions.php'); // file to access predefine php funtion
$dbObj = new DBConnection();// database connection object
include(INCLUDE_DIR.'head.php'); //include head file
$msg = !empty($_REQUEST['msg']) ? $_REQUEST['msg'] : ''; //message about action performed

//check login
if(!isset($_SESSION['user']['is_login'])) {
	header('location:login.php');
	exit;
}

//select data in database
$dbObj->dbQuery = "select * from customers WHERE id='".$_SESSION['user']['userid']."'";
$dbUser = $dbObj->SelectQuery();
?>
<!--end of Head-->
<div class="container">
  <div class="login-box">
    <div class="form-sec">
    <!-- heading -->
      <h2 class="top-heading text-center">Welcome </h2>
      <div class="text-center">
        <?=$dbUser[0]['firstname'].' '.$dbUser[0]['lastname']?>
      </div>
      <!-- end of heading -->
    </div>
    <br>
    <p class="text-center"> <img src="customerimage/<?=$dbUser[0]['customer_picture']?>" width="150"> </p>
    <div class="clear"></div>
    <br>
    <p class="text-center"> <a href="loginController.php?mode=logout" class="submit-btn">Logout</a> </p>
  </div>
</div>
<div class="container page-spec">
<!--form-->
  <form action="loginController.php" id="accForm" method="post" onSubmit="return checkForm();" enctype="multipart/form-data" autocomplete="off">
  <input type="hidden" name="mode" value="update_account">
    <div class="form-sec">
    <p class="red-color"><?=base64_decode($msg)?></p>
      <div class="form-css">
        <div class="float-left w-49">
          <p>First name <span class="red-color">*</span></p>
          <input name="firstname" id="firstname" type="text" class="input-css2" maxlength="<?=FIRSTNAME_MAX_LENGTH?>" value="<?=$dbUser[0]['firstname']?>" onblur="fnameFunction()">
          <p id="errorfname" class="red-color"></p>
        </div>
        <div class="float-left w-49">
          <p>Last name <span class="red-color">*</span></p>
          <input name="lastname" id="lastname" type="text" class="input-css2" maxlength="<?=LASTNAME_MAX_LENGTH?>" value="<?=$dbUser[0]['lastname']?>" onblur="lnameFunction()">
          <p id="errorlname" class="red-color"></p>
        </div>
        <div class="clear"></div>
        <p>Address <span class="red-color">*</span></p>
        <textarea name="address" id="address" cols="10" class="input-css2" rows="4" maxlength="<?=ADDRESS_MAX_LENGTH?>" onblur="addressFunction()"><?=$dbUser[0]['address']?></textarea>
        <p id="erroraddress" class="red-color"></p>
        <div class="clear"></div>
        <div class="float-left w-49">
          <p>City <span class="red-color">*</span></p>
          <input name="city" id="city" type="text" class="input-css2" maxlength="<?=CITY_MAX_LENGTH?>" value="<?=$dbUser[0]['city']?>" onblur="cityFunction()">
          <p id="errorcity" class="red-color"></p>
        </div>
        <div class="float-left w-49">
          <p>Postal code <span class="red-color">*</span></p>
          <input name="postalcode" id="postalcode" type="text" class="input-css2" maxlength="<?=POSTAL_CODE_MAX_LENGTH?>" value="<?=$dbUser[0]['postalcode']?>" onblur="postalFunction()">
          <p id="errorpostcode" class="red-color"></p>
        </div>
        <div class="clear"></div>
        <div class="float-left w-49">
          <p>Username <span class="red-color">*</span></p>
          <input name="username" id="username" type="text" class="input-css2" maxlength="<?=USERNAME_MAX_LENGTH?>" value="<?=$dbUser[0]['username']?>" onblur="usernameFunction()">
          <p id="erroruser" class="red-color"></p>
        </div>
        <div class="float-left w-49">
          <p>Password <span class="red-color">*</span></p>
          <input name="password" id="password" type="password" class="input-css2" maxlength="<?=PASSWORD_MAX_LENGTH?>" onblur="passwordFunction()">
          <p id="errorpassword" class="red-color"></p>
        </div>
        <div class="clear"></div>
        <p>Picture <span class="red-color">*</span></p>
        <img src="customerimage/<?=$dbUser[0]['customer_picture']?>" width="100"><br />
        <input name="customer_picture" id="customer_picture" type="file">
        <p id="errorpicture" class="red-color"></p>
        <div class="clear"></div>
        <div class="text-center">
          <input class="submit-btn" type="submit" value="Update Info">
        </div>
      </div>
    </div>
  </form>
   <!--end of form-->
</div>
<!--footer-->
<?php include(INCLUDE_DIR.'footer.php'); //include footer file?>
<!--end of footer-->
<!--validation javascript-->
<script src="js/Validation.js"></script>
<script>
c
function fnameFunction() {
	if(!isEmpty(" ",document.getElementById("firstname").value)) {
 		document.getElementById("errorfname").style.display = "none";
	}
}
function lnameFunction() {
	if(!isEmpty(" ",document.getElementById("lastname").value)) {
 		document.getElementById("errorlname").style.display = "none";
	}
}
function addressFunction() {
	if(!isEmpty(" ",document.getElementById("address").value)) {
 		document.getElementById("erroraddress").style.display = "none";
	}
}
function cityFunction() {
	if(!isEmpty(" ",document.getElementById("city").value)) {
 		document.getElementById("errorcity").style.display = "none";
	}
}
function postalFunction() {
	if(!isEmpty(" ",document.getElementById("postalcode").value)) {
 		document.getElementById("errorpostcode").style.display = "none";
	}
}
function usernameFunction() {
	if(!isEmpty(" ",document.getElementById("username").value)) {
 		document.getElementById("erroruser").style.display = "none";
	}
}
function passwordFunction() {
	if(!isEmpty(" ",document.getElementById("password").value)) {
 		document.getElementById("errorpassword").style.display = "none";
	}
}

//validation
function checkForm() {

	if(isEmpty(" ",document.getElementById("firstname").value)) {
		document.getElementById("errorfname").style.display = "block";
		document.getElementById("firstname").focus();
		document.getElementById("errorfname").innerHTML=(" First name cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("lastname").value)) {
		document.getElementById("errorlname").style.display = "block";
		document.getElementById("errorfname").style.display = "none";
		document.getElementById("lastname").focus();
		document.getElementById("errorlname").innerHTML=(" Last name cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("address").value)) {
		document.getElementById("erroraddress").style.display = "block";
		document.getElementById("address").focus();
		document.getElementById("erroraddress").innerHTML=(" Address cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("city").value)) {
		document.getElementById("errorcity").style.display = "block";
		document.getElementById("city").focus();
		document.getElementById("errorcity").innerHTML=(" City cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("postalcode").value)) {
		document.getElementById("errorpostcode").style.display = "block";
		document.getElementById("postalcode").focus();
		document.getElementById("errorpostcode").innerHTML=(" Postal code cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("username").value)) {
		document.getElementById("erroruser").style.display = "block";
		document.getElementById("username").focus();
		document.getElementById("erroruser").innerHTML=(" Username cannot be empty. ");
		return false;
	}
	
	if(isEmpty(" ",document.getElementById("password").value)) {
		document.getElementById("errorpassword").style.display = "block";
		document.getElementById("password").focus();
		document.getElementById("errorpassword").innerHTML=(" Password cannot be empty. ");
		return false;
	}
	
	<? if(empty($dbUser[0]['customer_picture'])){?>
	if(isEmpty(" ",document.getElementById("customer_picture").value)) {
		document.getElementById("errorpicture").style.display = "block";
		document.getElementById("customer_picture").focus();
		document.getElementById("errorpicture").innerHTML=(" Picture cannot be empty. ");
		return false;
	}
	<? }?>
	
	return true;
}

//after validation form submit
function submit_host(){
	if(checkForm() == true){ //check validation
		document.getElementById("accForm").submit(); //submit form
	}
}
</script>