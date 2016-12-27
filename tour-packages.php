<?php
session_start();
include("indiator_admin/buslogic.php");
include("includes/domain.php");
$catid=$_REQUEST["category"];
$cityid=$_REQUEST["location"];
$l=$_REQUEST["loc"];
$c=$_REQUEST["cat"];
?>
<?php
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
 <title><?php echo $l; ?> - <?php echo $c; ?> Indiator</title>
<?php
                    $con=new clscon();
                   $link=$con->db_connect();
                        $qry="select * from tb_cities where city_id=$cityid";
                        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
                        
                        $arr=array();
                        $i=0;

                        $r=mysqli_fetch_row($res);
                        $arr[$i]=$r;
                        
                      ?>
   
    <meta charset="utf-8">
 
    <meta name="description" content="<?php echo $arr[0][3]; ?>">

    <meta name="keywords" content="<?php echo $arr[0][2]; ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php include('Experiment/'.$arr[0][4].'.php'); ?>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>
        <link href="<?php echo $domain; ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/animate.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/settings_slide2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/travel-mega-menu.css" rel="stylesheet" type="text/css" />
        <!--Carousel-->
        <link href="<?php echo $domain; ?>css/carousel/component.css" rel="stylesheet" type="text/css" />
        <!--List-->
        <link href="<?php echo $domain; ?>css/list/component.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/layout2.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo $domain; ?>css/jquery-ui.css"/>
        <link href="<?php echo $domain; ?>css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $domain; ?>css/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $domain; ?>css/slick-theme.css">
 
        <style type="text/css">
          .slider {
        width: 90%;
        margin: 24px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }
    .checkbox{
    min-height:0px !important;
    }
        </style>

</script>


<?php include_once 'includes/header.php';?>
</head>
  <body>
<?php include_once("analyticstracking.php") ?>
        
            
        
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
         <div class="col-sm-4 col-md-3">
                <div class="sidepanel widget_search" style="margin-top:12px;"> 
                <!-- <form name="search_form" action="" class="search_form"> 
                    <input type="text" name="s" value="" placeholder="Search Places and Tours"> <input type="submit" value="Go"> 
                </form>  -->
             </div>
               <article class="blog-category" style="padding-left: 10px;padding-top: 10px;padding-bottom: 10px;">
                    <h4 style="color:#3276B1;">All Tour Categories</h4>
            
            <div>
            <form name="" method="post">
                 <div id="filters">
                            <?php
                               $obj=new clscat();
                                $arrc=$obj->disp_rec();
                                if(count($arrc)>0)
                                {
                                for($c=0;$c<count($arrc);$c++)
                                {
                                ?>
                 
               <div class="checkbox" >
               <?php if($arrc[$c][0]==$catid){ ?>
                  <h3><input type="checkbox" class="squared category" class="filled-in" id="filled-in-box" name="check" id="<?php echo $arrc[$c][0]; ?>" value="<?php echo $arrc[$c][0]; ?>" checked >&nbsp; <?php echo $arrc[$c][1]; ?></h3>
              <?php  }
              else{
              ?>
              <h3><input type="checkbox" class="squared category"  name="check" id="<?php echo $arrc[$c][0]; ?>" value="<?php echo $arrc[$c][0]; ?>" >&nbsp; <?php echo $arrc[$c][1]; ?></h3>
            <?php  }
               ?>
                        </div>
                            <?php } 
                        }?>
                 </div>
                        
              </form>
            </div>
                </article>
<center>

<img src="https://indiator.com/images/offer-multi.png" class="img-responsive" ></center>
           <article class="blog-help">
                   <div class="help-txt"> 
                        <p class="help-phone"><i class="fa fa-phone"></i> +91 9871107030 </p>
                    </div> 
   
            <div class="col-md-12 travel-desc-agency" style="background-color:#DC6934;margin-bottom: 50px;">
                <h3 style="color:white;">Enquire Now </h3>
                <?php include("mail_form.php"); ?>
            </div>
               
                </article>



            </div>  
         <div class="col-sm-8 col-md-9 effect-5 effects">
            <div class="main-switcher">
                
        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                    <div class="txt-sort"><h3 class="desc-filter" style="margin-top:9px;">
                        <?php
if($cityid==0){
                          echo "All Cities";
                        }
