<?php 
require_once('../model/Model.php');

// validate report form
if( isset($_POST['formName']) && $_POST['formName'] == 'report' ) {
	
	$from			=	validateData($_POST['from']);
	$to				=	validateData($_POST['to']);	
	$errors 		=	array();	

	if( isset($from, $to)) {

		if( empty($from) && empty($to) ) {
			$errors[] = 'All fields are required';

		} else {

			if(empty($from)) {
				$errors[] = 'Select from date';
			} 

			if(empty($to)) {
				$errors[] = 'Select to date';
			} 
			
		}

		if(!empty($errors)) {
			echo "<div class='alert alert-danger'>";
				foreach ($errors as $error) {
					echo $error;
					echo '<br/>';
				}
			echo "</div>";
		} else {
			$from 		= 	str_replace('/', '-', $from);
			$to 		=	str_replace('/', '-', $to);
			$model 		=	new Model;
			$model->getReport($from, $to);
		}
	}
}