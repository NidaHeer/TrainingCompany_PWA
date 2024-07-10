<?php include 'header.php'; ?>

<div class="container mt-5" style="min-height: 75vh;">
    <div class="row">

        <div class="offset-sm-3 col-sm-6">
            <?php if (isset($_GET['msg'])) { ?>
                <div class="alert alert-info">
                    <strong><?= $_GET['msg'] ?></strong>
                </div>
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5">Instructor Registration</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Name</label>
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
                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" name="qual" class="form-control" placeholder="Enter Qualification">
                        </div><br>
                        <div class="form-group">
                            <label>Profile Image</label>
                            <input type="file" name="image" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary ml-5" name="RegisterAsTeacher"> Register
                        </button>
                    </form>
                    <a href="login.php">Login here...</a>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include 'footer.php'; ?>

<?php
if (isset($_POST['RegisterAsTeacher'])) {

    extract($_POST);
    $time = time();
    $image = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];


    if ($image != "") {
        $parts = explode(".", $image);
        $imgName = $time . "." . $parts[1];
        move_uploaded_file($tmp_img, "assets/profile_images/$imgName");
    }

    $query = "INSERT INTO teachers (name, email, address, cellNo, qual, password, image)
						VALUES ('$name', '$email', '$address', '$cellNo', '$qual', '$password', '$imgName')";
        $msg = "Teacher Added";

    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>
window.location='teacher.php?msg=$msg';
</script>";
    } else {
        echo 'error' . mysqli_error($con);
    }
}


?>