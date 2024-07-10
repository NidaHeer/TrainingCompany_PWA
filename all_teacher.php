<?php include 'header.php'; ?>
<style>
	.box-area {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
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
</style>
    <!-- Team Start -->
    <section class="team section-padding mt-5" data-scroll-index='3'>
    <h1 style="text-align: center;">Teachers</h1>

<div class="box-area">
  <?php
    $Qry = mysqli_query($con, "SELECT * FROM teachers");
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
<?php include 'footer.php'; ?>