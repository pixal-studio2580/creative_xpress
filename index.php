<?php
    include ("header.php");
    require_once('admin/common/config.php'); 
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
?>
<div class="w-100 float-left bg_white mobile_view" id="mobile_view">
  <div class="home_slider_container">  
    <img src="assets/images/mobile_slider.png" class="w-100">
    <h1 class="slider_title" alt="" title="">How can we help you,<br>being an Event Planner? </h1>
  </div>
</div>
<div class="solution_mobile mobile_view col-12 float-left pt_20">
  <h2 class="section_title float-left w-100 mb_15">We are Special at</h1>

  <div class="product_container"><!--========= ROW 01 ==========-->
    <div class="product_caption">Since birthdays are important milestones, let us fill the passion into the celebration that you will cherish until your next Birthday.</div>
    <div class="col-2 float-left pl_0">
      <img class="product_img" src="assets/images/birthday.png" alt="">
    </div>
    <div class="col-10 float-left pr_0">
      <h1 class="product_title">Birthday Party</h1>
      <h2 class="product_des">Since birthdays are important milestones, let us fill...</h2>
    </div>
  </div>
  <div class="product_container"><!--========= ROW 02 College and School ==========-->
    <div class="product_caption">Since birthdays are important milestones, let us fill the passion into the celebration that you will cherish until your next Birthday.</div>
    <div class="col-2 float-left pl_0">
      <img class="product_img" src="assets/images/dj.png" alt="">
    </div>
    <div class="col-10 float-left pr_0">
        <h1 class="product_title">College & School</h1>
        <h2 class="product_des">Let our planners make your students familiar with the creative sides..</h2>
    </div>
  </div>
  <div class="product_container"><!--========= ROW 03 Wedding ==========-->
    <div class="product_caption">Since birthdays are important milestones, let us fill the passion into the celebration that you will cherish until your next Birthday.</div>
    <div class="col-2 float-left pl_0">
      <img class="product_img" src="assets/images/wedding.png" alt="best wedding planner in bhubaneswar">
    </div>
    <div class="col-10 float-left pr_0">
      <h1 class="product_title">Wedding</h1>
      <h2 class="product_des">Marriages are for a lifetime but weddings occur only once. Let our...</h2>
    </div>
  </div>
  <div class="col-6 float-left pl_0" style="padding-right:5px;"><!--========= ROW 04 Corporate Party ==========-->
    <div class="product_container">
      <div class="product_caption">Keeping in mind of a productive year ahead, our creative events help your employees let go of their stresses and mingle up with their peers.</div>
      <img class="product_img" src="assets/images/dancing.png" alt="event planner in bhubaneswar" style="margin:0 auto !important;">
      <h1 class="product_title" style="margin: 10px 0 5px; text-align: center;font-size: 17px;">Corporate Parties</h1>
      <h2 class="product_des" style="text-align: center;">Keeping in mind of a productive year ahead, our creative events ...</h2>
    </div>
  </div>
  <div class="col-6 float-left pr_0" style="padding-left:5px;"><!--========= ROW 05 Entertainment ==========-->
    <div class="product_container">
        <div class="product_caption">We have the passion for buzzworthy events. Our expertise lies in creating entertainment programs and bring in ultimate audience engagement.</div>
      <img class="product_img" src="assets/images/Entertainment.png" alt="wedding event management companies in bhubaneswar" style="margin:0 auto !important;">
      <h1 class="product_title" style="margin: 10px 0 5px; text-align: center;font-size: 17px;">Entertainment</h1>
      <h2 class="product_des" style="text-align: center;">We have the passion for buzzworthy events. Our expertise lies...</h2>
    </div>
  </div>
  <div class="product_container"><!--========= ROW 06 Promotion ==========-->
    <div class="product_caption">Since birthdays are important milestones, let us fill the passion into the celebration that you will cherish until your next Birthday.</div>
    <div class="col-2 float-left pl_0">
      <img class="product_img" src="assets/images/promotion.png" alt="">
    </div>
    <div class="col-10 float-left pr_0">
      <h1 class="product_title">Promotion </h1>
      <h2 class="product_des">The goal behind promotion for new product launches is...</h2>
    </div>
  </div>
