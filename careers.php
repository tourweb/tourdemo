<?php

include("indiator_admin/buslogic.php");
include("includes/domain.php");
if(isset($_POST["search"])) {
  $location=$_POST["location"];
  $category=$_POST["category"];
  $con=new clscon();
  $link=$con->db_connect();
  $qry="select * from tb_cities where city_id=".$location;
  $res= mysqli_query($link, $qry);
  $r=mysqli_fetch_array($res);
  $loc="$r[1]";
   $qry1="select * from tb_tour_category where cat_id=".$category;
  $res1= mysqli_query($link, $qry1);
  $r1=mysqli_fetch_array($res1);
  $cat=str_replace(' ', '-',trim($r1[1]));
  header("location:$domain$loc/$cat/$location/$category");
}
?>
<?php 
if(isset($_POST["btnjob"])) {
  $nam=$_POST["nam"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $job=$_POST["job"];
  $exp=$_POST["exp"];
  $files=$_FILES["filupl"]["name"];
   $con=new clscon();
  $link=$con->db_connect();
  $jobqry="insert into career values('','$nam','$email','$phone','$job','$exp','$files')";
  $jobres= mysqli_query($link,$jobqry); 
    $s=$_FILES["filupl"]["name"];
    if($s!="")
        move_uploaded_file ($_FILES["filupl"]["tmp_name"],
                "resume/".$s);
 if(mysqli_affected_rows($link)==1)
        {
                 ?>
     	<script>
     	alert("Application sent successfully");
     	 window.location.href="careers.php";
     	</script>
     	<?php
        }
 else 
     {
    ?>
     	<script>
     	alert("Please Try Again <?php echo mysqli_error($link); ?>");
     	   window.location.href="careers.php";
     	</script>
     	<?php
     }
}


?>
<!doctype html>

<html>
  

<head>
    <title>Careers - Indiator</title>
    <meta charset="utf-8">
    <meta name="description" content="travel, trip, store, shopping, siteweb, cart">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>

<?php include_once 'includes/header.php';?>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/settings_slide2.css" rel="stylesheet" type="text/css" />
        <link href="css/travel-mega-menu.css" rel="stylesheet" type="text/css" />
        <!--Carousel-->
        <link href="css/carousel/component.css" rel="stylesheet" type="text/css" />
        <!--List-->
        <link href="css/list/component.css" rel="stylesheet" type="text/css" />
        <link href="css/layout2.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/jquery-ui.css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
</head>
  <body>

    <!-- Section Form Login and Register -->
   
<?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
    
<section class="services-parallax">
       <div class="about-color-parallax">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                 <div class="about-symbol"><i class="fa fa-users"></i></div>
                 <h3>Who <span>We</span> Are</h3>
              </div>
            </div>
          </div>
       </div>
    </section>

<section id="top-offerts">
   <div class="container">
      <div class="row">
         <div class="service-page-2 col-md-12 effect-5 effects">
             
                 <div class="service-square col-md-3">
                     <i class="fa fa-users"></i>
                     <h3>TEAM: INDIATOR FAMILY</h3>
                     <p>We have a team of thinkers, explorers, and inventors that mold thoughts into action.</p>
                 </div>
                 <div class="service-square col-md-3">
                    <i class="fa fa-life-ring"></i>
                    <h3>OUR CULTURE</h3>
                    <p>Our culture is to include every employee in the celebration of our achievements.</p>
                 </div>
                 <div class="service-square col-md-3">
                    <i class="fa fa-smile-o"></i>
                    <h3>WE PARTY HARD</h3>
                    <p>We work hard in silence and rewarded with a noisy party as there is no tomorrow.</p>
                 </div>
                 <div class="service-square l-las col-md-3">
                    <i class="fa fa-building"></i>
                    <h3>OFFICE ENVIRONMENT</h3>
                    <p>We celebrate together, we eat together, we play together and we work together.</p>
                 </div>
               
                <div class="service2-text-center col-md-12">
                    <h2 style="margin-top: 50px;">Experience</h2>
                    <!--<hr />-->
                    <p>Find your favorite place, feel more than home</p>
     			 </div>

                <!-- FIFTH EXAMPLE -->
                <div class="col-md-6 services2-info">
                <div class="service2-row">
                    <img src="images/career/c1.jpg" alt=""/>
                    <div class="mask-service2">
                        <div class="main-service">
                          <h3>Web Developer</h3>
                        </div>
                       <div class="content-service">
                          <p>Web Developer is responsible for coding and modifying websites, from layout to function according to requirement.</p>
                            <p class='comment-exp'>Experience - 1 to 5 years</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6 services2-info last-info">
                <div class="service2-row">
                    <img src="images/career/c6.jpg" alt=""/>
                    <div class="mask-service2">
                        <div class="main-service">
                          <h3>Ui/Ux Designer</h3>
                        </div>
                       <div class="content-service">
                          <p>UI/UX Designer creates strong visuals and experiential narratives to tell the story to the masses via our website.</p>
                            <p class='comment-exp'>Experience - 1 to 5 years</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6 services2-info">
                <div class="service2-row">
                     <img src="images/career/c3.jpg" alt=""/>
                    <div class="mask-service2">
                        <div class="main-service">
                          <h3>Digital Marketing</h3>
                        </div>
                       <div class="content-service">
                          <p>Digital Marketing executive will assist to deliver the company’s marketing strategy including website, social media and email. </p>
                            <p class='comment-exp'>Experience - 1 to 5 years</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6 services2-info last-info">
                <div class="service2-row">
                    <img src="images/career/c4.jpg" alt=""/>
                    <div class="mask-service2">
                        <div class="main-service">
                          <h3>Operations Manager</h3>
                        </div>
                       <div class="content-service">
                          <p>Operation Manager plans, direct and coordinate all organization’s operations for improving performance of the company.</p>
                           <p class='comment-exp'>Experience - 1 to 5 years</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6 services2-info">
                <div class="service2-row">
                     <img src="images/career/c5.jpg" alt=""/>
                    <div class="mask-service2">
                        <div class="main-service">
                          <h3>Tour Consultant</h3>
                        </div>
                       <div class="content-service">
                          <p>Tour Consultant handles tasks such as booking flights, including itineraries, accommodation, transport, tours and visas.</p>
                            <p class='comment-exp'>Experience - 1 to 5 years</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6 services2-info last-info">
                <div class="service2-row">
                    <img src="images/career/c2.jpg" alt=""/>
                    <div class="mask-service2">
                        <div class="main-service">
                          <h3>Content Writer</h3>
                        </div>
                       <div class="content-service">
                          <p>Content writers are responsible for writing a unique material for websites, social media and blogs & articles on tourism.</p>
                           <p class='comment-exp'>Experience - 1 to 5 years</p>
                        </div>
                    </div>
                </div>
                </div>
            </div><!--Close col 12 -->

          </div>
        </div>
</section>      
<section class="top-we-are">
    <div class="container">
      <div class="row">
         <div class="col-md-12 effect-5 effects no-border-img">
            <div class="text-center top-txt-title">
                <!--<span>WELCOME</span>-->
                <h2>Apply for Job</h2>
                <div class="separator">
                    <div class="separator-style"></div>
                </div>
                
            </div>
            
            <div class="col-md-8 travel-desc-agency" style="background-color:#DC6934;">
               
                <form id="" class="form email-form" method="post" enctype="multipart/form-data">
                          <div class="col-md-6 fc-content">
                            <div class="form-group">
<p style="color:white">Enter your Name :</p>
                                <input type="text" class="form-control" placeholder="Name" name="nam">
                            </div>
                            <div class="form-group">
<p style="color:white">Enter your Phone No. :</p>
                                <input type="text" class="form-control" placeholder="Phone No." name="phone">
                            </div>
                            <div class="form-group">
<p style="color:white">Enter your Email-id :</p>
                                <input type="text" class="form-control" placeholder="Email-id" name="email">
                            </div>
                           
                          </div>
                          <div class="col-md-6 fc-content2">
                            
                              <div class="form-group">
<p style="color:white">Job applying For :</p>
                                    <div class="guests-select">
                                     <select name="job" id="job" class="form-control" required>
                                           
                                            <option value="Web Developer">Web Developer</option>
                                            <option value="Ui-Ux Designer">Ui/Ux Designer</option>
                                            <option value="Digital Marketing">Digital Marketing</option>
                                            <option value="Tour Consultant">Tour Consultant</option>
                                            <option value="Operations Manager">Operations Manager</option>
                                            <option value="Content Writer">Content Writer</option>
                                          </select>
      
                                    </div>
                                  </div>
                            <div class="form-group">
<p style="color:white">Total Experience :</p>
                                    <div class="guests-select">
                                     <select name="exp" id="exp" class="form-control" required>
                                           
                                            <option value="1">1+ Years</option>
                                            <option value="2">2+ Years</option>
                                            <option value="3">3+ Years</option>
                                            <option value="4">4+ Years</option>
                                            <option value="5">5+ Years</option>
                                          </select>
      
                                    </div>
                                  </div>
                            <div class="form-group">
<p style="color:white">Upload your Resume :</p>
                                <input type="file" class="form-control" placeholder="file" id="filupl" name="filupl">
                            </div>
                          </div>
                          <div class="col-md-12 fc-content">
                             
                            <input type="submit" class="btn btn-primary" name="btnjob" value="SUBMIT" style="float:right;" >
                            

                          </div>
                        </form>
            </div>
            <div class="col-md-4 content-man mandesc"><center><img alt="" src="images/career/career2.png" alt=""/></center></div>
        </div>
      </div>
    </div>
</section>
<?php include("includes/footer.php"); ?>


<script src="js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>

<!--List-->
<script src="js/list/cbpViewModeSwitch.js" type="text/javascript"></script>
<script src="js/list/classie.js" type="text/javascript"></script>
<script src="js/list/jquery.mixitup.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    "use strict";
    $('#Grid').mixItUp();
    $('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
});
</script>


