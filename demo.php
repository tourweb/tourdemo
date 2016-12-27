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
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'/>


        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/settings_slide2.css" rel="stylesheet" type="text/css" />
        <link href="css/travel-mega-menu.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery.bxslider.css" rel="stylesheet" type="text/css" />
        <link href="css/meteo/example.css" rel="stylesheet" type="text/css" />
        <link href="css/layout2.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
        .find_short_tour {
    width: 715px;
    margin: 0 auto;
    display: block;
    clear: both;
}
.indiator_banner {
    background: url(images/orange-bg.png);
    text-align: center;
    margin-bottom: 5px;
} 
.indiator_banner .txt {
    font-weight: bold;
    color: #fff;
    font-size: 100px;
    text-shadow: 8px 0px 0px #fff,-1px -1px 0 #E17647, 1px -1px 0 #E17647, -1px 1px 0 #E17647, 1px 1px 0 #E17647;
}
.indiator_banner span {
    padding: 2%;
    width: 96%;
    text-transform: uppercase;
}
.indiator_banner .bottom {
    background: #fff;
    font-size: 16px;
    font-weight: normal;
    color: #DA541A;
}

.find_short_tour_Area {
    padding: 2% 2% 3% 2%;
    width: 96%;
    background: url(images/white-bg.png);
    display: inline-block;
    margin-bottom: 50px;
}

.find_short_tour_Area h2 {
    font-size: 24px;
    color: #4d4d4d;
    margin: 10px 0;
    padding: 0;
    font-weight: normal;
    text-transform: uppercase;
}




        </style>
</head>
	<body>

    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>

    <!-- Section Form Login and Register -->
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
	
	
      <section class="top-content">
        <div class="container-slider removeslide">
          <div class="container-reservation inside-slider">
           <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                       <!-- Reservation form -->
                            <section id="reservation-form" class="reservation-color-form pos-inside-slide">
                              <div class="container-form-chose">
                                  <div class="col-md-12">  
                                      <div class="find_short_tour">
                  <div class="indiator_banner">
                      <span class="txt">Indiator</span>
                      <span class="bottom">India’s #1 Transfers, Things to Do, <b>Activity N Day Tours</b> Portal</span>
                    </div>
                    <div class="find_short_tour_Area">
                      <h2>Find a Short Tour</h2>
                        <div>
                          <form name="findtour" method="get" action="https://indiator.com/popular-attraction.php">
                            <select name="location" class="large">
                                <option value="0">Choose your city</option>
                                <option value="delhi">New Delhi</option>
                                <option value="jaipur">Jaipur</option>
                                <option value="bangalore">Bangalore</option>
                                <option value="chennai">Chennai</option>
                                <option value="goa">Goa</option>
                                <option value="hyderabad">Hyderabad</option>
                                <option value="kolkata">Kolkata</option>
                                <option value="mumbai">Mumbai</option>
                                <option value="faridabad">Faridabad</option>
                                <option value="gurgaon">Gurgaon</option>
                                <option value="pune">Pune</option>
                                <option value="agra">Agra</option>
                                <option value="tundla">Tundla</option>
                                <option value="ahmedabad">Ahmedabad</option>
                                <option value="amritsar">Amritsar</option>
                                
                                <option value="udaipur">Udaipur</option>
                            </select>
                            <select name="services">
                                <option value="0">All</option>
                                <option value="same-days">Same day &amp; Activity Tours</option>
                                <option value="multi-days">Multi Days Tours</option>
                                <option value="transfer-airport-train">Transfer - Airport/Train</option>
                                <option value="multi-days-fixed">Fixed Departure</option>
                            </select>
                            <input type="submit" name="" value="SEARCH">
                        </form>                        </div>
                    </div>
                </div>
                                  
                                  </div>
                                
                              </div>
                      </section>
              </div>
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
                                <img src="images/slider/slider.jpg" alt=""/>
                            </li>

                            <!-- SLIDEUP -->
                            <li data-transition="slideup" data-slotamount="7" data-thumb="">
                                <img src="images/slider/slider1.jpg" alt=""/>
                            </li>

                            <!-- SLIDEDOWN -->
                            <li data-transition="slidedown" data-slotamount="7" data-thumb="">
                                <img src="images/slider/slider2.jpg" alt=""/>
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

