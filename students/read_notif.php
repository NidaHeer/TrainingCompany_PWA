<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LMS | Notification</title>
    <link rel="icon" href="assets/images/logo.jpeg"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

  </head>
  <body>
    
    <div class="container">
      

    <div class="row" style="background-color: #ececec">
      
      <div class="col-sm-offset-3 col-sm-6" style="margin-top: 5%">
       <?php
        include '../config/db.php';
        $id = $_GET['id'];
        mysqli_query($con, "UPDATE announcements SET seen = '1' WHERE ID = '$id'");
        $result = mysqli_query($con, "SELECT * FROM announcements WHERE ID = '$id'");
        $row = mysqli_fetch_array($result);
        ?>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title text-center"><b><?=$row['title']?></b></h3>
          </div>
          <br><div class="pull-right" style="padding: 20px 20px"><b>Published On:</b> <?=$row['_date']?></div><br><br>
          <div class="panel-body well text-justify">
            <?=$row['message']?>
          </div>
        </div>
        <center><button onclick="window.close()">Close</button>
        </center>
       </div>
     </div>
   </div>
 </div>

    

  </body>
</html>
