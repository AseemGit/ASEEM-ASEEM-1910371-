<?php
/*if ($_SERVER['HTTPS']!="on") {
      $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      header("Location:$redirect"); 
} 

if($_SERVER["HTTPS"]){
	$host = $_SERVER['HTTP_HOST'];
	$host1 = explode(".",$host);
	if($host1[0]!='www'){
		$host = "www.".$host;
		$page = $_SERVER['PHP_SELF'];
		header("Location:https://".$host);
	}
}*/

//Set url constant
define('SITE_URL', 'http://localhost');
define('LINK', SITE_URL.'/ASEEMASEEM(1910371)project3v1/');

//Set folder constant
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].'/ASEEMASEEM(1910371)project3v1/');
define('INCLUDE_DIR',ROOT_DIR.'include/');
define('CLASS_DIR', ROOT_DIR.'classes/');
define('MYSQL_CLASS_DIR', CLASS_DIR.'mysql/');
define('PHP_FUNCTION_DIR', CLASS_DIR.'php_functions/');
define('ERROR_LOG', ROOT_DIR.'errorlog/');

//set image path
define('CUSTOMER_IMAGE_PATH',ROOT_DIR.'customerimage/');

//set form character limit
define('FIRSTNAME_MAX_LENGTH','20');
define('LASTNAME_MAX_LENGTH','20');
define('ADDRESS_MAX_LENGTH','25');
define('CITY_MAX_LENGTH','25');
define('POSTAL_CODE_MAX_LENGTH','7');
define('USERNAME_MAX_LENGTH','15');
define('PASSWORD_MAX_LENGTH','255');
define('COMMENTS_MAX_LENGTH','200');
define('TAX_RATE','13.7');

//MYSQL Database Related
define('MYSQL_DB_SERVER','localhost');
define('MYSQL_DB_NAME', 'database1910371');
define('MYSQL_DB_USER','root');
define('MYSQL_DB_PWD','root');
?>