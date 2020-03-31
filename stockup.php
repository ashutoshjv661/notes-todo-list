<?php
	session_start();
	
	$title = "Stock Update";
	$acc_code = "A01";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";	

	$tdate = date("Y-m-d");
	$ttime = date("h:i A");
	if(isset($_POST['stock'])){
		$edate = $_POST['edate'];
		$etime = $_POST['etime'];
		$gas = $_POST['gas'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];
		$note = $_POST['note'];

		$sl = getsl($conn, "id", "stock");
		$sql = "INSERT INTO stock (id, edate, etime, qty, gtype, price, note) VALUES('".$sl."','".$edate."','".$etime."','".$qty."','".$gas."','".$price."','".$note."')";
		if(mysqli_query($conn, $sql)) {
			
				$sql = "UPDATE status SET stock = '$qty' WHERE gas = '$gas'";
				$res = mysqli_query($conn, $sql);
			
			echo "<script type='text/javascript'>showNotification('top','right','Stock Updated', 'success');</script>";
		}

	}
?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md-4">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
				  	<div class="card-icon">
				    	<i class="material-icons">contacts</i>
				    </div>
				    <h4 class="card-title">Stock Update</h4>
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
				        <div class="col-md-6">
				          <div class="form-group bmd-form-group">
					         	<div class="dropdown bootstrap-select">
					            <select class="selectpicker" data-style="select-with-transition" required="" title="GAS Type" data-size="7" tabindex="-98" name="gas">
					            	<?php
				    $sql = "SELECT * FROM status ";
					$result = mysqli_query($conn, $sql) or die("cannot retrieve ".mysqli_error($conn));
					if(mysqli_num_rows($result)>0){
				    while($row = mysqli_fetch_array($result)){
					$gas = $row['gas'];
				 ?>
					            	<option><?php echo $gas ?></option>
					            	 <?php } ?>
               <?php } ?>

					            </select>
					    			</div>
					      	</div>
				        </div>
				      </div>
                  

				      <div class="row">
				        <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">QTY</label>
				              <input type="text" class="form-control" required="" name="qty">
				            </div>
				        </div>
				         
				        <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">Price</label>
				              <input type="text" class="form-control" required="" name="price">
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
			      	<button type="submit" name="stock" class="btn btn-success">Submit</button>
			      	<button type="reset" class="btn btn-danger float-right">Clear</button>
			      	<div class="clearfix"></div>
			  		</form>
			  	</div>
			  </div>
	    </div>
	    <div class="col-md-6 ml-auto mr-auto">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
				  	<div class="card-icon">
				    	<i class="material-icons">contacts</i>
				    </div>
				    <h4 class="card-title">Stock Update</h4>
					</div>
			  	<div class="card-body">
			    	<table class="table table-striped table-hover">
			    		<thead>
			    			<th>Date</th>
			    			<th>Gas</th>
			    			<th>QTY</th>
			    		</thead>
			    		<tbody>
			    			<?php
				  				$res = getTopStock($conn);
				  				while($row = mysqli_fetch_array($res)){
				  					echo "<tr><td>".$row['edate']."</td>";
				  					
				  					echo "<td class='bootstrap-tagsinput success-badge'><span class='tag badge'>".$row['gtype']."</span></td>";
				  				
				  					echo "<td>".$row['qty']."</td>";
				  					echo "<td>".$row['note']."</td></tr>";
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