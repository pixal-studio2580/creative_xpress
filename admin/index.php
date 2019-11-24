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
    //$total_rowss= $rows['total_rowss'];  
?>

<div class="col-md-10 float-right col-12 no-padding" id="main_wrapper">
    <div class="top_header">
        <ul class="top_navigation"><li>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?> </li><li><a href="logout.php">Logout</a></li></ul>
    </div>
    <div class="major_container">       
        <h1 class="admin_heading">Home</h3>
        
        <div class="col-md-3 float-left mt_20 no-padding">
            <div class="common_container">
                <img src="../assets/images/leads.png" class="img_center mt_20" style="width: 50px;">
                <span class="w-100 text-center font_16 semibold float-left mt_20">Total Leads</span> 
                <span class="w-100 text-center font_24 bold float-left mb_20"><?php echo   $total_rows; ?></span>            
                
            </div>            
        </div>
    </div>  
</div>





<?php
    include ("footer.php");
?>