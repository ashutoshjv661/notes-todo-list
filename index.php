<?php
	session_start();
	
	$title = "Dashboard";
	$acc_code = "INDEX";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";

	$tdate = date("Y-m-d");;
	$ttime = date("h:i A");
	
	if(isset($_POST['add'])){
		$ename = $_POST['ename'];
		$vno = $_POST['vno'];
		$edate = $_POST['edate'];
		$etime = $_POST['etime'];
		$gas = $_POST['gas'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];
		$total = $price * $qty;
		$note = $_POST['note'];


		$sl = getsl($conn, "id", "entry");
		$sql = "INSERT INTO entry (id, edate, etime, user, vno, gtype, qty, price, total, note) VALUES('".$sl."','".$edate."','".$etime."','".$ename."','".$vno."','".$gas."','".$qty."','".$price."','".$total."','".$note."')";
		if(mysqli_query($conn, $sql)) {

			$sql = "SELECT * FROM status WHERE gas='$gas' ";
					$result = mysqli_query($conn, $sql) or die("cannot retrieve ".mysqli_error($conn));
					if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_array($result)){
					$id = $row['id'];
			    
				$data = getDataById($conn, "status", "$id");
				$row = mysqli_fetch_array($data);
				$uqty = $row['stock'] - $qty;
				$sql = "UPDATE status SET stock = '$uqty' WHERE gas = '$gas'";
				$res = mysqli_query($conn, $sql);
			
			echo "<script type='text/javascript'>showNotification('top','right','Entry Inserted', 'success');</script>";
		}
		}
		}
	}

	

	
?>
<!-- MAIN CONTENT START -->
<script type="text/javascript">
	function calculate()
	{
	  var qty = document.getElementById('qty').value;
	  var price = document.getElementById('price').value; 
	  document.getElementById('total').value=parseInt(qty) * parseInt(price);
	}
</script>
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
   

   <?php
    $sql = "SELECT * FROM status ";
	$result = mysqli_query($conn, $sql) or die("cannot retrieve ".mysqli_error($conn));
	if(mysqli_num_rows($result)>0){
	$i=0;
    while($row = mysqli_fetch_array($result)){

	$petrol = $row['stock'];
	$gas = $row['gas'];
 ?>

      <?php if($i%2==0) { ?>
	  <div class="row">
	  <?php }  ?>
	  	<div class="col-md-3">
	  		<div class="card card-stats">
		      <div class="card-header card-header-danger card-header-icon">
		        <div class="card-icon">
		          <i class="material-icons">format_color_fill</i>
		        </div>
		        <p class="card-category"><?php echo $gas; ?></p>
		        <h3 class="card-title"><?php echo $petrol; ?> Ltrs.</h3>
		      </div>
		      <div class="card-footer">
		        <div class="stats">
		          <i class="material-icons">warning</i>
		          <span>TOTAL <?php echo $gas; ?> STOCK</span>
		        </div>
		      </div>
		    </div>
	   </div>
    
    <?php $i++;  } ?>
   <?php  } ?>


        
	    <div class="col-md-6 ml-auto mr-auto">
		    <div class="card">
					<div class="card-header card-header-rose card-header-icon">
				  	<div class="card-icon">
				    	<i class="material-icons">contacts</i>
				    </div>
				    <h4 class="card-title">Gasoline Entry</h4>
					</div>
			  	<div class="card-body">
			  		<form name="form1" action="" method="POST">
			      	<div class="row">
			       		<div class="col-md-6">
			          		<div class="form-group bmd-form-group">
			            		<label class="bmd-label-floating">Employee Name</label>
			            		<input type="text" class="form-control" name="ename" required="" autofocus="">
			          		</div>
			        	</div>
			        	<div class="col-md-6">
				        	<div class="form-group bmd-form-group">
					            <label class="bmd-label-floating" >Vehicle Number</label>
					            <input type="text" class="form-control" required="" name="vno">
					        </div>
				        </div>
			      	</div>
			      	<div class="row">
			      		<div class="col-md-6">
		          		<div class="form-group bmd-form-group">
		            		<input type="text" class="form-control" value="<?php echo $tdate; ?>" required="" placeholder="Date" name="edate">
		            		<span class="bmd-help">Date</span>
		          		</div>
		        		</div>
		        		<div class="col-md-6">
		          		<div class="form-group bmd-form-group">
		            		<input type="text" class="form-control" value="<?php echo $ttime; ?>" required="" placeholder="Time" name="etime">
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
                  
				        <div class="col-md-6">
			            <div class="form-group bmd-form-group">
			              <label class="bmd-label-floating">QTY</label>
			              <input type="text" class="form-control" id="qty" required="" name="qty">
			            </div>
				        </div>
			      	</div>
			      	<div class="row">
				        <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">Price</label>
				              <input type="text" class="form-control" required="" id="price" onkeyup="calculate();" name="price">
				            </div>
				        </div>
				        <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">Total</label>
				              <input type="text" class="form-control" disabled="" required="" id="total" name="total">
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
				      <button type="submit" name="add" class="btn btn-success">Submit</button>
			      	<button type="reset" class="btn btn-danger float-right">Clear</button>
			      	<div class="clearfix"></div>
			      </form>
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