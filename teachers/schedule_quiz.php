<?php 
	$C_ID = $_GET['C_ID'];
	$title = $_GET['title']; ?>

<div class="row">
	<div class="col-sm-offset-1 col-sm-10"><br><br>
		
		<a class="btn btn-warning text-black" data-toggle="modal" href='#ScheduleQuiz'>Schedule Quiz</a>
		<br><br>
		<div class="modal fade" id="ScheduleQuiz">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						
						<h4 class="modal-title">Schedule Quiz</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<form action="" method="POST">
						
							<div class="form-group">
								<label for="">Title</label>
								<input type="hidden" name="C_ID" value="<?=$_GET['C_ID']?>">
								<input type="hidden" name="C_Title" value="<?=$_GET['title']?>">
								<input type="text" name="title" class="form-control" placeholder="Title" required>
							</div>
							<div class="form-group">
								<label for="">Start Date</label>
								<input type="datetime-local" name="start" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="">End Date</label>
								<input type="datetime-local" name="end" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="">Total Marks</label>
								<input type="number" class="form-control" name="marks" required>
							</div>
						
							<button type="submit" name="Schedule_Quiz" class="btn btn-success pull-right">Submit</button><br><br>
						</form>
					</div>
				</div>
			</div>
		</div>


		<div class="panel panel-primary">
			<div class="panel-heading as-bg" style="">
				<h2 class="panel-title pull-left" style="margin-top: 5px"><b>Scheduled Quizzes</b> (<?=$_GET['title']?>)</h2>
				<span class="pull-right">
					<a href="index.php?page=teacher_courses" class="btn btn-primary txtBlack btn-sm"><i class="fa fa-arrow-left"></i> Back</a><br>
				</span>
			</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped mt-2">
						<tr>
							<th>ID</th>
							<th>Quiz Title</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Total Marks</th>
							<th>Quiz Status</th>
							<th>Result</th>
						</tr>
					

		<?php 
		$i = 1;

		// $date1=date_create("Jun 09, 2022 12:00 AM");
		// $date2=date_create("Jun 10, 2022 11:59 PM");
		// $date3=date_create("Jun 11, 2022 12:00 AM");

		// $now = new DateTime();

		// if($date2 < $date3) {
		// 	echo 'date is in the past';
		// }


		// $diff=date_diff($date2,$date3);
		// echo $diff->format("%R%a days");

		$result = mysqli_query($con, "SELECT * FROM schedule_quiz WHERE C_ID = '$C_ID'");
		while ($row = mysqli_fetch_array($result)) {
		     echo "<tr>
					<td>$i</td>
					<td>$row[title]</td>
					<td class='text-success'>$row[start_date]</td>
					<td class='text-danger'>$row[end_date]</td>
					<td>$row[marks]</td>";
					$end=date_create($row['end_date']);
					$now = new DateTime();

					if($end < $now) {
						echo "<td class='text-danger'>Closed</td>";
					}
					else{
						echo "<td class='text-success'>Opened</td>";
					}
					
					
				echo"<td><a href='index.php?page=quiz_result&Q_ID=$row[ID]&C_ID=$C_ID&title=$title'>Result</a></tr>";
			$i++;
		 } ?>
		 </table>
				</div>
		</div>
	</div>
</div>


<?php 
	if (isset($_POST['Schedule_Quiz'])) {
	 	$C_ID = $_POST['C_ID'];
	 	$C_Title = $_POST['C_Title'];
	 	$title = $_POST['title'];
	 	$marks = $_POST['marks'];
	 	$start = date("F d, Y g:i A", strtotime($_POST['start']));
	 	$end = date("F d, Y g:i A", strtotime($_POST['end']));

	 	$date = date("d F, Y");
        $message = "New Quiz of <b> ". $C_Title . "</b> has been scheduled. Closing date is ". $end;
         $to  = "C".$C_ID;

	 	$qry = mysqli_query($con, "INSERT INTO schedule_quiz SET C_ID = '$C_ID', title = '$title', start_date = '$start', end_date = '$end', marks = '$marks'");

	 	if ($qry) {
	 		mysqli_query($con, "INSERT into announcements SET title = 'New Quiz Scheduled', message = '$message', _to = '$to', _date = '$date'");
		echo"
		<script>
				window.location='index.php?page=schedule_quiz&C_ID=$C_ID&title=$C_Title';
		</script>";
	}
	else {
		echo 'Error<br>'.$query;
	}
	 } ?>