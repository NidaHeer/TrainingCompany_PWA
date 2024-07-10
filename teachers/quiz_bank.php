<script>
      function changePage() {
        var val = document.getElementById("C_ID").value;
          document.location.href='index.php?page=quiz_bank&C_ID='+val;
        
      }
    </script>

<div class="row">

	<div class="col-sm-offset-4 col-sm-4">
		<select id="C_ID" class="form-control"  onchange="changePage()" required>
			<option value="" selected disabled>Select Course</option>
		
		<?php 
			$T_ID = $_SESSION['USER_ID'];
			$qry = mysqli_query($con, "SELECT * from course_teacher AS CT JOIN courses AS c ON CT.C_ID = C.ID WHERE CT.T_ID = '$T_ID'");
			while ($row = mysqli_fetch_array($qry)) {
			 	echo "<option value='$row[ID]'>$row[title]</option>";
			 } ?>
			 </select>
	</div>

	
	<div class="col-sm-12"><br><br>
		<div class="panel panel-primary">
			<div class="panel-heading text-center">MCQS</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered table-hover">
					<thead class="bg-dark text-white">
						<tr>
							<th>ID</th>
							<th>Question</th>
							<th>Option 1</th>
							<th>Option 2</th>
							<th>Option 3</th>
							<th>Option 4</th>
							<th>Correct Answer</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						@$CID = $_GET['C_ID'];
						$i  =1;
							$query = mysqli_query($con, "SELECT * FROM quiz AS Q JOIN options AS O ON Q.ID = O.Q_ID WHERE Q.C_ID = '$CID' ");
							while ($que = mysqli_fetch_array($query)) {
							 	echo "<tr>
							 	          <td>$i</td>
							 	          <td>$que[question]</td>
							 	          <td>$que[op1]</td>
							 	          <td>$que[op2]</td>
							 	          <td>$que[op3]</td>
							 	          <td>$que[op4]</td>
							 	          <td>$que[correct]</td>
							 	          </tr>";
							 	        $i++;
							 } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>