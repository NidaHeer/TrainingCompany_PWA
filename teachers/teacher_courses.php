

<?php include 'Modals.php'; ?>
<div class="row"><br><br>
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading text-center">My Assigned Courses</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
					<tr>
						<th>ID</th>
						<th>Course Title</th>
						<th>Section</th>
						<th>Add Material</th>
						<th>Lecture Video</th>
						<th>Schedule Quiz</th>
						<th>Quiz Bank</th>
						<th>View Details</th>
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
					    		<td>
					    		<a href='#' ID='$row[ID]' class='btn btn-primary text-black AddMaterial' data-toggle='modal' data-target='#exampleModal'>Add Material</a>
					    		</td>
					    		<td>
					    		<a href='#' ID='$row[ID]'  class='btn btn-success text-black AddVideo' data-toggle='modal' data-target='#up1'>Lecture Video</a>
					    		</td>
					    		<td>
					    		<a href='index.php?page=schedule_quiz&C_ID=$row[ID]&title=$row[title]'  class='btn btn-warning text-black'>Schedule Quiz</a>
					    		</td>
					    		<td>
					    		<a href='index.php?page=add_mcqs&C_ID=$row[ID]&title=$row[title]'  class='btn btn-danger text-black'>Quiz Bank</a>
					    		</td>
					    		<td><a href='index.php?page=course_details&CID=$row[ID]' class='btn btn-info btn-xs'>View</a>
					    		</td>
					    	</tr>";
					    $i++;
						}
					

					 ?>
				</table>
			</div>
		</div>
	</div>
</div>