<script>
$(function () {
    "use strict";
    // Clickable Dropdown
    $('.click-nav > ul').toggleClass('no-js js');
    $('.click-nav .js ul').hide();
    $('.click-nav .js').click(function (e) {
        $('.click-nav .js ul').slideToggle(200);
        $('.clicker').toggleClass('active');
        e.stopPropagation();
    });
    $(document).click(function () {
        if ($('.click-nav .js ul').is(':visible')) {
            $('.click-nav .js ul', this).slideUp();
            $('.clicker').removeClass('active');
        }
    });

    $('.click-nav-location > ul').toggleClass('no-js js');
    $('.click-nav-location .js ul').hide();
    $('.click-nav-location .js').click(function (e) {
        $('.click-nav-location .js ul').slideToggle(200);
        $('.clicker').toggleClass('active');
        e.stopPropagation();
    });
    $(document).click(function () {
        if ($('.click-nav-location .js ul').is(':visible')) {
            $('.click-nav-location .js ul', this).slideUp();
            $('.clicker').removeClass('active');
        }
    });
});
jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
</script>
<style type="text/css">
.boxes{
    border-radius: 10px;
    border: 2px solid #DF4608;
    padding-bottom: 20px;
}
.boxes-two{

    border: 2px solid grey;
}
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;

}
.details{
  font-size: 15px;
  color:black;
}
@media only screen and (max-width: 1030px)
{
#top-list-trip{
    margin-top:120px;
}
.about-section-top .col-md-12
{
  background-color: #2D3E52;
  padding-bottom: 4px;
}

}
</style>
 </body>

</html>