else{
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select tb_cities.city_id,tb_cities.city_name from tb_cities INNER JOIN tb_tours ON tb_tours.tour_city_id=tb_cities.city_id where city_id=$cityid";
                        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
                        
                        $arr=array();
                        $i=0;

                        $r=mysqli_fetch_row($res);
                        $arr[$i]=$r;
                        echo $arr[0][1]; 
}
                        ?>

                        -  <?php
                        if($catid==0)
                        {
                          echo "All Tour Packages";
                        }
                        else{
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select tb_tour_category.cat_id,tb_tour_category.cat_name from tb_tour_category INNER JOIN tb_tours ON tb_tours.tour_cat_id=tb_tour_category.cat_id where cat_id=$catid";
                        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
                        
                        $arr=array();
                        $i=0;

                        $r=mysqli_fetch_row($res);
                        $arr[$i]=$r;
                        echo $arr[0][1];
                         }
                        ?></h3></div>              
          <div class="cbp-vm-options">
            <a href="#" class="cbp-vm-icon cbp-vm-grid " data-view="cbp-vm-view-grid"><i class="fa fa-th-large"></i></a>
            <a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list"><i class="fa fa-th-list"></i></a>
          </div>
          <ul id="Grid" class="sandbox">
            <?php 

              if (isset($_GET["page"])) { 
                  $page  = $_GET["page"]; 
                } else { 
                  $page=1; 
                };
            $recordsPerPage=9; 
            $start = ($page-1) * $recordsPerPage; 
          
                      
                          $con=new clscon();
                          $link=$con->db_connect();
                          
                          if($catid==0){
                          $qry11="SELECT tour_id,tour_code,tour_name,substring(short_description,1,130) short_description,page_url,ratings,duration,tour_cat_id,tour_city_id from tb_tours where tour_city_id=$cityid LIMIT $start, $recordsPerPage";
                        }

                        else{

if($cityid==0){
                          $qry11="SELECT tour_id,tour_code,tour_name,substring(short_description,1,130) short_description,page_url,ratings,duration,tour_cat_id,tour_city_id from tb_tours where tour_cat_id=$catid LIMIT $start, $recordsPerPage";
                        }
else{
                          $qry11="SELECT tour_id,tour_code,tour_name,substring(short_description,1,130) short_description,page_url,ratings,duration,tour_cat_id,tour_city_id from tb_tours where tour_city_id=$cityid and tour_cat_id=$catid LIMIT $start, $recordsPerPage";
}
                        }
                        
                        ?>
                        <?php
                        $res11=  mysqli_query($link,$qry11) or die(mysqli_error($link)); 

                        $arr11=array();
                        $cs=0;
                        if(mysqli_affected_rows($link)>=1)
                            {
                        while($r11=mysqli_fetch_assoc($res11))
                        {
                            
                           $cities=$r11['tour_city_id'];
                        ?>
                    <li class="mix category-3 resultblock" data-tag="<?php echo $r11['tour_cat_id']; ?>,0">
                      <figure>
                      
                                <div class="cbp-vm-image img">
                                    <?php
                                      $con=new clscon();
                                      $link=$con->db_connect();
                                      $qry4="select img1,alttext1 from tb_images where tour_id=".$r11['tour_id'];
                                      $res4=  mysqli_query($link, $qry4);
                                      $ar1=array();
                                      $y=0;
                                      while ($r4=  mysqli_fetch_row($res4))
                                      {
                                        $ar1[$y]=$r4;
                                        $y++;
                                    
                                      ?>
                                    <img src="<?php echo $domain; ?>indiator_admin/uploads/<?php echo $ar1[0][0]; ?>" alt="<?php echo $ar1[0][1]; ?>"/>
                                    <?php } ?>
                                    <div class="overlay">
<?php
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select * from tb_cities where city_id=$cities";
                        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
                        
                        $arr=array();
                        $i=0;

                        $r=mysqli_fetch_row($res);
                        $arr[$i]=$r;
                        
                        ?>
                                        <a href="<?php echo $domain.$arr[0][1].'/tour-packages/'.$r11['page_url'].'/'.$r11['tour_id'];?>" class="expand" target="blank">+</a>
                                        <a class="close-overlay hidden">x</a>
                                    </div>
                                    </div>
                                    
                              <figcaption>
                                    <h3 style="text-align:justify"><b><a href="<?php echo $domain.$arr[0][1].'/tour-packages/'.$r11['page_url'].'/'.$r11['tour_id'];?>" target="blank"><?php echo $r11['tour_name'];?></a></b></h3><br>
                                    
                                    <p style="text-align:justify"><?php echo $r11['short_description'];?> ..</p>
                                    <div class="price-night"><span>Price Starts from</span>
                                         <?php
                                          
                                          $con=new clscon();
                                          $link=$con->db_connect();
                                          $qry3="select price8 from tb_price where tour_id=".$r11['tour_id'];
                                          $res3=  mysqli_query($link, $qry3);
                                          $ar=array();
                                          $x=0;
                                          while ($r3=  mysqli_fetch_row($res3))
                                          {
                                            $ar[$x]=$r3;
                                            $x++;
                                        
                                          ?>

                                        <span class="price-n"><?php echo "$ ".$ar[0][0]; } ?></span></div>
                                          <div class="price-night"><span>Duration: </span>
                                        <span class="price-n"><h3><?php echo $r11['duration']; ?></h3></span></div>  
                                        <div class="price-night"><span>Star Ratings: </span>
                                        <span class="price-n"><?php 
                              if($r11['ratings']==3)
                                echo "<img src=".$domain."images/3star.png >";
                              if($r11['ratings']==3.5)
                                echo "<img src=".$domain."images/3.5.png >";
                              if($r11['ratings']==4)
                                echo "<img src=".$domain."images/4star.png >";
                              if($r11['ratings']==4.5)
                                echo "<img src=".$domain."images/4.5.png >";
                              if($r11['ratings']==5)
                                echo "<img src=".$domain."images/5star.png >";
                              else{
                                echo "";
                              }
                            ?></span></div>  
                                      
                                   <?php
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select * from tb_cities where city_id=$cities";
                        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
                        
                        $arr=array();
                        $i=0;

                        $r=mysqli_fetch_row($res);
                        $arr[$i]=$r;
                       
                        ?>
                                    <a href="<?php echo $domain.$arr[0][1].'/tour-packages/'.$r11['page_url'].'/'.$r11['tour_id'];?>" class="btn btn-primary btn-gallery" target="blank">See Details</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<a href="<?php echo $domain.$arr[0][1].'/tour-packages/'.$r11['page_url'].'/'.$r11['tour_id'];?>" class="btn btn-warning btn-gallery" style="float:right;" target="blank">Enquire Now</a>
                                </figcaption>
                                
              </figure>
            </li>
                <?php
              }  
               }
                else{
                   echo "<font color=blue>No results found. Try Again !</font>";
                }     
            ?> 
            
          </ul>
            <?php
         
                          $con=new clscon();
                          $link=$con->db_connect();
                          
                          if($catid==0){
                          $qry11="SELECT tour_id,tour_code,tour_name,substring(short_description,1,130) short_description,page_url from tb_tours where tour_city_id=$cityid ";
                        }
                        else{
if($cityid==0){
                          $qry11="SELECT tour_id,tour_code,tour_name,substring(short_description,1,130) short_description,page_url from tb_tours where tour_cat_id=$catid";
                        }
else{
                          $qry11="SELECT tour_id,tour_code,tour_name,substring(short_description,1,130) short_description,page_url from tb_tours where tour_city_id=$cityid and tour_cat_id=$catid ";
}
                        }
                      
          $result = mysqli_query($link, $qry11); //run the query
          $totalRecords = mysqli_num_rows($result);  //count number of records
          $totalPages = ceil($totalRecords / $recordsPerPage); 
          $con=new clscon();
          $link=$con->db_connect();
          $qry="select * from tb_cities where city_id=".$cityid;
          $res= mysqli_query($link, $qry);
          $r=mysqli_fetch_array($res);
          $loc="$r[1]";

           $qry1="select * from tb_tour_category where cat_id=".$catid;
          $res1= mysqli_query($link, $qry1);
          $r1=mysqli_fetch_array($res1);
          $cat=str_replace(' ', '-',trim($r1[1]));
           echo "<center><ul class='pagination clearfix'>";
                        echo "<li class=prev><a href='$domain$loc/$cat/$cityid/$catid/1'><i class='fa fa-arrow-left'></i></a></li>";
                        for ($num=1; $num<=$totalPages; $num++) { 
                          echo "<li><a href='$domain$loc/$cat/$cityid/$catid/".$num."'>".$num."</a></li>"; 
          }; 
                       
                        echo "<li class=next><a href='$domain$loc/$cat/$cityid/$catid/$totalPages'><i class='fa fa-arrow-right'></i></a></li>";
                    echo "</ul></center>";
         
