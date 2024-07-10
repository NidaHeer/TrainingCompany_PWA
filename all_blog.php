 <?php include 'header.php'; ?>
 <style>

.wrapper {
    display: flex;
    flex-wrap: wrap;
   
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
 <div class="container-xxl py-5" id="blogs">
    <h1 style="text-align: center;">Popular Blogs</h1>
    <div class="wrapper mt-3">
        <?php
        $Qry = mysqli_query($con, "SELECT * FROM blogs");
        while ($blog = mysqli_fetch_array($Qry)) { ?>
            <div class="blog_post">
                <div class="img_pod1">
                    <img class="rop" src="assets/images/<?=$blog['banner']?>" alt="">
                </div>
                <div class="container_copy">
                    <h3><?=$blog['date_created']?></h3>
                    <h4 style="margin-top: 5px;"><?=$blog['title']?></h4>
                    <p class="pag">Summery</p> <!-- Assuming 'summary' contains a brief excerpt of the blog -->
                    <a class="btn_primary" href="read_blog.php?ID=<?=$blog['ID']?>">
                        Read More
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

        <!-- Blogs End -->
<?php include 'footer.php'; ?>