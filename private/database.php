<?php

require_once('db_credentials.php');

// 1. create a database connection
function db_connect() {
    $db_connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	/* if($db_connection){
		echo '<h1>WE ARE CONNECTED</h1>';
	} */
    confirm_db_connect();
    return $db_connection; 
}

// 2. select a database to use
function db_select(){
	$db_select = mysqli_select_db(db_connect(),DB_NAME);
  if(!$db_select){
	  die("Database selection failed: " . mysqli_error());
  }
}

function db_disconnect($db_connection) {
    if (isset($db_connection)) {
        mysqli_close($db_connection);
    }
}

function db_escape($db_connection, $string) {
    return mysqli_real_escape_string($db_connection, $string);
}

function confirm_db_connect() {
    if (mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

function confirm_result_set($result_set) {
    if (!$result_set) {
        exit("Database query failed.");
    }
}

?>
