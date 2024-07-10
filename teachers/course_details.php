<script>
      function changePage() {
        var val = document.getElementById("type").value;
          document.location.href='index.php?page=course_details&type='+val;
        
      }
    </script>

<div class="row">

	<div class="col-sm-offset-4 col-sm-4">
		<select id="type" class="form-control"  onchange="changePage()" required>
			<option value="" selected disabled>Select Type</option>
			<option value="material&CID=<?=$_GET['CID']?>">Helping Material</option>
			<option value="video&CID=<?=$_GET['CID']?>">Video Lectures</option>

			 </select>
	</div>

<div class="col-sm-12"><br><br>
		<div class="panel panel-primary">
			<div class="panel-heading text-center">Material/Lecture</div>
			<div class="panel-body">
				<table  class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Material/Lecture</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (isset($_GET['type'])) { 
							 
						
						@$type = $_GET['type'];
						@$CID = $_GET['CID'];
						if ($type == "material") {
							$table = "course_material";
						} else {
							$table = "course_video";
						}
						
						$i  =1;
							$query = mysqli_query($con, "SELECT * FROM $table WHERE C_ID = '$CID' ");
							while ($row = mysqli_fetch_array($query)) {
							 	echo "<tr>
							 	          <td>$i</td>
							 	          <td>$row[title]</td>";
							 	          if ($type == "material") {
							 	          	echo "<td><a href='../assets/material/$row[material]' class='btn btn-success' download>Download</a></td>";
							 	          } else {
							 	          	echo "<td>
											  		 			<video width='320' height='240' controls>
																  <source src='../assets/videos/$row[video]' type='video/mp4'>
																</video></td>";
							 	          }
							 	          
 							 	          echo"<td>
                         	<a href='index.php?page=course_details&Delete=Yes&table=$table&CID=$CID&ID=$row[ID]' class='btn btn-danger btn-xs'>Delete</a>
                         	</td>
							 	          </tr>";
							 	        $i++;
							 }
							 } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
<?php 
	
		 if (isset($_GET['Delete'])) {
		$ID = $_GET['ID'];
		$table = $_GET['table'];
		$CID = $_GET['CID'];

		$result = mysqli_query($con, "DELETE FROM $table WHERE ID = '$ID'");

		if ($result) {
			echo "<script>
					window.location='index.php?page=course_details&msg=Record Delete&CID=$CID';
				</script>";
		}
	}

	 ?>