<?php
session_start();
include_once 'indiator_admin/buslogic.php';
include_once 'includes/domain.php';
if(isset($_POST["btnsearch"])) {
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
  header("location:$loc/$cat/$location/$category");
}
?>
<!doctype html>

<html>
	
<head>
    <title>Holiday Packages,Tour Packages in India #1 Tours &amp; Travel Portal</title>
   
    <meta charset="utf-8">
    <meta name="keywords" content="Holiday Packages, Tour Packages, Vacation Packages,Holiday Packages in India,Tour Packages in India">
    <meta name="description" content="Indiator provides a wide range of India tour packages categorized into various sections across the country, some of them are Holiday Packages in India.">
<?php include_once 'includes/header.php';?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'/>
<link rel="icon" href="favicon.ico" type="image/x-icon">

        <link href="<?php echo $domain; ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/animate.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/settings_slide2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/travel-mega-menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/jquery.bxslider.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/meteo/example.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/layout2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/responsive.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo $domain; ?>select2/select2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $domain; ?>css/feature.css" rel="stylesheet" type="text/css" />

         <style type="text/css">
          .select2{
            color:black;
          }
          .select2-results__option{
            color:black;
          }
.mybtn{
border-radius: 0;
    padding: 8px 10px;
    text-align: center;
    font-weight: 600;
    border-bottom: 0 solid transparent;
    color: white;
    background: #EC971F;
}
.trip-discount{
padding:5px 10px !important;
margin-left:0px !important;
margin-top:0px !important;
}
.mp{
  color: white; 
  
  font-size: 15px;
  margin: 10px 0 0 10px;
  
  overflow: hidden;
  
  animation: type 4s steps(60, end); 
}


.mp{
  animation: blink 2s ;
}

@keyframes type{ 
  from { width: 0; } 
} 

@keyframes type2{
  0%{width: 0;}
  50%{width: 0;}
  100%{ width: 100; } 
} 

@keyframes blink{
  to{opacity: .0;}
}

         </style>


</head>
	<body>
