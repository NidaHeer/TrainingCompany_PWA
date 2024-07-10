<?php include 'header.php'; ?>

<style>

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
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #218838;
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
</style>
<section class="team section-padding mt-5" data-scroll-index='3'>
    <h1 style="text-align: center;">Course Offered</h1>
   
    <div class="container mt-5">
        <div class="row">
            <?php
            $Qry = mysqli_query($con, "SELECT * FROM courses"); // Limit to 4 courses
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
                           <a href="viewdet.php?ID=<?=$course['ID']?>" class="btn btn-custom">View Details</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
</section>
       
<?php include 'footer.php'; ?>