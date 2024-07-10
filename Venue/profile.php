<?php 
    $ID = $_SESSION['USER_ID'];
 
  $StdQry1 = mysqli_query($con, "SELECT * FROM venue WHERE ID = '$ID'");
  $stds = mysqli_fetch_array($StdQry1);
?>

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
                       
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Name</th>
                                <td><?=$stds['name']?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?=$stds['email']?></td>
                            </tr>
                            
                            <tr>
                                <th>Cell No</th>
                                <td><?=$stds['cellno']?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?=$stds['address']?></td>
                            </tr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>