<section id="top-offerts" class='home4-section box-tr-square'>
   <div class="container">
      <div class="row">
         <div class="col-md-12 effect-5 effects">
            
               <div class="text-center top-txt-title">
                    <h2>Tours and Transfers</h2>
                     <div class="separator">
                      <div class="separator-style"></div>
                    </div>
                    <p>Best deals for business travellers and weekend gateway seekers.</p>
           </div>
                <!-- FIFTH EXAMPLE -->
                <div class="col-md-4 view view-fifth">
                    <figure class="triggerAnimation animated" data-animate="fadeInDown">
                        <div class="img">
                            <img src="images/trip/11.jpg" alt=""/>
                            <div class="overlay">
                              <div class="expand discount">
                                <a href="#" class="expand discount">Details</a>
                                
                              </div>
                            </div>
                        </div>
                     </figure>
                    <div class="mask">
                        <div class="main">
                          <div class="trip-title"><h3>SAME DAY TOURS</h3><br /><p>ACTIVITY</p></div>
                          <div class="price"><p>From</p>€ 499</div>
                        </div>
                       <div class="content">
                          <p><span>Best deals for business travellers and weekend gateway seekers.</p>
                          <div class="row">
                            <div class="col-xs-6">
                              <ul class="list-unstyled">
                                <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                <li><i class="fa fa-check-circle"></i> Private balcony</li>
                                <li><i class="fa fa-check-circle"></i> Sea view</li>
                              </ul>
                            </div>
                            <div class="col-xs-6">
                              <ul class="list-unstyled">
                                <li><i class="fa fa-check-circle"></i> Free Wi-Fi</li>
                                <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                <li><i class="fa fa-check-circle"></i> Bathroom</li>
                              </ul>
                            </div>
                          </div>
                          <a href="details.html" class="btn btn-primary btn-block">Learn More</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 view view-fifth">
                    <figure class="triggerAnimation animated" data-animate="fadeInDown">
                        <div class="img">
                            <img src="images/trip/44.jpg" alt=""/>
                            <div class="overlay">
                                <a href="#" class="expand discount">Details</a>
                               
                            </div>
                        </div>
                    </figure>
                    <div class="mask">
                        <div class="main">
                          <div class="trip-title"><h3>AIRPORT TRANSFER</h3><br /><p>DESTINATION</p></div>
                          <div class="price"><p>From</p>€ 799</div>
                        </div>
                       <div class="content">
                          <p>Reliable private car Airport / Railway station transfers for all major Indian cities.</p>
                          <div class="row">
                            <div class="col-xs-6">
                              <ul class="list-unstyled">
                                <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                <li><i class="fa fa-check-circle"></i> Private balcony</li>
                                <li><i class="fa fa-check-circle"></i> Sea view</li>
                              </ul>
                            </div>
                            <div class="col-xs-6">
                              <ul class="list-unstyled">
                                <li><i class="fa fa-check-circle"></i> Free Wi-Fi</li>
                                <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                <li><i class="fa fa-check-circle"></i> Bathroom</li>
                              </ul>
                            </div>
                          </div>
                          <a href="details.html" class="btn btn-primary btn-block">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 view view-fifth">
                    <figure class="triggerAnimation animated" data-animate="fadeInDown">
                       <div class="img">
                            <img src="images/trip/22.jpg" alt=""/>
                            <div class="overlay">
                                <a href="#" class="expand discount">Details</a>
                                
                            </div>
                        </div>
                     </figure>
                    <div class="mask">
                        <div class="main">
                          <div class="trip-title"><h3>MULTI DAYS TOUR</h3><br /><p>LEISURE</p></div>
                          <div class="price"><p>From</p>€ 270</div>
                        </div>
                       <div class="content">
                          <p><span>An exciting collection of short tours and activities for over 50 cities in India.</p>
                          <div class="row">
                            <div class="col-xs-6">
                              <ul class="list-unstyled">
                                <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                <li><i class="fa fa-check-circle"></i> Private balcony</li>
                                <li><i class="fa fa-check-circle"></i> Sea view</li>
                              </ul>
                            </div>
                            <div class="col-xs-6">
                              <ul class="list-unstyled">
                                <li><i class="fa fa-check-circle"></i> Free Wi-Fi</li>
                                <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                <li><i class="fa fa-check-circle"></i> Bathroom</li>
                              </ul>
                            </div>
                          </div>
                          <a href="details.html" class="btn btn-primary btn-block">Learn More</a>
                        </div>
                    </div>
                </div>
            </div><!--Close col 12 -->
        </div>
    </div>
 </section>   

 <section class='parallax-home'>
    <div class="container">
      <div class="row">
      <div class="col-md-4 middle-text-adv" style="background-color:rgba(0,0,0,.6);">
         <h3>Why Indiator</h3>
         <div class="line-left"></div>
         <p>IndiaTor is India's leading provider for short tours, Things to do, Ground Transportation, Guided Tours, Cooking classes & activity tours across the India.</p>
         <p>IndiaTor is unit of "My Flight Trip"which is leading Supplier for B2B agents around the world for India Destination.<br><br></p>
      </div>
        <div class='col-md-8'>
           <div class='col-md-6'>
              <div class='grid-info'>
                <div class='grid-icon'><i class="fa fa-taxi"></i></div>
                <h5 class="grid-title ">TAXI DISCOUNT</h5>
                <div class="grid-desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p></div>
             </div>
           </div>   
           <div class='col-md-6'>
              <div class='grid-info'>
                <div class='grid-icon'><i class="fa fa-unlock-alt"></i></div>
                <h5 class="grid-title ">TRUST AND SECURITY</h5>
                <div class="grid-desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p></div>
              </div>
           </div>
        
           <div class='col-md-6'>
             <div class='grid-info'>
                <div class='grid-icon'><i class="fa fa-cutlery"></i></div>
                <h5 class="grid-title ">BEST FOOD</h5>
                <div class="grid-desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p></div>
             </div>
           </div>
         
           <div class='col-md-6'>
             <div class='grid-info'>
                <div class='grid-icon'><i class="fa fa-futbol-o"></i></div>
                <h5 class="grid-title ">BEST SERVICES</h5>
                <div class="grid-desc"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p></div>
             </div>
           </div>
        </div>
     </div>
    </div>
 </section>         

