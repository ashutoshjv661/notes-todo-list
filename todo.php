<?php
	session_start();
	
	$title = "Todo List";
	$acc_code = "A05";
	require "./functions/access.php";
	require_once "./template/header.php";
	require_once "./template/sidebar.php";
	require "functions/dbconn.php";
	require "functions/dbfunc.php";
	require "functions/general.php";	

	
	if(isset($_POST['todo'])){
		$type = $_POST['type'];
		$des = $_POST['des'];
		$emp_name = $_SESSION['user_id'];

		$sl = getsl($conn, "id", "todo");
		$dess = str_replace ("'","\'",$des);
		$sql = "INSERT INTO `todo` (id, type,des,employee_name) VALUES('".$sl."','".$type."','{$dess}','".$emp_name."')";

			$stmt = $conn->prepare($sql);
		if($stmt->execute())
		{
			
				$stmt->close();
				header("todo.php");
		}
		else {
			die($conn->error);
		}
		

	}
?>
<!--

<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md-4">
	    	<div class="card">
					<div class="card-header card-header-rose card-header-icon">
				  	<div class="card-icon">
				    	<i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">Add To Do Item</h4>
					</div>
			  	<div class="card-body">
			  		<form name="form2" action="" method="POST">
			  			
				        <div class="col-md-12">
				            <div class="form-group bmd-form-group">
				              <label class="bmd-label-floating">Priority (1,2 or 3)</label>
				              <input type="text" class="form-control" required="" name="type">
				            </div>
				        </div>
                       
			      	<div class="row">
				        <div class="col-md-12">
				          <div class="form-group bmd-form-group">
				            <label class="bmd-label-floating">Add Text</label>
				            <textarea class="form-control" rows="3" name="des"></textarea>
				          </div>
				        </div>
				      </div>
			      	<button type="submit" name="todo" class="btn btn-success">Submit</button>
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
				    	<i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">List</h4>
					</div>
			  	<div class="card-body">
			    	<table class="table">
								        		<thead>
								          			<tr>
											         
											            <th>Priority</th>
								
											            <th colspan="4">Description</th>
											          <th class="text-center">Actions</th>
								          			</tr>
								        		</thead>
								        		<tbody>
								        			<?php
								        				$res = getToDoData($conn, "todo");
								        				foreach ($res as $user) {
								        			?>
									          		<tr>
											           <!--<td class="text-center"><?php echo $user['id']; ?></td> -->
														<?php 
															if($user['type']=='1')
															echo "<td class='bootstrap-tagsinput'><span class='tag badge badge-danger'>High</span></td>";
															else if($user['type']=='2'){
																echo "<td class='bootstrap-tagsinput '><span class='tag badge badge-warning'>Medium</span></td>";	
															}
															else{
																echo "<td class='bootstrap-tagsinput success-badge'><span class='tag badge'>Low</span></td>";
															}
														?>
														<!--<td><?php echo $user['type']; ?></td>-->
											            <td colspan="4"><?php echo $user['des']; ?></td>
											            <!--<td><?php echo $user['price']; ?></td>
											            <td><?php echo $user['des']; ?></td> -->
											            <td class="text-center td-actions">
												            <a rel="tooltip" href="edit_todo.php?edittodo=<?php echo $user['id']; ?>" class="btn btn-success btn-link" title="Edit">
												              <i class="material-icons">edit</i>
												            </a>
												            <a rel="tooltip" href="process/admin/usr_process.php?deltodo=<?php echo $user['id']; ?>" class="btn btn-danger btn-link" title="Delete">
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