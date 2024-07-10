<?php 
	include '../config/db.php';

  function BadgeCount($tid)
  {
    global $con;
    $qry = mysqli_query($con, "SELECT * FROM announcements WHERE _to  = '$tid' AND seen = '0'");
    $count = mysqli_num_rows($qry);
    echo $count;
  }

  function CoursesCount($tid)
  {
    global $con;
    $qry = mysqli_query($con, "SELECT * FROM course_teacher WHERE T_ID  = '$tid'");
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
                  case 'complete_profile':
                      include('complete_profile.php');
                      break;

                    default :
                    include ('default.php');
                }
} ?>