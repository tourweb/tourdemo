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
    <title>Group Tours and Fixed Departure - Indiator</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/gstyle.css" rel="stylesheet" type="text/css" media="all" />	
<link rel="stylesheet" href="css/chocolat.css" type="text/css">
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

<style>
.select_style 
{
	background: #FFF;
	overflow: hidden;
	display: inline-block;
	    color: #062F3C;
    font-weight: 300;
    height: 35px;
	-webkit-border-radius: 5px 4px 4px 5px/5px 5px 4px 4px;
	-moz-border-radius: 5px 4px 4px 5px/5px 5px 4px 4px;
	border-radius: 5px 4px 4px 5px/5px 5px 4px 4px;
	-webkit-box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);
	-moz-box-shadow: 0 0 5px rgba(123,123,123,.2);
	box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);
	border: solid 1px #DADADA;
	font-family: "helvetica neue",arial;
	position: relative;
	cursor: pointer;
	padding-right:20px;

}
.select_style span
{
	position: absolute;
	right: 10px;
	width: 8px;
	height: 8px;
	background: url(http://projects.authenticstyle.co.uk/niceselect/arrow.png) no-repeat;
	top: 50%;
	margin-top: -4px;
}
.select_style select
{
	-webkit-appearance: none;
	appearance:none;
	width:120%;
	background:none;
	background:transparent;
	border:none;
	outline:none;
	cursor:pointer;
	padding:7px 10px;
}
</style>

</head>
  <body>
   
<?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
   
<div class="banner-section" style="background-color: #2D3E52;">
		<div class="container">
			<div class="banner-heder">
				
			</div>
			<div class="banner-grids">
				<div class="col-md-4 banner-grid">
					<h2>Start Planning</h2>							
				</div>
				<div class="col-md-4 banner-grid">
                                     <form action="#" method="post">
					<select class="sel select_style">
						<option value="">Choose Your Location</option>
						<option value="Delhi">Delhi</option>
						<option value="Agra">Agra</option>
                                                <option value="Kerala">Kerala</option>
						<option value="Jaipur">Jaipur</option>
						<option value="Amritsar">Amritsar</option>
					</select>							
				</div>
				
				
				<div class="col-md-4 search">
					
						<input type="submit" value="Search">
					</form>
				</div>
                                
				<div class="clearfix"></div>

			</div>
		</div>
	</div>
    
		<div class="content">
			<div class="promotions">
				<div class="container">
					<h2 class="tittle">Popular Group Tours</h2>
					<span>Best Travel Packages Available</span>
					<div class="promotion-grids">
						<div class="col-md-4 promation-grid">
							<img src="images/2.jpg" class="img-responsive" alt=""/>
							<div class="prom-text">
								<h4>Cuba</h4>
								
								</div>
						</div>
						<div class="col-md-4 promation-grid">
							<img src="images/3.jpg" class="img-responsive" alt=""/>
							<div class="prom-text">
								<h4>Berlin</h4>
								
								</div>
						</div>
						<div class="col-md-4 promation-grid">
							<img src="images/2.jpg" class="img-responsive" alt=""/>
							<div class="prom-text">
								<h4>Dubai</h4>
								
								</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="promotion-grids">
						<div class="col-md-4 promation-grid">
							<img src="images/3.jpg" class="img-responsive" alt=""/>
							<div class="prom-text">
								<h4>Rome</h4>
								
								</div>
						</div>
						<div class="col-md-4 promation-grid">
							<img src="images/2.jpg" class="img-responsive" alt=""/>
							<div class="prom-text">
								<h4>india</h4>
								
								</div>
						</div>
						<div class="col-md-4 promation-grid">
							<img src="images/3.jpg" class="img-responsive" alt=""/>
							<div class="prom-text">
								<h4>London</h4>
								
								</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!--about--->
				
			<!--about--->
			<div class="featured-services" id="services">
				<div class="container">
					<h3 class="tittle">Our Services</h3>
					<div class="featured-grids">
						<div class="col-md-3 featured-grid">
							<div class="featured-grd">
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								<h5>vel illum qui dolorem</h5>
								
							</div>
						</div>
						<div class="col-md-3 featured-grid">
							<div class="featured-grd">
								<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
								<h5>vel illum qui dolorem</h5>
								
								
							</div>
						</div>
						<div class="col-md-3 featured-grid">
							<div class="featured-grd">
								<span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
								<h5>vel illum qui dolorem</h5>
								
								
							</div>
						</div>
						<div class="col-md-3 featured-grid">
							<div class="featured-grd">
								<span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
								<h5>vel illum qui dolorem</h5>
								
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!--gallery-->
				
			<!--gallery-->
			<!-- team -->
			
			<!--news-->
		</div>


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