<?php include_once("analyticstracking.php") ?>

    <div id="loader-wrapper">
        <div id="loader"></div> 
    </div> 
    
           
       

    <?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
      <section class="top-content">
        <div class="container-slider removeslide img-responsive" style="background-image:url('<?php echo $domain; ?>images/slider/s4.jpg')">
          <div class="container-reservation inside-slider">
           <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                       <!-- Reservation form -->
                            <section id="reservation-form" class="reservation-color-form pos-inside-slide" >
                              <div class="container-form-chose">
                                  <div class="col-md-12">  
                                   <div class="reservation-tabs">
                                        <div id="message"><h3></h3></div>
                                       
                                    </div>
                                    <div class="tab-content">
                                    <form id="hotels-tab" class="tab-pane form-inline reservation-hotel active" onsubmit="return ValData()"  method="post" name="reservationform" action="">
                                      <div class="row">
                                        
                                       
                                        <div class="col-sm-12 step-who" style="padding-left:0">
                                          <div class="row" style="background-image: url(images/orange-bg.png); margin-bottom: 40px;">
                                            <h2 style="font-size: 60px; color:white; font-weight:bold;text-transform:uppercase;"><center>Indiator</center></h2>
                                            <center><p class="mp">INDIA’S #1 TRANSFERS, THINGS TO DO, ACTIVITY N TOURS PORTAL</p></center>
                                          </div>

                                           <div class="row" style="background-color:white;" >
                                            
                                          </div>
                                          <div class="row" >
                                            
                                            <div class="col-md-12 col-sm-6" style="background-image: url(images/white-bg.png);">
                                            <h2 style="font-size: 18px; color:#3276B1; font-weight:bold;padding:5px;"><center>Start Planning</center></h2>
                                            <div class="col-sm-4 room-book" style="padding-left:0">
                                              <div class="form-group">
                                                
                                                 
                                                  <?php
                                                        $obj=new clscity();
                                                        $a=$obj->disp_rec();
                                                        if(count($a)>0)
                                                          echo "<select class='form-control select2' name=location id=city required=required >";
                                                           echo  "<option value >Choose your City</option>";
                                                        for($i=0;$i<count($a);$i++)
                                                        {
                                                        if($a[$i][0]==0)
                                                        {
                                                      echo "";
                                                         }
                                                        else
                                                        {
                                                      echo "<option value=".$a[$i][0].">".$a[$i][1]."</option>";
                                                         }
                                                    }
                                                    ?>
                                                  
                                                </select>
                                              </div>
                                            </div>

                                            <div class="col-sm-4 adult-book">
                                              <div class="form-group">
                                                <div class="guests-select">
                                                
                                                        
                                                         <?php
                                                            $obj=new clscat();
                                                            $arr=$obj->disp_rec();
                                                            if(count($arr)>0)
             
                                                                 echo "<select id=cat class=form-control name=category>";
                                                             
                                                            for($j=0;$j<count($arr);$j++)
                                                            {
                                                            if($arr[$j][0]==0)
echo " <option value=".$arr[$j][0]." selected=selected >".$arr[$j][1]."</option>";
else
                                                          echo "<option value=".$arr[$j][0].">".$arr[$j][1]."</option>";
                                                        }
                                                        ?>
                                                      </select>
                                                      <?php
                                                     
                                                    ?>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-4 child">
                                              
                                          <input type="submit" class="btn btn-primary btn-block" onsubmit="return ValData()" name="btnsearch" value="Search Tours">   
                                          <h3 id="msg"></h3>                                  
                                            </div>
                                           
                                          </div>
                                          
                                          </div>
                                         
                                        </div>
                                        
                                      </div>
                                    </form>
                                    
                                    </div>

                                  </div>
                                
                              </div>
                      </section>
              </div>

            </div>
             <div class="row" >
              <div class="col-md-2"></div>
                <div class="col-md-2"></div>
              </div>
           </div>
           </div>
           <div class="home-page removeslide">
             <!-- SLIDER -->
                <div class="fullwidthbanner-container">
                    <div class="fullwidthbanner">
                        <ul>
                            <!-- FADE -->
                            <li data-transition="fade" data-slotamount="10" data-thumb="">
                                <img src="<?php echo $domain; ?>images/slider/s4.jpg" alt="Holiday Packages in India"/>
                            </li>

                            <!-- SLIDEUP -->
                            <li data-transition="slideup" data-slotamount="7" data-thumb="">
                                <img src="<?php echo $domain; ?>images/slider/slides.jpg" alt="Vacation packages"/>
                            </li>

                            <!-- SLIDEDOWN -->
                            <li data-transition="slidedown" data-slotamount="7" data-thumb="">
                                <img src="<?php echo $domain; ?>images/slider/slider4.jpg" alt="Book tour packages india"/>
                            </li>
                           
                            
                        </ul>
                        <div class="tp-bannertimer"></div>
                    </div>
                </div>
                <!-- SLIDER END -->
           </div>
        </div>
</section>



<!-- TOP OFFERTS -->

<section id="top-offerts" class='home4-section box-tr-square' style="background-image:url('https://indiator.com/images/bg.jpg')">
   <div class="container">
      <div class="row">
         <div class="col-md-12 effect-5 effects">
            
               <div class="text-center top-txt-title" style="margin-top: 0px;">
                    <h1 style="color:white;">Holiday Tour Packages</h1>
                     <div class="separator">
                      <div class="separator-style"></div>
                    </div>
                   
           </div>
                <!-- FIFTH EXAMPLE -->
                <div class="col-md-4 view view-fifth">
                    <figure class="triggerAnimation animated" data-animate="fadeInDown">
<h2>DAY TRIPS & EXCURSIONS</h2>
                        <div class="img">
                            <img src="<?php echo $domain; ?>images/trip/trip1.jpg" alt="Vacation Tour packages in india
