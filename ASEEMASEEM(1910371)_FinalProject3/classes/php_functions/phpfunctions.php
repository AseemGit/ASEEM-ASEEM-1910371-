<?php
// Purpose: to add records into table

//Parameters:
//  $dbObj		database connection object
//	$table		table name
//	$data		array with field names as keys, and values rep. those field values
//	$where		MySQL where statement, minus the "WHERE" text at the beginning

//echo "function.database";exit;

function add_record($dbObj, $table, $data){
	
	// fix characters that MySQL doesn't like
	foreach(array_keys($data) as $field_name) {

		$data[$field_name] = sc_php_escape($data[$field_name]);
		
		if (!isset($field_string)) {
			$field_string = "`".strtolower($field_name)."`"; 
			$value_string = "'$data[$field_name]'";
		} else {
			$field_string .= ",`".strtolower($field_name)."`";
			$value_string .= ",'$data[$field_name]'";
		}
	}

	$dbObj->dbQuery = "INSERT INTO $table ($field_string) VALUES ($value_string)";
//echo $dbObj->dbQuery;exit;
	
	// grab rn# that was just added
	$insert_id = $dbObj->InsertQuery("function.database.php", "add_record()");

	// return record number of the record just added, in case we need it
	return $insert_id;
}

//Purpose:
//	To modify a record

//Parameters:
//  $dbObj		database connection object
//	$table		table name
//	$data		array with field names as keys, and values rep. those field values
//	$where		MySQL where statement, minus the "WHERE" text at the beginning

function modify_record($dbObj, $table, $data, $where){
  //print_r($data);exit;
	// $data must be an array...if it's not...bail
	if (!is_array($data)) return;

	foreach(array_keys($data) as $field_name) { 
		$data[$field_name] = sc_php_escape($data[$field_name]);

		// if set string isn't set, set it....else append with a comma in between
		if (!isset($set_string)) {
			$set_string = "`".strtolower($field_name)."` = '$data[$field_name]'";
		} else {
			$set_string = "$set_string, `".strtolower($field_name)."` = '$data[$field_name]'";
		}
	}
	
	$dbObj->dbQuery = "UPDATE $table SET $set_string WHERE $where";
	//echo $dbObj->dbQuery;exit;
	//echo $dbObj->dbQuery;exit;
	return $dbObj->ExecuteQuery("function.database.php", "modify_record()");
}

//Purpose:
//	To delete a record

//Parameters:
//  $dbObj		database connection object
//	$table		table name
//	$where		MySQL where statement, minus the "WHERE" text at the beginning

function delete_record($dbObj, $table, $where){

	$dbObj->dbQuery = "DELETE FROM $table WHERE $where";
	//echo $dbObj->dbQuery;exit;
	return $dbObj->ExecuteQuery("function.database.php", "delete_record()");
}


//Purpose: to call addslashes(), stripping slashes before only if necessary
function sc_php_escape($value) {

	if (is_string($value));

	// strip out slashes IF they exist AND magic_quotes is on
	if (get_magic_quotes_gpc() && (strstr($value,'\"') || strstr($value,"\\'"))) $value = stripslashes($value);
	
	// escape string to make it safe for mysql
	return addslashes($value);
}
?>