<div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#announcementForm" aria-expanded="false" aria-controls="announcementForm">
                    Make an Announcement
                </button>
                <?php if (isset($_GET['msg'])): ?>
                    <div class="alert alert-success mt-2"><?= @$_GET['msg'] ?></div>
                <?php endif; ?>
                <div class="collapse mt-3" id="announcementForm">
                    <div class="card">
                        <div class="card-header" style="background: #201D1D; color: white;">
                            <h4 class="card-title">Make an Announcement</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" class="form-control" rows="3" required></textarea>
                                </div>
                                <button type="submit" name="addAnnouncement" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $result = mysqli_query($con, "SELECT * FROM announcements");

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                                    <td>$i</td>
                                    <td>$row[title]</td>
                                    <td>$row[message]</td>
                                    <td>$row[_date]</td>
                                    <td>
                                        <a href='index.php?page=make_announcement&Delete=Yes&ID=$row[ID]' class='btn btn-danger btn-xs'>Delete</a>
                                    </td>
                                </tr>";
                            $i++;
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php 
    if (isset($_POST['addAnnouncement'])) {
        $title = $_POST['title'];
        $message = $_POST['message'];
        $date = date("d F, Y");

        $qry = mysqli_query($con, "INSERT into announcements (title, message, _to, _date) VALUES ('$title', '$message', 'All', '$date')");
        if ($qry) {
            echo "<script>
                window.location='index.php?page=make_announcement&msg=Announcement Added';
            </script>";
        } else {
            echo "Error";
        }
    }

    if (isset($_GET['Delete'])) {
        $ID = $_GET['ID'];

        $result = mysqli_query($con, "DELETE FROM announcements WHERE ID = '$ID'");

        if ($result) {
            echo "<script>
                window.location='index.php?page=make_announcement&msg=Record Deleted';
            </script>";
        } else {
            echo "Error";
        }
    }
    ?>