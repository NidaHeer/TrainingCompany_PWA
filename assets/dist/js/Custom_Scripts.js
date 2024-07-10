$(function () {
  $("#table").DataTable();
  $(".textarea").wysihtml5();


  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });


  $(".Tchr_Update").on('click', function (e) {
    $("#T_ID").val($(this).attr('ID'));
    $("#name").val($(this).attr('name'));
    $("#email").val($(this).attr('email'));
    $("#address").val($(this).attr('address'));
    $("#cellNo").val($(this).attr('cellNo'));
    $("#qual").val($(this).attr('qual'));
    $("#pay").val($(this).attr('pay'));
    $("#tbtn").val("Update Teacher");
    $(".modal-title").html("Update Teacher");
    $("#TchrModal").modal('show');
  });

  $(".Std_Update").on('click', function (e) {
    $("#S_ID").val($(this).attr('ID'));
    $("#sname").val($(this).attr('name'));
    $("#sfname").val($(this).attr('fname'));
    $("#semail").val($(this).attr('email'));
    $("#saddress").val($(this).attr('address'));
    $("#scell").val($(this).attr('cell'));
    $("#spass").val($(this).attr('pass'));
    $("#sbtn").val("Update Student");
    $(".modal-title").html("Update Student");
    $("#StdModal").modal('show');
  });


  $(".enroll").on('click', function (e) {
    $("#e_id").val($(this).attr('ID'));
    $("#Enroll").modal('show');
  });

  $(".PayFee").on('click', function (e) {
    $("#ID").val($(this).attr('ID'));
    $("#fee").val($(this).attr('Fee'));
    $("#FeeModal").modal('show');
  });



  $(".Schedule").on('click', function (e) {
    $("#cid").val($(this).attr('ID'));
    $("#Schedule_Modal").modal('show');
  });



  $(".AddVideo").on('click', function (e) {
    $("#v_cid").val($(this).attr('ID'));
    $("#UploadVideo").modal('show');
  });

  $(".AddMaterial").on('click', function (e) {
    $("#m_cid").val($(this).attr('ID'));
    $("#UploadMaterial").modal('show');
  });


  $(".MarkQuiz").on('click', function (e) {
    $("#sq_id").val($(this).attr('ID'));
    $("#MarkSQModal").modal('show');
  });

});