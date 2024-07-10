<div class="row">
	<div class="col-sm-offset-4 col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><b>Change Password</b></h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST">
				
					<div class="form-group">
						<label>Old Password</label>
						<input type="password" class="form-control" name="old" placeholder="Old Password" required>
					</div>
					<div class="form-group">
						<label>New Password</label>
						<input type="password" class="form-control" name="new" placeholder="New Password" required>
					</div>
					<div class="form-group">
						<label>Comfirm Password</label>
						<input type="password" class="form-control" name="confirm" placeholder="Confirm Password" required>
					</div>
					<button type="submit" name="Update" class="btn btn-primary pull-right">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php 
	$UID = $_SESSION['USER_ID'];
	$table = $_SESSION['USER_TYPE'];

	$qry = mysqli_query($con, "SELECT password FROM $table WHERE ID = '$UID'");
	$data = mysqli_fetch_array($qry);
	$CurrentPass = $data['password'];

	if (isset($_POST['Update'])) {
		$old = $_POST['old'];
		$new = $_POST['new'];
		$confirm = $_POST['confirm'];

		if ($CurrentPass != $old) {
			echo "<script> swal('', 'Old password is not correct', 'error'); </script>";
		} 
		elseif ($new != $confirm) {
			echo "<script> swal('', 'Password does not matched', 'error'); </script>";
		} 
		else {
			$updateQry = mysqli_query($con, "UPDATE $table SET password = '$new' WHERE ID = '$UID'");
			if ($updateQry) {
				echo "<script> swal('', 'Password changed', 'success');
				        </script>";
			}
		}
	}
	
	 ?>