</div>

<!-- =========== SLIDER ==============-->
<div class="w-100 float-left bg_white d-none d-md-block d-lg-block">
  <div class="">
    <!--============= Slider Start Here ================= -->
    <div class="owl-carousel owl-theme " id="home_slider">
      <div class="home_slider_container">  <!--=========== Row 01 ============= -->
        <img src="assets/images/banner_01.png" alt="" class="slider_img">
        <div class="slider_caption ">
          <div class="col-md-12 col-12 float-left no-padding">
            <h1 class="slider_title" alt="" title="">
              Looking for a <br> College Event Planner? </h1>
            <h2 class="slider_tagline">We are organizing the best Event & DJ for your College.</h2>
            <!-- <span class="slider_price">As low as <span class="product_price">₹ 8,500.00/yr.*</span>  </span> -->            
            <div class="w-100 float-left mt_15 mb_10"><!--Website Call To Action-->
              <a href="" class="primary_btn col-md-6 col-12 float-left">Request for Call back</a>
            </div>
          </div><!--End of slider_caption-->
        </div> 
      </div> <!-- ****** END of Home Slider Container *****-->
      <div class="home_slider_container">  <!--=========== Row 02 ============= -->
        <img src="assets/images/banner_02.png" alt="" class="slider_img">
        <div class="slider_caption ">
          <div class="col-md-12 col-12 float-left no-padding">
            <h1 class="slider_title" alt="" title="">
              Planning for Wedding? <br> You're at right Place</h1>
            <h2 class="slider_tagline">We are organizing the best Event & DJ for your College.</h2>
            <!-- <span class="slider_price">As low as <span class="product_price">₹ 8,500.00/yr.*</span>  </span> -->            
            <div class="w-100 float-left mt_15 mb_10"><!--Website Call To Action-->
              <a href="" class="primary_btn col-md-6 col-12 float-left">Request for Call back</a>
            </div>
          </div><!--End of slider_caption-->
        </div> 
      </div> <!-- ****** END of Home Slider Container *****-->
    </div><!-- ================== ***** END of Homepage Slider ******* =============== -->
  </div>
</div>
<div class="small_slider desktop_view">

</div>
<!--============ Our Solutions [DESKTOP VIEW] ============-->
<div class="solution float-left w-100 pt_30 pb_30 desktop_view">
  <h1 class="section_title text-center mb_30"> We are special at</h1>
  <div class="container main_container">
    
    <div class="col-md-3 float-left mb_20">
      <div class="product_container">
        <div class="product_caption">Since birthdays are important milestones, let us fill the passion into the celebration that you will cherish until your next Birthday.</div>
        <img class="product_img" src="assets/images/birthday.png" alt="">
        <h1 class="product_title">Birthday Party</h1>
        <h2 class="product_des">Since birthdays are important milestones, let us fill...</h2>
      </div>
    </div>
    <div class="col-md-3 float-left mb_20">
      <div class="product_container">
        <div class="product_caption">our planners make your students familiar with the creative sides of their brains that they will thankful for the rest of their lives.</div>
          <img class="product_img" src="assets/images/dj.png" alt="event planner in bhubaneswar">
          <h1 class="product_title">College & School</h1>
          <h2 class="product_des">Let our planners make your students familiar with the creative sides..</h2>
      </div>
    </div>
    <div class="col-md-3 float-left mb_20">
      <div class="product_container">
        <div class="product_caption">Keeping in mind of a productive year ahead, our creative events help your employees let go of their stresses and mingle up with their peers.</div>
        <img class="product_img" src="assets/images/dancing.png" alt="event planner in bhubaneswar">
        <h1 class="product_title">Corporate Parties</h1>
        <h2 class="product_des">Keeping in mind of a productive year ahead, our creative events ...</h2>
      </div>
    </div>
    <div class="col-md-3 float-left mb_20">
      <div class="product_container">
          <div class="product_caption">We have the passion for buzzworthy events. Our expertise lies in creating entertainment programs and bring in ultimate audience engagement.</div>
        <img class="product_img" src="assets/images/Entertainment.png" alt="wedding event management companies in bhubaneswar">
        <h1 class="product_title">Entertainment</h1>
        <h2 class="product_des">We have the passion for buzzworthy events. Our expertise lies...</h2>
      </div>
    </div>
    <div class="col-md-3 float-left"></div>
    <div class="col-md-3 float-left mb_20">
      <div class="product_container">
        <div class="product_caption">Marriages are for a lifetime but weddings occur only once. Let our crafting & conceptualisation make it an experience of a lifetime.</div>
        <img class="product_img" src="assets/images/wedding.png" alt="best wedding planner in bhubaneswar">
        <h1 class="product_title">Wedding</h1>
        <h2 class="product_des">Marriages are for a lifetime but weddings occur only once. Let our...</h2>
      </div>
    </div>
    <div class="col-md-3 float-left mb_20">
      <div class="product_container">
        <div class="product_caption">The goal behind promotion for new product launches is creating audience engagement around your brand.</div>
        <img class="product_img" src="assets/images/promotion.png" alt="">
        <h1 class="product_title">Promotion </h1>
        <h2 class="product_des">The goal behind promotion for new product launches is...</h2>
      </div>
    </div>
    <div class="col-md-3 float-left"></div>
  </div>
