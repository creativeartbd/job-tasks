<?php 
// get connection class
require_once(__DIR__ .'/../config.php');

// create Model Class
class Model {

	// get the report from db basedon from and to date
	public function getReport ( $from, $to) {

		$sql 		= "SELECT * FROM sales_tbl WHERE entry_at BETWEEN '$from' AND '$to' ";
		$instance 	= Connection::getInstance();	
		$connection = $instance->getConnection();
		$statment	= $connection->prepare($sql);

		if( $statment->execute() ) {

			$foundRow 	=	$statment->rowCount();
			$data 		= $statment->fetchAll(PDO::FETCH_OBJ);

			if( $foundRow > 0 ) {
				echo "<div class='alert alert-success'>$foundRow report found.</div>";

				echo "<table class='table'>";
					echo "<tr>";
						echo "<th>ID</th>";
						echo "<th>Buyer</th>";
						echo "<th>Items</th>";
						echo "<th>Buyer IP</th>";
						echo "<th>Action</th>";
					echo "</tr>";

					foreach ($data as $value) {
						$items 		=	explode(',', $value->items);
						echo "<tr>";
							echo "<td>".$value->id."</td>";
							echo "<td>".$value->buyer."</td>";
							echo "<td>";
								foreach ($items as $key => $item) {
									echo $key+1 . ') '. $item .'<br/>';
								}
							echo "</td>";
							echo "<td>".$value->buyer_ip."</td>";
							echo "<td><a href='#'>Edit</a> <a href='#'>Delete</a></td>";
						echo "</tr>";						
					}

				echo "</table>";
			} else {
				echo "<div class='alert alert-warning'>No report found.</div>";
			}
			
		} else {
			echo "<div class='alert alert-danger'>OPPs! Something wen't wrong :(.</div>";
		}	
	}	


	// record the sales from sales recrod form
	public function recordSales ($data) {
		
		$data[3] 	= implode(',', $data[3]);
		
		$sql 		= "INSERT INTO sales_tbl VALUES('', '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[10]')";

		$instance 	= Connection::getInstance();	
		$connection = $instance->getConnection();
		$statment	= $connection->prepare($sql);

		if( $statment->execute() ) {
			
			$cookieName 	=	'submission_time';
			$cokkieValue 	=	time();			

			setcookie($cookieName, $cokkieValue, time() + (+60*60*24*30 ), "/");
			setcookie('testTime', date('Y-m-d h:i:s'));

			return true;
		} else {
			return false;
		}
	}
}