<div class="row" style="margin-top: -12px !important">
	<div class="col-sm-12" style="background: #201D1D; padding-right: 15px; height: 45px; line-height: 45px;">
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AnnouncModal">Add Training Events</button>
		<div  style="color: green; font-weight: bold;"><?=@$_GET['msg']?></div>
		<div class="col-sm-4"><span class="title pull-right">Training Events</span></div>
	</div>
	  
	  <div class="modal fade" id="AnnouncModal">
	  	<div class="modal-dialog">
	  		<div class="modal-content">
	  			<div class="modal-header">
	  				<h4 class="modal-title">Add Event</h4>
	  			</div>
	  			<div class="modal-body">
	  				<form action="" method="POST">
	  				
                      <div class="form-group">
	  						<label for="">Event Name</label>
	  						<input type="text" class="form-control" name="name" placeholder="Name">
	  					</div>
                          <div class="form-group">
	  						<label for=""> Event Type</label>
	  						<label><input type="radio" name="type" value="Online">Online </label>
                              <label><input type="radio" name="type" value="In-person">In-person </label>
	  					</div>
                          <div class="form-group">
	  						<label for="">Start Date</label>
	  						<input type="date" class="form-control" name="start_date" placeholder="Start Date">
	  					</div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
	  						<label for="">Start Time</label>
	  						<input type="time" class="form-control" name="start_time" placeholder="Start Time">
	  					</div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
	  						<label for="">End Time</label>
	  						<input type="time" class="form-control" name="end_time" placeholder="End Time">
	  					</div>
                            </div>
                        </div>
                          <div class="form-group">
	  						<label for="">Venue</label>
                            <select name="venue" class="form-control">
                                <?php
                                    $Qry = mysqli_query($con, "SELECT * FROM trainingvenues");
                                    while ($row = mysqli_fetch_array($Qry)) {
                                        echo "<option value='$row[VenueName]'>$row[VenueName]</option>";
                                    } ?>
                            </select>
	  					</div>
                          <div class="form-group">
	  						<label for="">Joining Link</label>
	  						<input type="text" class="form-control" name="link" placeholder="Joining Link">
	  					</div>
	  					<button type="submit" name="addEvent" class="btn btn-primary pull-right">Add Event</button><br><br>
	  				</form>
	  			</div>
	  		</div>
	  	</div>
	  </div>
</div>


	<div class="row" style="margin-top: 5%">
     <div class="col-sm-12">
         <table class="table table-striped table-bordered" style="width:100%">
        <thead class="bg-dark text-white">
            <tr>
            	<th>ID</th>
                <th>Event Name</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Venue</th>
                <th>Joining Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            $result = mysqli_query($con, "SELECT * FROM trainingevents");

            while ($row = mysqli_fetch_array($result)) {
                 echo "<tr>
                         <td>$i</td>
                         <td>$row[EventName]</td>
                         <td>$row[EventType]</td>
                         <td>$row[EventDate]</td>
                         <td>$row[StartTime]</td>
                         <td>$row[EndTime]</td>
                         <td>$row[VenueID]</td>
                         <td>$row[JoinLink]</td>
                         <td>
                         	<a href='index.php?page=training_events&Delete=Yes&ID=$row[EventID]' class='btn btn-danger btn-xs'> Delete</a>
                         	</td>
                 </tr>";
                 $i++;
             } ?>

        </tbody>
    </table>
     </div>   
    </div>


<?php 


if (isset($_POST['addEvent'])) {

	$name = $_POST['name'];
	$type = $_POST['type'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $venue = $_POST['venue'];
    $link = $_POST['link'];
	

	$qry = mysqli_query($con, "INSERT INTO `trainingevents`(`EventName`, `EventType`, `EventDate`, `StartTime`, `EndTime`, `VenueID`, `JoinLink`) VALUES ('$name','$type','$start_date','$start_time','$end_time','$venue','$link')");
	if ($qry) {
		echo "<script>
					window.location='index.php?page=training_events&msg=Event Added';
				</script>";
	} else {
		echo "Error";
	}
	

	

 	
 }

 if (isset($_GET['Delete'])) {
		$ID = $_GET['ID'];

		$result = mysqli_query($con, "DELETE FROM trainingevents WHERE EventID = '$ID'");

		if ($result) {
			echo "<script>
					window.location='index.php?page=training_events&msg=Record Delete';
				</script>";
		}
	}



	 ?>