<?php
global $std;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_image'])) {
    $target_dir = "../assets/profile_images/";
    $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["profile_image"]["name"])). " has been uploaded.";
            // Update profile image path in the $std array or database
            $std['image'] = htmlspecialchars(basename($_FILES["profile_image"]["name"]));
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        .panel {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 50px;
        }
        .panel-heading {
            background-color: #343A40;
            color: white;
            border-bottom: none;
            padding: 15px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .panel-title {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        .panel-body {
            padding: 30px;
        }
        .img-circle {
            border: 5px solid #343A40;
            border-radius: 50%;
        }
        .table {
            margin-top: 20px;
        }
        .table th {
            background-color: #343A40;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center;
        }
        .table th,
        .table td {
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><b>Profile</b></h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">
                            <img src="../assets/profile_images/<?=$std['image']?>" style="height: 100px;" class="img-circle" alt="User Image">
                        </p>
                        <form action="" method="post" enctype="multipart/form-data" class="text-center">
                            <input type="file" name="profile_image" accept="image/*" required>
                            <button type="submit" class="btn btn-primary">Upload Image</button>
                        </form>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Name</th>
                                <td><?=$std['name']?></td>
                            </tr>
                            <tr>
                                <th>Father Name</th>
                                <td><?=$std['fName']?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?=$std['address']?></td>
                            </tr>
                            <tr>
                                <th>Cell No</th>
                                <td><?=$std['cellNo']?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
