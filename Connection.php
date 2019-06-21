<?php 
// database connection class
class Connection {

	// Class instance
	private static $instance = null;
	private $connect;
	
	// To prevent initialize with outer code
	private function __construct () {
		 $this->connect = new PDO("mysql:host=".HOST."; dbname=".DATABASE."", USERNAME, PASSWORD,   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	}	

	// The object is created from within the class itself only if the class has no instance.
	public static function getInstance () {
		if( self::$instance == null ) {
			self::$instance = new Connection;
		}
		return self::$instance;
	}

	// get the connection
	public function getConnection () {
		return $this->connect;
	}

	// prepare the sql
	public function prepare ($sql) {
		$this->connect->prepare($sql);
	}
}