<?php
	session_start();	
	$title = "Edit Expense";
	$acc_code = "A05";
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
                <i class="material-icons">local_gas_station</i>
              </div>
              <h4 class="card-title">Edit Fuel</h4>
          	</div>
					  <div class="card-body">
				    	<?php
				    		if(isset($_GET['editfuel'])) {
				    			$res = getDataById($conn, "fuel", $_GET['editfuel']);
								$row = mysqli_fetch_array($res);
							?>
							<form name="form4" action="process/admin/usr_process.php" method="POST">
		        		<div class="form-group bmd-form-group">
		                	<label class="bmd-label-floating">Fuel Type</label>
		                	<input type="text" class="form-control" name="type" value="<?php echo $row['reason']; ?>" autofocus="">
	            	   </div>
	            	   <div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Fuel Stock</label>
	                	<input type="text" class="form-control" value="<?php echo $row['note']; ?>" name="stock">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Fuel Rate/litre</label>
	                	<input type="text" class="form-control" value="<?php echo $row['note']; ?>" name="price">
	            	</div>
	            	<div class="form-group bmd-form-group">
	                	<label class="bmd-label-floating">Description</label>
	                	<input type="text" class="form-control" value="<?php echo $row['amount']; ?>" name="des">
	            	</div>
	            	
	            	
	            	
	            	<div class="row">
	              	<div class="col-md-12">
	              		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	                		<button class="btn btn-success" name="editfuel" type="submit">Update</button>
	                		<a class="btn btn-danger" href="fuel.php">Cancel</a>
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