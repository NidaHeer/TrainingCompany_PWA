<!-- <a href="../meeting/join_class.php">join class</a> -->


<div class="modal fade" id="up2">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Schedule Live Class</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST">
					<div class="form-group">
						<label for="">Date</label>
						<input type="hidden" name="cid" class="form-control" id="cid">
						<input type="date" name="date" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Time</label>
						<input type="time" name="time" class="form-control">
					</div>
					<button type="submit" name="Schedule" class="btn btn-primary pull-right">Schedule Class</button><br><br>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-7">
		<?php 
		if (isset($_GET['msg'])) { ?>
		 	<div class="alert alert-success">
		 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		 		<strong>Class Scheduled</strong>
		 	</div>
		<?php } ?>
		<div class="panel panel-primary">
			<div class="panel-heading text-center"><b>Schedule Class</b></div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
					<tr>
						<th>ID</th>
						<th>Course Title</th>
						<th>Section</th>
						<th>Schedule</th>
						<th>Start Class</th>
					</tr>
					<?php 
					$T_ID = $_SESSION['USER_ID'];
					$i = 1;
					$qry = mysqli_query($con, "SELECT * from course_teacher AS CT JOIN courses AS c ON CT.C_ID = C.ID WHERE CT.T_ID = '$T_ID'");
					$count = mysqli_num_rows($qry);

						while ($row = mysqli_fetch_array($qry)) {
						   

					    echo "<tr>
					    		<td>$i</td>
					    		<td>$row[title]</td>
					    		<td>$row[section]</td>
					    		<td><a href='#' ID='$row[ID]' class='btn btn-primary btn-sm Schedule' data-toggle='modal' data-target='#up2'>Schedule</a></td>
					    		<td><a href='index.php?page=start_class&CID=$row[ID]' class='btn btn-info btn-sm'>Start Class</a></td>
					    	</tr>";
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