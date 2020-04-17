<?php
	session_start();	
	$title = "Edit Note";
	$acc_code = "A04";
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
                <i class="material-icons">book</i>
              </div>
              <h4 class="card-title">Edit Note</h4>
          	</div>
					  <div class="card-body">
				    	<?php
				    		if(isset($_GET['editnotes'])) {
				    			$res = getDataById($conn, "notes", $_GET['editnotes']);
								$row = mysqli_fetch_array($res);
							?>
							<form name="form4" action="process/admin/usr_process.php" method="POST">
		        		<div class="form-group sbmd-form-group">
		                	<label class="bmd-label-floating">Reason</label>
		                	<input type="text" class="form-control" name="edit_reason" value="<?php echo $row['reason']; ?>" autofocus="">
	            	</div>
	            	<div class="form-group bmd-form-group">	              
						  	<label class="bmd-label-floating">Note</label>
					<?php  echo "<textarea class=\"form-control\" rows=\"20\" name=\"edit_note\" >" .$row['note']. "</textarea>"; ?>
	            	</div>    	
	            	<div class="row">
	              	<div class="col-md-12">
	              		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	                		<button class="btn btn-success" name="editnotes" type="submit">Update</button>
	                		<a class="btn btn-danger" href="notes.php">Cancel</a>
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