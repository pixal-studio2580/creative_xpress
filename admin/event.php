<?php
    // Initialize the session
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location:login.php");
        exit;
    }
?>
<?php
    include ("header.php");
?>
<div class="col-md-10 float-right col-12 no-padding" id="main_wrapper">
    <div class="top_header">
        <ul class="top_navigation"><li>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?> </li><li><a href="logout.php">Logout</a></li></ul>
    </div>
    <div class="major_container">
		<h1 class="admin_heading">Event List</h3>
		<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary float-right">Add New Event</button>
		<div class="table-responsive  bg_white">
			
			<table id="user_data" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Image</th>
						<th>Event Name</th>
						<th style="">Description</th>
						<th>Location</th>
						<th>Status</th>
						<th>Delete</th>
						
					</tr>
				</thead>
			</table>
		</div>
    </div><!-- End of Major Continer-->
</div>


<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">					
					<h4 class="modal-title float-left">Add User</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<span id="user_uploaded_image"></span>
					<label>Enter Event Name</label>
						<input type="text" name="event_name" id="event_name" class="form-control" />
					<br />
					<label>Enter Event Description</label>
						<textarea  name="event_des" id="event_des" class="form-control"></textarea>
					<br />
					<label>Enter Location</label>
						<input type="text" name="location" id="location" class="form-control" />
					<br />

					<label>Select User Image</label>
					<input type="file" name="user_image" id="user_image" />

					<label>Lead Status</label>
					<select class="form-control" id="lead_status" name="lead_status">
						<option value="Open">Open</option>
						<option value="Closed">Closed</option>
						<option value="Pending">Pending</option>
					</select>
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >

</script>
<?php
    include ("footer.php");
?>