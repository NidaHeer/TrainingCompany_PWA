
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .box {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            background-color: #fff;
        }
        .box-header {
            background-color: #343A40;
            color: white;
            padding: 10px 15px;
            border-bottom: 1px solid #007bff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .box-title {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }
        .box-tools .btn {
            color: white;
            background-color: transparent;
            border: none;
        }
        .box-body {
            padding: 20px;
        }
        .small-box {
            position: relative;
            background: #343A40;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
        }
        .small-box .inner {
            font-size: 28px;
        }
        .small-box h3 {
            font-size: 40px;
            margin: 0;
        }
        .small-box p {
            font-size: 18px;
        }
        .small-box:hover {
            background: #00a2d3;
        }
    </style>

<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-sm-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">My Courses</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="small-box bg-aqua" style="height: 180px;">
                            <div class="inner">
                                <h3><?php CoursesCount($_SESSION['USER_ID']); ?></h3>
                                <p>Total Courses</p>
                            </div>
                            <!-- <div class="icon">Rs</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>