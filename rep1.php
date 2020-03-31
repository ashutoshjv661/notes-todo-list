<?php
	session_start();
	$title = "Reports";
	$acc_code = "A03";
	$table = true;
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
    	<?php
    	if(isset($_POST['dreport'])){
    		$from1 = $_POST['from'];
    		$from = str_replace('/', '-', $from1);
    		$from = date("Y-m-d", strtotime($from));
    		$to1 = $_POST['to'];
    		$to = str_replace('/', '-', $to1);
    		$to = date("Y-m-d", strtotime($to));
				$rep = datewiseDetailedReport($conn, $from, $to);
			?>
			<div class="col-md-12 ml-auto mr-auto">
				<div class="card">
				  <div class="card-header card-header-primary card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">Detailed Report</h4>
				  </div>
				  <div class="card-body">
	    			<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	        <thead>
	          <tr>
	            <th>Date</th>
	            <th>Employee</th>
	            <th>Vehicle No</th>
	            <th>Gasoline</th>
	            <th>Diesel Qty</th>
	            <th>Rate</th>
	            <th>Amount</th>
	            <th>Petrol Qty</th>
	            <th>Rate</th>
	            <th>Amount</th>
	            <th>Note</th>
	            <!-- <th class="disabled-sorting text-center">Actions</th> -->
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	          	$tdate = date("Y-m-d");
	          	echo "<script type='text/javascript'>var printMsg = 'Detailed Reports from ".$from1." to ".$to1."';</script>";
      				while ($info = mysqli_fetch_array($rep)) {
      			?>
          		<tr>
		            <td><?php echo $info['edate']; ?></td>
		            <td><?php echo $info['user']; ?></td>
		            <td><?php echo $info['vno']; ?></td>
		            <td><?php echo $info['gtype']; ?></td>
		            <?php
		            	if($info['gtype']=="Diesel"){
		            		echo "<td>".$info['qty']."</td>";
		            		echo "<td>".$info['price']."</td>";
		            		echo "<td>".$info['total']."</td>";
		            		echo "<td></td>";
		            		echo "<td></td>";
		            		echo "<td></td>";
		            	}elseif($info['gtype']=="Petrol"){
										echo "<td></td>";
		            		echo "<td></td>";
		            		echo "<td></td>";
		            		echo "<td>".$info['qty']."</td>";
		            		echo "<td>".$info['price']."</td>";
		            		echo "<td>".$info['total']."</td>";
		            	}
		            ?>
		            <td><?php echo $info['note']; ?></td>

          		</tr>
        		<?php
        			}
        		?>
	        </tbody>
	        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        	</tfoot>
	      		</table>
	      	</div>
	      </div>
	    </div>
	    <!-- End of first report -->
      <?php
    		}elseif(isset($_POST['sreport'])){
    		$from1 = $_POST['from'];
    		$from = str_replace('/', '-', $from1);
    		$from = date("Y-m-d", strtotime($from));
    		$to1 = $_POST['to'];
    		$to = str_replace('/', '-', $to1);
    		$to = date("Y-m-d", strtotime($to));
				$rep = datewiseStockReport($conn, $from, $to);
    	?>	
    	<div class="col-md-8 ml-auto mr-auto">
				<div class="card">
				  <div class="card-header card-header-primary card-header-icon">
				    <div class="card-icon">
				      <i class="material-icons">list</i>
				    </div>
				    <h4 class="card-title">Stock Report</h4>
				  </div>
				  <div class="card-body">
	    			<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	        <thead>
	          <tr>
	            <th>Date</th>
	            <th>Gasoline</th>
	            <th>QTY</th>
	            <th>Price</th>
	            <th>Note</th>
	            <!-- <th class="disabled-sorting text-center">Actions</th> -->
	          </tr>
	        </thead>
	        <tbody>
	          <?php
	          	$tdate = date("Y-m-d");
	          	echo "<script type='text/javascript'>var printMsg = 'Stock Update Reports from ".$from1." to ".$to1."';</script>";
      				while ($info = mysqli_fetch_array($rep)) {
      			?>
          		<tr>
		            <td><?php echo $info['edate']; ?></td>
		            <td><?php echo $info['qty']; ?></td>
		            <td><?php echo $info['gtype']; ?></td>
		            <td><?php echo $info['price']; ?></td>
		            <td><?php echo $info['note']; ?></td>
          		</tr>
        		<?php
        			}
        		?>
	        </tbody>
	        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        	</tfoot>
	      		</table>
	      	</div>
	      </div>
	    </div>
	    <!-- End of first report -->
	    <?php
	    	}
	  	?>
	  </div>              
	</div>
</div>
<!-- MAIN CONTENT ENDS -->
<?php
	require_once "./template/footer.php";
	
?>