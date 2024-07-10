<div class="row" style="margin-top: -12px !important">
	<div class="col-sm-12" style="background: #201D1D; padding-right: 15px; height: 45px; line-height: 45px;">
		<div class="col-sm-4"> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#TchrModal1">Add New Teacher</button></div>
		<div class="col-sm-4" style="color: green; font-weight: bold;"><?= @$_GET['msg'] ?></div>
		
	</div>
	<div class="modal fade" id="TchrModal1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add New Teacher</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-6">
								<label>Teacher Name</label>
								<input type="hidden" name="ID" value="0" id="T_ID">
								<input type="text" name="name" class="form-control" placeholder="Enter Name" id="name">
							</div>
							<div class="col-sm-6">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="Email" id="email">
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-6">
								<label>Address</label>
								<input type="text" name="address" class="form-control" placeholder="Enter Address" id="address">
							</div>
							<div class="col-sm-6">
								<label>Cell No</label>
								<input type="number" name="cellNo" class="form-control" id="cellNo">
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-6">
								<label>Highest Qualification</label>
								<input type="text" name="qual" class="form-control" placeholder="Enter Qualification" id="qual">
							</div>
							<div class="col-sm-6">
								<label>Profile Image</label>
								<input type="file" name="image" class="form-control" required>
							</div>
						</div><br>
						<div class="row">
							<div class="col-sm-12">
								<label>Password</label>
								<input type="password" name="password" placeholder="Enter Password" class="form-control">
							</div>
						</div><br><br>
						<label>Details</label>
						<textarea rows="5" cols="5" class="form-control" name="deta"></textarea>
				</div>
				<div class="modal-footer">
					<center>
						<input type="submit" name="submit" value="Add Teacher" class="btn btn-success" id="tbtn">
					</center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 5%">
	<div class="col-sm-12">
		<table class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Address</th>
					<th>Cell No</th>
					<th>Qualification</th>
					<th>Password</th>
					<th>Details</th>
					<th>Report</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				$result = mysqli_query($con, "SELECT * FROM teachers");
				while ($row = mysqli_fetch_array($result)) {
					echo "<tr>
					<td>$i</td>
					<td>$row[name]</td>
					<td>$row[email]</td>
					<td>$row[address]</td>
					<td>$row[cellNo]</td>
					<td>$row[qual]</td>
					<td>$row[password]</td>
					<td>$row[details]</td>
					<td><a href='index.php?page=teacher_report&T_ID=$row[ID]' class='btn btn-info btn-xs'>Report</a></td>
					<td>
							<a href='#' data-toggle='modal' data-target='#TchrModal1' ID='$row[ID]' name='$row[name]' email='$row[email]' address='$row[address]' cellNo='$row[cellNo]' qual='$row[qual]' class='btn btn-info btn-xs Tchr_Update'>Update</a>
							<a href='index.php?page=manage_teachers&Delete=Yes&ID=$row[ID]' class='btn btn-danger btn-xs'>Delete</a>
						</td>
				</tr>";
					$i++;
				} ?>
			</tbody>
		</table>
	</div>
</div>
<?php
if (isset($_POST['submit'])) {
	$ID = $_POST['ID'];
	extract($_POST);
	$time = time();
	$image = $_FILES['image']['name'];
	$tmp_img = $_FILES['image']['tmp_name'];

	if ($image != "") {
		$parts = explode(".", $image);
		$imgName = $time . "." . $parts[1];
		move_uploaded_file($tmp_img, "../assets/profile_images/$imgName");
	}

	if ($ID > 0) {
		$query = "UPDATE teachers SET name = '$name', email = '$email', address = '$address', cellNo = '$cellNo', qual = '$qual', password = '$password', image='$imgName' WHERE ID = '$ID'";
		$msg = "Teacher Record Updated";
	} else {
		$query = "INSERT INTO teachers (name, email, address, cellNo, qual, password,details, image)
						VALUES ('$name', '$email', '$address', '$cellNo', '$qual', '$password','$deta', '$imgName')";
		$msg = "Teacher Added";
	}

	$result = mysqli_query($con, $query);
	if ($result) {
		echo "<script>
window.location='index.php?page=manage_teachers&msg=$msg';
</script>";
	} else {
		echo 'error' . mysqli_error($con);
	}
}
if (isset($_GET['Delete'])) {
	$ID = $_GET['ID'];
	$result = mysqli_query($con, "DELETE FROM teachers WHERE ID = '$ID'");
	if ($result) {
		echo "<script>
		window.location='index.php?page=manage_teachers&msg=Record Delete';
</script>";
	}
}
?><script>
$(document).ready(function() {
    $('.Tchr_Update').click(function() {
        var teacherID = $(this).data('id');
        var teacherName = $(this).data('name');
        var teacherEmail = $(this).data('email');
        var teacherAddress = $(this).data('address');
        var teacherCellNo = $(this).data('cellno');
        var teacherQual = $(this).data('qual');
        var teacherDetails = $(this).data('details');
        var teacherPassword = $(this).data('password');

        $('#T_ID').val(teacherID);
        $('#name').val(teacherName);
        $('#email').val(teacherEmail);
        $('#address').val(teacherAddress);
        $('#cellNo').val(teacherCellNo);
        $('#qual').val(teacherQual);
        $('#deta').val(teacherDetails);
        $('#password').val(teacherPassword);

        $('#image').removeAttr('required'); // Image not required for edit
        $('.modal-title').text('Update Teacher');
        $('#tbtn').val('Update Teacher');
        $('#TchrModal').modal('show');
    });
});
</script>
