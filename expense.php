<?php
	session_start();
	
	$title = "Expense";
	$acc_code = "A04";
	require "./functions/access.php";
	require_once "./template/header.php";           
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";

	$tdate = date("Y-m-d");
	$ttime = date("h:i A");
	if(isset($_POST['expense'])){
		$edate = $_POST['edate'];
		$etime = $_POST['etime'];
		$reason = $_POST['reason'];
		$note = $_POST['note'];
		$amount = $_POST['amount'];
		$ename = $_POST['ename'];
		
	
    $sl = getsl($conn, "id", "expense");
		$sql = mysqli_query($conn,"INSERT INTO `expense` (id, expense_date, reason,note, amount, employee_name) VALUES('".$sl."','".$edate."', '".$reason."','".$note."','".$amount."','".$ename."')") or die("cannot insert".mysqli_error($conn));
		

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
				  		  	<i class="material-icons">monetization_on</i>
				    	</div>
				   	 <h4 class="card-title">Expense</h4>
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
							            <label class="bmd-label-floating">Reason</label>
							            <textarea class="form-control" rows="1" name="reason"></textarea>
							          </div>
							        </div>
							      </div>

							      <div class="row">
							        <div class="col-md-12">
							          <div class="form-group bmd-form-group">
							            <label class="bmd-label-floating">Note</label>
							            <textarea class="form-control" rows="3" name="note"></textarea>
							          </div>
							        </div>
							      </div>

			                      <div class="row">
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">Amount</label>
							              <input type="text" class="form-control" required="" name="amount">
							            </div>
							          </div>
			      	
			      	
					             	<div class="col-md-6">
					          		    <div class="form-group bmd-form-group">
					            		<label class="bmd-label-floating">Created By</label>
					            		<input type="text" class="form-control" name="ename" required="" autofocus="">
					          		    </div>
					        	   </div>
                                </div>
                       


						      	<button type="submit" name="expense" class="btn btn-success">Submit</button>
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
								      		<i class="material-icons">monetization_on</i>
								    	</div>
								    	<h4 class="card-title">Expense</h4>
								  	</div>
								  	<div class="card-body">
								    	<div class="table-responsive">
								      		<table class="table">
								        		<thead>
								          			<tr>
											            <th class="text-center">ID</th>
											            <th>Expense Date</th>
											            <th>Reason</th>
											            <th>Note</th>
											            <th>Amount</th>
											             <th>Created By</th>
											            <th class="text-left">Actions</th>
								          			</tr>
								        		</thead>
								        		<tbody>
								        			<?php
								        				$res = getData($conn, "expense");
								        				foreach ($res as $user) {
								        			?>
									          		<tr>
											            <td class="text-center"><?php echo $user['id']; ?></td>
											            <td><?php echo $user['expense_date']; ?></td>
											            <td><?php echo $user['reason']; ?></td>
											            <td><?php echo $user['note']; ?></td>
											            <td><?php echo $user['amount']; ?></td>
											            <td><?php echo $user['employee_name']; ?></td>
											            <td class="text-center td-actions">
												            <a rel="tooltip" href="expense_edit.php?editexpense=<?php echo $user['id']; ?>" class="btn btn-success btn-link" title="Edit">
												              <i class="material-icons">edit</i>
												            </a>
												            <a rel="tooltip" href="process/admin/usr_process.php?delexpense=<?php echo $user['id']; ?>" class="btn btn-danger btn-link" title="Delete">
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