<?php 
	$C_ID = $_GET['C_ID'];
	$title = $_GET['title'];
	$Q_ID = $_GET['Q_ID']; ?>

<div class="row">
	<div class="col-sm-offset-1 col-sm-10"><br><br>
		


		<div class="panel panel-primary">
			<div class="panel-heading as-bg" style="">
				<h2 class="panel-title pull-left" style="margin-top: 5px"><b>Quiz Result</b> (<?=$_GET['title']?>)</h2>
				<span class="pull-right">
					<a href="index.php?page=schedule_quiz&C_ID=<?=$C_ID?>&title=<?=$title?>" class="btn btn-primary txtBlack btn-sm"><i class="fa fa-arrow-left"></i> Back</a><br>
				</span>
			</div>
				<div class="panel-body">
					<table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Student Name</th>
								<th>Attempted On</th>
								<th>Marks</th>
							</tr>
						</thead>
					<tbody>

		<?php 
		$i = 1;

		$result = mysqli_query($con, "SELECT * FROM quiz_attempts AS QA JOIN students AS S ON QA.S_ID = S.ID  WHERE QA.Q_ID = '$Q_ID'");
		while ($row = mysqli_fetch_array($result)) {
		     echo "<tr>
						<td>$i</td>
						<td>$row[name]</td>
						<td class='text-success'>$row[attempted_on]</td>
						<td><b>$row[obtain_marks]</b></td>
					</tr>";
			$i++;
		 } ?>
		 </tbody>
		 </table>
				</div>
		</div>
	</div>
</div>