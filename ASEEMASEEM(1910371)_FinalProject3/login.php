<!--Head-->
<?php 
require_once("config.php"); // inlclude config file 
include(INCLUDE_DIR.'head.php'); //include head file
$msg = !empty($_REQUEST['msg']) ? $_REQUEST['msg'] : ''; // message about action performed
?>
<!--end of Head-->
<div class="container min-height">
<!--form-->
  <form action="loginController.php" id="accForm" method="post" onSubmit="return checkForm();" autocomplete="off">
  <input type="hidden" name="mode" value="login">
    <div class="login-box">
      <h2>Login</h2>
      <p class="red-color"><?=base64_decode($msg)?></p>
      <p>Username</p>
        <input name="username" id="username" type="text" class="input-css2" placeholder="Username" onblur="usernameFunction()">
        <p id="erroruser" class="red-color"></p>
      
      <p>Password</p>
        <input name="password" id="password" type="password" class="input-css2" placeholder="Password" onblur="passwordFunction()">
        <p id="errorpassword" class="red-color"></p>
      
      <p> Need a user account ? <a href="register.php">Register </a> </p>
      <div class="text-center">
        <input class="submit-btn" type="submit" value="Login">
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
//this function hide error
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
	
	
	return true;
}

//after validation form submit
function submit_host(){
	if(checkForm() == true){ //check validation
		document.getElementById("accForm").submit(); //submit form
	}
}
</script>
