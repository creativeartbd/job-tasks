<?php 
require_once(__DIR__ .'/../model/Model.php');

// create Controller class
class Controller {
	
	public $model;
	
	// get the model class
	public function __construct () {		
		$this->model = new Model();
	}	

	// show the home page
	public function index () {		
		require_once('view/index.php');
	}	

	public function recordSales ($data) {
		if($this->model->recordSales($data)) {
			return true;
		} else {
			return false;
		}
	}

	public function getReport () {
		$this->model->getReport($from, $to);		
	}
	
}