"/>
                            
                        </div>
                     </figure>
                    <div class="mask">
                        <div class="main">
                          
                            <div><center><a href="<?php echo $domain;?>All-Cities/Day-Trips-and-Excursions/0/3" class="help-bt">Start Planning</a></center></div>
                        </div>
                       <div class="content">
                          <p><span>Economical and optimal tours for same day sightseers. Indiator gives you the perfect chance to explore the nearby places in an economical, optimal and planned manner for same day sightseers.</p>
                          
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 view view-fifth">
                    <figure class="triggerAnimation animated" data-animate="fadeInDown">
<h2>AIRPORT TRANSFER</h2>
                        <div class="img">
                            <img src="<?php echo $domain; ?>images/trip/trip2.jpg" alt="India tour packages"/>
                           
                        </div>
                    </figure>
                    <div class="mask">
                        <div class="main">
                         
                         <div><center><a href="<?php echo $domain;?>All-Cities/Airport-or-Railway-Transfer/0/6" class="help-bt">Start Planning</a></center></div>
                        </div>
                       <div class="content">
                          <p>Reliable, Timely and Reasonable Airport Transfer for all conurbations over India. We process a combo of honesty, perfectly maintained vehicles, trained chauffeurs and 24*7 support system to our clients.</p>
                          
                      
                        </div>
                    </div>
                </div>
                <div class="col-md-4 view view-fifth">
                    <figure class="triggerAnimation animated" data-animate="fadeInDown">
