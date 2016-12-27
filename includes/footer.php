<?php include("includes/domain.php"); ?>
<?php 
if(isset($_SESSION['msg'])) { unset($_SESSION['msg']); } ?>
<style>
.white-a{
color:white;
}
</style>
<section class='last-minute-banner'>
                 <img src="<?php echo $domain; ?>images/gat-footer.jpg" class="img-responsive">
              
</section>
<section id="footer">
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3 footer-zone">
                    <img class='logo-footer' src='<?php echo $domain; ?>images/footer-logo.jpg' alt='logo' />
                    <p><i class="fa fa-map-marker"></i> Address: A-15 , <br>SECTOR-3 , NOIDA , <br>U.P , INDIA- 201301</p> 
                    <p><i class="fa fa-envelope-o"></i> Email: info@indiator.com <br><i class="fa fa-phone"></i> Call Us : + 0091 9871107030 <br><i class="fa fa-clock-o"></i> (24 x 7) Support</p>  
                   
                  </div>
                  <div class="col-md-3">
                    <h3>Business and Partnership</h3>        
                            <p><a href="<?php echo $domain; ?>#" class="white-a" target="blank">Tour Operators</a><br>
                            <a href="<?php echo $domain; ?>affiliates.php" class="white-a" target="blank"> Affiliates</a><br>
                            <a href="<?php echo $domain; ?>partner.php" class="white-a" target="blank"> Become a Partner </a><br>
                            <a href="<?php echo $domain; ?>privacy.php" class="white-a" target="blank"> Privacy</a></p>

                       
                       <div class="clear"></div> 
                  </div>
                  <div class="col-md-3 footer-zone">
                        <h3>Indiator</h3>
                        <p>
                            <a href="<?php echo $domain; ?>about-us.php" class="white-a" target="blank">About us</a><br>
                            <a href="<?php echo $domain; ?>media.php" class="white-a" target="blank">Media</a><br>
                            <a href="<?php echo $domain; ?>user-agreement.php" class="white-a" target="blank">User Agreement</a><br>
                           <a href="<?php echo $domain; ?>terms-and-condition.php" class="white-a" target="blank">Terms and Condition</a><br>
                            <a href="<?php echo $domain; ?>careers.php" class="white-a" target="blank">Careers</a><br>
                           <a href="<?php echo $domain; ?>pay-online.php" class="white-a" target="blank">Pay by Credit Card</a><br>
                            <a href="<?php echo $domain; ?>pay-inr.php" class="white-a" target="blank">Pay by Net Banking</a><br>
                        </p>
                       
                  </div>

                  <div class="col-md-3 footer-zone">
                    <h3>Social Links</h3>
                    
                     <div class="socialfooter ">
                        <a href="https://www.facebook.com/INDIAT0R" target="blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.linkedin.com/company/indiator" target="blank"><i class="fa fa-linkedin"></i></a>
                        <a href="https://twitter.com/Indiator_com" target="blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCS2iZbERH-0NCsDzELch3Fg" target="blank"><i class="fa fa-youtube"></i></a>
                        <a href="https://plus.google.com/113163795910203922522" target="blank"><i class="fa fa-google"></i></a>
                     </div>  
                  </div>
                </div>
<div class="col-md-12">
<p align="center">India’s #1 Transfers Things to Do Activity N Tours Portal | One Million Happy Customers | Great Itineraries | 24/7 Customer Service &amp; Support | Book Holiday | Vacation Packages In India </p>
</div>
           </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
<div class="col-xs-10 copyright"><p>CST # "APGPK6095JSD002"  <a href="https://indiator.com/">Indiator.com</a> is covered under P.L insurance policy <br>Indiator © 2016 Name All Rights Reserved &nbsp;&nbsp;&nbsp;&nbsp;<span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=8w6kWcwSRRPirra6Pbi9SA2xmxTENMtpoq8AtUg08T12c4J6awzQFXzn0Uc8"></script></span></div> 
                    <div class="col-xs-1 payment-card" >
                       
<img src="<?php echo $domain; ?>images/best-price.png" class="img-responsive" style="width: 107px;height: 72px;" >
 </div>
<div class="col-xs-1 payment-card" >
<img src="<?php echo $domain; ?>images/int.png" class="img-responsive" style="width: 114px;height: 53px;" >
<a title="Google Analytics Alternative" href="http://clicky.com/101005951"><img alt="Google Analytics Alternative" src="//static.getclicky.com/media/links/badge.gif" border="0" /></a>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(101005951); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/101005951ns.gif" /></p></noscript>

                    </div>
              </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo $domain; ?>js/jquery-ui.js" type="text/javascript"></script>

<script src="<?php echo $domain; ?>js/modernizr.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/jquery.easing.1.3.js"></script>

<!-- waypoint -->
<script type="text/javascript" src="<?php echo $domain; ?>js/waypoints.min.js"></script>
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

<script src="<?php echo $domain; ?>js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
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
<script type="text/javascript" src="<?php echo $domain; ?>js/bootstrap.min.js"></script> 

<script src="<?php echo $domain; ?>js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!--bxSlider-->
<script src="<?php echo $domain; ?>js/jquery.bxslider.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    "use strict";
    $('.bxslider').bxSlider({
        auto: true
    });
});
</script>
 <script src="<?php echo $domain; ?>js/script.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/jquery.counterup.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {
    "use strict";
    $('.counter').counterUp({
        delay: 40,
        time: 4000
    });
});
</script>

<script>
  $(document).ready(function(){
    $('.category').on('change', function(){
      var category_list = [];
      $('#filters :input:checked').each(function(){
        var category = $(this).val();
        category_list.push(category);
      });

      if(category_list.length == 0)
        $('.resultblock').fadeIn();
      else {
       $('.resultblock').each(function(){
          var item = $(this).attr('data-tag');
var itemarr = item.split(',');
$this = $(this);
$.each(itemarr,function(ind,val){
if(jQuery.inArray(val,category_list) > -1){
$this.fadeIn('slow');
return false;
}
else
$this.hide();
});
        });
      }   
    });
  }); 
  </script>  
<script type='text/javascript'>
window.__lo_site_id = 71520;

	(function() {
		var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
		wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
	  })();
	</script>

<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 874177804;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/874177804/?guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDSBVLJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

