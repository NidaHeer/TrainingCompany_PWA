<div class="row" style="margin-top: -12px !important">
	<div class="col-sm-12" style="background: #201D1D; padding-right: 15px; height: 45px; line-height: 45px;">
		<div class="col-sm-4"> <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#AnnouncModal" aria-expanded="false" aria-controls="AnnouncModal">Create Blog</button></div>
		<div class="col-sm-4" style="color: green; font-weight: bold;"><?=@$_GET['msg']?></div>
	
	</div>
	</div>
	  
	  <div class="collapse mt-3" id="AnnouncModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Blog</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-12">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="form-group col-12">
                        <label>Content</label>
                        <textarea name="content" class="form-control" rows="3" required="required"></textarea>
                    </div>
                    <div class="form-group col-12">
                        <label>Banner</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="addBlog" class="btn btn-primary pull-right">Add Blog</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



	<div class="row" style="margin-top: 5%">
     <div class="col-md-12">
         <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            	<th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Banner</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            $result = mysqli_query($con, "SELECT * FROM blogs");

            while ($row = mysqli_fetch_array($result)) {
                 echo "<tr>
                         <td>$i</td>
                         <td>$row[title]</td>
                         <td>$row[content]</td>
                         <td><img src='../assets/images/$row[banner]' style='height:100px'></td>
                         <td>$row[date_created]</td>
                         <td>
                         	<a href='index.php?page=manage_blogs&Delete=Yes&ID=$row[ID]' class='btn btn-danger btn-xs'>Delete</a>
                         	</td>
                 </tr>";
                 $i++;
             } ?>

        </tbody>
    </table>
     </div>   
    </div>


<?php 


if (isset($_POST['addBlog'])) {

	$title = $_POST['title'];
	$content = $_POST['content'];
	$date = date("d F, Y");

    $time = time();
	$image = $_FILES['image']['name'];
	$tmp_img = $_FILES['image']['tmp_name'];

	if ($image != "") {
		$parts = explode(".", $image);
		$imgName = $time . "." . $parts[1];
		move_uploaded_file($tmp_img, "../assets/images/$imgName");
	}

	$qry = mysqli_query($con, "INSERT into blogs SET title = '$title', content = '$content', banner = '$imgName', date_created = '$date'");
	if ($qry) {
		echo "<script>
					window.location='index.php?page=manage_blogs&msg=Blog Created';
				</script>";
	} else {
		echo "Error";
	}
	

	

 	
 }

 if (isset($_GET['Delete'])) {
		$ID = $_GET['ID'];

		$result = mysqli_query($con, "DELETE FROM blogs WHERE ID = '$ID'");

		if ($result) {
			echo "<script>
					window.location='index.php?page=manage_blogs&msg=Blog Delete';
				</script>";
		}
	}



	 ?>

