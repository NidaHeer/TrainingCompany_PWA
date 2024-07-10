<?php include 'header.php'; 
$C_ID = $_GET['ID'];

// Fetch course details
$courseQuery = mysqli_query($con, "SELECT * FROM courses WHERE ID = '$C_ID'");
$courseDetails = mysqli_fetch_array($courseQuery);


?>
<style>
	.course-details {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 300px;
    width: 100%;
}

.course-details ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.course-details ul li {
    display: flex;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #e0e0e0;
}

.course-details ul li:last-child {
    border-bottom: none;
}

.course-details ul li i {
    margin-right: 10px;
    color: #333;
}

.course-details ul li strong {
    margin-right: 5px;
    color: #333;
}
        .card-img-top {
            width: 100%;
            height: 350px; /* Set the desired height */
           
        }
</style>
<div class="container">
	<div class="row">
		<div class="col-md-4 mt-5">
		 <div class="course-details">
        <ul>
            <li><i class="fas fa-clock"></i> <strong>Batch Duration:</strong> <?= $courseDetails['week'] ?> Weeks</li>
            <li><i class="fas fa-users"></i> <strong>Section:</strong><?= $courseDetails['section'] ?></li>
            <li><i class="fas fa-calendar-alt"></i> <strong>Start Date:</strong> <?= $courseDetails['date'] ?></li>
            <li><i class="fas fa-money-bill-wave"></i> <strong>Fee:</strong><?= $courseDetails['fee'] ?></li>
            <li><i class="fas fa-users"></i> <strong>Who can Join:</strong> Everyone</li>
           
            <li><i class="fas fa-language"></i> <strong>Video Medium:</strong> Urdu & English</li>
        </ul>
    </div></div>
		<div class="col-md-6 mt-5">
    <h1 class="text-center"><?= $courseDetails['title'] ?></h1>
    <div class="position-relative">
    <img class="card-img-top" src="assets/images/<?=$courseDetails['image']?>" alt="">
    </div>

</div></div>