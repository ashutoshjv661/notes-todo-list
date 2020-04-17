<?php
	session_start();
	
	$title = "Edit Role";
	$acc_code = "A02";
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
	    <div class="col-md-6 ml-auto mr-auto">
	    	<?php
	    	if(isset($_GET['editrole'])) {
	    		$res = getDataById($conn, "roles", $_GET['editrole']);
				$row = mysqli_fetch_array($res);
				$section = explode(';',$row[3]);
			?>
	    	<div class="card">
	          	<div class="card-header card-header-rose card-header-icon">
	              	<div class="card-icon">
	                	<i class="material-icons">edit</i>
	              	</div>
	              	<h4 class="card-title">Edit Role</h4>
	          	</div>
	          	<div class="card-body">
	            	<form name="form5" action="process/admin/usr_process.php" method="POST">
	              		<div class="form-group bmd-form-group">
	                      	<label class="bmd-label-floating">Role</label>
	                      	<input type="text" class="form-control" name="role" value="<?php echo $row[1]; ?>" required="" autofocus="">
	                  	</div>
	                  	<div class="form-group bmd-form-group">
	                      	<label class="bmd-label-floating">Descripton</label>
	                      	<!-- <input type="text" class="form-control" name="fname"> -->
	                      	<textarea class="form-control" rows="3" required="" name="r_desc"><?php echo $row[2]; ?></textarea>
	                  	</div>
	                  	<div class="row">
	                  		<div class="col-md-6 col-sm-12">
	                  			<h3>Administration</h3>
			                  	<div class="form-group bmd-form-group">
									<div class="form-check">
									  <label class="form-check-label">
									    <input class="form-check-input" type="checkbox" name="code[]" value="A02" <?php if(in_array("A02",$section)) { ?> checked="checked" <?php } ?> > User Management
									    <span class="form-check-sign">
									      <span class="check"></span>
									    </span>
									  </label>
									</div>
									<div class="form-check">
									  <label class="form-check-label">
									    <input class="form-check-input" type="checkbox" name="code[]" value="A03" <?php if(in_array("A03",$section)) { ?> checked="checked" <?php } ?> > General Reports
									    <span class="form-check-sign">
									      <span class="check"></span>
									    </span>
									  </label>
									</div>
									<div class="form-check">
									  <label class="form-check-label">
									    <input class="form-check-input" type="checkbox" name="code[]" value="A04" <?php if(in_array("A04",$section)) { ?> checked="checked" <?php } ?> > Notes
									    <span class="form-check-sign">
									      <span class="check"></span>
									    </span>
									  </label>
									</div>
									<div class="form-check">
									  <label class="form-check-label">
									    <input class="form-check-input" type="checkbox" name="code[]" value="A05" <?php if(in_array("A05",$section)) { ?> checked="checked" <?php } ?> >To-Do
									    <span class="form-check-sign">
									      <span class="check"></span>
									    </span>
									  </label>
									</div>					
              	</div>
              </div>
            </div>
          	<div class="row">
            	<div class="col-md-12">
            		<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
              		<button class="btn btn-success" name="editRole" type="submit">Modify</button>
              		<a class="btn btn-danger" href="user_mgnt.php">Cancel</a>
            	</div>
          	</div>
         		</form>
        	</div>
	        </div>
	        <?php
	        }else{
	        	// header('location:index.php');
	        }
	        ?>
	    </div>
	  </div>              
	</div>
	<?php
		if($_GET['msg']==1){
			echo "<script type='text/javascript'>showNotification('top','right','Please select atleast one section', 'warning');</script>";
		}
	?>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	
?>