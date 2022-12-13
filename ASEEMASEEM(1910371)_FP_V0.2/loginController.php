<?php
ob_start();// turn on output buffering
session_start();//start new or resume existing session
require_once('config.php'); // config file
require_once(MYSQL_CLASS_DIR.'DBConnection.php'); // file to make database connection
require_once(PHP_FUNCTION_DIR.'phpfunctions.php'); // file to access predefine php funtion
$dbObj = new DBConnection();// database connection objects

$mode = $_REQUEST['mode']; //requested mode

//mode to register
if($mode=='register'){
		
		//select username in database
		$dbObj->dbQuery = "select * from customers WHERE username='".$_REQUEST['username']."'";
		$dbUserName = $dbObj->SelectQuery();
		
		$password = md5($dbObj->sc_mysql_escape(trim($_REQUEST['password']))); //encrypt password
		
		//check username in database
		if(count((array)$dbUserName)>0) {
			echo 1;
			exit;
		}else{
			
		//code to upload images
		if(isset($_FILES['customer_picture']) && $_FILES['customer_picture']['size']>0){
		
			$image_name = time().'_'.str_replace(' ','-',$_FILES['customer_picture']['name']); // to remane image
			$temp = explode('.',$_FILES['customer_picture']['name']); // explode to get image extension
			$ext = $temp[count($temp)-1]; // get image extension
			
			$info['customer_picture'] = $image_name;
	
			move_uploaded_file($_FILES['customer_picture']['tmp_name'],CUSTOMER_IMAGE_PATH.$image_name); // upload image in folder
		}
		
		//requested data to insert database
		$info['firstname'] = $dbObj->sc_mysql_escape($_REQUEST['firstname']);
		$info['lastname'] = $dbObj->sc_mysql_escape($_REQUEST['lastname']);
		$info['address'] = $dbObj->sc_mysql_escape($_REQUEST['address']);
		$info['city'] = $dbObj->sc_mysql_escape($_REQUEST['city']);
		$info['postalcode'] = $dbObj->sc_mysql_escape($_REQUEST['postalcode']);
		$info['username'] = $dbObj->sc_mysql_escape(trim($_REQUEST['username']));
		$info['password'] = $password;
		$info['creation_date_time'] = date("Y-m-d H:i:s");
		$info['modification_date_time'] = date("Y-m-d H:i:s");
		
		add_record($dbObj,'customers',$info); //insert data in database
		
		echo 2;
		exit;
	}
}


//LOGOUT MODULE
if($mode=='logout'){
	
	unset($_SESSION['user']); // to unset login session
	
	$msg = base64_encode("Logout successfully...."); // message about action performed
	header("location:login.php?msg=".$msg);//redirect page url
	exit;
}


// LOGIN MODULE
if($mode=="login"){
	
	$username = $dbObj->sc_mysql_escape($_REQUEST['username']);//requested username
	$password = $dbObj->sc_mysql_escape($_REQUEST['password']);//requested password
	
	//select username and password in database
	$dbObj->dbQuery="select * from customers where username='".$username."' AND password='".md5(trim($password))."'";
    $dbResult = $dbObj->SelectQuery();
	
	
	if(count((array)$dbResult)>0){ // if username and password get match with satabase
		
		$_SESSION['user']['is_login'] = 1;	// login session is set
		$_SESSION['user']['username'] = $dbResult[0]['username'];// username set in session
		$_SESSION['user']['userid'] = $dbResult[0]['id'];// userid set in session
		
		header("location:account.php"); //after login redirect url
		exit; 
		
	} else { // if user and password does not match with database
		$msg = base64_encode("Invalid Username or Password....");// message about action performed
		header("location:login.php?msg=".$msg);// redirect url
		exit;
	}
}


//mode to update account
if($mode=='update_account'){
	
	//select username and userid in database
	$dbObj->dbQuery = "select * from customers WHERE username='".$dbObj->sc_mysql_escape($_REQUEST['username'])."' and id!='".$_SESSION['user']['userid']."'";
	$dbUserName = $dbObj->SelectQuery();
	
	//check username in database
	if(count((array)$dbUserName)>0) {
		$msg = base64_encode("Username Already Exists.");//message about action performed
		header("location:register.php?msg=".$msg);//redirect page url
		exit;
	}else{
	
	//code to upload images
	if(isset($_FILES['customer_picture']) && $_FILES['customer_picture']['size']>0){
	
		$image_name = time().'_'.str_replace(' ','-',$_FILES['customer_picture']['name']); // to remane image
		$temp = explode('.',$_FILES['customer_picture']['name']); // explode to get image extension
		$ext = $temp[count($temp)-1]; // get image extension
		
		$info['customer_picture'] = $image_name;
		
		//to remove image
		$dbObj->dbQuery = "select * from customers WHERE id='".$_SESSION['user']['userid']."'";
		$imgRes = $dbObj->SelectQuery();
		
		if(file_exists(CUSTOMER_IMAGE_PATH.$imgRes[0]['customer_picture']) && !empty($imgRes[0]['customer_picture'])){
			unlink(CUSTOMER_IMAGE_PATH.$imgRes[0]['customer_picture']); //remove original image form folder
		}

		move_uploaded_file($_FILES['customer_picture']['tmp_name'],CUSTOMER_IMAGE_PATH.$image_name); // upload image in folder
	}
	
	//requested data to insert database
	$info['firstname'] = $dbObj->sc_mysql_escape($_REQUEST['firstname']);
	$info['lastname'] = $dbObj->sc_mysql_escape($_REQUEST['lastname']);
	$info['address'] = $dbObj->sc_mysql_escape($_REQUEST['address']);
	$info['city'] = $dbObj->sc_mysql_escape($_REQUEST['city']);
	$info['postalcode'] = $dbObj->sc_mysql_escape($_REQUEST['postalcode']);
	$info['username'] = $dbObj->sc_mysql_escape($_REQUEST['username']);
	$info['password'] = $dbObj->sc_mysql_escape(md5(trim($_REQUEST['password'])));
	$info['modification_date_time'] = date('Y-m-d H:i:s');
	modify_record($dbObj,'customers',$info,'id='.$_SESSION['user']['userid']); // to modify record
	
	$_SESSION['msg'] = base64_encode("Profile Update Successfully."); // message about action performed
	header("location:account.php");//redirect url
	exit;
	}
}
?>