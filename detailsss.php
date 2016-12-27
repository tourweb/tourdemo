<?php
session_start();
include("indiator_admin/buslogic.php");
$cityid=$_REQUEST["tour_city_id"];
$catid=$_REQUEST["tour_cat_id"];
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
        <link rel="stylesheet" href="js/jquery-ui.css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/slick.css">
        <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
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
        </style>
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
       <div class="container">
          <?php include("short_tour.php"); ?>
      </div>
    </section>
<section id="top-list-trip">
   <div class="container">
      <div class="row">
         <div class="col-sm-4 col-md-3">
                <div class="search-results-title"><i class="fa fa-search"></i><p> Search Box</p></div>
               <article class="blog-category" style="padding-left: 10px;padding-top: 10px;padding-bottom: 10px;">
                    <h4 style="color:#3276B1;">All Tour Categories</h4>
            
            <div>
             <form name="" method="post">
                            <?php
                               $obj=new clscat();
                                $arrc=$obj->disp_rec();
                                if(count($arrc)>0)
                                {
                                for($c=0;$c<count($arrc);$c++)
                                {
                                ?>
               <div class="checkbox">
                <?php
                if($catid==$arrc[$c][0])
                { ?>
                  <h3><input type="checkbox" name="ck[]" value="<?php echo $arrc[$c][0]; ?>" checked ><?php echo $arrc[$c][1]; ?></h3>
                <?php } 
                else{ ?>
                            <h3><input type="checkbox" name="ck[]" value="<?php echo $arrc[$c][0]; ?>"><?php echo $arrc[$c][1]; ?></h3>
                        <?php } ?>
                        </div>
                            <?php } 
                        }?>
                        <input type="hidden" name="tour_city_id" value="<?php echo $cityid; ?>">
                     <input type="hidden" name="tour_cat_id" value="<?php echo $catid; ?>"> 
                        <input type="submit" class="btn btn-primary" name="btncat" Value="Show Results">
              </form>
            </div>
                </article>
           <article class="blog-help">
                    
                    <div class="title-help"><p>Need Help?</p></div>
                    <div class="help-txt">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since.</p>
                        <p class="help-phone"><i class="fa fa-phone"></i> +91 987 110 7030</p>
                    </div>
                </article>
         
            </div>
            
         <div class="col-sm-8 col-md-9 effect-5 effects">
            <div class="main-switcher">
                
        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                    <div class="txt-sort"><h3 class="desc-filter">
                        <?php
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select tb_cities.city_id,tb_cities.city_name from tb_cities INNER JOIN tb_tours ON tb_tours.tour_city_id=tb_cities.city_id where city_id=$cityid";
                        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
                        
                        $arr=array();
                        $i=0;

                        $r=mysqli_fetch_row($res);
                        $arr[$i]=$r;
                        echo $arr[0][1]; 
                        ?>

                        -  <?php
                        if($catid==0)
                        {
                          echo "All Tours";
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
            <a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid"><i class="fa fa-th-large"></i></a>
            <a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list"><i class="fa fa-th-list"></i></a>
          </div>
          <ul id="Grid" class="sandbox">
            <?php 
            if(isset($_POST["btncat"]))
            {
                        $s=array();
                        $s=$_POST["ck"];
                        $sel=implode(",",$s);
                        $cid=$_POST["tour_city_id"];
                       
                        $con=new clscon();
                        $link=$con->db_connect();
                        if($s==0)
                        {
                         $qry11="SELECT tour_id,tour_code,substring(tour_name,1,70) tour_name,substring(short_description,1,105) short_description from tb_tours where tour_city_id=$cid";  
                        }
                          else{
                        $qry11="SELECT tour_id,tour_code,substring(tour_name,1,70) tour_name,substring(short_description,1,105) short_description from tb_tours where tour_cat_id IN ($sel) and tour_city_id=$cid";
                         }                        
                        }
                        
                        else
                        {
                          $con=new clscon();
                          $link=$con->db_connect();
                          
                          if($catid==0){
                          $qry11="SELECT tour_id,tour_code,substring(tour_name,1,70) tour_name,substring(short_description,1,105) short_description from tb_tours where tour_city_id=$cityid";
                        }
                        else{
                          $qry11="SELECT tour_id,tour_code,substring(tour_name,1,70) tour_name,substring(short_description,1,105) short_description from tb_tours where tour_city_id=$cityid and tour_cat_id=$catid";
                        }
                        }
                        ?>
                        <?php
                        $res11=  mysqli_query($link,$qry11) or die(mysqli_error($link)); 

                        $arr11=array();
                        $cs=0;
                        if(mysqli_affected_rows($link)>=1)
                            {
                        while($r11=mysqli_fetch_array($res11))
                        {
                            
                            $arr11[$cs]=$r11;   
                           
                        ?>
                    <li class="mix category-3" data-value="1250">
                      <figure>
                                <div class="cbp-vm-image img">
                                    <?php
                                      $con=new clscon();
                                      $link=$con->db_connect();
                                      $qry4="select img1 from tb_images where tour_id=".$arr11[$cs][0];
                                      $res4=  mysqli_query($link, $qry4);
                                      $ar1=array();
                                      $y=0;
                                      while ($r4=  mysqli_fetch_row($res4))
                                      {
                                        $ar1[$y]=$r4;
                                        $y++;
                                    
                                      ?>
                                    <img src="indiator_admin/uploads/<?php echo $ar1[0][0]; ?>" alt=""/>
                                    <?php } ?>
                                    <div class="overlay">
                                        <a href="tour-details.php?tid=<?php echo $arr11[$cs][0];?>" class="expand">+</a>
                                        <a class="close-overlay hidden">x</a>
                                    </div>
                                    </div>
                
                <figcaption>
                                    <h3><?php echo $arr11[$cs][2];?></h3><br>
                                    
                                    <p><?php echo $arr11[$cs][3];?></p>
                                    <div class="price-night"><span>Price Starts from</span>
                                         <?php
                                          
                                          $con=new clscon();
                                          $link=$con->db_connect();
                                          $qry3="select price8 from tb_price where tour_id=".$arr11[$cs][0];
                                          $res3=  mysqli_query($link, $qry3);
                                          $ar=array();
                                          $x=0;
                                          while ($r3=  mysqli_fetch_row($res3))
                                          {
                                            $ar[$x]=$r3;
                                            $x++;
                                        
                                          ?>

                                        <span class="price-n"><?php echo "$ ".$ar[0][0]; } ?></span></div>   
                                    <a href="tour-details.php?tid=<?php echo $arr11[$cs][0];?>" class="btn btn-primary btn-gallery" target="blank">Read More</a>
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
        </div>
      </div>
    </div>
          
          </div>
        </div>
</section>  
      
        
<?php include("includes/footer.php"); ?>
  <script src="js/slick.js" type="text/javascript" charset="utf-8"></script>

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

<script type="text/javascript" src="js/waypoints.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!--Carousel-->
<script src="js/carousel/modernizr.custom.js" type="text/javascript"></script>
<script src="js/carousel/jquery.cbpContentSlider.min.js" type="text/javascript"></script>
 <script>
$(function () {
    "use strict";
    $('#cbp-contentslider').cbpContentSlider();
});
</script>
<!--List-->
<script src="js/list/cbpViewModeSwitch.js" type="text/javascript"></script>
<script src="js/list/classie.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>

<script src="js/list/jquery.mixitup.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    "use strict";
    $('#Grid').mixItUp();
});
</script>
 <script src="js/jquery-ui.js"></script>

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
</style>
 </body>
</html>