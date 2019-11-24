<?php
    // Initialize the session
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>
<?php
    include ("header.php");
    require_once('common/config.php');
    $link = mysqli_query($link,"SELECT COUNT(*) as total_rows FROM service");
    $rows=mysqli_fetch_assoc($link);
    $total_rows= $rows['total_rows']; 
?>


<div class="col-md-10 float-right col-12 no-padding" id="main_wrapper">
    <div class="top_header">
        <ul class="top_navigation"><li>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?> </li><li><a href="logout.php">Logout</a></li></ul>
    </div>
    <div class="major_container">
        <h1 class="admin_heading">Service Leads</h3>
        <div id="content_data"></div>
    </div><!-- End of Major Continer-->
</div>


<?php
    include ("footer.php");
?>