<h2>MULTI DAYS TOUR</h2>
                       <div class="img">
                            <img src="<?php echo $domain; ?>images/trip/trip3.jpg" alt="Book Holiday Packages"/>
                            
                        </div>
                     </figure>
                    <div class="mask">
                        <div class="main">
                         
                           <div><center><a href="<?php echo $domain;?>All-Cities/Multi-Days-Tours/0/2" class="help-bt">Start Planning</a></center></div>
                        </div>
                       <div class="content">
                          <p><span>Perfectly customized and cost-effective multiple day tours and activities over 50 cities in India all year round. The travelers will discover the region in a more structured and planned way with us.</p>
                         
                        
                        </div>
                    </div>
                </div>
            </div><!--Close col 12 -->
        </div>
    </div>
 </section>   

 

  <section class="page-section pb-0" >
       <div class="text-center" style="margin-top: 40px;">
                    <h2>Best Selling Tour Packages</h2><br>
                    <div class="separator">
                      <div class="separator-style"></div>
                    </div>
                   
     			 </div>
        <div class="features-tours-full-width">
          <div class="features-tours-wrap clearfix">
            <div class="features-tours-item" style="padding: 10px;">
              <div class="features-media"><img src="https://indiator.com/images/feature/kerala.jpg" alt>
                <div class="features-info-top">
                  <div class="info-price font-4"><span></span>Starts from $29</div>
                 
                  <p class="info-text">Book Your Kerala Tour Package @ best Price!</p>
                </div>
                <div class="features-info-bot">
                  <h4 class="title"><span class="font-4"></span>Kerala</h4><a href="https://indiator.com/Kerala/All-Tour-Packages/15/0" class="btn btn-warning" style="float:right;">Book Now</a>
                </div>
              </div>
            </div>
            <div class="features-tours-item" style="padding: 10px;">
              <div class="features-media"><img src="https://indiator.com/images/feature/bangalore.jpg" data-at2x="https://indiator.com/indiator_admin/uploads/22.jpg" alt>
                <div class="features-info-top">
                  <div class="info-price font-4"><span></span>Starts from $49</div>
                 
                  <p class="info-text">Book Your Bangalore Tour Package @ best Price!</p>
                </div>
                <div class="features-info-bot">
                  <h4 class="title"><span class="font-4"></span> Bangalore</h4><a href="https://indiator.com/Bangalore/All-Tour-Packages/9/0" class="btn btn-warning" style="float:right;">Book Now</a>
                </div>
              </div>
            </div>
            <div class="features-tours-item" style="padding: 10px;">
              <div class="features-media"><img src="https://indiator.com/images/feature/amritsar.jpg" data-at2x="https://indiator.com/indiator_admin/uploads/22.jpg" alt>
                <div class="features-info-top">
                  <div class="info-price font-4"><span></span>Starts from $24</div>
                  
                  <p class="info-text">Book Your Amritsar Tour Package @ best Price!</p>
                </div>
                <div class="features-info-bot">
                  <h4 class="title"><span class="font-4"></span> Amritsar</h4><a href="https://indiator.com/Amritsar/All-Tour-Packages/11/0" class="btn btn-warning" style="float:right;">Book Now</a>
                </div>
              </div>
            </div>
            <div class="features-tours-item" style="padding: 10px;">
              <div class="features-media"><img src="https://indiator.com/images/feature/jaipur.jpg" data-at2x="pic/tours/4@2x.jpg" alt>
                <div class="features-info-top">
                  <div class="info-price font-4"><span></span>Starts from $29</div>
                 
                  <p class="info-text">Book Your Jaipur Tour Package @ best Price!</p>
                </div>
                <div class="features-info-bot">
                  <h4 class="title"><span class="font-4"></span> Jaipur</h4><a href="https://indiator.com/Jaipur/All-Tour-Packages/12/0" class="btn btn-warning" style="float:right;">Book Now</a>
                </div>
              </div>
            </div>
            <div class="features-tours-item" style="padding: 10px;">
              <div class="features-media"><img src="https://indiator.com/images/feature/agra.jpg" data-at2x="pic/tours/5@2x.jpg" alt>
                <div class="features-info-top">
                  <div class="info-price font-4"><span></span>Starts from $35</div>
                  
                  <p class="info-text">Book Your Agra Tour Package @ best Price!</p>
                </div>
                <div class="features-info-bot">
                  <h4 class="title"><span class="font-4"></span> Agra</h4><a href="https://indiator.com/Agra/All-Tour-Packages/10/0" class="btn btn-warning" style="float:right;">Book Now</a>
                </div>
              </div>
            </div>
            <div class="features-tours-item" style="padding: 10px;">
              <div class="features-media"><img src="https://indiator.com/images/feature/delhi.jpg" data-at2x="pic/tours/6@2x.jpg" alt>
                <div class="features-info-top">
                  <div class="info-price font-4"><span></span>Starts from $24</div>
                  
                  <p class="info-text">Book Your Delhi Tour Package @ best Price!</p>
                </div>
                <div class="features-info-bot">
                  <h4 class="title"><span class="font-4"></span>Delhi </h4><a href="https://indiator.com/Delhi/All-Tour-Packages/8/0" class="btn btn-warning" style="float:right;">Book Now</a>
                </div>
              </div>
            </div>
            <div class="features-tours-item" style="padding: 10px;">
              <div class="features-media"><img src="https://indiator.com/images/feature/hyderabad.jpg" data-at2x="pic/tours/7@2x.jpg" alt>
                <div class="features-info-top">
                  <div class="info-price font-4"><span></span>Starts from $29</div>
                  
                  <p class="info-text">Book Your Hyderabad Tour Package @ best Price!</p>
                </div>
                <div class="features-info-bot">
                  <h4 class="title"><span class="font-4"></span> Hyderabad</h4><a href="https://indiator.com/Hyderabad/All-Tour-Packages/18/0" class="btn btn-warning" style="float:right;">Book Now</a>
                </div>
              </div>
            </div>
            <div class="features-tours-item" style="padding: 10px;">
              <div class="features-media"><img src="https://indiator.com/images/feature/varanasi.jpg" data-at2x="pic/tours/8@2x.jpg" alt>
                <div class="features-info-top">
                  <div class="info-price font-4"><span></span>Starts from $12</div>
                  
                  <p class="info-text">Book Your Varanasi Tour Package @ best Price!</p>
                </div>
                <div class="features-info-bot">
                  <h4 class="title"><span class="font-4"></span> Varanasi</h4><a href="https://indiator.com/Varanasi/All-Tour-Packages/49/0" class="btn btn-warning" style="float:right;">Book Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>    

