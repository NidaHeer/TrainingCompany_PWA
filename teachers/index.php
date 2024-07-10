<?php  
      include 'action.php';
      if (!isset($_SESSION['IS_LOGIN'])) {
         header("location: ../index.php?error=Please login to access dashboard!");
       }
      else{
        $TID = "T".$_SESSION['USER_ID'];
      } ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Teachers dashboard</title>
    <link rel="icon" href="assets/images/logo.jpeg" />
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!-- jQuery 2.1.4 -->
   <script src="../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
   <!-- Bootstrap 3.3.5 -->
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- DataTables -->
   <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
   <!-- Bootstrap WYSIHTML5 -->
   <script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
   <!-- AdminLTE App -->
   <script src="../assets/dist/js/app.min.js"></script>
   <!-- Custom Scripts -->
   <script src="../assets/dist/js/Custom_Scripts.js"></script>
   <!-- Custom CSS -->

    <style>
      body {
         font-size: .875rem;
      }

      .sidebar {
         position: fixed;
         top: 0;
         bottom: 0;
         left: 0;
         z-index: 100;
         padding: 48px 0 0;
         /* Height of navbar */
      }

      .sidebar .nav-link {
         font-weight: 500;
         color: #333;
      }

      .sidebar .nav-link:hover {
         color: #007bff;
      }

      .sidebar .nav-link.active {
         color: #007bff;
      }

      .main {
         margin-left: 250px;
         /* Same as the width of the sidebar */
         
      }

      a {
         color: white !important;
      }

      .dashboard-heading {
         font-family: 'Arial', sans-serif;
         color: #fff;
         background-color: #007bff;
         padding: 10px 20px;
         border-radius: 5px;
         text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         display: inline-block;
         margin: 10px 0;
      }
          .badge{
    background-color: #337ab7 !important;
}
   </style>
    <script>
          function OpenWindow(url)
          {
            var win = window.open(url, 'Notice', 'width=550,height=500,toolbar=no,resizable=1,top=100,left=250,scrollbars=1');
            win.focus();
          }
        </script>
    

  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
   </nav>
       <div class="container-fluid">
      <div class="row">
         <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="position-sticky">
               <h2 class="dashboard-heading">Teacher Dashboard</h2>
               <ul class="nav flex-column">
                  <li class="nav-item">
   <a class="nav-link active" aria-current="page" href="index.php?page=teacher_courses">
                     My Courses
                  </a>
                  </li>
                 <li class="nav-item">
                 <a class="nav-link" href="index.php?page=schedule_class">
                  Schedule Live Class
                 </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php?page=quiz_bank">
                  Quiz Bank
                </a>
                </li>
        
 <li class="nav-item">
                <a class="nav-link" href="index.php?page=training_events">
                 Training Events
                </a>
                </li>

                  <li class="nav-item">
                     <a class="nav-link" href="index.php?page=announcements"><span
                           class="badge"><?= BadgeCount($TID) ?></span>
                        Announcements
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?page=change_password">
                        Change Password
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?page=profile">
                        Profile
                     </a>
                  </li>
               <li class="nav-item">
               <a class="nav-link" href="../includes/logout.php">
               Logout
               </a>
               </li>
               </ul>
            </div>
         </nav>


         <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div
               class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
               <h1 class="h2">Dashboard</h1>
            </div>
          <?php
                if (isset($_GET['page'])) {
                  $page = $_GET['page'];
                } else {
                  $page = "default";
                }
                
                Load_Page($page);
            ?>
          
         </main>
      </div>
   </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include'footer.php'?>
  </body>
</html>