<section id="parallax_slide">
   <div class="effect-over">
             <div class="bx-about2 noshadow">
                <ul class="bxslider all-info-trip">
                            <li>
                           <img src="images/trip/c2.jpg" alt=""/><div class="cover-slide-trip"></div>
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
                           <img src="images/trip/c1.jpg" alt=""/><div class="cover-slide-trip"></div>
                             <div class="trip-slide-price col-md-5">
                                <div class="trip-slide-text ">Fixed Departure 
                                
                                
                                </div><a href="#" class="btn btn-primary btn-gallery">Buy Now</a>
                                <p>Nestled between the Caribbean, the South Pacific, and the South Atlantic Oceans, South America is the wilder of the Americas, and a continent of superlatives...</p>
                                <div class="col-md-4 trip-option">
                                   <div class="slide-travel-img">
                                        
                                        <div class="title">Best Services</div>
                                        <img class="star-level" src="images/5star.png" alt=""/>
                                        <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus.</p>
                                   </div>
                                </div>
                                <div class="col-md-4 trip-option">
                                    <div class="slide-travel-img">
                                        
                                        <div class="title">Heppy Travel</div>
                                        <img class="star-level" src="images/5star.png" alt=""/>
                                        <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus.</p>
                                   </div>
                                </div>
                                <div class="col-md-4 trip-option">
                                    <div class="slide-travel-img">
                                        
                                        <div class="title">Best Hotel</div>
                                        <img class="star-level" src="images/5star.png" alt=""/>
                                        <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus.</p>
                                   </div>
                                </div>
                             </div>
                        </li>
                        
                      </ul>
             </div><!--Close col-md-12-->
    </div>
</section>

<!--Banner Last Minute-->
<section class='last-minute-banner bb-blue'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                 <div class='col-sm-8 col-md-8'>
                    <h1 class="l-main-banner-title">Deal to Watch </h1>
                    <p class="l-main2-banner-title">Visit Lotus Temple form of a white half-opened lotus flower.</p>
                    <p class="l-main2-banner-title">A DAY IN GOA</p>
                 </div>
                 <div class="col-sm-4 col-md-4"><img src="images/lotus-temple.jpg" class="img-responsive"></div>
                </div>
            </div>
        </div>
</section>
<section class="section-parthners-info">
        <div class="container">
           <div class="row">
             <div class="col-md-12 parthners">
                <div class="text-center">
                    <h2>OUR PARTNERS</h2>
                    <div class="separator">
                      <div class="separator-style"></div>
                    </div>
                   
           </div>
                 <div class=" col-md-3">
                    
                </div>
                <div class="col-xs-4 col-md-2">
                    <img src="images/client/asta.png" alt="" />
                </div>
                <div class="col-xs-4 col-md-2">
                  
                    <img src="images/client/iso.png" alt="" />
                     
                </div>
                <div class="col-xs-4 col-md-2">
                   <img src="images/client/tripadvisor.png" alt="" />
                </div>
               <div class="col-md-3">
                    
                </div>
             </div><!--Close col-md-12-->
           </div>
        </div>
</section>
<?php include("includes/footer.php"); ?>
  </body>

<!-- Mirrored from www.theme-oxygen.com/envato/travego/preview/homepage3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Sep 2016 04:44:11 GMT -->
</html>