<?php
session_start();
include("indiator_admin/buslogic.php");
$eid=$_REQUEST["eid"];
?>
<!doctype html>

<html>
<head>
    <title>Indiator</title>
    <meta charset="utf-8">
    <meta name="description" content="travel, trip, store, shopping, siteweb, cart">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>
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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
// <script type="text/javascript">
// $(function() {
// $(".code").click(function() {
// var promocode = $("#promocode").val();
//  var dataString = 'promocode='+ promocode ;
//   if(promocode=='HURRY16' || promocode=='hurry16')
//   {
//     $.ajax({
//   type: "POST",
//     url: "booking.php",
//     data: dataString,
//     success: function(msg){
//   $('.success').fadeIn(200).show();
//     $('.error').fadeOut(200).hide();    
//    }
// });
//  }
//   else
//   {
//    $('.success').fadeOut(200).hide();

//     $('.error').fadeOut(200).show();
//   }
  
//  return false;
//   });
// });
// </script>
<?php include_once 'includes/header.php';?>
</head>
  <body>

    <div class="login-page">
            <div class="form">
            <img class="login-logo" src="images/logoslider.png" alt="" />
            <div class="close-frm-login"><i class="fa fa-times" aria-hidden="true"></i></div>
            <form class="register-form">
                <input type="text" placeholder="name"/>
                <input type="password" placeholder="password"/>
                <input type="text" placeholder="email address"/>
                <button>create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form">
                <input type="text" placeholder="username"/>
                <input type="password" placeholder="password"/>
                <button>login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
            </div>
        </div>
<?php include("includes/contact-info.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
    <section class="about-section-top">
      
    </section>
<section id="top-list-trip">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-md-12 effect-5 effects">
            <div class="main-switcher">
              <?php
              $con=new clscon();
              $link=$con->db_connect();
              $qry="select * from tb_booking where con_email='$eid'";
              $res= mysqli_query($link, $qry);
              $arr=array();
              $x=0;
              while($r=mysqli_fetch_array($res))
                {
                    $arr[$x]=$r;
                    $x++;
                ?>
                <h1 style="color:#2d3e52; font-size:20px"><?php echo $arr[0][1]; ?></h1>
                <div class="row">
                  <div class="col-md-9" style="padding-bottom:25px;">  
                   
                      <div class="col-md-6"><p class="para"><i class="fa fa-plane" aria-hidden="true"></i> Package Tour Code: <?php echo $arr[0][0]; ?></p></div>
                      <div class="col-md-6"><p class="para"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Travel date: <?php echo $date; ?></p></div>
                      <div class="col-md-6"><p class="para">No. of Travellers: 
                        <img src="images/adult.png"> <?php echo $adult; ?> <img src="images/child.png"> <?php echo $child; ?> <img src="images/infant.png"> <?php echo $infant; ?></p></div>
                     </div>
                     
                    <?php } ?>   
                     
                 <hr style="width:100%">    
                
            </div>
          </div><!-- /main -->
        </div><!--Close col 12 -->
    </div>    
</section>      
   <section class='last-minute-banner'>
        <div class="container">
            <div class="row">
                <div class="col-md-9 promotext">
                 <p>Get upto 15% Off on all domestic one day tour with promo code:</p>
                
                </div>
                 <div class="col-sm-3 col-md-3 button-banner"><a class="shortcode_button btn_large btn_type1 left_icon" href="javascript:void(0);"><i class="fa fa-hand-o-right"></i>HURRY16</a></div>
            </div>
        </div>
</section> 

<?php include("includes/footer.php"); ?>


<script src="js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>

<!--List-->
<script src="js/list/cbpViewModeSwitch.js" type="text/javascript"></script>
<script src="js/list/classie.js" type="text/javascript"></script>
<script src="js/list/jquery.mixitup.js" type="text/javascript"></script>



<script>

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
.para{
  color:#484848;
  font-size:15px;
}
.para1{
  color:#484848;
  font-size:20px;
  text-align: center;
}
.myPrice{
    font-weight: bold;
    color: #47A447;
    font-size: 22px;
    text-align: center;
    }
    .promo{
      border: 1px dashed orangered;
    border-radius: 17px;
    padding-top: 5px;
    padding-bottom: 9px;
    }
    .promotext{
      font-size: 27px;
    padding-top: 29px;
    }
    .error{
  
  color:#d12f19;
  font-size:12px;
  
    
  }
  .success{
  
  color:#006600;
  font-size:12px;
  
    
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