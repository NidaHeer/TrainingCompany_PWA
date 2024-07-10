<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrainingCompany</title>
    <!-- Link to manifest file -->
    <link rel="manifest" href="manifest.json">
    <!-- Theme color -->
    <meta name="theme-color" content="#ffd31d">
    <!-- Link to icons for compatibility -->
    <link rel="icon" href="img/icon-192x192.png" sizes="192x192">
    <link rel="icon" href="img/icon-512x512.png" sizes="512x512">
</head>
<body>
<script>
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('/service-worker.js')
        .then(function(registration) {
          console.log('Service Worker registered with scope:', registration.scope);
        }, function(err) {
          console.log('Service Worker registration failed:', err);
        });
    });
  }
</script>

</body>
</html>


<?php include 'header.php'; ?>
<style>
    .team-detail img {
    border-radius: 70%;
    width: 50%;
}
.team-detail {
    margin-top:40px;
}
.team-detail img {
    width: 50%;
}
 .card-custom {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-custom img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 1rem;
        }

        .btn-custom {
            background-color: lightblue;
            color: white;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #218838; /*course view button*/
        }

        .updated-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #c61a09;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .card-img-top {
            width: 100%;
            height: 270px; /* Set the desired height */
           
        }
.box-area {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
  background-color: lightcyangrey; /*teacher*/
}

.single-box {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 300px;
  height: 500px;
  border-radius: 4px;
  background-color: #fff;
  text-align: center;
  margin: 20px;
  padding: 20px;
  transition: .3s;
  box-shadow: 1px 0 5px 0 rgba(0,0,0,0.6);
}

.img-area {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 200px;
  height: 200px;
  border: 6px solid #ddd;
  border-radius: 50%;
  margin-bottom: 10px;
  padding: 20px;
  background-size: cover;
  background-position: center center;
}

.header-text {
  font-size: 24px;
  font-weight: 500;
  line-height: 48px;
}

.img-text h3 {
  margin: 10px 0;
}

.img-text p {
  font-size: 15px;
  font-weight: 400;
  line-height: 30px;
}

.single-box:hover {
  background-color: #F7BA5B;
  color: #fff;
}
.single-box:hover .img-text h3 {
  color: #fff;
}
.wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Adjust spacing between blog posts */
    
}

.blog_post {
    flex: 1 1 calc(25% - 20px); /* Adjust the width of each blog post */
    box-sizing: border-box;
    margin: 10px; /* Adjust the spacing between items */
    max-width: calc(25% - 20px); /* Ensure the max width doesn't exceed the calculated width */
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.1);
    position: relative;
}