?>
        </div>
      </div>
      <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>

<center><h3>Testimonials</h3></center>


      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
      
<!-- Bottom Carousel Indicators -->
<ol class="carousel-indicators">
  <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
  <li data-target="#quote-carousel" data-slide-to="1"></li>
  <li data-target="#quote-carousel" data-slide-to="2"></li>
</ol>
        
<!-- Carousel Slides / Quotes -->
<div class="carousel-inner">

<!-- Quote 1 -->
<div class="item active">
  <div class="row">
    <div class="col-sm-12">
      <p>&ldquo;I was immensely convinced by the services of Indiator, proven to be very comfortable and hassle-free from the very beginning. The expert guides and reliable drivers are very professional and friendly and the accommodation provided to us was simply superb.&rdquo;</p>
      <small><strong>Iqbal Veerji Canada</strong></small>
    </div>
  </div>
</div>

<!-- Quote 2 -->
<div class="item">
  <div class="row">
    <div class="col-sm-12">
      <p>&ldquo;This was our first vacation to India and we were very much distressed about our travel company, to listen and acknowledge to our concerns and preferences, but Indiator makes it, exactly as we want.&rdquo;</p>
      <small><strong>Steve</strong></small>
    </div>
  </div>
</div>

<!-- Quote 3 -->
<div class="item">
  <div class="row">
    <div class="col-sm-12">
      <p>&ldquo;I was very fascinated by this travel company's service and follow through. They worked with our request and provided an itinerary according to our taste and requirements. I will recommend this travel company to other family members too.&rdquo;</p>
      <small><strong>Tracy</strong></small>
    </div>
  </div>
