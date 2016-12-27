<?php
include("indiator_admin/buslogic.php");
include("includes/domain.php");
session_start();
if(isset($_REQUEST["rid"]))
{ 
$_SESSION["reset"]=$_REQUEST["rid"];
}
if(isset($_POST["btnreset"]))
{
 $con=new clscon();
  $link=$con->db_connect();
  $password=md5($_POST["password"]);
 $query="update users set password='$password' where id=".$_SESSION["reset"];
 $result= mysqli_query($link,$query);
 if(mysqli_affected_rows($link)==1)
        {
        	?>
        	<script>alert("Password Updated Successfully, You Can Login Now"); 
        	window.location.href="login.php";
        	</script>
        	<?php
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
                <h3 style="">Reset Password Here</h3>
                <form class="form " id="" method="post" action="" autocomplete="off">
                          <div class="col-md-12 fc-content">
                          
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Enter new password" name="password">
                            </div>
                            
                          </div>
                          <div class="col-md-12 fc-content">
                            
                <input type="Submit" name="btnreset" value="Update Password" />
    <input type="Reset" name="btncan" value="Cancel"/>
                            
                          </div>
                        </form>
 
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