 <style>
 .panel {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .panel-heading {
            background-color: #343A40;
            color: white;
            padding: 6px;
        }
        .panel-title {
            font-size: 24px;
            font-weight: bold;
        }
        .form-group label {
            font-size: 16px;
            color: #495057;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            border-color: #17a2b8;
            box-shadow: 0 0 8px rgba(23, 162, 184, 0.25);
        }
        .btn-primary {
            background-color: #343A40;
            border-color: #17a2b8;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-primary:hover {
            background-color: #138496;
            transform: scale(1.05);
        }
        .panel-body {
            padding: 30px;
        }
    </style>
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