<?php 
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
<link rel="stylesheet" href="../../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap-grid.css">
  <link rel="stylesheet" href="../../assets/css/common.css">
  <link rel="stylesheet" href="../../assets/css/custom.css">
  <link rel="stylesheet" href="../../assets/css/responsive.css">
  <link rel="stylesheet" href="../../assets/css/utilities.css">
  <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
  <link rel="icon" type="image/png" sizes="27x27" href="assets/images/favicon.png">
  <title>Admin :: Welcome</title>
</head>   
<body>
<div class="col-md-2 float-left col-12">
    <div class="side_container">
        <div class="col-md-12 no-padding float-left">
        <span class="top_logo"> <img src="../../assets/images/logo.png" alt="" class="float-left w-100"> </span>
            <ul class="side_navigation">
                <li><a href="../index.php">Dashboard</a></li>
                <li><a href="../lead.php">Service Lead</a></li>
                <li><a href="../event.php">Event</a></li>
                <li><a href="../gallery">Gallery</a></li>
               
            </ul>
        </div>
    </div>
</div>
<div class="col-md-10 float-right col-12 no-padding" id="main_wrapper">
    <div class="top_header">
        <ul class="top_navigation"><li>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?> </li><li><a href="../logout.php">Logout</a></li></ul>
    </div>
    <div class="major_container"> 
        <h1 class="admin_heading">Upload Images</h3>

        <div class="col-md-6 float-left no-padding mb_20">
            <input type="file" name="multiple_files" id="multiple_files" multiple /> </br>
            <span class="text-muted">Only .jpg, png, .gif file allowed</span>
        </div>
        <div class="col-md-6 float-left no-padding mb_20">
            <span id="error_multiple_files"></span>
        </div>
        <div class="table-responsive" id="image_table">
            
        </div>
    </div>
</div><!--End of Container-->
</body>
    <div id="imageModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="edit_image_form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Image Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Image Name</label>
                            <input type="text" name="image_name" id="image_name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <input type="text" name="image_description" id="image_description" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="image_id" id="image_id" value="" />
                        <input type="submit" name="submit" class="btn btn-info" value="Edit" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/popper.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/owl.carousel.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/admin.js"></script>
<script>

$(document).ready(function(){
    load_image_data();
        function load_image_data()
        {
            $.ajax({
            url:"fetch.php",
            method:"POST",
            success:function(data)
        {
        $('#image_table').html(data);
            }
        });
} 
 $('#multiple_files').change(function(){
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_files')[0].files;
  if(files.length > 10)
  {
   error_images += 'You can not select more than 10 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_files").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
    var f = document.getElementById("multiple_files").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_files').files[i]);
    }
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
    },   
    success:function(data)
    {
     $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
     load_image_data();
    }
   });
  }
  else
  {
   $('#multiple_files').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });  
 $(document).on('click', '.edit', function(){
  var image_id = $(this).attr("id");
  $.ajax({
   url:"edit.php",
   method:"post",
   data:{image_id:image_id},
   dataType:"json",
   success:function(data)
   {
    $('#imageModal').modal('show');
    $('#image_id').val(image_id);
    $('#image_name').val(data.image_name);
    $('#image_description').val(data.image_description);
   }
  });
 }); 
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{image_id:image_id, image_name:image_name},
    success:function(data)
    {
     load_image_data();
     //alert("Image removed");
    }
   });
  }
 }); 
 $('#edit_image_form').on('submit', function(event){
  event.preventDefault();
  if($('#image_name').val() == '')
  {
   alert("Enter Image Name");
  }
  else
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:$('#edit_image_form').serialize(),
    success:function(data)
    {
     $('#imageModal').modal('hide');
     load_image_data();
     alert('Image Details updated');
    }
   });
  }
 }); 
});
</script>