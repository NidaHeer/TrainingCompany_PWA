<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Progressive Website for a Training Company</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="stylesheet" type="text/css" href="style.css"/>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    .navbar-brand h2 {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
    }

    .navbar-nav .nav-link {
        font-size: 18px;
        font-weight: bold;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler-icon {
        background-color: #007bff;
    }

    .navbar-toggler:focus {
        outline: none;
    }

    .navbar-nav .nav-item {
        margin-left: 15px;
    }
    .carousel-caption {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #fff;
    z-index: 1;
}

@media screen and (orientation: landscape) {
  .carousel img {
    height: 100vh;
  }
}

</style>
</head>

<body>

    <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg navbar-white bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <h2 style="color: white;">Progressive Website for a Training Company</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all_courses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all_blog.php">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="portfolio.php">portfolio</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




    <!-- Navbar End -->