<section id="top-team">
   <div class="container">
     
          <!--Counter -->
          <div class="row">
			    <div class="col-md-12 content-number-left">
                    <div class="col-md-3 number-structure-left">
                        <div class="col-xs-4 count-ico n-color3">
                            <i class="fa fa-smile-o"></i>
                        </div>
                        <div class="col-xs-8 n-number">
                            <span class="counter" style="display: inline-block;">3000 </span>
                            <p>Satisfied Customers</p>
                        </div>            
                    </div>
                    <div class="col-md-3 number-structure-left">
                        <div class="col-xs-4 count-ico n-color1">
                            <i class="fa fa-plane"></i>
                        </div>
                        <div class="col-xs-8 n-number">
                            <span class="counter" style="display: inline-block;">1050 </span>
                            <p>Tour Packages</p>
                         </div>           
                    </div>
                    <div class="col-md-3 number-structure-left">
                    <div class="col-xs-4 count-ico n-color2">
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="col-xs-8 n-number">
                        <span class="counter" style="display: inline-block;">50 </span>
                        <p>Offices in India</p>
                     </div>           
                    </div>
                    
                    <div class="col-md-3 number-structure-left">
                    <div class="col-xs-4 count-ico n-color4">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="col-xs-8 n-number">
                        <span class="counter" style="display: inline-block;">1000 </span>
                        <p>Customer Reviews</p>
                    </div>            
                    </div>
                </div>	
            </div>

        </div>
        
</section>      
  

<section class='parallax-home' style="background-image:url('https://indiator.com/images/global-map.jpg');">
    <div class="container">
      <div class="row">
      <div class="col-md-4 middle-text-adv" style="background-color:rgba(0,0,0,.6);">
         <h3 style="margin-top:12px;">Why Indiator</h3>
         <div class="line-left"></div>
<p><b>INDIATOR</b> as the name comprises ‘India Tour’, we provide efficient, customized Tour packages in India to our customers from India or abroad. 
<br><br>
<b>INDIATOR</b> provides a wide range of tour packages categorized into various sections across the country, some of them are Holiday Packages in India, Honeymoon packages, Spiritual tour packages, Adventure tour packages and many more travel packages in India.
<br><br>
We give our customers an unforgettable experience, hassle-free services, safety & comfortability throughout our tour package and economical rates. </p>

         
      </div>
        <div class='col-md-8'>
           <div class='col-md-6'>
              <div class='grid-info'>
                <div class='grid-icon'><i class="fa fa-users"></i></div>
                <h5 class="grid-title ">OUR TEAM</h5>
                <div class="grid-desc"><p>We have a team of highly inspiring and proficient experts. We promise to provide seamless services to our clients when they are distant from home.</p></div>
             </div>
           </div>   
           <div class='col-md-6'>
              <div class='grid-info'>
                <div class='grid-icon'><i class="fa fa-unlock-alt"></i></div>
                <h5 class="grid-title ">TRUST AND SECURITY</h5>
                <div class="grid-desc"><p>We earned the trust of our clients by our way of being, not by dint of outside glistening and  adroit conversation.</p></div>
              </div>
           </div>
        
           <div class='col-md-6'>
             <div class='grid-info'>
                <div class='grid-icon'><i class="fa fa-map-marker"></i></div>
                <h5 class="grid-title ">WHO WE ARE ?</h5>
                <div class="grid-desc"><p>We customized your fantasy destination, bestow at your expectation…</p></div>
             </div>
           </div>
         
           <div class='col-md-6'>
             <div class='grid-info'>
                <div class='grid-icon'><i class="fa fa-futbol-o"></i></div>
                <h5 class="grid-title ">BEST SERVICES</h5>
                <div class="grid-desc"><p>We promise you to render perfectly customized tours and indelible experience of the destinations. </p></div>
             </div>
           </div>
        </div>
     </div>
    </div>
 </section>  

