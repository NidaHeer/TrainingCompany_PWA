<script type="text/javascript" src="../assets/dist/js/tabs.js"></script>
<?php $C_ID = $_GET['C_ID']; ?>
<script>
    function toggleLecture() {
        var lectureDiv = document.getElementById('lecture');
        if (lectureDiv.style.display === 'none') {
            lectureDiv.style.display = 'block';
        } else {
            lectureDiv.style.display = 'none';
        }
    }
        function toggleLiveClass() {
        var liveClassDiv = document.getElementById('liveClass');
        if (liveClassDiv.style.display === 'none') {
            liveClassDiv.style.display = 'block';
        } else {
            liveClassDiv.style.display = 'none';
        }
    }
</script>

<div class="container-fluid">
    <div class="row" style="background: #201D1D; color: #fff; padding: 10px;">
        <div class="col-md-6">
            <h1 style="margin-top: 0;"><?= $_GET['title']; ?></h1>
        </div>
        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-primary" onclick="Download()">My Files</button>
            <a href="index.php?page=quizzes&C_ID=<?= $C_ID ?>&title=<?= $_GET['title'] ?>" class="btn btn-info">Quiz</a>
<button type="button" class="btn btn-warning" onclick="toggleLecture()">Video Lectures</button>
            <button type="button" class="btn btn-danger" onclick="toggleLiveClass()">Live Class</button>
        </div>
    </div>
    
    <div class="row">
        <div id="download" class="col-md-4" style="display:none;">
            <h2 class="text-center">Course Material</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = mysqli_query($con, "SELECT * FROM course_material WHERE C_ID = '$C_ID'");
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                            echo "<tr>
                                    <td>$row[ID]</td>
                                    <td>$row[title]</td>
                                    <td><a href='../assets/material/$row[material]' class='btn btn-success' download>Download</a></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='3' class='text-center'>No Record Found</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="lecture" class="col-md-8" style="display:none;">
            <h2 class="text-center">Video Lectures</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Lecture Video</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = mysqli_query($con, "SELECT * FROM course_video WHERE C_ID = '$C_ID'");
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                            echo "<tr>
                                    <td>$row[ID]</td>
                                    <td>$row[title]</td>
                                    <td>
                                        <video width='320' height='240' controls>
                                            <source src='../assets/videos/$row[video]' type='video/mp4'>
                                        </video>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='3' class='text-center'>No Record Found</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="liveClass" class="col-sm-offset-3 col-sm-6" style="display:none">
        <h2 class="text-center">Live Class</h2>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Scheduled On</th>
                        <th>Timing</th>
                        <th>Join Class</th>
            </tr>

            <?php 
            $i = 1;
                    $qry = mysqli_query($con, "SELECT * from courses AS C JOIN live_classes AS LC ON C.ID = LC.C_ID WHERE LC.C_ID = '$C_ID'");
                    $count = mysqli_num_rows($qry);

                        while ($row = mysqli_fetch_array($qry)) {
                           

                        echo "<tr>
                                <td>$i</td>
                                <td>$row[title]</td>
                                <td>$row[section]</td>
                                <td>$row[_date]</td>
                                <td>$row[_time]</td>";
                                $date1=date_create($row['_date']);
                                $date2=date_create(date('Y-m-d'));
                                $diff=date_diff($date1,$date2);
                                $chk = $diff->format("%a");
                                if ($chk > 0) {
                                    echo "<td>--</td>";
                                } else {
                                    echo "<td><a href='join_class.php' target='_blank' class='btn btn-info btn-sm text-black'>Join</a></td>";
                                }
                                
                                
                            echo"</tr>";
                        $i++;
                        }
             ?>
        </table>
    </div>
    </div>
</div>
