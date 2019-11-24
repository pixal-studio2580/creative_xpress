<?php 
    include ("header.php");
    include ("admin/common/config.php"); 
    $service_list=array();

    $sql="SELECT id, service_name,status FROM services_list";

    $query=mysqli_query($link, $sql);

    if(mysqli_num_rows( $query)>0){ $i=0;
    while( $row=mysqli_fetch_assoc($query)){
        $service_list[$i]['id']=$row["id"];
        $service_list[$i]['service_name']=$row["service_name"];
        $service_list[$i]['status']=$row["status"];
        $i++;
    }     
    }
    //print_r( $service_list); die("Asdf");

?>
<!-- Top header end -->
<div class="contact_container">
  <div class="container main_container">
    <div class="contact_caption">
      <h1 class="section_title">Contact Us</h1>
      <span class="semibold font_18 mt_20 float-left w-100" style="display: block;">For event booking </span>
      <span class="regular" style="font-size:32px;display: block;">(+91) 98536 33414</span>
      <span class="semibold font_20 mt_10 float-left">Get in touch and let us know how we can help. </span>
    </div>
  </div>
</div>

<div class="w-100 float-left pt_30 pb_30 bg_white">
  <div class="container main_container">
    <div class="col-md-7 float-left col-12 no-padding">
      <h1 class="section_title">Send us a Message</h1>

      <form class="service_lead" method="POST" id="form_register" data-parsley-validate="">
      <!-- <div class="bs-callout bs-callout-warning hidden">
        <h4>Oh snap!</h4>
        <p>This form seems to be invalid :(</p>
      </div>
      <div class="bs-callout bs-callout-info" style="display:none;">
        <h4>Yay!</h4>
        <p>Everything seems to be ok :)</p>
      </div> -->
      <div class="row"><div class="col-md-12 col-12 float-left"><span id="message" class="mb_20 float-left"></span></div></div>
        <div class="row">         
          <div class="form-group col-md-6 float-left">
            <span class="input_label">Event you're planing for</span>
            <select name="services" id="" class="gloabl_select">
              <option value="">Chosse Service</option>
                <?php foreach($service_list as $service) { ?> 
                  <option value="<?php echo   $service['id']; ?>"> <?php echo  $service['service_name']; ?> (<?php echo  $service['status']; ?> )</option>
                  <!-- <option value="<?php echo   $service['id']; ?>"> <?php echo  $service['service_name']; ?></option> -->
                <?php  } ?>
              </select>
          </div>
          <div class="form-group col-md-6 float-left col-12">
              <span class="input_label">Your email id</span>
            <input type="email" name="email" id="email" class="form-control" placeholder="Your email id" data-parsley-trigger="change" required="">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 float-left col-12">
              <span class="input_label">Phone no</span>
            <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone number" data-parsley-trigger="change" required="">
          </div>
          <div class="form-group col-md-6 float-left col-12">
            <span class="input_label">Your Name</span>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" data-parsley-trigger="change" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 float-right col-12 mt_10">
          <input type="submit" class="primary_btn btn btn-info float-right"  value="Send Message" id="send_service" name="submit">
          </div>
        </div>
      </form>  
    </div>
    <div class="col-md-1 float-left col-12"></div>
    <div class="col-md-4 float-left col-12">
        <h1 class="section_title">Contact info</h1>
        <ul class="footer_list" id="contact_list_li">
          <li><a href="">
            <span class="location_icon icon_set" style="float: left; height: 30px; margin-right: 6px; margin-top: 3px;"></span>
            Plot No. 23/52, Gajapati Nagar, Ps - Sainik School Bhubaneswar, India</a></li>
          <li><a href=""><span class="icon_set phone_icon" style="float: left; margin-right: 6px; margin-top: 3px;"></span> 098536 33414</a></li>
          <li><a href=""><span class="icon_set email_icon" style="float: left; margin-right: 6px; margin-top: 3px;"></span> info@creativexpress.in</a></li>
        </ul>
        <div class="col-12 col-md-12 no-padding mt_20">
            <style> #map {height: 250px; width: 100%;}</style>
            <div id="map"></div>
        </div>
    </div>
  </div>
</div>
  
  
<!--Footer-->
<?php include ("footer.php");?>