
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-5">
            <div class="panel panel-success">
                <div class="panel-heading text-center bg-dark text-white p-3">Add New Course</div>
                <div class="panel-body p-4">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Course Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Course Name" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Course Banner</label>
                            <input type="file" id="image" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fee">Fee</label>
                            <input type="number" id="fee" name="fee" class="form-control" placeholder="Course Fee" required>
                        </div>
                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" id="section" name="section" class="form-control" placeholder="Section">
                        </div>
                        <div class="form-group">
                            <label for="duration_weeks">How many Weeks</label>
                            <input type="number" id="duration_weeks" name="duration_weeks" class="form-control" placeholder="1, 2, 3, 4..." required>
                        </div>
                        <div class="form-group">
                            <label for="dat">Start Date</label>
                            <input type="date" id="dat" name="date" class="form-control" placeholder="Pick Date" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Add Course</button>
                    </form>
                </div>
            </div>
        </div>
         <div class="col-sm-7">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><b>Courses List</b></h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Course Title</th>
							<th>Section</th>
							<th>Weeks</th>
							<th>Start Date</th>
							<th>Delete</th>
							<th>Update Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$qry = mysqli_query($con, "SELECT * FROM courses");
						while ($row = mysqli_fetch_array($qry)) {
							echo "<tr>
						     	          <td>$i</td>
						     	          <td>$row[title]</td>
						     	          <td>$row[section]</td>
						     	          <td>$row[week]</td>
						     	          <td>$row[date]</td>
						     	          <td><a href='index.php?page=manage_courses&Delete=Yes&ID=$row[ID]' class='btn btn-danger btn-xs'>Delete</a></td>
						     	          <td><a href='index.php?page=manage_courses&update=Yes&ID=$row[ID]' class='btn btn-success btn-xs'>Update</a></td>
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
    </div>
   
</div>

	

<?php


if (isset($_POST['submit'])) {
	$title = $_POST['name'];
	$section = $_POST['section'];
	$fee = $_POST['fee'];
    $duration_weeks=$_POST['duration_weeks'];
    $date = date("d F, Y");
	$time = time();
	$image = $_FILES['image']['name'];
	$tmp_img = $_FILES['image']['tmp_name'];

	if ($image != "") {
		$parts = explode(".", $image);
		$imgName = $time . "." . $parts[1];
		move_uploaded_file($tmp_img, "../assets/images/$imgName");
	}

	$result = mysqli_query($con, "INSERT INTO courses SET title = '$title', section = '$section',week='$duration_weeks',date='$date', image = '$imgName', fee = '$fee', is_new=True");

	if ($result) {
		echo "<script>
					window.location='index.php?page=manage_courses';
				</script>";
	}
}

if (isset($_GET['Delete'])) {
	$ID = $_GET['ID'];

	$result = mysqli_query($con, "DELETE FROM courses WHERE ID = '$ID'");

	if ($result) {
		echo "<script>
					window.location='index.php?page=manage_courses';
				</script>";
	}
}

if (isset($_GET['update'])) {
    $ID = $_GET['ID'];
    $result = mysqli_query($con, "UPDATE courses SET is_new = 0 WHERE ID = '$ID'");

    if ($result) {
        echo "<script>
                  window.location='index.php?page=manage_courses';
              </script>";
    } else {
        echo "Error updating course: " . mysqli_error($con);
    }
}
?>