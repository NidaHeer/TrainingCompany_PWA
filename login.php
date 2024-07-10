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
    color:black;
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

    /* New background image style */
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

            <div class="col-md-6">
                <?php if (isset($_GET['msg'])) { ?>
                    <div class="alert alert-danger">
                        <strong><?= $_GET['msg'] ?></strong>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-center">Login Form</h5>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label"><b>Email</b></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"><b>Password</b></label>
                                <input type="password" name="password" class="form-control" maxlength="10"
                                       placeholder="Enter Password" required>
                            </div>
                            <div class="mb-3">
                                <label for="uType" class="form-label"><b>User Type</b></label>
                                <select name="uType" class="form-control" required>
                                    <option value="" selected disabled>Select User Type</option>
                                    <option value="students">Student</option>
                                    <option value="teachers">Teacher</option>
                                    <option value="admins">Admin</option>
                                    <option value="Venue">Venue Manager</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="Login">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="register.php" style="color: red;">Don't have an account? Register here</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php

    if (isset($_GET['error'])) {
        echo "<font color='red'><span class='glyphicon glyphicon-remove-sign '></span> " . @$_GET['error'];
    }
    if (isset($_POST['Login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $uType = $_POST['uType'];

        $result = mysqli_query($con, "SELECT * from $uType where email='$email' and password='$password'");
        $count = mysqli_num_rows($result);
        $user = mysqli_fetch_array($result);

        if ($count > 0) {
            $_SESSION['IS_LOGIN'] = "true";
            $_SESSION['USER_ID'] = $user['ID'];
            $_SESSION['USER_NAME'] = $user['name'];
            $_SESSION['USER_TYPE'] = $uType;
            echo "<script> window.location.href='$uType'; </script>";
        } else {
            echo "<script> window.location.href='login.php?msg=Email Or Password not correct'; </script>";
        }
    }
    ?>
    </div>
    </div>

    </div>
    </div>
    <?php include 'footer.php'; ?>