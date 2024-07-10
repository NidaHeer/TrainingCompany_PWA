<?php $T_ID = $_GET['T_ID'];
$teacher = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM teachers WHERE ID = '$T_ID'")); ?>

<div class="row">
	

	<div class="col-sm-offset-2 col-sm-8">
		<a href="index.php?page=manage_teachers" class="btn btn-primary txtBlack btn-sm">
			<i class="fa fa-arrow-left"></i> Back</a><br><br><br><br>

		<h3><?=$teacher['name']?> (<?=$teacher['qual']?>)</h3><br>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><b>Assigned Courses</b></h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<th>ID</th>
						<th>Course Title</th>
						<th>Section</th>
						<th>Enrolled Students</th>
					</thead>
					<tbody>
						<?php
						$i = 1;
						     $qry = mysqli_query($con, "SELECT * FROM courses AS C JOIN course_teacher AS CT ON C.ID = CT.C_ID WHERE CT.T_ID = '$T_ID'");
						     while ($row = mysqli_fetch_array($qry)) {
						     	$CID = $row['0'];
						     	$count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM course_enroll WHERE C_ID = '$CID'"));
						     	echo "<tr>
						     	          <td>$i</td>
						     	          <td>$row[title]</td>
						     	          <td>$row[section]</td>
						     	          <td>$count</td>
						     	    </tr>";
						     	$i++;
						     }
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>