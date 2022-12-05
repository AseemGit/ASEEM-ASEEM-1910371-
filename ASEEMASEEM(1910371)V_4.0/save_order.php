<?php
require_once("config.php"); //inlclude config file 

// path and name of the file
$filetxt = FILE_FOLDER_PATH.'orders.txt';

// check if all form data are submited, else output error message
if(isset($_POST['product_code']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['city']) && isset($_POST['comments']) && isset($_POST['price']) && isset($_POST['quantity'])) {
  	// calculation
	$subtotal =  $_POST['price']* $_POST['quantity'];
	$taxAmount =  $subtotal * 16.1/100;
	$grandTotal = $subtotal + $taxAmount;
  
    // gets and adds form data into an array
    $formdata = array(
      'ProductCode'=> $_POST['product_code'],
      'FirstName'=> $_POST['fname'],
	  'LastName'=> $_POST['lname'],
	  'City'=> $_POST['city'],
	  'Price'=> $_POST['price'],
	  'Quantity'=> $_POST['quantity'],
	  'Comments'=> $_POST['comments'],
	  'Subtotal'=> $subtotal,
	  'TaxesAmount'=> number_format($taxAmount,2),
	  'GrandTotal'=> number_format($grandTotal,2),
    );

    // path and name of the file
    $filetxt = FILE_FOLDER_PATH.'orders.txt';

    $arr_data = array();        // to store all form data

    // check if the file exists
    if(file_exists($filetxt)) {
      // gets json-data from file
      $jsondata = file_get_contents($filetxt);

      // converts json string into array
      $arr_data = json_decode($jsondata, true);
    }

    // appends the array with new form data
    $arr_data[] = $formdata;

    // encodes the array into a string in JSON format (JSON_PRETTY_PRINT - uses whitespace in json-string, for human readable)
    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

    // saves the json string in "orders.txt" (in "dirdata" folder)
    // outputs error message if data cannot be saved
    if(file_put_contents(FILE_FOLDER_PATH.'orders.txt', $jsondata)) 
	$msg = base64_encode('Data successfully saved');
    header('location:buying.php?msg='.$msg);
	exit;
  }
?>