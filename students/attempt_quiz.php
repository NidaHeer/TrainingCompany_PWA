<div class="row">
	
	<div class="col-sm-offset-2 col-sm-8">
		<p style="color: red; font-weight: bold;">Instructions</p>
		<ul>
			<li>Don't press Backspace button.</li>
			<li>Don't refresh page.</li>
		</ul>
	</div>
</div>

<div class="col-sm-offset-4 col-sm-4">
	<?php 
		if(!$sock = @fsockopen('www.google.com', 80))
			{
			    echo '<div class="alert alert-info text-black">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Connection Lost!</strong>
					</div>';
			} ?>
</div>

<div class="row" style="margin-top: 20px">
	<div class="col-sm-offset-4 col-sm-4">
		<div class="panel panel-primary">
			<div class="panel-heading text-center">Quiz</div>
			<div class="panel-body">
				<table class="table">
					<form action="" method="POST">
				<?php 


					$C_ID = $_GET['C_ID'];
					$Quiz_ID = $_GET['Quiz_ID'];
					$Quiz_Marks = $_GET['Total_Marks'];
					$C_Title = $_GET['C_Title'];
					$S_ID = $_SESSION['USER_ID'];
					$attempted_on = date("F d, Y");
					
					if (isset($_GET['Q_ID'])) {
						$Q_NO = $_GET['Q_ID'];
					} 
					else {
						$Q_NO = 1;
					}
					if ($Q_NO > $Quiz_Marks) {
						$obtainMarks = $_GET['marks'];
						
						$qry = mysqli_query($con, "INSERT INTO quiz_attempts SET S_ID = '$S_ID', Q_ID = '$Quiz_ID', attempted_on = '$attempted_on', obtain_marks = '$obtainMarks'");

						echo "<script>
										  window.location='index.php?page=quizzes&C_ID=$C_ID&title=$C_Title';
							</script>";

						// echo "<center><span style='color: green'>
						// 		  <h3><b>Completed! Thank You</b></h3>
						// 	      <h4>Evaluation Result will be declared later</h4>
						// 	  </span></center>";
					} else {
						# code...
					
					
					
					$query = "SELECT q.ID, q.C_ID, q.question, q.correct, o.Q_ID, o.op1, o.op2, o.op3, o.op4 FROM quiz AS q JOIN options AS o ON q.ID = o.Q_ID WHERE  q.C_ID = '$C_ID' ORDER BY RAND()";
					$result = mysqli_query($con, $query);
					$row = mysqli_fetch_array($result);
					echo "<tr>
								<td>Q.$Q_NO <b> $row[question] </b></td>
						  </tr>
						  <tr>
								<td><input type='radio' name='answer' value='$row[op1]'>&nbsp;&nbsp;$row[op1]</td>
					      </tr>
					      <tr>
								<td><input type='radio' name='answer' value='$row[op2]'>&nbsp;&nbsp;$row[op2]</td>
					      </tr>
					      <tr>
								<td><input type='radio' name='answer' value='$row[op3]'>&nbsp;&nbsp;$row[op3]</td>
					      </tr>
					      <tr>
								<td><input type='radio' name='answer' value='$row[op4]'>&nbsp;&nbsp;$row[op4]</td>
					      </tr>
					      <tr>
								<td><input type='hidden' name='correct' value='$row[correct]'></td>
								<td><input type='hidden' name='Q_ID' value='$Q_NO'></td>
					      </tr>
					      <tr>
								<td><input type='submit' name='next' value='Save and Next' class='btn btn-success btn-sm pull-right'></td>
					      </tr>";
					  }
					
					 ?>
					</form>
				</table>
			</div>
		</div>
	</div>
</div>

<?php 

	if (isset($_POST['next'])) {

		$answer = $_POST['answer'];
		$correct = $_POST['correct'];
		$Q_ID = $_POST['Q_ID'];

		$marks = $_GET['marks'];

		$next = $Q_ID + 1;

		if ($answer == $correct) {
			$marks += 1;
		}
		else{
			$marks += 0;
		}


		echo "<script>
					  window.location='index.php?page=attempt_quiz&C_ID=$C_ID&Quiz_ID=$Quiz_ID&Total_Marks=$Quiz_Marks&Q_ID=$next&marks=$marks&C_Title=$C_Title';
		</script>";

		//header("location: index.php?option=attemptTest&Q_ID=$next&marks=$marks");

	}

 ?>