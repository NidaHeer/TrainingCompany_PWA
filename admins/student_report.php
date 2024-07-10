<?php $SID = $_GET['ID'];

$std = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM students WHERE ID = '$SID'")); ?>

<div class="row">
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title pull-left" style="margin-top: 5px"><b>Enrolled Courses 
				(<?=$std['name']?>)</b></h3>
			<span class="pull-right">
					<a href="index.php?page=manage_students" class="btn btn-primary txtBlack btn-sm"><i class="fa fa-arrow-left"></i> Back</a><br>
				</span>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Course Title</th>
						<th>Section</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$query = mysqli_query($con, "SELECT * FROM course_enroll AS CE JOIN courses AS C ON CE.C_ID = C.ID WHERE CE.S_ID = '$SID'");
						while ($row = mysqli_fetch_array($query)) {
						 	echo "<tr>
									<td>$i</td>
									<td>$row[title]</td>
									<td>$row[section]</td>
								</tr>";
							$i++;
						 } ?>
					
				</tbody>
			</table>
		</div>
		</div>
	</div>
	<br><br><br>

	<div class="col-sm-12">
		<?php 
		$chartCount = 1;
		$query2 = mysqli_query($con, "SELECT * FROM course_enroll AS CE JOIN courses AS C ON CE.C_ID = C.ID WHERE CE.S_ID = '$SID'");
		while ($cou = mysqli_fetch_array($query2)) {
		
		$res = mysqli_query($con, "SELECT obtain_marks, Q_ID, marks, C.title FROM quiz_attempts AS QA JOIN schedule_quiz AS SQ ON QA.Q_ID = SQ.ID JOIN courses AS C ON SQ.C_ID = C.ID WHERE S_ID = '$std[ID]' AND SQ.C_ID = '$cou[ID]'");
		$Course = "";
		?>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

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
        var chart = new google.visualization.LineChart(document.getElementById(<?=$chartCount?>));
        chart.draw(data, options);
      }
    </script>


    <div class="col-sm-6">
    	<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?=$cou['title']?> <small><?=$cou['section']?></small> Quizzes Performance</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" title="Minimize">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body chart-responsive">      
        <div id="<?=$chartCount?>" style="height: 315px; width: 100%"></div>
      </div>
    </div>
    </div>
<?php  $chartCount ++; } ?>
</div>




<div class="col-sm-12">
		<?php 
		$chartCount = 1;
		$query3 = mysqli_query($con, "SELECT * FROM course_enroll AS CE JOIN courses AS C ON CE.C_ID = C.ID WHERE CE.S_ID = '$SID'");
		while ($cou = mysqli_fetch_array($query3)) {
		
		$res2 = mysqli_query($con, "SELECT marks, A_ID, total_marks, C.title FROM course_assignment AS CA JOIN upload_assignment AS UA ON UA.A_ID = CA.ID JOIN courses AS C ON CA.C_ID = C.ID WHERE UA.S_ID = '$std[ID]' AND CA.C_ID = '$cou[ID]' ");
		$Course = "";
		?>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Assignment No', 'Marks %'],
          
          <?php 
          $A_C = 1;
          while($row2=mysqli_fetch_assoc($res2))
          {
            $Course = $row2['title'];
            $total_marks = $row2['total_marks'];
            $per =  $row2['marks'] / $total_marks * 100;
            echo "['Assignment No ".$A_C."',".$per."],";
            $A_C ++;
          }
          ?>
          ]);

        var options = {
          curveType: 'function',
          legend: { position: 'right' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('a'+<?=$chartCount?>));
        chart.draw(data, options);
      }
    </script>


    <div class="col-sm-6">
    	<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?=$cou['title']?> <small><?=$cou['section']?></small> Assignment Performance</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" title="Minimize">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body chart-responsive">      
        <div id="a<?=$chartCount?>" style="height: 315px; width: 100%"></div>
      </div>
    </div>
    </div>
<?php  $chartCount ++; } ?>
</div>




</div>