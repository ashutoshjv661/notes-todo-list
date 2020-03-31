<?php
	session_start();	
	$title = "Edit Sales";
	$acc_code = "A06";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	  	<div class="col-md-12">
	    	<div class="col-md-6 ml-auto mr-auto">
	    		<div class="card">
					  <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">local_grocery_store</i>
              </div>
              <h4 class="card-title">Edit Sales</h4>
          	</div>
					  <div class="card-body">
				    	<?php
				    		if(isset($_GET['editsales'])) {
				    			$res = getDataById($conn, "sales", $_GET['editsales']);
								$row = mysqli_fetch_array($res);
							?>
							<form name="form4" action="process/admin/usr_process.php" method="POST">
		        		<div class="form-group bmd-form-group">
		                	<label class="bmd-label-floating">Sales Type</label>
		                	<input type="text" class="form-control" name="type" value="<?php echo $row['type']; ?>" autofocus="">
	            	   </div>
	            	   <div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Machine Code</label>
	                	<input type="text" class="form-control" value="<?php echo $row['machine_code']; ?>" name="machine_code">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Starting Reading</label>
	                	<input type="number" class="form-control" value="<?php echo $row['starting_reading']; ?>" step="0.01" name="starting_reading">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Ending Reading</label>
	                	<input type="number" class="form-control" value="<?php echo $row['ending_reading']; ?>" step="0.01" name="ending_reading">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Sales Amount</label>
	                	<input type="text" class="form-control" value="<?php echo $row['sales_amount']; ?>" name="sales_amount">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Sales Description</label>
	                	<input type="text" class="form-control" value="<?php echo $row['sales_description']; ?>" name="sales_description">
	            	</div>
	            	
	            	
	            	
	            	<div class="row">
	              	<div class="col-md-12">
	              		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	                		<button class="btn btn-success" name="editsales" type="submit">Update</button>
	                		<a class="btn btn-danger" href="sales_view.php">Cancel</a>
	              	</div>
	            	</div>
	     				</form>
			     		<?php
			     			}
			     		?>
			     	</div>
		    	</div>
	  		</div>  
	  	</div>  
	  </div>          
	</div>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	
?>