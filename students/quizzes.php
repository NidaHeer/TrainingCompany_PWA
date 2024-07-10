<?php 
	$SID = $_SESSION['USER_ID'];
	$C_ID = $_GET['C_ID'];
	$title = $_GET['title']; ?>

<div class="row">
	<div class="col-sm-offset-1 col-sm-10"><br><br>
		
		<div class="panel panel-primary">
			<div class="panel-heading as-bg" style="background-color:white">
				<h2 class="panel-title pull-left" style="margin-top: 5px"><b>Quiz</b></h2>
				<span class="pull-right">
					<a href="index.php?page=course_website&C_ID=<?=$C_ID?>&title=<?=$title?>" class="btn btn-primary txtBlack btn-sm"><i class="fa fa-arrow-left"></i> Back</a><br>
				</span>
			</div>
				<div class="panel-body mt-2">
					<table class="table table-bordered table-striped">
						<tr>
							<th>ID</th>
							<th>Quiz Title</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Total Marks</th>
							<th>Quiz Status</th>
							<th>Submit Status</th>
							<th>Result</th>
						</tr>
					

		<?php 
		$i = 1;

	

		$result = mysqli_query($con, "SELECT * FROM schedule_quiz WHERE C_ID = '$C_ID'");
		while ($row = mysqli_fetch_array($result)) {
			$Q_ID = $row['ID'];

			$atmptQry = mysqli_query($con, "SELECT * FROM quiz_attempts  WHERE S_ID = '$SID' AND Q_ID = '$Q_ID'");
			$atmptDetails = mysqli_fetch_array($atmptQry);
			$chk = mysqli_num_rows($atmptQry);
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

					if ($chk > 0) {
						echo "<td class='text-success'>Submitted <br> <small>$atmptDetails[attempted_on] </small> </td>
						<td>$atmptDetails[obtain_marks]</td>";
					} else {
						if($end > $now) {
							echo "<td><a href='index.php?page=attempt_quiz&C_ID=$C_ID&Quiz_ID=$row[ID]&Total_Marks=$row[marks]&C_Title=$title'>Attempt Quiz</a></td>";
						}
						echo"<td>-</td>";
					}
					
					echo"</tr>";
			$i++;
		 } ?>
		 </table>
				</div>
		</div>
	</div>
</div>