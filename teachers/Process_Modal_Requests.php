<?php 
	include '../config/db.php';


if (isset($_POST['AddMeterial'])) {
 	$CourseID = $_POST['CourseID'];
 	$title = $_POST['title'];

 	$material = $_FILES['material']['name'];
 	$tempName = $_FILES['material']['tmp_name'];
 	move_uploaded_file($tempName, "../assets/material/$material");

 	$query = "INSERT INTO course_material SET C_ID = '$CourseID', title = '$title', material = '$material'";
 	$result = mysqli_query($con, $query);

 	if ($result) {
		echo'
		<script>
				alert("Course Material Added");
				window.location="index.php?page=teacher_courses";
		</script>';
	}
	else {
		echo 'Error<br>'.$query;
	}
 }

 if (isset($_POST['AddVideo'])) {
 	$CourseID = $_POST['CourseID'];
 	$title = $_POST['title'];

 	$video = $_FILES['video']['name'];
 	$tempName = $_FILES['video']['tmp_name'];
 	move_uploaded_file($tempName, "../assets/videos/$video");

 	$query = "INSERT INTO course_video SET C_ID = '$CourseID', title = '$title', video = '$video'";
 	$result = mysqli_query($con, $query);

 	if ($result) {
		echo'
		<script>
				alert("Video Added");
				window.location="index.php?page=teacher_courses";
		</script>';
	}
	else {
		echo 'Error<br>'.$query;
	}
 }
 

	



	  ?>