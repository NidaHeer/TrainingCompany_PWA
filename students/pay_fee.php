<?php 
	include '../config/db.php';
	$S_ID = $_GET['S_ID'];

	$query = mysqli_query($con, "SELECT * FROM students AS S JOIN course_enroll AS CE ON S.ID = CE.S_ID JOIN courses AS C ON CE.C_ID = C.ID WHERE S.ID = '$S_ID' ");
	$student = mysqli_fetch_array($query); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../assets/images/logo.jpeg">
	<title>Online Tution Portal</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>

<body>
	<div class="container d-flex justify-content-center mb-5">
		<div class="row g-3">
			<div class="col-md-12">
				<a href="index.php"><img src="../assets/images/logo.png" style="height: 150px"></a>
			</div>

			<div class="col-md-6">  
				<span>Payment Method</span>
				<div class="card">
					<div class="accordion" id="accordionExample">
						<div class="card">
							<div class="card-header p-0">
								<h2 class="mb-0">
									<button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<div class="d-flex align-items-center justify-content-between">
											<span>Credit card</span>
											<div class="icons">
												<img src="https://i.imgur.com/2ISgYja.png" width="30">
												<img src="https://i.imgur.com/W1vtnOV.png" width="30">
												<img src="https://i.imgur.com/35tC99g.png" width="30">
												<img src="https://i.imgur.com/2ISgYja.png" width="30">
											</div>
										</div>
									</button>
								</h2>
							</div>
							<form action="" method="POST">
								<input type="hidden" name="S_ID" value="<?=$_GET['S_ID']?>">
							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body payment-card-body">
									<span class="font-weight-normal card-text">Card Number</span>
									<div class="input">
										<i class="fa fa-credit-card"></i>
										<input type="number" class="form-control" placeholder="0000 0000 0000 0000" required> 
									</div> 
									<div class="row mt-3 mb-3">
										<div class="col-md-6">
											<span class="font-weight-normal card-text">Expiry Date</span>
											<div class="input">
												<i class="fa fa-calendar"></i>
												<input type="text" class="form-control" placeholder="MM-YY" required>
											</div> 
										</div>
										<div class="col-md-6">
											<span class="font-weight-normal card-text">CVC/CVV</span>
											<div class="input">
												<i class="fa fa-lock"></i>
												<input type="number" class="form-control" placeholder="000" required maxlength="3">
											</div> 
										</div>
									</div>
									<span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<span>Summary</span>
				<div class="card">
					<div class="d-flex justify-content-between p-3">
						<div class="d-flex flex-column">
							<span>Course</span>
						</div>
						<div class="mt-1">
							<span class="super-month"><?=$student['title']?></span>
						</div>
					</div>

					<hr class="mt-0 line">

					<div class="p-3">
						<div class="d-flex justify-content-between mb-2">
							<span>Course Fee</span>
							<span>Rs <?=number_format($student['fee'])?></span>
						</div>
					</div>

					<hr class="mt-0 line">
					<div class="p-3 d-flex justify-content-between">
						<div class="d-flex flex-column">
							<span>Student Name</span>
						</div>
						<span><?=$student['name']?></span>
					</div>
					<div class="p-3">
						
						
							<button name="Pay" class="btn btn-primary btn-block free-button">Pay Fee</button> 
						
							
						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>

<?php 
	if (isset($_POST['Pay'])) {
	 	$ID = $_POST['S_ID'];
	 	$date = date("d-m-Y");

	 	$_date = date("d F, Y");
        $message = "Your Fee has been Received.";
        $to  = "S".$ID;


	 	$qry = mysqli_query($con, "UPDATE students SET fee_status = 'Paid', paid_on = '$date' WHERE ID = '$ID'");
	 	if ($qry) {
	 		mysqli_query($con, "INSERT into announcements SET title = 'Fee Paid', message = '$message', _to = '$to', _date = '$_date'");
		echo'
		<script>
				window.location="index.php";
		</script>';
	}
	else {
		echo 'Error<br>';
	}
	 } ?>