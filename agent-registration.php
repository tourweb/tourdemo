<?php
include("includes/domain.php");
include("indiator_admin/connect.php");

?>
<!doctype html>

<html>
<head>
    <title>B2B Holiday Tour &amp; Travel Agency | Agent Register | Indiator</title>
    <meta charset="utf-8">
    <meta name="Keyword" content="B2B travel company,B2B tour packages,B2B travel portal,B2B holiday packages,B2B travel agency,B2B travel websites">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'/>

<?php include_once 'includes/header.php';?>
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
<meta name="google-site-verification" content="l7FkT27w-oIqJr2wP-LFzBLD4DDhCkt-HpWYq5CkLGo" />
</head>
	<body>
<?php include_once("analyticstracking.php") ?>
    

<?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
    
    <section id="about2" class="about-section-top">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
               <div class="page-title pull-left">
                    <h2 class="title-about">Agent Registartion</h2>
                </div>
               
             </div>
          </div>
      </div>
    </section>
<section id="top-info-contact" style="padding: 23px 0;">
   <div class="container">
      <div class="row">
         <div class="contact-page col-md-9 effect-5 effects">
      <div class="help-txt"> 
                        <p class="help-phone"><i class="fa fa-key"></i> Sign Up for a new account </p>
                    </div> 
        <form id="form-sign-up" action="agentmail.php" method="post">
    <div class="col-md-6">
      <div class="form-group col-md-12">
          <input type="text"  name="agencyname" value="" placeholder="Agency Name" class="form-control" />
      </div>
      <div class="form-group col-md-12">
        
          <input type="text" name="companyname" value="" placeholder="Official Company Name" class="form-control" />
        
      </div>
      <div class="form-group col-md-12">
          <select  name="agencytype" class="form-control" >
            <option value="">Please Select Agency Type</option>
            <option value="Tour Operator">Tour Operator</option>
            <option value="Travel Agency">Travel Agency</option>
            <option value="OTA">OTA - Online Travel Agency</option>
             <option value="Home Based">Home based</option>
              <option value="others">Others</option>
          </select>
        </div>
      
      <div class="form-group col-md-12">
            <input type="text" name="fname" value="" placeholder="Contact Person First Name" class="form-control" />
      </div>
      <div class="form-group col-md-12">
          <input type="text" name="lname" value="" placeholder="Contact Person Last Name" class="form-control"  />
      </div>
      <div class="form-group col-md-12">   
          <input type="text" name="position" value="" placeholder="Contact Person Position"  class="form-control" />
      </div>
      <div class="form-group col-md-12">
          <input type="text" name="email" value="" placeholder="Email Address"  class="form-control"  />
       
      </div>
      <div class="form-group col-md-12">
          <input type="text" name="phonenumber" value="" placeholder="Phone Number" class="form-control" />
      </div>
    <div class="form-group col-md-12">
          <input type="text" name="faxnumber" value="" placeholder="Fax Number"  class="form-control"  />
      </div>
     
    </div>
    <div class="col-md-6">
        
       <div class="form-group col-md-12">
          <input type="text" name="website" value="" placeholder="Website Address" class="form-control"  />
      </div>
      <div class="form-group col-md-12">
          <input type="text" name="country" value="" placeholder="Country" class="form-control"  />
      </div>
      <div class="form-group col-md-12">
          <input type="text" name="state" value="" placeholder="State"  class="form-control"  />
      </div>
       <div class="form-group col-md-12">
          <input type="text" name="city" value="" placeholder="City"  class="form-control"  />
      </div>
      <div class="form-group col-md-12">
          <textarea name="address" cols="" rows="" placeholder="Address" class="form-control"></textarea>
      </div>
      
      <h3>Log in Details</h3>
      <div class="form-group col-md-12">
          <input type="text"  name="username" value="" placeholder="Username" class="form-control" />
      </div>
      <div class="form-group col-md-12">
          <input type="password"  name="password" value="" placeholder="Password" class="form-control"/>
      </div>
      <div class="form-group col-md-12">
          <input type="password"  name="password2" value="" placeholder="Confirm Password" class="form-control"  />
          
      </div>
      <div class="form-group col-md-12 col-md-offset-8">
      
        <input type="submit" value="Sign up" name="btnsignup" class="btn btn-primary" />
      </div>
    </div>
      
      
    
  </form>
 </div>
              <div class="col-md-3 contact">
    <article class="blog-help" style="border:4px solid #3276B1;">
    <img src="images/b2b.jpg" class="img-responsive">
    <h3 style="padding-left: 8px;padding-right: 8px;text-align: justify;">Welcome to Indiator</h3>
    <p style="padding-left: 8px;padding-right: 8px;text-align: justify; color:black;">Indiator is a notable name in the B2B tour and travel industry widely spread out over 50 major cities of the country. We offer best commission rates (5% - 20%) in the industry to our agents. 
 
We are the perfect choice among agents due to our best tour packages like Short Tours, Things To Do, Transfer Services, Cooking Classes & Activity Tours, Night Tours, Group tours, Multi-days Tours, Customized Tours, Holiday Packages, Honeymoon packages, Spiritual Tours, and many more to our wide network of partners to provide their customers smoothly, with the right pricing and incalculable inventory.
 
We designed our programs with awesome ideas, ingenious way and candid result in giving to mark your aim. Furthermore, Indiator has influentially managed to hold their position among the B2B market across the country.
 </p>
                    
                </article>
    </div>
          </div>
     </div>
</section>                  




<?php include("includes/footer.php"); ?>

</script>
   

	</body>

</html>
