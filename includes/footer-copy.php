<section id="footer">
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3 footer-zone">
                    <img class='logo-footer' src='images/footer-logo.jpg' alt='logo' />
                    <p><i class="fa fa-map-marker"></i> Address: A-15, NOIDA SECTOR-3 <br>U.P , INDIA PIN - 201301</p> 
                    <p><i class="fa fa-envelope-o"></i> Email ID: info@myflighttrip.com <br><i class="fa fa-phone"></i> Call Us : + 0091 9871107030 <br>(24 x 7) Support</p>  
                    <h3>Social Links</h3>
                    
                     <div class="socialfooter ">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-google"></i></a></div>  
                  </div>
                  <div class="col-md-3">
                    <h3>Business and Partnership</h3>        
                            <p>- Tour Operators<br>
                           - Affiliates<br>
                            - API<br>
                            - Become a Partner <br>
                            - Privacy</p>

                       
                       <div class="clear"></div> 
                  </div>
                  <div class="col-md-3 footer-zone">
                        <h3>Indiator</h3>
                        <p>
                            - About us<br>
                            - Media<br>
                            - User agreement<br>
                            - Booking Condition<br>
                            - Employment<br>
                            - Pay by Credit Card<br>
                            - Pay by Net Banking
                        </p>
                       
                  </div>
<?php
include("includes/domain.php");
if (isset($_POST["btnquery"])) {
 
$admin = "shivanitak@indiator.com";
$domain ="http://indiator.com";

$Admin_phoneNo = "+ 0091 9650201036";
  $name=trim($_REQUEST['name']); 
  $email=trim($_REQUEST['email']);
  $phoneNo=trim($_REQUEST['phone']);
  $msg=trim($_REQUEST['message']);
  $msg=str_replace("\n","<br>",$msg);
  
  if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,3}$/i", $email)) {
    echo "* Please provide valid email ID"; die;
  }
  else{
  
    if((!empty($name)) && (!empty($email)) && (!empty($phoneNo))){
      
      $message="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
            </head>
            <body>
            <div style='margin:auto; background:#ffffff; overflow:auto; padding:30px 0; height:auto'>
              <div style='width:600px;padding:30px 50px 40px; background-color:#BDCF97; margin:auto; overflow:auto; background-repeat:no-repeat; background-position:bottom center; color:#333'>
                <div style='padding-bottom: 5px; border-bottom: 5px solid #333;'><a href='".$domain."'><img src='".$domain."/images/logo.png'></a></div><br>
                
                <div style='float:left'>Dear Admin,<br><br>Booking Information details are as follows:</div>
                <div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Name:</strong></div><div style='float:left; width:450px; line-height:25px'>".$name."</div></div>
                <div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Email:</strong></div><div style='float:left; width:450px; line-height:25px'>".$email."</div></div>
                <div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Phone No.:</strong></div><div style='float:left; width:450px; line-height:25px'>".$phoneNo."</div></div>
                <div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Message:</strong></div><div style='float:left; width:450px; line-height:25px'>".$msg."</div>
                <div style='font-weight:bold;color:#333;font-size:15px;padding-top:10px; padding-bottom:5px;'>&nbsp;</div>
                
                <p style='border-top:1px dotted #333'>*this mail is not unsolicited. This was sent in response to one of your actions on IndiaTor.com. <br>
                *This is a one-time communication and we respect your privacy.<br>
                * Do not print this mail unless absolutely necessary.</p>
              </div>
            </div>
            </body>
            </html>";
      
      $to ='<'.$admin.'>'."\n";
      //$cc = '<info@indiator.com>'."\n";
      $subject = 'Instant Travel Assistance - IndiaTor';
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
      $headers .= 'From: <'.$email.'>' . "\r\n";
      //$headers .= "Cc: $cc\r\n";
      
      if(@mail($to, $subject, $message, $headers)){ 
        // Mail send back to user------
        
        $to1 = '<'.$email.'>'."\n";
        $subject1 = "Instant Travel Assistance - IndiaTor";
        $message1 = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
              <html xmlns='http://www.w3.org/1999/xhtml'>
              <head>
              <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
              </head>
              <body>
              <div style='margin:auto; background:#ffffff; overflow:auto; padding:30px 0; height:auto'>
                <div style='width:600px;padding:30px 50px 40px; background-color:#BDCF97; margin:auto; overflow:auto; background-repeat:no-repeat; background-position:bottom center; color:#333'>
                  <div style='padding-bottom: 5px; border-bottom: 5px solid #333;'><a href='".$domain."'><img src='".$domain."/images/logo.png'></a></div><br>
                  
                  <div style='float:left'>Dear ".$name.",<br><br>Thanks for contacting us. We have received your enquiry and one of our representative will get in touch with you shortly.</div>
                  <div style='float:left'>Instant Travel Assistance details received as follows:</div>
                  <div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Name:</strong></div><div style='float:left; width:450px; line-height:25px'>".$name."</div></div>
                  <div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Email:</strong></div><div style='float:left; width:450px; line-height:25px'>".$email."</div></div>
                  <div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Phone No.:</strong></div><div style='float:left; width:450px; line-height:25px'>".$phoneNo."</div></div>
                  <div style='float:left'><div style='float:left; width:150px; line-height:25px'><strong>Message:</strong></div><div style='float:left; width:450px; line-height:25px'>".$msg."</div>
                  <div style='float:left; font-size:14px; width:100%; padding-top:10px;'>For further communication or urgent follow up please feel free to contact us</div>
            <div style='float:left; font-size:14px; width:100%; padding-top:5px;'>Call: <strong>".$Admin_phoneNo."</strong></div>
            <div style='float:left; font-size:14px; width:100%; padding-top:5px; padding-bottom:30px;'>Email: <strong>".$admin."</strong></div>
                  <div style='font-weight:bold;color:#333;font-size:15px;padding-top:10px; padding-bottom:5px;'>&nbsp;</div>
                  
                  <p style='border-top:1px dotted #333'>*this mail is not unsolicited. This was sent in response to one of your actions on IndiaTor.com. <br>
                  *This is a one-time communication and we respect your privacy.<br>
                  * Do not print this mail unless absolutely necessary.</p>
                </div>
              </div>
              </body>
              </html>";
        
        $headers1 = "MIME-Version: 1.0" . "\r\n";
        $headers1 .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers1 .= 'From:'.$admin . "\r\n";
        //$headers1 .= "Bcc: $bcc\r\n";
        if(@mail($to1, $subject1, $message1, $headers1)){ header("Location:thanks.php?stat=instant_travel");}
        else { echo("Unprecedented Error while sending mail. Please go back and try once more. Thank You for you patience.");}
      }
      else {echo("Unprecedented Error while sending mail. Please go back and try once more. Thank You for you patience.");} 
    }
    else {echo("Unprecedented Error while sending mail. Please go back and try once more. Thank You for you patience.");}
  }

}
?>
                  <div class="col-md-3 footer-zone">
                    <h3>Instant Travel Assistance</h3>
                    <form name="query" action="" method="post">
                      <div class="form-group">
                       
                        <input type="text" class="form-control" name="name"  placeholder="Enter Your Name">
                      </div>
                      <div class="form-group">
                       
                        <input type="text" class="form-control" name="email"  placeholder="Enter Your Email">
                      </div>
                       <div class="form-group">
                       
                        <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone No.">
                      </div>
                      <div class="form-group">
                        
                        <input type="text" class="form-control" name="message" placeholder="Enter Your Message">
                      </div>
                      <center><input type="submit" name="btnquery" class="btn btn-success" value="Submit Query"></center>
                    </form>
                  </div>
                </div>
           </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <div class="col-xs-6 copyright">Indiator © 2016 Name All Rights Reserved </div>
                    <div class="col-xs-6 payment-card">
                        <i class="fa fa-2x fa-cc-visa"></i>
                        <i class="fa fa-2x fa-cc-mastercard"></i>
                        <i class="fa fa-2x fa-cc-amex"></i>
                        <i class="fa fa-2x fa-cc-paypal"></i>
                    </div>
              </div>
            </div>
        </div>
    </div>
