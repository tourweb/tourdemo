<?php
include("indiator_admin/buslogic.php");

include("includes/domain.php");
session_start();
if(isset($_POST["btnsub"]))
{
    
$email=$_POST["username"];
 $con=new clscon();
  $link=$con->db_connect();
 $query="select * from users where username='$email'";
 $result= mysqli_query($link,$query);
if(mysqli_affected_rows($link)==1)
        {
            while($r=mysqli_fetch_assoc($result))
  	{
            $rcod=$r["id"];
            $name=$r["name"];
            $email=$r["username"]; 
}
$subject = "Reset Your Password";
$message = "<html>";
$message .= "<head>\r\n";
$message .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n";
$message .= "<title>Indiator</title>\r\n";
$message .= "<style type=\"text/css\">\r\n";
$message .= " body{
            width: 100%; 
            background-color: #9f9fa3; 
            margin:0; 
            padding:0; 
            -webkit-font-smoothing: antialiased;
        }
        
        html{
            width: 100%; 
        }
        
        table{
            font-size: 14px;
            border: 0;
        }
     /* ----------- responsivity ----------- */
     @media only screen and (max-width: 768px){
      .container {
        width: 650px;
        }
      .4_grids{
        width: 300px !important;
      }
      .container-middle{width: 420px !important;}
     }
        @media only screen and (max-width: 640px){
        
            /*------ top header ------ */
            .header-bg{width: 440px !important; height: 10px !important;}
            .main-header{line-height: 28px !important;}
            .main-subheader{line-height: 28px !important;}
            
            /*----- --features ---------*/
            .feature{width: 420px !important;}
            .feature-middle{width: 400px !important; text-align: center !important;}
            .feature-img{width: 440px !important; height: auto !important;}
            
            .container{width: 500px !important;}
            .container-middle{width: 420px !important;}
            .mainContent{width: 400px !important;}
            
            .main-image{width: 400px !important; height: auto !important;}
            .banner{width: 400px !important; height: auto !important;}
            /*------ sections ---------*/
            .section-item{width: 400px !important;}
            .section-img{width: 400px !important; height: auto !important;}
            /*------- prefooter ------*/
            .prefooter-header{padding: 0 10px !important; line-height: 24px !important;}
            .prefooter-subheader{padding: 0 10px !important; line-height: 24px !important;}
            /*------- footer ------*/
            .top-bottom-bg{width: 420px !important; height: auto !important;}
            .feature1{
        width:200px !important;
      }
      .img-responsive{
        width:100%;
      }
        }
    @media only screen and (max-width: 480px){
      .container {
        width: 200px !important;
      }
      .icon {
        width: 70%;
      }
    }
        @media only screen and (max-width: 479px){
        
          /*------ top header ------ */
            .header-bg{width: 280px !important; height: 10px !important;}
            .top-header-left{width: 260px !important; text-align: center !important;}
            .top-header-right{width: 260px !important;}
            .main-header{line-height: 28px !important; text-align: center !important;}
            .main-subheader{line-height: 28px !important; text-align: center !important;}
            
            /*------- header ----------*/
            .logo{width: 260px !important;}
            .nav{width: 260px !important;}
            
            /*----- --features ---------*/
            .feature{width: 260px !important;}
            .feature-middle{width: 240px !important; text-align: center !important;}
            .feature-img{width: 260px !important; height: auto !important;}

            
            .container{width: 290px !important;}
            .container-middle{width: 260px !important;}
            .mainContent{width: 240px !important;}
            
            .main-image{width: 240px !important; height: auto !important;}
            .banner{width: 240px !important; height: auto !important;}
            /*------ sections ---------*/
            .section-item{width: 240px !important;}
            .section-img{width: 240px !important; height: auto !important;}
            /*------- prefooter ------*/
            .prefooter-header{padding: 0 10px !important;line-height: 28px !important;}
            .prefooter-subheader{padding: 0 10px !important; line-height: 28px !important;}
            /*------- footer ------*/
            .top-bottom-bg{width: 260px !important; height: auto !important;}
      table {
          width: 100% !important;
      }
            .gallery-img a img {
        height: 134px !important;
      }
      .gallery-img1 a img {
        height: 60px !important;
      }
      .gallery-img2 a img {
        height: 60px !important;
      }
      }
    @media only screen and (max-width: 320px){
      .ban{
        background: url(images/banner.jpg) no-repeat -260px 0px;
        background-size: cover;
      }
    }
     ";
$message .= "</style>\r\n";
$message .= "</head>\r\n";
$message .="
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
  <table border=0 width=100% cellpadding=0 cellspacing=0>
   <tr bgcolor='FFFFFF'>

                    <td>
                      <table style='border:1px solid #FF590B;' width='600' align='center' cellpadding='0' cellspacing='0' class='container-middle'>
               
                <tr><td><img src='https://indiator.com/images/logo.jpg' alt='indiator' align='right'/></td></tr>
                
                <tr>
                  <td>
                    <table border='0' width='600' align='center' cellpadding='0' cellspacing='0' class='container-middle'>
                      <tr><td style='font-size:1.0em;color:#136ad5;font-family:Century Gothic;text-align:center;'>Dear $name,</td></tr>
                      <tr>
                        <td style='font-size:2em;color:#136ad5;font-family:Century Gothic;text-align:center;'>Reset Your Password here </td>
                      </tr>
                      <tr><td height='10'></td></tr>
                
                      <tr>
                        <td style='font-size:1em; color:#999;font-family:Lucida Sans;text-align:center;line-height:1.8em;'>
                        <a style='color:white;background-color: #D45817;padding: 6px;' href='https://indiator.com/resetpwd.php?rid=$rcod'>Click the link to reset Password.</a>
                        </td>
                      </tr>
                     
                    </table>
                  </td>
                </tr>
                
                <tr><td height='20'></td></tr>
                
                <tr>
                  <td>
                    <table border='0' width='400' align='center' cellpadding='0' cellspacing='0' class='container-middle'>
                    
                      
                      <tr>
                        <td style='font-size:1.5em;color:#136ad5;font-family:Century Gothic;text-align:center;'>Contact Us</td>
                      </tr>
                      
                     
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                  <td style='font-size:1em;color:#999;font-family:Lucida Sans;text-align:center;'>A-15,SECTOR-3 NOIDA,U.P,INDIA PIN - 201301 </td>
                </tr>
                
             
                
                <tr>
                  <td style='font-size:1em;color:#999;font-family:Lucida Sans;text-align:center;'>Phone : +91 9871107030 <a href='mailto:info@indiator.com' style='color:#fb8a2e;'>info@indiator.com</a></td>
                </tr>
                
                
               
                <tr>
                  <td style='font-family: Century Gothic; font-size: 1em; color: #999999;text-align:center; line-height: 24px;' class='editable'>
                    
                    <!-- Edit Copyright Text -->
                    
                    © 2016 Indiator All rights reserved. Website: <a href='https://indiator.com/' style='color:#136AD5; text-decoration:none;'>Indiator.com</a>


                  </td>
                </tr>
                    </table>
                  </td>
                </tr>
                
                <tr><td height='20'></td></tr>
                
              </table>
            </td>
          </tr>
  </table>
</body>
</html>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <info@indiator.com>' . "\r\n";
mail($email,$subject,$message,$headers);
    $msg="Mail has been sent on your Email ID to reset password.";
        }
 else {
   $msg="This Email is not registered"; 
echo mysqli_error($link);
    }       
  
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
    <title>Login/Sign Up - Indiator</title>
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
        <link rel="stylesheet" href="css/jquery-ui.css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
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
       <div class="col-md-12 box-content contact">
       <article class="blog-help">
                   
            <div class="col-md-12 travel-desc-agency" style="border: 1px solid grey;">
                <h3 style="">Login Here</h3>
                <form class="form " id="" method="post" action="" autocomplete="off">
                          <div class="col-md-12 fc-content">
                          
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email-id" name="username">
                            </div>
                            
                          </div>
                          <div class="col-md-12 fc-content">
                            
                <input type="Submit" name="btnsub" value="Get Password" />
    <input type="Reset" name="btncan" value="Cancel"/>
                            
                          </div>
                        </form>
 <?php
        if(isset($msg))
            echo "<h3>".$msg."</h3>";
        ?>
            </div>
                   
                </article>
</div>

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