</div>
  
<!-- Quote 4 -->
<div class="item">
  <div class="row">
    <div class="col-sm-12">
      <p>&ldquo;Our trip was hassle-free and memorable! From package customization to our adieu, all was just PERFECT. Our entire Indian excursion was enjoyable and memorable. We will definitely travel to India again… and do so with this company.&rdquo;</p>
      <small><strong>Linda</strong></small>
    </div>
  </div>
</div>

  </div>
</div>
    </div>
          
          </div>
        </div>


</section>  

<!--
<div class="modal fade bs-example-modal-lg" tabindex="-1" id="myModal" role="dialog" aria-labelledby="mySmallModalLabel" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
   <div class="modal-header" style="background-color:#EAE0C5;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" style="color:#C24B81;">Don't let this get away! Take 10% off on Multi-days tour packages</h4></center>
      </div>
      <img src="https://indiator.com/images/offs.jpg" class="img-responsive">
    </div>
  </div>
</div>  -->    
   
<?php include("includes/footer.php"); ?>

  <script src="<?php echo $domain; ?>js/slick.js" type="text/javascript" charset="utf-8"></script>
 <script type="text/javascript">
    $(document).on('ready', function() {
    
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5
      });   
    });
  </script>

<script type="text/javascript" src="<?php echo $domain; ?>js/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>js/bootstrap.min.js"></script> 
<script src="<?php echo $domain; ?>js/jquery-ui.js"></script>
<script src="<?php echo $domain; ?>js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!--Carousel-->
<script src="<?php echo $domain; ?>js/carousel/modernizr.custom.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/carousel/jquery.cbpContentSlider.min.js" type="text/javascript"></script>
 <script>
$(function () {
    "use strict";
    $('#cbp-contentslider').cbpContentSlider();
});
</script>
<!--List-->
<script src="<?php echo $domain; ?>js/list/cbpViewModeSwitch.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/list/classie.js" type="text/javascript"></script>


<script src="<?php echo $domain; ?>js/list/jquery.mixitup.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    "use strict";
    $('#Grid').mixItUp();
 $('#quote-carousel').carousel({
    pause: true, interval: 10000,
  });
});

</script>
 


<style type="text/css">
    @media only screen and (max-width: 1030px)
{
#top-list-trip{
    margin-top:150px;
}
.about-section-top .col-md-12
{
  background-color: #2D3E52;
  padding-bottom: 4px;
}
}
.btn-gallery{
  margin-top: 8px !important;
}
.squaredOne {
  width: 28px;
  height: 28px;
  position: relative;
  margin: 20px auto;
  background: #fcfff4;
  background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
  label {
    width: 20px;
    height: 20px;
    position: absolute;
    top: 4px;
    left: 4px;
    cursor: pointer;
    background: linear-gradient(top, #222 0%, #45484d 100%);
    box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
    &:after {
      content: '';
      width: 16px;
      height: 16px;
      position: absolute;
      top: 2px;
      left: 2px;
      background: $activeColor;
      background: linear-gradient(top, $activeColor 0%, $darkenColor 100%);
      box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
      opacity: 0;
    }
    &:hover::after {
      opacity: 0.3;
    }
  }
  input[type=checkbox] {
    visibility: hidden;
    &:checked + label:after {
      opacity: 1;
    }   
  } 
}
/* end .squaredOne */


/* .squaredTwo */
.squared{
  width: 18px;
  height: 18px;
  position: relative;
  background: blue;
  background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
  
  input[type=checkbox] {
    visibility: hidden;
    &:checked + label:after {
      opacity: 1;
    }    
  }
}
/* end .squaredTwo */
/* carousel */
#quote-carousel {
  padding: 0 10px 30px 10px;
  
  text-align:center;
color:black;
}
/* indicator position */
#quote-carousel .carousel-indicators {
  right: 50%;
  top: auto;
  bottom: -10px;
  margin-right: -19px;
}
/* indicator color */
#quote-carousel .carousel-indicators li {
  background: #c0c0c0;
}
/* active indicator */
#quote-carousel .carousel-indicators .active {
  background: #333333;
  height:10px;
  width:10px;
  margin-bottom:1px;
}
/* typography */
h1 {
  text-align:center;
  margin-bottom:-20px !important;
}
p {
  
}
</style>
    
 </body>
</html>
