<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
          
            <h2 class="text-center mb-4">Training Events</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Event Name</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Joining Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM trainingevents");

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                                <td>$row[EventID]</td>
                                <td>$row[EventName]</td>
                                <td>$row[EventType]</td>
                                <td>$row[EventDate]</td>
                                <td>$row[StartTime] - $row[EndTime]</td>
                                <td>$row[VenueID]</td>
                                <td><a href='$row[JoinLink]' target='_blank' class='btn btn-primary btn-sm'>Join</a></td>
                            </tr>";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
