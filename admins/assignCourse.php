<div class="row">
	<div class="col-sm-7">
		<div class="panel panel-info">
			<div class="panel-heading text-center" style="background: #201D1D; padding-right: 15px; height: 45px; line-height: 45px; color: white;">Assign Course to a Teacher</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Qualification</th>
						<th>Assign Course</th>
					</tr>
					<?php 
					$i = 1;
					$query = "SELECT * FROM teachers";
					$result = mysqli_query($con, $query);

					while ($row = mysqli_fetch_array($result)) {
					    echo "<tr>
					    		<td>$i</td>
					    		<td>$row[name]</td>
					    		<td>$row[qual]</td>
					    		<td>
					    		<a href='index.php?page=teacherCourses&T_ID=$row[ID]' class='btn btn-primary'>Assign Course</a>
					    		</td>
					    	</tr>";
					    	$i++;
					}



					 ?>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-5"></div>
</div>