</section>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/modernizr.js" type="text/javascript"></script>
<script src="js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js"></script>
<!-- waypoint -->
<script type="text/javascript" src="js/waypoints.min.js"></script>
<!--Preload-->
<script type="text/javascript">
    $(document).ready(function ($) {
        "use strict";
        try {
            var myTimer = 0; clearTimeout(myTimer);
            myTimer = setTimeout(function () { $("#loader-wrapper").slideUp() }, 2000);
        } catch (err) {
        }
    });
</script>

<script src="js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
<script src="js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
<script type="text/javascript">
var tpj = jQuery;
    tpj(document).ready(function () {
        "use strict";
        if (tpj.fn.cssOriginal !== undefined)
            tpj.fn.css = tpj.fn.cssOriginal;
        tpj('.fullwidthbanner').revolution(
        {
            delay: 29000,
            startwidth: 1170,
            startheight: 646,
            onHoverStop: "on",
            thumbWidth: 100,
            thumbHeight: 50,
            thumbAmount: 4,
            hideThumbs: 200,
            navigationType: 'none',
            navigationArrows: "verticalcentered", 
            navigationStyle: "large",
            touchenabled: "on",
            navOffsetHorizontal: 0,
            navOffsetVertical: 20,
            fullWidth: "on",
            shadow: 0
        });
});
</script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!--bxSlider-->
<script src="js/jquery.bxslider.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    "use strict";
    $('.bxslider').bxSlider({
        auto: true
    });
});
</script>
 <script src="js/script.js" type="text/javascript"></script>