</div>
<!--=========== Our Best Work================== -->
<div class="bg_white float-left w-100 pt_30 pb_30">
  <div class="container main_container">
    <h1 class="section_title text-center">Some of our Recent Work</h1>
    <span class="mobile_view mob_section_tagline">230+ Event Organised in the past Decade. </span>
    <div id="responsive-images" class="work_gallery">
      
      <a href="assets/images/gallery/1.jpg" class="col-md-4 float-left" data-sub-html="<h4>DJ Shireen At Parala Maharaja Engineering College fest 2017</h4>" >
        <img src="assets/images/gallery/thumb/1.jpg" class="w-100">
      </a>
      <a href="assets/images/gallery/2.jpg" class="col-md-4 float-left"  alt="Hello">
        <img src="assets/images/gallery/thumb/2.jpg" class="w-100">
      </a>
      <a href="assets/images/gallery/3.jpg" class="col-md-4 float-left" data-sub-html="<h4></h4>" >
        <img src="assets/images/gallery/thumb/3.jpg" class="w-100">
      </a>
      <a href="assets/images/gallery/4.jpg" class="col-md-4 float-left" alt="Hello">
        <img src="assets/images/gallery/thumb/4.jpg" class="w-100">
      </a>
      <a href="assets/images/gallery/5.jpg" class="col-md-4 float-left">
        <img src="assets/images/gallery/thumb/5.jpg" class="w-100">
      </a>
      <a href="assets/images/gallery/6.jpg" class="col-md-4 float-left" data-sub-html="<h4>From 15th Jan 2016 to 19th Jan 2016 — celebrating Golden Jubilee Celebration of AB College, Basudevpur, Bhadrak</h4>">
        <img src="assets/images/gallery/thumb/6.jpg" class="w-100">
      </a>  
    </div>
    <!-- <a href="model_listing.html" class="secondary_btn icon-right-arrow right-arrow-icon icon_set">See Gallery</a> -->
  </div>
</div>
<div class="col-md-6 float-left col-12 no-padding mobile_view">
  <div class="img_content">
    <img src="assets/images/wedding_bg.png" class="img_content_bg">
    <div class="content_underlay"></div>
    <div class="img_content_caption">
      <h1 class="title">Wedding Event</h1>
      <span class="tagline mt_20">Marriages are for a lifetime but weddings occur only once.</span>
    </div>
    <a href="" class="call_btn">Learn more</a>
  </div>
