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
<!doctype html>

<html>
<head>
    <title>Indiator.com Associates: Affiliate Marketing Program</title>
    <meta charset="utf-8">
    <meta name="description" content="Join Indiator's Affiliate Marketing Program and earn commision upto 50%,Join Now!">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>
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
<style>
li{
color:black;
padding-left:10px;
font-size:15px;
}
.btn-app{
border-radius: 3px;
    position: relative;
    padding: 15px 5px;
    margin: 0 0 10px 10px;
    min-width: 80px;
    height: 60px;
    text-align: center;
    color: white;
    border: 1px solid #ddd;
    background-color: #428BCA;
    font-size: 12px;
}
</style>
</head>
  <body>

    <!-- Section Form Login and Register -->
    
        
<?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
  <section class="about-section-top">
       <div class="container">
          <?php include("short_tour.php"); ?>
      </div>
    </section>
<section id="top-list-trip">
   <div class="container">
      <div class="row">
       <div class="col-md-9 box-content contact">
        <div class="row"><div class="col-md-9"><h2>Indiator Affiliates </h2></div><div class="col-md-3"><a href="<?php echo $domain; ?>affiliate-register.php" class="btn btn-success btn-lg" ><i class="fa fa-users" aria-hidden="true"></i> Sign Up Now</a></div></div>
         <p class="details">IndiaTor is leading provider of short tours, Things To Do, Ground Transportation, Guided Tours, Cooking classes, Excursion, day Tours, Attraction & activity tours across the India. Through its wide local set up and extensive Partnership with hotels, Transporter & Local Insider.IndiaTor affiliates Program offer best benefits and highest commission in the Industry.
		 <ul class="list-group">
<li class="list-group-item">Highly competitive commissions that we paid upon booking.</li>
<li class="list-group-item">60 days cookie duration period.</li>
<li class="list-group-item">Higher Incentives on high volume bookings.</li>
<li class="list-group-item">Timely offers promotions to help you increase sales.</li>
<li class="list-group-item">Online reporting and commission tracking.</li>
<li class="list-group-item">Easy implementation that allows you to start earning commissions within a few minutes of acceptance.</li>
</ul>
<p class="details">For more information contact info@indiator.com .An affiliate team will help you and make your program a success.</p></p>
          <h3>WHY JOIN?</h3>
          <p class="details"> Joining the IndiaTor Travel Affiliate Programme enables you to partner with the world's largest and most trusted travel community. Leverage our brand to enhance your existing travel programs, earn additional revenue, and provide your users with access to 5+ million reviews, plus 500,000 city.</p>
<div class="col-md-7">
<h3>HOW DOES IT WORK?</h3>
          <p class="details">
<li>Become an affiliate by applying through citrus pay</li>
<li>Not a member of citrus pay? Join Now</li>
<li>Already a member of citrus pay? Log In</li>
<li>Select from our gallery of text-links, banners, and content widgets</li>
<li>Monitor and track your earnings online.</li>
<li>Real-time reporting is available 24-7</li>
<li>Get paid for sending quality traffic to IndiaTor.</li>
<li>Commission checks are sent monthly.</li>
</ul>
</div>
<div class="col-md-5">
          <h3>WHAT CAN YOU EXPECT?</h3>
          <p class="details">
<ul><li>50% Commission</li>
<li>Incentive programs</li>
<li>Deep linking to over 500,000 city tours</li>
<li>Partner with a brand people trust</li>
<li>Continuous addition of products and promotions</li>
<li>Access to a dedicated and experienced team.</li>
</ul>
</div>
</div>
<div class="col-md-3 box-content contact">

		<article class="blog-help">
                   <div class="help-txt"> 
                        <p class="help-phone"><i class="fa fa-phone"></i> +91 9871107030 </p>
                    </div> 
            <div class="col-md-12 travel-desc-agency" style="background-color:#DC6934;">
                <h3 style="color:white;">Need Assisstance ?</h3>
                <?php include("mail_form.php"); ?>
            </div>
                    
                </article>
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