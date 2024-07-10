<?php $TID  = $_GET['T_ID']; ?>

<div class="row">
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><b>Assign Course</b></h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST" class="form-inline">
		 		<input type="hidden" name="T_ID" value="<?=$_GET['T_ID'] ?>">
		 		<label class="form-group">Select Course</label>&nbsp;&nbsp;
			    <select name="C_ID" class="form-control">
			        <option disabled="" selected="">Choose Course</option>
			        <?php 
						$result = mysqli_query($con, "SELECT * FROM courses  WHERE is_assigned =  '0'");
						while ($row = mysqli_fetch_array($result)) {
						    echo"<option value='$row[ID]'>$row[title] ($row[section])</option>";
						} ?>
			    </select>&nbsp;&nbsp;
		 		<input type="submit" name="Assign" value="Assign Course" class="btn btn-success pull-right">
		 	</form>
			</div>
		</div>
	</div>
</div>

<div class="row mt-3">
	<div class="col-sm-offset-3 col-sm-6">
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
						
						<th>Delete</th>
					</thead>
					<tbody>
						<?php
						$i = 1;
						     $qry = mysqli_query($con, "SELECT * FROM courses AS C JOIN course_teacher AS CT ON C.ID = CT.C_ID WHERE CT.T_ID = '$TID'");
						     while ($row = mysqli_fetch_array($qry)) {					     	
						     	echo "<tr>
						     	          <td>$i</td>
						     	          <td>$row[title]</td>
						     	          <td>$row[section]</td>
						     	          <td><a href='index.php?page=teacherCourses&DeleteCourse=Yes&ID=$row[ID]&T_ID=$row[T_ID]&C_ID=$row[C_ID]' class='btn btn-danger btn-xs'>Delete</a>
                         					</td>
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


<?php 
if (isset($_POST['Assign'])) {
 	$T_ID = $_POST['T_ID'];
 	$C_ID = $_POST['C_ID'];

 	$q = "SELECT * FROM `course_teacher` WHERE  T_ID = '$T_ID' AND C_ID = '$C_ID'";
 	$qry = mysqli_query($con, $q);
 	$count = mysqli_num_rows($qry);
 	if ($count > 0) {
 		echo"
		<script>
				alert('Course  Is Already Assigned');
				window.location='index.php?page=teacherCourses&T_ID=$T_ID';
		</script>";
 	} 

 	else {

 	$query = "INSERT INTO course_teacher SET T_ID = '$T_ID', C_ID = '$C_ID'";
 	$result = mysqli_query($con, $query);

 	if ($result) {
 		mysqli_query($con, "UPDATE courses SET is_assigned = '1' WHERE ID =  '$C_ID'");
		echo"
		<script>
				alert('Course Assigned');
				window.location='index.php?page=teacherCourses&T_ID=$T_ID';
		</script>";
	}
	else {
		echo 'Error<br>'.$query;
	}
 }
}

if (isset($_GET['DeleteCourse'])) {
		$ID = $_GET['ID'];
		$TID = $_GET['T_ID'];
		$C_ID = $_GET['C_ID'];

		$result = mysqli_query($con, "DELETE FROM course_teacher WHERE ID = '$ID'");

		if ($result) {
			mysqli_query($con, "UPDATE courses SET is_assigned = '0' WHERE ID =  '$C_ID'");
			echo "<script>
					window.location='index.php?page=teacherCourses&T_ID=$TID&msg=Record Delete';
				</script>";
		}
	}

 ?>