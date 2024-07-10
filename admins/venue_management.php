<div class="row" style="margin-top: -12px !important">
	<div class="col-sm-12" style="background: #201D1D; padding-right: 15px; height: 45px; line-height: 45px;">
		<div class="col-sm-4"> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AnnouncModal">Add Venue</button></div>
		<div class="col-sm-4" style="color: green; font-weight: bold;"><?=@$_GET['msg']?></div>
		
	</div>
	  
	  <div class="modal fade" id="AnnouncModal">
	  	<div class="modal-dialog">
	  		<div class="modal-content">
	  			<div class="modal-header">
	  				<h4 class="modal-title">Add Venue</h4>
	  			</div>
	  			<div class="modal-body">
	  				<form action="" method="POST">
	  				
                      <div class="form-group">
	  						<label for="">Venue Name</label>
	  						<input type="text" class="form-control" name="name" placeholder="Name">
	  					</div>
                          <div class="form-group">
	  						<label for=""> Address</label>
	  						<input type="text" class="form-control" name="address" placeholder="Address">
	  					</div>
                          <div class="form-group">
	  						<label for="">Venue Capacity</label>
	  						<input type="text" class="form-control" name="capacity" placeholder="Capacity">
	  					</div>
                          <div class="form-group">
	  						<label for="">Facilities</label>
	  						<input type="text" class="form-control" name="facilities" placeholder="Facilities">
	  					</div>
	  					<button type="submit" name="addVenue" class="btn btn-primary pull-right">Add Venue</button><br><br>
	  				</form>
	  			</div>
	  		</div>
	  	</div>
	  </div>
</div>


	<div class="row" style="margin-top: 5%">
     <div class="col-sm-12">
         <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            	<th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Capacity</th>
                <th>Facilities</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            $result = mysqli_query($con, "SELECT * FROM TrainingVenues");

            while ($row = mysqli_fetch_array($result)) {
                 echo "<tr>
                         <td>$i</td>
                         <td>$row[VenueName]</td>
                         <td>$row[Address]</td>
                         <td>$row[Capacity]</td>
                         <td>$row[Facilities]</td>
                         <td>
                         	<a href='index.php?page=venue_management&Delete=Yes&ID=$row[VenueID]' class='btn btn-danger btn-xs'>Delete</a>
                         	</td>
							
                 </tr>";
                 $i++;
             } ?>

        </tbody>
    </table>
     </div>   
    </div>


<?php 


if (isset($_POST['addVenue'])) {

	$name = $_POST['name'];
	$address = $_POST['address'];
    $capacity = $_POST['capacity'];
    $facilities = $_POST['facilities'];
	

	$qry = mysqli_query($con, "INSERT into TrainingVenues SET VenueName = '$name', Address = '$address', Capacity = '$capacity', Facilities = '$facilities'");
	if ($qry) {
		echo "<script>
					window.location='index.php?page=venue_management&msg=Venue Added';
				</script>";
	} else {
		echo "Error";
	}
	

	

 	
 }

 if (isset($_GET['Delete'])) {
		$ID = $_GET['ID'];

		$result = mysqli_query($con, "DELETE FROM TrainingVenues WHERE VenueID = '$ID'");

		if ($result) {
			echo "<script>
					window.location='index.php?page=venue_management&msg=Record Delete';
				</script>";
		}
	}



	 ?>