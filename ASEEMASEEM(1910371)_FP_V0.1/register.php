<!--Head-->
<?php 
require_once("config.php"); // inlclude config file 
include(INCLUDE_DIR.'head.php'); // inlclude head file
$msg = !empty($_REQUEST['msg']) ? $_REQUEST['msg'] : '';// message about action performed
?>
<!--end of Head-->
<div class="container page-spec min-height">
<!--register form-->
  <form id="accForm" method="post" onSubmit="return checkForm();" enctype="multipart/form-data" autocomplete="off">
    <div class="form-sec">
      <h2 class="top-heading text-center">Register</h2>
      <p class="red-color">
        <?=base64_decode($msg)?>
      </p>
      <div class="form-css">
        <div class="float-left w-49">
          <p>First name <span class="red-color">*</span></p>
          <input name="firstname" id="firstname" type="text" class="input-css2" maxlength="<?=FIRSTNAME_MAX_LENGTH?>" onblur="fnameFunction()">
          <p id="errorfname" class="red-color"></p>
        </div>
        <div class="float-left w-49">
          <p>Last name <span class="red-color">*</span></p>
          <input name="lastname" id="lastname" type="text" class="input-css2" maxlength="<?=LASTNAME_MAX_LENGTH?>" onblur="lnameFunction()">
          <p id="errorlname" class="red-color"></p>
        </div>
        <div class="clear"></div>
        <p>Address <span class="red-color">*</span></p>
        <textarea name="address" id="address" cols="10" class="input-css2" rows="4" maxlength="<?=ADDRESS_MAX_LENGTH?>" onblur="addressFunction()"></textarea>
        <p id="erroraddress" class="red-color"></p>
        <div class="clear"></div>
        <div class="float-left w-49">
          <p>City <span class="red-color">*</span></p>
          <input name="city" id="city" type="text" class="input-css2" maxlength="<?=CITY_MAX_LENGTH?>" onblur="cityFunction()">
          <p id="errorcity" class="red-color"></p>
        </div>
        <div class="float-left w-49">
          <p>Postal code <span class="red-color">*</span></p>
          <input name="postalcode" id="postalcode" type="text" class="input-css2" maxlength="<?=POSTAL_CODE_MAX_LENGTH?>" onblur="postalFunction()">
          <p id="errorpostcode" class="red-color"></p>
        </div>
        <div class="clear"></div>
        <div class="float-left w-49">
          <p>Username <span class="red-color">*</span></p>
          <input name="username" id="username" type="text" class="input-css2" maxlength="<?=USERNAME_MAX_LENGTH?>" onblur="usernameFunction()">
          <p id="erroruser" class="red-color"></p><span class="red-color" id="usernameexisterror"></span>
        </div>
        <div class="float-left w-49">
          <p>Password <span class="red-color">*</span></p>
          <input name="password" id="password" type="password" class="input-css2" maxlength="<?=PASSWORD_MAX_LENGTH?>" onblur="passwordFunction()">
          <p id="errorpassword" class="red-color"></p>
        </div>
        <div class="clear"></div>
        <p>Picture <span class="red-color">*</span></p>
        <input name="customer_picture" id="customer_picture" type="file">
        <p id="errorpicture" class="red-color"></p>
        <div class="clear"></div>
        <div class="text-center">
          <input class="submit-btn" type="submit" onClick="submit_host();" value="Register">
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </form>
 <!-- end of register form-->
</div>
<!--footer-->
<?php include(INCLUDE_DIR.'footer.php');//include footer file ?>
<!--end of footer-->
<!--validation javascript-->
<script src="js/Validation.js"></script> 
<script>
//this function hide error
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
	
	if(isEmpty(" ",document.getElementById("customer_picture").value)) {
		document.getElementById("errorpicture").style.display = "block";
		document.getElementById("customer_picture").focus();
		document.getElementById("errorpicture").innerHTML=(" Picture cannot be empty. ");
		return false;
	}
	
	return true;
}

//after validation form submit using ajax
function submit_host(){
	
	if(checkForm() == true){ //check validation
		
		$("form#accForm").submit(function(e) {
			e.preventDefault();    
			var formData = new FormData(this); //get form data
		
			$.ajax({
				url: "loginController.php?mode=register", //send data to controller
				type: 'POST',
				data: formData,
				success: function (data) {
					
					if(data==1) {
						document.getElementById("usernameexisterror").innerHTML = 'Username Already Exists.'; //error message if username already exists in database
					}else if(data==2) {
						window.location.href = 'register.php?msg=<?=base64_encode('Congratulation! Registration Successfull.')?>'; //redirect url and message after form submit
					}
				
				},
				cache: false,
				async:true,
				contentType: false,
				processData: false
			});
		});
		
	}
}
</script>