<?php
// Set url constant
define('SITE_URL', 'http://localhost');
define('LINK', SITE_URL.'/ASEEMASEEM(1910371)V_5.0/');

// Set folder constant
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].'/ASEEMASEEM(1910371)V_5.0/');
define('INCLUDE_DIR',ROOT_DIR.'include/');
define('OUTPUT_DIR', ROOT_DIR.'errorlog/');

//set form character limit
define('CUSTOMER_PRODUCT_CODE_MAX_LENGTH','25');
define('CUSTOMER_FIRSTNAME_MAX_LENGTH','20');
define('CUSTOMER_LASTNAME_MAX_LENGTH','20');
define('CUSTOMER_CITY_MAX_LENGTH','30');
define('CUSTOMER_COMMENTS_MAX_LENGTH','200');

//.txt file path
define("FILE_FOLDER_PATH", ROOT_DIR.'file/');  //file folder path
?>