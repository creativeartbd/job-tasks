<?php 
require_once("../include/header.php"); 
require_once("../config.php"); 

// check if cookie is exist
if(isset($_COOKIE['submission_time'])) {
	
	// check the time
	$submissionTime =	$_COOKIE['submission_time'];
	$currentTime 	=	time();
	$timePassed 	=	($currentTime - $submissionTime ) / 60 * 60;	

	// check if time is passed 24 hours or not
	if($timePassed < ALLOWED_SUBMISSION_TIME ) {
		echo "<div class='alert alert-warning'><strong>Sales recrod are disabled!</strong> You can record the sales after 24 hours! Please wait..</div>";
	}	
}
?>


<div class="container">
	<div class="row">
		<div class="col-md-12 text-right">			
			<hr>
			<a class="btn btn-primary" href="sales-form.php">Recrod a new sales</a>
			<a class="btn btn-success" href="report.php">Search Report</a>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h2 class="center">Create a new sales record.</h2>
			<div class="formResult"></div>
			<form name="salesform" id="salesForm" method="POST">
				<div class="form-group row">
					<label for="amount" class="col-sm-3 col-form-label">Amount</label>
					<div class="col-sm-9">
						<input type="text" name="amount" id="amount" class="form-control" >
					</div>
				</div>
				<div class="form-group row">
					<label for="buyer" class="col-sm-3 col-form-label">Buyer</label>
					<div class="col-sm-9">
						<input type="text" name="buyer" id="buyer" class="form-control" maxlength="255" >
					</div>
				</div>
				<div class="form-group row">
					<label for="receipt_id" class="col-sm-3 col-form-label">Receipt Id</label>
					<div class="col-sm-9">
						<input type="text" name="receipt_id" name="receipt_id" class="form-control" maxlength="20" >
					</div>
				</div>
				<div class="input_fields_wrap">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Items</label>
						<div class="col-sm-7">
							<input type="text" name="items[]" class="form-control items">
						</div>
						<div class="col-sm-2">
							<button class="add_field_button btn btn-success btn-sm float-right">Add+</button>	
						</div>						
					</div>
				</div>
				<div class="form-group row">
					<label for="buyer_email" class="col-sm-3 col-form-label">Buyer Email</label>
					<div class="col-sm-9">
						<input type="email" name="buyer_email" id="buyer_email" class="form-control" >
					</div>
				</div>
				<div class="form-group row">
					<label for="note" class="col-sm-3 col-form-label">Note</label>
					<div class="col-sm-9">
						<input type="text" name="note" id="note" maxlength="30" class="form-control" >
					</div>
				</div>
				<div class="form-group row">
					<label for="city" class="col-sm-3 col-form-label">City</label>
					<div class="col-sm-9">
						<input type="text" name="city" id="city" maxlength="20" class="form-control" >
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-sm-3 col-form-label">Phone</label>
					<div class="col-sm-9">
						<input type="text" name="phone" id="phone" class="form-control" >
					</div>
				</div>
				<div class="form-group row">
					<label for="entry_by" class="col-sm-3 col-form-label">Entry By</label>
					<div class="col-sm-9">
						<input type="text" name="entry_by" id="entry_by" class="form-control" >
					</div>
				</div>
				<div class="form-group row">						
					<div class="col-sm-12 text-right">
						<input type="hidden" name="formName" value="recordsales">
						<input type="submit" name="submit" value="Record Sales" class="btn btn-primary">
					</div>
				</div>
				
			</form>
		</div>		
	</div>
</div>
<?php require_once("../include/footer.php"); ?>