<?php 
	include '../config/db.php';

  function CoursesCount()
  {
    global $con;
    $qry = mysqli_query($con, "SELECT * FROM courses");
    $count = mysqli_num_rows($qry);
    echo $count;
  }

  function StudentsCount()
  {
    global $con;
    $qry = mysqli_query($con, "SELECT * FROM students");
    $count = mysqli_num_rows($qry);
    echo $count;
  }

    function TeachersCount()
  {
    global $con;
    $qry = mysqli_query($con, "SELECT * FROM teachers");
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
} ?>
