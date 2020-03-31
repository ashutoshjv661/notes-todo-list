<?php
	session_start();
	
	$title = "Sales";
	$acc_code = "A06";
	require "./functions/access.php";
	require_once "./template/header.php";           
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";

	$tdate = date("Y-m-d");
	$ttime = date("h:i A");
	if(isset($_POST['sales'])){
		$sdate = $_POST['sdate'];
		$stime = $_POST['stime'];
		$customer_id = $_POST['customerid'];
		$sales_type = $_POST['type'];
		$machine_code = $_POST['machinecode'];
		$starting_read = $_POST['startingread'];
		$ending_read = $_POST['endingread'];
		$sales_amount = $_POST['amount'];
		$sales_des = $_POST['note'];
		
	
    $sl = getsl($conn, "id", "sales");
	 $sql = mysqli_query($conn,"INSERT INTO `sales`(id, sdate, stime,  customer_id, sales_type,  machine_code, starting_reading, ending_reading, sales_amount,sales_description) VALUES('".$sl."','".$sdate."','".$stime."', '".$customer_id ."','".$sales_type."','".$machine_code."','".$starting_read."','".$ending_read."','".$sales_amount."','".$sales_des."')") or die("cannot insert".mysqli_error($conn));
		

		}

		
?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-sm-8 ml-auto mr-auto">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
					  	<div class="card-icon">
				  		  	<i class="material-icons">local_grocery_store</i>
				    	</div>
				   	 <h4 class="card-title">Sales</h4>
					</div>



			  		<div class="card-body">
			  			<form name="form2" action="" method="POST">
			  				<div class="row">
					      			<div class="col-md-6">
					          			<div class="form-group bmd-form-group">
					            		<input type="text" class="form-control" required="" value="<?php echo $tdate; ?>" placeholder="Date" name="sdate">
					            		<span class="bmd-help">Date</span>
					          	      	</div>
				        		   </div>
				        		<div class="col-md-6">
					          		<div class="form-group bmd-form-group">
					            		<input type="text" class="form-control" required="" placeholder="Time" value="<?php echo $ttime; ?>" name="stime">
					            		<span class="bmd-help">Time</span>
					          		</div>
				        		</div>
			            	</div>
			    
							      <div class="row">
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">Sales Customer ID</label>
							              <input type="text" class="form-control" required="" name="customerid">
							            </div>
							          </div>

							         
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">Sales Type</label>
							              <input type="text" class="form-control" required="" name="type">
							            </div>
							          </div>
							      </div>

							          <div class="row">
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">Machine Code</label>
							              <input type="text" class="form-control" required="" name="machinecode">
							            </div>
							          </div>

							          
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">Starting Reading</label>
							              <input type="number" step="0.1" class="form-control" required=""  name="startingread">
							            </div>
							          </div>
							      </div>

							          <div class="row">
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">Ending Reading</label>
							              <input type="number" step="0.1" class="form-control" required="" name="endingread">
							            </div>
							         </div>

							          
							           <div class="col-md-6">
							            <div class="form-group bmd-form-group">
							              <label class="bmd-label-floating">Sales Amount</label>
							              <input type="text" class="form-control" required="" name="amount">
							            </div>
							          </div>
							      </div>

							      <div class="row">
							        <div class="col-md-12">
							          <div class="form-group bmd-form-group">
							            <label class="bmd-label-floating">Sales Decription</label>
							            <textarea class="form-control" rows="3" name="note"></textarea>
							          </div>
							        </div>
							      </div>

			                      
			      	
					           


						      	<button type="submit" name="sales" class="btn btn-success">Submit</button> 
						      	<button type="reset" class="btn btn-danger float-right">Clear</button>
						      	<div class="text-center">
						      	<button class="btn btn-info float-center" onclick="window.location.href = 'sales_view.php';">View</button> </div>
						      	<div class="clearfix"></div>
						  </form>
			 	</div>
		   </div>
		</div>

</div>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	
?>