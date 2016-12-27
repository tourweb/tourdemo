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
        <link href="css/travel-mega-menu.css" rel="stylesheet" type="text/css" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" />
        <!--Carousel-->
        <link href="css/carousel/component.css" rel="stylesheet" type="text/css" />

        <link href="css/layout2.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp" type="text/javascript"></script>
<?php include_once 'includes/header.php';?>

</head>
	<body>

    <!-- Section Form Login and Register -->
    
<?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
    
    <section id="about2" class="about-section-top">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
               <div class="page-title pull-left">
                    <h2 class="title-about">Contact Us</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li>/</li>
                    <li>Contact Us</li>
                 
                </ul>
             </div>
          </div>
      </div>
    </section>
<section id="top-info-contact">
   <div class="container">
      <div class="row">
         <div class="contact-page col-md-12 effect-5 effects">
                 
                 <div class="contact-square info-square col-md-4">
                     <i class="fa fa-home"></i>
                     <h3>Address</h3>
                     <p>A-15,SECTOR-3 NOIDA U.P,INDIA-201301 </p>
                     
                 </div>
                 <div class="contact-square info-square col-md-4">
                     <i class="fa fa-phone"></i>
                     <h3>Phone</h3>
                    
                     <p>MOBILE: +91 987 110 7030</p>
                 </div>
                 <div class="contact-square info-square col-md-4 last-contact">
                     <i class="fa fa-envelope-o"></i>
                     <h3>E-Mail</h3>
                     <p>info@indiator.com</p>
                     
                 </div>
              </div>
          </div>
     </div>
</section>   
                 
<section id="contact-msg-info" style="padding: 20px 0 !important;">
   <div class="container">
      <div class="row">
         <div class="contact-page col-md-12 effect-5 effects">
                    <div class="text-center">
                        <h2>Contact Indiator</h2>
                       </div>

                <!-- FIFTH EXAMPLE -->
                <div class="box-information">
                    <div class="box-content contact">
                        
                        <form class="form " method="POST" action="<?php echo $domain;?>mail.php" autocomplete="on">
                          <div class="col-md-6 fc-content">
                            <input type="text" name="name" id="subject" class="input-contact"  placeholder="Name"/>
                            <input type="text" name="subject" id="name" class="input-contact"  placeholder="Subject"/>
                            <input type="email" name="email" class="input-contact"  id="email" placeholder="E-mail"/>
                          </div>
                          <div class="col-md-6 fc-content2">
                            <textarea name="message" id="message" class="input-contact" placeholder="Message" cols="30" rows="7"></textarea>
                            <!--<button type="submit" class="btn submit-contact"><i class="fa fa-envelope-o"></i>SUBMIT</button> -->
                            <input class="btn btn-primary" name="submit" type="submit" value="SUBMIT">  
                          </div>
                        </form>
                    </div>
                </div>
            </div><!--Close col 12 -->

          </div>
        </div>
</section>      
<section>
       <div class="google-maps">
         <center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.6616244617903!2d77.31663731508141!3d28.579921982438613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce45a47f94e51%3A0xa12c1e4c867a186a!2sIndiator!5e0!3m2!1sen!2sin!4v1475305713993" width="1024" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
       </center>
       </div>
    </section>


<?php include("includes/footer.php"); ?>
    

	</body>

</html>