<!-- <section id="parallax_slide">
   <div class="effect-over">
             <div class="bx-about2 noshadow">
                <ul class="bxslider all-info-trip">
                            <li>
                           <img src="images/trip/c2.jpg" alt="#1 Travel Portal"/><div class="cover-slide-trip"></div>
                             <div class="trip-slide-price col-md-5">
                                <div class="trip-slide-text prague">Group Tours 
                                
                                <a href="#" class="btn btn-primary btn-gallery">Buy Now</a></div>
                                <p>Nestled between the Caribbean, the South Pacific, and the South Atlantic Oceans, South America is the wilder of the Americas, and a continent of superlatives...</p>
                                <div class="col-md-4 trip-option">
                                    <ul>
                                        <li><p><i class="fa fa-plane"></i> Fly</p></li>
                                        <li><p><i class="fa fa-bus"></i> Transport</p></li>
                                        <li><p><i class="fa fa-bed"></i> Accomodation</p></li>
                                        <li><p><i class="fa fa-wifi"></i> WiFi</p></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 trip-option">
                                    <ul>
                                        <li><p><i class="fa fa-taxi"></i> Taxi</p></li>
                                        <li><p><i class="fa fa-male"></i> Services</p></li>
                                        <li><p><i class="fa fa-bed"></i> Accomodation</p></li>
                                        <li><p><i class="fa fa-briefcase"></i> Bagage</p></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 trip-option">
                                    <ul>
                                        <li><p><i class="fa fa-beer"></i> Beer</p></li>
                                        <li><p><i class="fa fa-bus"></i> Transport</p></li>
                                        <li><p><i class="fa fa-battery-quarter"></i> Charger</p></li>
                                        <li><p><i class="fa fa-wifi"></i> WiFi</p></li>
                                    </ul>
                                </div>
                             </div>
                        </li>
                        <li>
                           <img src="images/trip/c1.jpg" alt="Online Booking"/><div class="cover-slide-trip"></div>
                             <div class="trip-slide-price col-md-5">
                                <div class="trip-slide-text " style="font-size:70px !important;  ">Fixed Departure 
                                <a href="#" class="btn btn-primary btn-gallery">Buy Now</a>
                                
                                </div>
                                <p>Nestled between the Caribbean, the South Pacific, and the South Atlantic Oceans, South America is the wilder of the Americas, and a continent of superlatives...</p>
                                <div class="col-md-4 trip-option">
                                   <div class="slide-travel-img">
                                        
                                        <div class="title">Best Services</div>
                                        <img class="star-level" src="images/5star.png" alt="Booking"/>
                                        <p>Nunc congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus.</p>
                                   </div>
                                </div>
                                <div class="col-md-4 trip-option">
                                    <div class="slide-travel-img">
                                        
                                        <div class="title">Heppy Travel</div>
                                        <img class="star-level" src="images/5star.png" alt="Day trip & excursion"/>
                                        <p>Nunc congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus.</p>
                                   </div>
                                </div>
                                <div class="col-md-4 trip-option">
                                    <div class="slide-travel-img">
                                        
                                        <div class="title">Best Hotel</div>
                                        <img class="star-level" src="images/5star.png" alt="Best Deals"/>
                                        <p>Nunc ongue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus.</p>
                                   </div>
                                </div>
                             </div>
                        </li>
                        
                      </ul>
             </div>
    </div>
</section>
 -->
<!--Banner Last Minute-->


<?php include("includes/footer.php"); ?>

<script type="text/javascript">
$(document).ready(function ($) {

   $(".select2").select2();
     });
</script>
<script src="<?php echo $domain; ?>select2/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>select2/select2.min.js" type="text/javascript"></script>

  </body>

</html>