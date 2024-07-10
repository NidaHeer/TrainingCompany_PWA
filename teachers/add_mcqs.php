<div class="modal fade" id="MCQS">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title"><b>Add MCQS</b></h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="C_ID" value="<?=$_GET['C_ID']?>">
                    <div class="form-group">
                        <label for="question">Question:</label>
                        <input type="text" name="question" id="question" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="a">Option A:</label>
                        <input type="text" name="a" id="a" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="b">Option B:</label>
                        <input type="text" name="b" id="b" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="c">Option C:</label>
                        <input type="text" name="c" id="c" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="d">Option D:</label>
                        <input type="text" name="d" id="d" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="correct">Correct Answer:</label>
                        <input type="text" name="correct" id="correct" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Add Question" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a class="btn btn-primary" data-toggle="modal" href="#MCQS">Add MCQS</a>
        </div>
        <div class="col-sm-8">
            <?php 
            if (isset($_GET['msg'])) {
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>'.$_GET['msg'].'</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
            }
            ?>
        </div>
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title"><b>MCQS</b> (<?= isset($_GET['title']) ? $_GET['title'] : '' ?>)</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>ID</th>
                                <th>Question</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>Correct Answer</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            @$CID = $_GET['C_ID'];
                            $i = 1;
                            $query = mysqli_query($con, "SELECT * FROM quiz AS Q JOIN options AS O ON Q.ID = O.Q_ID WHERE Q.C_ID = '$CID'");
                            while ($que = mysqli_fetch_array($query)) {
                                echo "<tr>
                                        <td>$i</td>
                                        <td>$que[question]</td>
                                        <td>$que[op1]</td>
                                        <td>$que[op2]</td>
                                        <td>$que[op3]</td>
                                        <td>$que[op4]</td>
                                        <td>$que[correct]</td>
                                        <td>
                                            <a href='index.php?page=add_mcqs&Delete=Yes&ID=$que[ID]&C_ID=$_GET[C_ID]&title=$_GET[title]' class='btn btn-danger btn-xs'>Delete</a>
                                        </td>
                                    </tr>";
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
if (isset($_POST['submit'])) {
    
    $C_ID = $_POST['C_ID'];
    $title = $_GET['title'];
    $question = $_POST['question'];
    $correct = $_POST['correct'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];

    $query = "INSERT INTO quiz SET C_ID = '$C_ID', question = '$question', correct = '$correct'";
    $result  = mysqli_query($con, $query);

    if ($result) {
        $last_id = mysqli_insert_id($con);
            $qry = "INSERT INTO options SET Q_ID = '$last_id', op1 = '$a', op2 = '$b', op3 = '$c', op4 = '$d'";
            mysqli_query($con, $qry);
            echo "<script> window.location.href='index.php?page=add_mcqs&C_ID=$C_ID&title=$title&msg=Question Added';</script>";
        }
 }

 if (isset($_GET['Delete'])) {
        $ID = $_GET['ID'];
        $C_ID = $_GET['C_ID'];
        $title = $_GET['title'];

        $result = mysqli_query($con, "DELETE FROM quiz WHERE ID = '$ID'");

        if ($result) {
            mysqli_query($con, "DELETE FROM options WHERE Q_ID = '$ID'");
            echo "<script> window.location.href='index.php?page=add_mcqs&C_ID=$C_ID&title=$title&msg=Question Deleted';</script>";
        }
    }

  ?>