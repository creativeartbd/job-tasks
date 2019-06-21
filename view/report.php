<?php require_once("../include/header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-right">			
			<hr>
			<a class="btn btn-primary" href="sales-form.php">Recrod a new sales</a>
			<a class="btn btn-success" href="report.php">Search Report</a>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2 class="center">Search Report</h2>
			<form class="form-inline" id="report" method="POST">
				<div class="form-group mb-2">
					<label for="from" class="sr-only">Fromm</label>
					<input type="text" name="from" class="form-control" id="from" placeholder="From">
				</div>
				<div class="form-group mx-sm-3 mb-2">
					<label for="to" class="sr-only">To</label>
					<input type="text" name="to" class="form-control" id="to" placeholder="To">
				</div>
				<div class="form-group row">						
					<div class="col-sm-12 mb-2">
						<input type="hidden" name="formName" value="report">
						<input type="submit" name="submit" value="Get Report" class="btn btn-primary">
					</div>
				</div>
			</form>			
			<div class="formResult"></div>			
		</div>		
	</div>
</div>
<?php require_once("../include/footer.php"); ?>