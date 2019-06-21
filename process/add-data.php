<?php 
require_once('../controller/Controller.php');

// check if cookie is exist
if(isset($_COOKIE['submission_time'])) {
	
	// check the time
	$submissionTime =	$_COOKIE['submission_time'];
	$currentTime 	=	time();
	$timePassed 	=	($currentTime - $submissionTime ) / 60 * 60;	

	// check if time is passed 24 hours or not
	if($timePassed < ALLOWED_SUBMISSION_TIME ) {
		echo "<div class='alert alert-warning'><strong>Sales recrod are disabled!</strong> You can record the sales after 24 hours! Please wait..</div>";
		die();
	}
	
}

// sales record form validation
if( isset($_POST['formName']) && $_POST['formName'] == 'recordsales' ) {
	
	$amount			=	validateData($_POST['amount']);
	$buyer			=	validateData($_POST['buyer']);
	$receipt_id		=	validateData($_POST['receipt_id']);
	$items			=	isset($_POST['items']) ? validateData($_POST['items']) : '';
	$buyer_email	=	validateData($_POST['buyer_email']);
	$note			=	validateData($_POST['note']);
	$city			=	validateData($_POST['city']);
	$phone			=	validateData($_POST['phone']);
	$entry_by		=	validateData($_POST['entry_by']);
	$buyer_ip 		=	$_SERVER['REMOTE_ADDR'];
	$hash_key 		=	hash('sha512', $receipt_id);
	$entry_at 		=	date('Y-m-d');
	$lnsregex		=	'/^[a-z0-9 ]+$/i'; // letter, number and space regex
	$lregex			=	'/^[a-zA-Z ]+$/i'; // letter regex
	$nregex			=	'/^[0-9]+$/i'; // number regex
	$errors 		=	array();	

	// if the input field is really exist
	if( isset($amount, $buyer, $receipt_id, $buyer_email, $note, $city, $phone, $entry_by)) {

		// check all are empty or nt
		if( empty($amount) && empty($buyer) && empty($receipt_id) && empty($items) && empty($buyer_email) && empty($note) && empty($city) && empty($phone) && empty($entry_by) ) {
			$errors[] = 'All fields are required';

		} else {

			// validate amount field
			if(empty($amount)) {
				$errors[] = 'Please enter the amount';
			} elseif (!is_numeric($amount)) {
				$errors[] = 'Amount must be only numeric value';
			} elseif( strlen($amount) > 10 ) {
				$errors[] = 'Amount must be less than 10 characters long';
			}

			// validate buyer field
			if(empty($buyer)) {
				$errors[] = 'Buyer name is required';
			} elseif (!preg_match($lnsregex, $buyer)) {
				$errors[] = 'Buyer name only contain letter, number and space';
			} elseif( strlen($buyer) > 20 ) {
				$errors[] = 'Buyer name must be less than 20 characters long';
			}

			// validate receipt id field
			if(empty($receipt_id)) {
				$errors[] = 'Receipt Id is reuired';
			} elseif (!preg_match($lregex, $receipt_id)) {
				$errors[] = 'Receipt Id must contain only characters';
			} elseif( strlen($receipt_id) > 20 ) {
				$errors[] = 'Receipt Id must be less than 20 characters long';
			}

			// validate items field
			if(count($items) == 0 ) {
				$errors[] = 'Items is required';
			} else {
				foreach ($items as $key => $item) {
					$counter = $key + 1;					
					if(empty($item)) {
						$errors[] = 'Item number ' . $counter . ' is required';
					} elseif (!preg_match($lregex, $item)) {
						$errors[] = 'Item number ' . $counter .' must contain only characters';
					} elseif( strlen($item) > 255 ) {
						$errors[] = 'Item number '. $counter .' mest be less than 25 characters long';
					}
				}
			}

			// validate buyer email field
			if(empty($buyer_email)) {
				$errors[] = 'Buyer email address is reuired';
			} elseif (!filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {
				$errors[] = 'Buyer email address is not correct';
			} 

			// validate note field
			if(empty($note)) {
				$errors[] = 'Note is required';
			} elseif (strlen($note) > 30 ) {
				$errors[] = 'Note details must be less 30 characters long';
			} 

			// validate city field
			if(empty($city)) {
				$errors[] = 'City name is reuired';
			} elseif (!preg_match($lregex, $city)) {
				$errors[] = 'City name must contain only characters';
			} elseif( strlen($city) > 20 ) {
				$errors[] = 'City name must be less than 20 characters long';
			}

			// validate phone field
			if(empty($phone)) {
				$errors[] = 'Phone number is required';
			} elseif (!preg_match($nregex, $phone)) {
				$errors[] = 'Phone number must contain only numerical value';
			} elseif( strlen($phone) > 13 ) {
				$errors[] = 'Invalid phone number is given';
			}

			// validate entry_by field
			if(empty($entry_by)) {
				$errors[] = 'Entry by is required';
			} elseif (!preg_match($nregex, $entry_by)) {
				$errors[] = 'Entry by should mest be numeric value';
			} elseif( strlen($entry_by) > 10 ) {
				$errors[] = 'Entry by must be less than 10 characters long';
			}
				
			
		}

		// show error message if found
		if(!empty($errors)) {
			echo "<div class='alert alert-danger'>";
				foreach ($errors as $error) {
					echo $error;
					echo '<br/>';
				}
			echo "</div>";
		} else {		

			// create model class instance
			$controller	=	new Controller;			
			$data 		=	array($amount, $buyer, $receipt_id, $items, $buyer_email, $buyer_ip, $note, $city, $phone, $hash_key, $entry_at, $entry_by);

			// insert the data
			if( $controller->recordSales($data) ) {
				echo "<div class='alert alert-success'>Successfully recorded the new sales!.</div>";
			} else {
				echo "<div class='alert alert-danger'>OPPs! Something wen't wrong :(.</div>";
			}			
		}
	}
}