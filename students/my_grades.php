<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php $SID = $_SESSION['USER_ID'];

$std = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM students WHERE ID = '$SID'")); ?>

<div class="row">
  <div class="col-12">
    <?php 
    $chartCount = 1;
    $query2 = mysqli_query($con, "SELECT * FROM course_enroll AS CE JOIN courses AS C ON CE.C_ID = C.ID WHERE CE.S_ID = '$SID'");
    while ($cou = mysqli_fetch_array($query2)) {
    
    $res = mysqli_query($con, "SELECT obtain_marks, Q_ID, marks, C.title FROM quiz_attempts AS QA JOIN schedule_quiz AS SQ ON QA.Q_ID = SQ.ID JOIN courses AS C ON SQ.C_ID = C.ID WHERE S_ID = '$std[ID]' AND SQ.C_ID = '$cou[ID]'");
    $Course = "";
    ?>

    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?=$cou['title']?> <small><?=$cou['section']?></small> Quizzes Performance</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#chart<?=$chartCount?>" aria-expanded="true" aria-controls="chart<?=$chartCount?>">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div id="chart<?=$chartCount?>" class="card-body collapse show">
          <div id="chart_div<?=$chartCount?>" style="height: 315px; width: 100%"></div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart<?=$chartCount?>);

        function drawChart<?=$chartCount?>() {
          var data = google.visualization.arrayToDataTable([
            ['Quiz No', 'Marks %'],
            <?php 
            $Q_C = 1;
            while($row=mysqli_fetch_assoc($res))
            {
              $Course = $row['title'];
              $total_marks = $row['marks'];
              $per =  $row['obtain_marks'] / $total_marks * 100;
              echo "['Quiz No ".$Q_C."',".$per."],";
              $Q_C ++;
            }
            ?>
          ]);

          var options = {
            curveType: 'function',
            legend: { position: 'right' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('chart_div<?=$chartCount?>'));
          chart.draw(data, options);
        }
      });
    </script>
    <?php $chartCount++; } ?>
  </div>
</div>