.img_pod1 {
    width: 100%;
    padding-top: 100%; /* 1:1 Aspect Ratio */
    position: relative;
    overflow: hidden;
    border-radius: 50%;
    background: linear-gradient(90deg, #ff9966, #ff5e62);
    box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
}

.rop {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.container_copy {
    text-align: center;
    padding: 10px;
}

.btn_primary {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.btn_primary:hover {
    background-color: #0056b3;
}

/* Additional styles to enhance the layout */
.container-xxl {
    max-width: 1200px;
    margin: 0 auto;
}

h3 {
    margin: 0;
    font-size: 1.2em;
    color: #333;
}


.pag {
    font-size: 1em;
    color: #666;
}

</style>        


    <!-- Carousel Start -->
  <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    
  </div>
  <div class="carousel-inner ml-2" style="width: 80%;margin: 0 auto;">
    <div class="carousel-item active mt-5">
      <img src="https://static.vecteezy.com/system/resources/previews/005/140/346/large_2x/portrait-of-young-woman-in-graduation-gown-smiling-and-cheering-on-black-background-free-photo.jpg" alt="..." class="w-100">
      <div class="carousel-caption d-flex flex-column h-90 align-items-center justify-content-center bottom-0">
        <h2 class="bg-dark bg-opacity-50 py-2 px-4" style="color: white;">NEED ANY COURSES</h2>
        <p class="bg-dark bg-opacity-50 py-2 px-4">We provide an adpative technology-driven and personalized learning experience to professionals on Cloud Computing. AI&ML, IoT, Security and other advanced technologies.</p>
        <a href="#" class="btn btn-outline-light px-4 py-2 rounded-0">Learn More</a>
      </div>
    </div>
    <div class="carousel-item mt-5">
      <img src="https://thumbs.wbm.im/pw/small/5d1fb1c77f92de9f90a5afe25a817b81.jpg" alt="..." class="w-100">
      <div class="carousel-caption d-flex flex-column h-90 align-items-center justify-content-center bottom-0 ">
        <h2 class="bg-dark bg-opacity-50 py-2 px-4" style="color: white;">GET IN TOUCH</h2>
        <p class="bg-dark bg-opacity-50 py-2 px-4">Vocational education and training has played a central role in promoting the school-to-work transition of young people.</p>
        <a href="#" class="btn btn-outline-light px-4 py-2 rounded-0">Learn More</a>
      </div>
    </div>
    <div class="carousel-item mt-5">
      <img src="https://thehill.com/wp-content/uploads/sites/2/2022/03/ca_grad_diploma.jpg?w=1280" alt="..." class="w-100">
      <div class="carousel-caption d-flex flex-column h-90 align-items-center justify-content-center bottom-0">
        <h2 class="bg-dark bg-opacity-50 py-2 px-4" style="color: white;">Get Tommorrow's Skills Today</h2>
        <p class="bg-dark bg-opacity-50 py-2 px-4">Our goal is to make the skill easy and effective for everyone via online or physical</p>
        <a href="#" class="btn btn-outline-light px-4 py-2 rounded-0">Learn More</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- Carousel End -->



    <!-- Courses Start -->
<section class="team section-padding mt-5" data-scroll-index='3'>
    <h1 style="text-align: center;">Course Offered</h1>
    <div class="text-center mt-3">
        <a href="all_courses.php" style="border-radius: 30px; width: 150px;" class="btn btn-primary">View All</a> <!-- Link to a page displaying all courses -->
    </div>
    <div class="container mt-5">
        <div class="row">
            <?php
            $Qry = mysqli_query($con, "SELECT * FROM courses LIMIT 4"); // Limit to 4 courses
            while ($course = mysqli_fetch_array($Qry)) { ?>
                <div class="col-md-3">
                    <div class="card card-custom mb-3">
                        <div class="position-relative">
                            <img class="card-img-top" src="assets/images/<?=$course['image']?>" alt="">
                            <?php if ($course['is_new']) { ?>
                                <div class="updated-badge">New</div>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?=$course['title']?></h5>
                            <p class="card-text"><?php echo "Rs ". $course['fee']?></p>
         <a href="viewdet.php?ID=<?=$course['ID']?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
</section>



    <!-- Team Start -->
    <section class="team section-padding mt-5" data-scroll-index='3'>
    <h1 style="text-align: center;">Teachers</h1>
    <div class="text-center mt-3">
        <a href="all_teacher.php" style="border-radius: 30px; width: 150px;" class="btn btn-primary">View All</a> <!-- Link to a page displaying all courses -->
    </div>
<div class="box-area">
  <?php
    $Qry = mysqli_query($con, "SELECT * FROM teachers LIMIT 4");
    while ($teacher = mysqli_fetch_array($Qry)) { ?>
      <div class="single-box">
        <div class="img-area" style="background-image: url('assets/profile_images/<?=$teacher['image']?>');">
        </div>
        <div class="img-text">
          <span class="header-text"><strong><?=$teacher['name']?></strong></span>
          
          <h3><?=$teacher['qual']?></h3>
          <p><?=$teacher['details']?></p>
        </div>
      </div>
    <?php } ?>
        </div>
   
    
</section>



    <!-- Team End -->


        <!-- Blogs Start -->
    <div class="container-xxl py-5" id="blogs">
    <h1 style="text-align: center;">Popular Blogs</h1>
    <div class="text-center mt-3">
        <a href="all_blog.php" style="border-radius: 30px; width: 150px;" class="btn btn-primary">View All</a> <!-- Link to a page displaying all courses -->
    </div>
       
    <div class="wrapper mt-3">
        <?php
        $Qry = mysqli_query($con, "SELECT * FROM blogs LIMIT 4");
        while ($blog = mysqli_fetch_array($Qry)) { ?>
            <div class="blog_post">
                <div class="img_pod1">
                    <img class="rop" src="assets/images/<?=$blog['banner']?>" alt="">
                </div>
                <div class="container_copy">
                    <h3><?=$blog['date_created']?></h3>
                    <h4 style="margin-top: 5px;"><?=$blog['title']?></h4>
                    <p class="pag">Summery</p> <!-- Assuming 'summary' contains a brief excerpt of the blog -->
                    <a class="btn btn-primary" href="read_blog.php?ID=<?=$blog['ID']?>">
                        Read More
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

        <!-- Blogs End -->
<?php include 'footer.php'; ?>
