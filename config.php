<?php 
// Set the timezone
date_default_timezone_set('Asia/Dhaka');

// Database credentials
define('HOST', 'localhost');
define('USERNAME', 'root');
define('DATABASE', 'sales');
define('PASSWORD', '');

/// validate input data
function validateData ( $data ) {
	if(is_array($data)) {
		$arrayData = [];
		foreach ($data as $key => $value) {
			$arrayData[] = strip_tags(trim($value));
		}
		return $arrayData;
	}
	return strip_tags(trim($data));
}

// define the submission time limit ( 86400 = 1 day)
define('ALLOWED_SUBMISSION_TIME', 86400);

require_once("connection.php");