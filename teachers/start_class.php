<div class="row">
	<div class="col-sm-7">
		<div class="panel panel-info">
			<div class="panel-heading text-center"><b>Start Live Class</b></div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
					<tr>
						<th>ID</th>
						<th>Course</th>
						<th>Section</th>
						<th>Scheduled On</th>
						<th>Timing</th>
						<th>Start Class</th>
					</tr>
					<?php 
					$C_ID = $_GET['CID'];
					$i = 1;
					$qry = mysqli_query($con, "SELECT * from courses AS C JOIN live_classes AS LC ON C.ID = LC.C_ID WHERE LC.C_ID = '$C_ID'");
					$count = mysqli_num_rows($qry);

						while ($row = mysqli_fetch_array($qry)) {
						   

					    echo "<tr>
					    		<td>$i</td>
					    		<td>$row[title]</td>
					    		<td>$row[section]</td>
					    		<td>$row[_date]</td>
					    		<td>$row[_time]</td>";
					    		$date1=date_create($row['_date']);
								$date2=date_create(date('Y-m-d'));
								$diff=date_diff($date1,$date2);
								$chk = $diff->format("%a");
					    		if ($chk > 0) {
					    			echo "<td>--</td>";
					    		} else {
					    			echo "<td><a href='join_class.php' target='_blank' class='btn btn-info btn-sm'>Start Class</a></td>";
					    		}
					    		
					    	echo"</tr>";
					    $i++;
						}
					
					
					



					 ?>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-5">
		

	</div>
</div>


<?php 
	if (isset($_POST['Schedule'])) {
	 	$CID = $_POST['cid'];
	 	$date = $_POST['date'];
		$time = date("g:i A", strtotime($_POST['time']));

 	$qry = mysqli_query($con, "INSERT INTO live_classes SET C_ID = '$CID', _date = '$date', _time = '$time'");

 	if ($qry) {
		echo'<script>
				window.location="index.php?page=schedule_class&msg=Class Scheduled";
			</script>';
	}
	else {
		echo 'Error';
	}
	 } ?>