<?php
include("indiator_admin/buslogic.php");
include("includes/domain.php");
session_start();
$id=$_GET["userid"];
if(isset($_SESSION["userid"]))
{
$rid=$_SESSION["userid"];
}
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
    <title>My Profile - Indiator</title>
    <meta charset="utf-8">
    <meta name="description" content="travel, trip, store, shopping, siteweb, cart">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>

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
        <link href="css/meteo/example.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/jquery-ui.css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <style>
        .tab-content{
        color:black;
        }
        </style>
</head>
  <body>

    
<?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
    <section class="about-section-top">
       <div class="container">
          <?php include("short_tour.php"); ?>
      </div>
    </section>

        
         <section id="guide">
   <div class="container">
      <div class="row">
       <div class="col-md-12">
<br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">My Profile</a></li>
    
    <li role="presentation"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">My Orders</a></li>
   
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  
    <div role="tabpanel" class="tab-pane active" id="profile">
    <h5 style="color:#2D3E52;">Personal Information</h5>
    <div class="col-md-2">
  <img src="images/users.png" class="img-responsive">
  </div>
    <div class="table-responsive col-md-10">
  <table class="table">
   <?php 
 	$con=new clscon();
  	$link=$con->db_connect();
  	$qry="SELECT * FROM users WHERE id=".$id;
  	$res = mysqli_query($link, $qry);
  	while($r=mysqli_fetch_assoc($res))
  	{
  	?>
    <tbody>
      <tr>
        <td>Your Name:</td><td> <?php echo $r["name"]; ?></td>
        </tr>
        <tr>
        <td>Email-id:</td><td><?php echo $r["username"]; ?></td>
        </tr>
      <?php  $user=$r["username"]; ?>
       
    </tbody>
    <?php } ?>
  </table>
  </div>
  
    </div>
    
    <div role="tabpanel" class="tab-pane" id="orders"><div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Booking Id</th>
        <th>Tour Code</th>
        <th>Booking Date</th>
        <th>Total Amount</th>
        <th>No. of Passengers</th>
        <th>Travelling Date</th>
     
      </tr>
    </thead>
    <tbody>
<?php  
  $con=new clscon();
  $link=$con->db_connect();
  $myqry="select * from tb_booking where con_email='$user'";
  $myres= mysqli_query($link,$myqry);
$c=1;
while($myr=mysqli_fetch_array($myres)) 
    {
      
?>
      <tr>
        <td><?php echo $c; ?></td>
        <td>INTOR<?php echo $myr[0]; ?></td>
        <td><?php 
               $qry1="select tour_code from tb_tours where tour_id=".$myr[1];
               $res1= mysqli_query($link, $qry1);
               $r1=mysqli_fetch_array($res1);
               echo $r1[0];
          ?></td>
        <td><?php echo $myr[24]; ?></td>
        
        <td><?php echo '$ '.$myr[28].' ('.$myr[29].')'; ?></td>
        <td><?php echo $myr[30]; ?></td>
        <td><?php echo $myr[2]; ?></td>
        
        
        
      </tr>
<?php $c++; } ?>
    </tbody>
  </table>
  </div></div>
   
  </div>

</div>
          </div><!--Close col 12 -->
</div>
      </div>
</section>



<?php include("includes/footer.php"); ?>

<script src="js/tabs/jquery.responsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    "use strict";
    $('#horizontalTab').responsiveTabs({
        rotate: false,
        startCollapsed: 'accordion',
        collapsible: 'accordion',
        setHash: true,
        animation: 'slide',
        disabled: [4],
        activate: function (e, tab) {
            $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
        },
        activateState: function (e, state) {
            //console.log(state);
            $('.info').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
        }
    });

});
</script>

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
#guide{
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