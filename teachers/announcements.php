<div class="container">
      

    <div class="row" style="background-color: #ececec">
      
      <div class="col-sm-offset-3 col-sm-6">
        <table id="table" class="table table-hover table-bordered table-striped">
          <thead style="display: none;">
            <tr>
              <th>Title</th>
            </tr>
          </thead>
          <tbody><br><br>
            <?php 
                  $to = "T".$_SESSION['USER_ID'];
                  $qry = mysqli_query($con, "SELECT * FROM announcements WHERE _to = 'All' OR _to = '$to'");
                  while ($anc = mysqli_fetch_array($qry)) {
                     echo "<tr>";

                     if ($anc['_to'] != "All" AND $anc['seen'] == "0") { ?>
                       <td><a href="#" target="_black" onclick='OpenWindow("read_notif.php?id=<?=$anc['ID']?>")' style="font-size: 13pt; font-weight: bold;"><?=$anc['title']?> <img src="../assets/icons/icon_new.gif" alt=""></a><br>
                              <span class='pull-right'><?=$anc['_date']?></span></td>

                      <?php 
                    }
                     else{ ?>
                      <td><a href="#" target="_black" onclick='OpenWindow("read_notif.php?id=<?=$anc['ID']?>")' style="font-size: 13pt; font-weight: bold;"><?=$anc['title']?></a><br>
                              <span class='pull-right'><?=$anc['_date']?></span></td>

                    <?php }
                      echo" </tr>";
                   } ?>
            
          </tbody>
        </table>
       </div>
     </div>
   </div>
 </div>