<?php include 'header.php';

$ID = $_GET['ID'];
$Qry = mysqli_query($con, "SELECT * FROM blogs WHERE ID = '$ID'");
$Blog = mysqli_fetch_array($Qry);
?>

<div class="card mb-3 mt-5" style="max-width: 900px; margin-left: 200px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="assets/images/<?=$Blog['banner']?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?=$Blog['title']?></h5>
        <p class="card-text"><?=$Blog['content']?></p>
        <p class="card-text"><small class="text-muted"> <?=$Blog['date_created']?></small></p>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>