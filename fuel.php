<?php
	session_start();
	
	$title = "Fuel";
	$acc_code = "A05";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";	

	
	if(isset($_POST['fuel'])){
		$type = $_POST['type'];
		$stock=$_POST['stock'];
		$price = $_POST['price'];
		$des = $_POST['des'];
		

		$sl = getsl($conn, "id", "fuel");
		$sql = mysqli_query($conn,"INSERT INTO `fuel` (id, type,stock, price,des) VALUES('".$sl."','".$type."', '".$stock."','".$price."','".$des."')") or die("cannot insert".mysqli_error($conn));

		$sl = getsl($conn, "id", "status");
		$sql = mysqli_query($conn,"INSERT INTO `status` (id,gas,stock) VALUES('".$sl."','".$type."', '".$stock."')") or die("cannot insert".mysqli_error($conn));
		
		

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
				    	<i class="material-icons">local_gas_station</i>
				    </div>
				    <h4 class="card-title">Fuel</h4>
					</div>
			  	<div class="card-body">
			  		<form name="form2" action="" method="POST">
			  			
	
				      
				        <div class="col-md-12">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">Fuel Type</label>
				              <input type="text" class="form-control" required="" name="type">
				            </div>
				        </div>
                       <div class="row">
                       <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">Fuel Stock</label>
				              <input type="text" class="form-control" required="" name="stock">
				            </div>
				        </div>
			      	

				         
				        <div class="col-md-6">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">Fuel Rate/litre</label>
				              <input type="text" class="form-control" required="" name="price">
				            </div>
				        </div>
			      	</div>
			      	<div class="row">
				        <div class="col-md-12">
				          <div class="form-group bmd-form-group">
				            <label class="bmd-label-floating">Fuel Description</label>
				            <textarea class="form-control" rows="3" name="des"></textarea>
				          </div>
				        </div>
				      </div>
			      	<button type="submit" name="fuel" class="btn btn-success">Submit</button>
			      	<button type="reset" class="btn btn-danger float-right">Clear</button>
			      	<div class="clearfix"></div>
			  		</form>
			  	</div>
			  </div>
	    </div>
	    <div class="col-md-8">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
				  	<div class="card-icon">
				    	<i class="material-icons">local_gas_station</i>
				    </div>
				    <h4 class="card-title">Fuel</h4>
					</div>
			  	<div class="card-body">
			    	<table class="table">
								        		<thead>
								          			<tr>
											            <th class="text-center">ID</th>
											            <th>Fuel Type</th>
											             <th>Fuel Stock</th>
											            <th>Fuel Rate/litre</th>
											            <th>Fuel Description</th>
											          <th class="text-left">Actions</th>
								          			</tr>
								        		</thead>
								        		<tbody>
								        			<?php
								        				$res = getData($conn, "fuel");
								        				foreach ($res as $user) {
								        			?>
									          		<tr>
											            <td class="text-center"><?php echo $user['id']; ?></td>
											            <td><?php echo $user['type']; ?></td>
											            <td><?php echo $user['stock']; ?></td>
											            <td><?php echo $user['price']; ?></td>
											            <td><?php echo $user['des']; ?></td>
											            <td class="text-center td-actions">
												            <a rel="tooltip" href="edit_fuel.php?editfuel=<?php echo $user['id']; ?>" class="btn btn-success btn-link" title="Edit">
												              <i class="material-icons">edit</i>
												            </a>
												            <a rel="tooltip" href="process/admin/usr_process.php?delfuel=<?php echo $user['id']; ?>" class="btn btn-danger btn-link" title="Delete">
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