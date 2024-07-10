<?php include 'header.php'; ?>
<style>
    .card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 30px;
    background-color: lightskyblue;
}
.card-title{
    color:black
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

.form-control {
    border-radius: 8px;
    border-color: #ced4da;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: none;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    border-radius: 8px;
    padding: 10px 20px;
}
body {
    background-image: url('http://localhost/TrainingCompany/img/bg.jpg'); /* Updated URL to the new image */
    background-size: cover; /* Make sure the image covers the entire background */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-position: center center; /* Center the image */
    min-height: 100px; /* Ensure it covers full viewport height */
}

</style>
<body style="background-color: #D8E6E7;">
<div class="container mt-5" style="min-height: 75vh;">
    <div class="row justify-content-center"> <!-- Centering the form horizontally -->

        <div class="col-md-8">
            <?php if (isset($_GET['msg'])) { ?>
                <div class="alert alert-info">
                    <strong><?=$_GET['msg']?></strong>
                </div>
            <?php } ?>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 text-center">Student Registration Form</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="sname" class="form-label">Student Name</label>
                            <input type="hidden" name="ID" value="0" id="S_ID">
                            <input type="text" name="name" class="form-control" placeholder="Enter Student Name" id="sname" required>
                        </div>
                        <div class="mb-3">
                            <label for="sfname" class="form-label">Father Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter Father Name" id="sfname" required>
                        </div>
                        <div class="mb-3">
                            <label for="semail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" id="semail" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="saddress" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Student Address" id="saddress" required>
                        </div>
                        <div class="mb-3">
                            <label for="scell" class="form-label">Contact No</label>
                            <input type="text" name="cellNo" class="form-control" placeholder="Enter Contact No" id="scell" required>
                        </div>
                        <div class="mb-3">
                            <label for="spass" class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Enter Password" class="form-control" id="spass" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" name="Register">Register</button>
                    </form>
                    <div class="text-center mt-3" >
                        <a href="login.php" style="color: red;">Already have an account? Login here...</a><br>
                        <a href="teacher.php" style="color: red;">Register as Instructor</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

<?php
if (isset($_POST['Register'])) {
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $cellNo = $_POST['cellNo'];
    $password = $_POST['password'];
    $time = time();
    $image = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];


    if ($image != "") {
        $parts = explode(".", $image);
        $imgName = $time . "." . $parts[1];
        move_uploaded_file($tmp_img, "assets/profile_images/$imgName");
    }
    $query = "INSERT INTO students SET name ='$name', fName = '$fname', email = '$email', image = '$imgName', address = '$address', cellNo = '$cellNo', password = '$password'";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>
                    window.location='register.php?msg=Registered Successfully';
                </script>";
    } else {
        echo "Error" . mysqli_error($con);
    }
}

?>