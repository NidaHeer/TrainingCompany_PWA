<?php $SID = $_SESSION['USER_ID'];

$std = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM students WHERE ID = '$SID'")); ?>

<div class="row">
  

  <?php 
  $i = 1;
  $query2 = mysqli_query($con, "SELECT * FROM course_enroll AS CE JOIN courses AS C ON CE.C_ID = C.ID WHERE CE.S_ID = '$SID'");
  while ($cou = mysqli_fetch_array($query2)) { ?>
    <?php 
    switch ($i) {
     case '1':
     $BG = "bg-aqua";
     break;
     case '2':
     $BG = "bg-red";
     break;
     case '3':
     $BG = "bg-green";
     break;
     case '4':
     $BG = "bg-warning";
     break;
     
     default:
     $BG = "bg-primary";
     break;
   } ?>
   <div class="col-lg-4 col-xs-6">
    <div class="small-box <?=$BG?>">
      <div class="inner">
        <h3><?=$cou['title']?></h4>
          <p class="text-center"><b><?=$cou['section'];?></b></p><br>
        </div>
        <a href="index.php?page=course_website&C_ID=<?=$cou['ID']?>&title=<?=$cou['title']?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <?php $i++; } ?>


  </div>