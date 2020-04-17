<?php
	session_start();
	
	$title = "Notes";
	$acc_code = "A04";
	require "./functions/access.php";
	require_once "./template/header.php";           
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";

	$tdate = date("Y-m-d");
	$ttime = date("h:i A");
	if(isset($_POST['notes'])){
		$edate = $_POST['edate'];
		$reason = $_POST['reason'];
		$notes = $_POST['note'];
		$ename = $_SESSION['user_id'];

	$sl = getsl($conn, "id", "notes");
	$note = str_replace ("'","\'",$notes);
	$sql_query = "INSERT INTO `notes` (id, notes_date, reason, note, employee_name) VALUES('".$sl."','".$edate."', '".$reason."','{$note}','".$ename."') "; 
	$stmt = $conn->prepare($sql_query);
//mysqli_query($conn,$sql_query)
		if($stmt->execute())
		{
			
				$stmt->close();
				header("notes.php");
		}
		else {
			die($conn->error);
		}
	}
?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-sm-4">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
					  	<div class="card-icon">
				  		  	<i class="material-icons">book</i>
				    	</div>
				   	 <h4 class="card-title">Add New Note</h4>
					</div>
			  		<div class="card-body">
			  			<form name="form2" action="" method="POST">
			  				<div class="row">
					      			<div class="col-md-6">
					          			<div class="form-group bmd-form-group">
					            		<input type="text" class="form-control" required="" value="<?php echo $tdate; ?>" placeholder="Date" name="edate">
					            		<span class="bmd-help">Date</span>
					          	      	</div>
				        		   </div>
				        		<div class="col-md-6">
					          		<div class="form-group bmd-form-group">
					            		<input type="text" class="form-control" required="" placeholder="Time" value="<?php echo $ttime; ?>" name="etime">
					            		<span class="bmd-help">Time</span>
					          		</div>
				        		</div>
			            	</div>
			    
							      <div class="row">
							        <div class="col-md-12">
							          <div class="form-group bmd-form-group">
							            <label class="bmd-label-floating">Heading</label>
							            <textarea class="form-control" rows="1" name="reason"></textarea>
							          </div>
							        </div>
							      </div>

							      <div class="row">
							        <div class="col-md-12">
							          <div class="form-group bmd-form-group">
							            <label class="bmd-label-floating">Note</label>
							            <textarea class="form-control" rows="12" name="note" ></textarea>
							          </div>
							        </div>
							      </div>
						      	<button type="submit" name="notes" class="btn btn-success">Submit</button>
						      	<button type="reset" class="btn btn-danger float-right">Clear</button>
						      	<div class="clearfix"></div>
						  </form>
			 		</div>
		   		</div>
			</div>
	   						<div class="col-sm-8">
		      					<div class="card">
								  	<div class="card-header card-header-rose card-header-icon">
								    	<div class="card-icon">
								      		<i class="material-icons">book</i>
								    	</div>
								    	<h4 class="card-title">Your Notes</h4>
								  	</div>
								  	<div class="card-body">
								    	<div class="table-responsive">
								      		<table class="table">
								        		<thead>
								          			<tr>
											           <!-- <th class="text-center">ID</th> -->
											            <th>Date</th>
														<th colspan="4">Heading</th>
											            <th class="text-center">Actions</th>
								          			</tr>
								        		</thead>
								        		<tbody>
								        			<?php
								        				$res = getNoteData($conn, "notes");
								        				foreach ($res as $user) {
								        			?>
									          		<tr>
											         <!--   <td class="text-center"><?php echo $user['id']; ?></td> -->
											            <td><?php echo $user['notes_date']; ?></td>
											            <td colspan="4"><?php echo $user['reason']; ?></td>
											            <td class="text-center td-actions">
												            <a rel="tooltip" href="notes_edit.php?editnotes=<?php echo $user['id']; ?>" class="btn btn-success btn-link" title="Edit">
												              <i class="material-icons">edit</i>
												            </a>
												            <a rel="tooltip" href="process/admin/usr_process.php?delnotes=<?php echo $user['id']; ?>" class="btn btn-danger btn-link" title="Delete">
												              <i class="material-icons">close</i>
												            </a>
											            </td>
									          		</tr>
									          		<?php
									          			}
									          		?>
								        		</tbody>
								      		</table>
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