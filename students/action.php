<?php 
	include '../config/db.php';

  $ID = $_SESSION['USER_ID'];
  $StdQry = mysqli_query($con, "SELECT * FROM students WHERE ID = '$ID'");
  $std = mysqli_fetch_array($StdQry);


function BadgeCount($id)
  {
    global $con;
    $qry = mysqli_query($con, "SELECT * FROM announcements WHERE _to  = '$id' AND seen = '0'");
    $count = mysqli_num_rows($qry);
    echo $count;
  }

function Load_Page($page){
		global $con;
           switch($page)
                 {
                  case $page:
                      include $page.'.php';
                    break;    

                    default :
                    include ('default.php');
                }
} 


?>