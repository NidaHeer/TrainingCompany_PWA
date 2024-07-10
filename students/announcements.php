<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Ensure you have the correct path to Bootstrap CSS -->
    <style>
        /* Custom CSS styles for announcements table */
        .announcement-title {
            font-size: 16px;
            color: #333;
            text-decoration: none; /* Removes the underline from the link */
        }

        .announcement-title.new {
            font-weight: bold;
            color: #007bff; /* Blue color for new announcements */
        }

        .announcement-title:hover {
            color: #0056b3; /* Darker blue color when hovered */
        }

        .announcement-date {
            font-size: 14px;
            color: #666;
        }

        .announcement-icon {
            margin-right: 5px;
            vertical-align: middle;
        }
        .hover-effect {
            width: 100px;
            height: 100px;
            background-color: green;
          
            text-decoration: none;
            transition: background-color 0.6s, transform 0.6s;
        }

        .hover-effect:hover {
            background-color: darkblue;
            transform: scale(1.2);
            font-size: 20px;
            border-radius: 10px;
        }       
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-offset-3 col-md-6">
                <table class="table table-hover table-bordered table-striped">
                    <thead style="background-color: #343A40; color: white;">
                        <tr>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $to = "S".$_SESSION['USER_ID'];
                        $S_ID = $_SESSION['USER_ID'];

                        $CID = "";
                        $query = mysqli_query($con, "SELECT * FROM course_enroll WHERE S_ID = '$S_ID'");
                        while ($ce = mysqli_fetch_array($query)) {
                            $C_ID = "C".$ce['C_ID'];
                            $CID .= " OR _to = '" . $C_ID . "'";
                        } 

                        $qry = mysqli_query($con, "SELECT * FROM announcements WHERE _to = 'All' OR _to = '$to' $CID  ORDER BY _date ASC");
                        while ($anc = mysqli_fetch_array($qry)) {
                            $isNew = ($anc['_to'] != "All" && $anc['seen'] == "0");
                            ?>
                            <tr>
                                <td>
                                    <a href="#" onclick='openPopup("read_notif.php?id=<?=$anc['ID']?>")' class="announcement-title <?= $isNew ? 'new' : '' ?>">
                         <span class="hover-effect"><?= $anc['title'] ?></span>
                                        <?php if ($isNew): ?>
                                            <img src="../assets/icons/icon_new.gif" alt="New" class="announcement-icon">
                                        <?php endif; ?>
                                    </a><br>
                                    <span style="color:red" class="announcement-date pull-right"><?= $anc['_date'] ?></span>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        var popupWindow;

        function openPopup(url) {
            if (popupWindow && !popupWindow.closed) {
                popupWindow.focus();
            } else {
                popupWindow = window.open(url, '_blank');
            }
        }
    </script>
</body>
</html>
