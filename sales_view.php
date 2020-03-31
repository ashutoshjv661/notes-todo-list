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


?>
<!-- MAIN CONTENT START -->
<div class="content" style="min-height: calc(100vh - 160px);">
	<div class="container-fluid">
	  <div class="row">
	   <div class="col-md-12">
		     <div class="card">
				<div class="card-header card-header-rose card-header-icon">
					<div class="card-icon">
						<i class="material-icons">local_grocery_store</i>
				   </div>
					 <h4 class="card-title">Sales</h4>
				</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
			          			<tr>
						            <th class="text-center">ID</th>
						            <th>Sales Date</th>
						             <th>Sales Time</th>
						            <th>Sales Customer Id</th>
						            <th>Sales Type</th>
						            <th>Machine Code</th>
					                <th>Starting Reading</th>
					                <th>Ending Reading</th>
					                <th>Sales Amount</th>
					                <th>Sales Description</th>
						            <th class="text-left">Actions</th>
			          			</tr>
		        		</thead>
		        		<tbody>
		        			<?php
		        				$res = getData($conn, "sales");
		        				foreach ($res as $user) {
		        			?>
			          		<tr>
					            <td class="text-center"><?php echo $user['id']; ?></td>
					            <td><?php echo $user['sdate']; ?></td>
					            <td><?php echo $user['stime']; ?></td>
					            <td><?php echo $user['customer_id']; ?></td>
					            <td><?php echo $user['sales_type']; ?></td>
					            <td><?php echo $user['machine_code']; ?></td>
					            <td><?php echo $user['starting_reading']; ?></td>
					            <td><?php echo $user['ending_reading']; ?></td>
					            <td><?php echo $user['sales_amount']; ?></td>
					            <td><?php echo $user['sales_description']; ?></td>
					           <td class="text-center td-actions">
						            <a rel="tooltip" href="edit_sales.php?editsales=<?php echo $user['id']; ?>" class="btn btn-success btn-link" title="Edit">
						              <i class="material-icons">edit</i>
						            </a>
						            <a rel="tooltip" href="process/admin/usr_process.php?delsales=<?php echo $user['id']; ?>" class="btn btn-danger btn-link" title="Delete">
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