</div><!--Advirsment END-->
<div class="mobile_view col-12 float-left bg_white pb_30 pt_30">
  <h1 class="section_title mb_15">What kind of Event are you Planning?</h1>
  <form class="service_lead" method="POST" id="form_register" data-parsley-validate="">
  <div class="row"><div class="col-md-12 col-12 float-left"><span id="message" class="mb_20 float-left"></span></div></div>
      <div class="row">
        <div class="form-group col-12 float-left">
          <span class="input_label">Whar are you looking for</span>
            <select name="services" id="" class="gloabl_select">
            <option value="">Chosse Service</option>
                  <?php foreach($service_list as $service) { ?> 
                    <option value="<?php echo   $service['id']; ?>"> <?php echo  $service['service_name']; ?> (<?php echo  $service['status']; ?> )</option>
                    <!-- <option value="<?php echo   $service['id']; ?>"> <?php echo  $service['service_name']; ?></option> -->
                  <?php  } ?> 
            </select>
        </div>
        <div class="form-group col-12 float-left">
          <span class="input_label">Email</span>
          <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email id">  
        </div>
      </div>
      <div class="row">
        <div class="form-group col-6 float-left">
          <span class="input_label">mobile number</span>
          <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter mobile num..">
        </div>
        <div class="form-group col-6 float-left pl_0">
            <span class="input_label">Full Name</span>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
      </div>
      <div class="col-12 float-left no-padding mb_20 mt_10">
      <input type="submit" class="primary_btn btn btn-info float-right"  value="Send Message" id="send_service" name="submit">
      </div>
    </form> 
</div>


<!--=========== Image Background ============-->
<div class="w-100 float-left">
    <idv class="col-md-6 float-left col-12 no-padding desktop_view">
      <div class="img_content">
        <img src="assets/images/wedding_bg.png" class="img_content_bg">
        <div class="content_underlay"></div>
        <div class="img_content_caption">
          <h1 class="title">Wedding Event</h1>
          <span class="tagline">Marriages are for a lifetime but weddings occur only once.</span>
        </div>
        <a href="" class="call_btn">Learn more</a>
      </div>
    </idv>
    <idv class="col-md-6 float-left col-12 no-padding">
      <div class="img_content">
        <img src="assets/images/college_bg.png" class="img_content_bg">
        <div class="content_underlay"></div>
        <div class="img_content_caption">
          <h1 class="title">College & School Event</h1>
          <span class="tagline">Sharing is rewarding. 30,000 points precisely. It’s time to treat yourself and your friends</span>
        </div>
        <a href="" class="call_btn">Learn more</a>
      </div>
    </idv>

  </div>
<!--=========== Client Speak ================-->
<div class="solution float-left w-100 pt_30 pb_30">
  <div class="container main_container">
    <h1 class="section_title text-center mb_30">What People are Saying</h1>
    
    <div class="float-left w-100 mt_30 mb_30">
        <div class="col-md-4 col-12 float-left"><!--Portfolio 1-->
          <div class="people_speek">
            <span class="rating_box">4.5</span>
            <img class="people_img" src="assets/images/people_1.jpg" alt="">
            <span class="people_name">Kishan Padhy</span>
            <span class="people_job">Branch Head</span>
            <span class="people_text">Excellent service in all over odisha..... Awesome.. Feeling good to work with them.</span>
          </div>
        </div>
        <div class="col-md-4 col-12 float-left"><!--Portfolio 1-->
          <div class="people_speek">
              <span class="rating_box">4.1</span>
            <img class="people_img" src="assets/images/people_1.jpg" alt="">
            <span class="people_name">Debasmita Mohanty</span>
            <span class="people_job">Branch Head</span>
            <span class="people_text">Excellent management for all services from decoration to catering</span>
          </div>
        </div>
        <div class="col-md-4 col-12 float-left"><!--Portfolio 1-->
          <div class="people_speek">
              <span class="rating_box rating_orange">3.5</span>
            <img class="people_img" src="assets/images/people_1.jpg" alt="">
            <span class="people_name">Lieo Li </span>
            <span class="people_job">Casting director at (BIG Magic)</span>
            <span class="people_text">Awesome event management group. Bhubaneswar, Odisha</span>
          </div>
        </div>
    </div>
    

  </div>
</div>

<!--Footer-->
<?php include ("footer.php");?>

