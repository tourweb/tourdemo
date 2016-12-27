<?php
include("indiator_admin/buslogic.php");
include("includes/domain.php");
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
    <title>User Agreement</title>
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
    <div class="col-md-9 box-content contact">
        <h2>User Agreement</h2>
       <h3>Applicability of the agreement:</h3>
<p class="details">This agreement ("user agreement") incorporates the terms and conditions for INDIATOR  and its affiliate Companies ("INDIATOR") to provide services to the person (s) ("the User") intending to purchase or inquiring for any products and/ or services of INDIATOR by using INDIATOR's websites or using any other customer interface channels of INDIATOR which includes its sales persons, offices, call centers, advertisements, information campaigns etc.<br>

Both User and INDIATOR are individually referred as 'party' to the agreement and collective referred to as 'parties'.
</p>
<h3>Third Party Account Information</h3>
<p class="details">By using the Account Access service in INDIATOR's websites, the User authorizes INDIATOR and its agents to access third party sites, including that of Banks and other payment gateways, designated by them or on their behalf for retrieving requested information<br>

While registering, the User will choose a password and is responsible for maintaining the confidentiality of the password and the account.<br>

The User is fully responsible for all activities that occur while using their password or account. It is the duty of the User to notify INDIATOR immediately in writing of any unauthorized use of their password or account or any other breach of security. INDIATOR will not be liable for any loss that may be incurred by the User as a result of unauthorized use of his password or account, either with or without his knowledge. The User shall not use anyone else's password at any time</p>

<h3>Fees Payment</h3>
<p class="details">INDIATOR reserves the right to charge listing fees for certain listings, as well as transaction fees based on certain completed transactions using the services. INDIATOR further reserves the right to alter any and all fees from time to time, without notice.
<br>
The User shall be completely responsible for all charges, fees, duties, taxes, and assessments arising out of the use of the services.<br>

In case, there is a short charging by INDIATOR for listing, services or transaction fee or any other fee or service because of any technical or other reason, it reserves the right to deduct/charge/claim the balance subsequent to the transaction at its own discretion.<br>

In the rare possibilities of the reservation not getting confirmed for any reason whatsoever, we will process the refund and intimate you of the same. INDIATOR is not under any obligation to make another booking in lieu of or to compensate/ replace the unconfirmed one. All subsequent further bookings will be treated as new transactions with no reference to the earlier unconfirmed reservation.<br>

The User shall request INDIATOR for any refunds against the unutilized or 'no show' air or hotel booking for any reasons within 90 days from the date of departure for the air ticket and/or the date of check in for the hotel booking. Any applicable refunds would accordingly be processed as per the defined policies of Airlines, hotels and INDIATOR as the case may be. No refund would be payable for any requests made after the expiry of 90 days as above and all unclaimed amounts for such unutilized or "no show" air or hotel booking shall be deemed to have been forfeited.</p>

<h3>Confidentiality</h3>
<p class="details">Any information which is specifically mentioned by INDIATOR as Confidential shall be maintained confidentially by the user and shall not be disclosed unless as required by law or to serve the purpose of this agreement and the obligations of both the parties therein.</p><br>

<h3>Usage Of The Mobile Number Of The User By INDIATOR</h3>
<p class="details">INDIATOR may send booking confirmation, itinerary information, cancellation, payment confirmation, refund status, schedule change or any such other information relevant for the transaction, via SMS or by voice call on the contact number given by the User at the time of booking; INDIATOR may also contact the User by voice call, SMS or email in case the User couldn't or hasn't concluded the booking, for any reason what so ever, to know the preference of the User for concluding the booking and also to help the User for the same. The User hereby unconditionally consents that such communications via SMS and/ or voice call by INDIATOR is (a) upon the request and authorization of the User, (b) 'transactional' and not an 'unsolicited commercial communication' as per the guidelines of Telecom Regulation Authority of India (TRAI) and (c) in compliance with the relevant guidelines of TRAI or such other authority in India and abroad. The User will indemnify INDIATOR against all types of losses and damages incurred by INDIATOR due to any action taken by TRAI, Access Providers (as per TRAI regulations) or any other authority due to any erroneous compliant raised by the User on INDIATOR with respect to the intimations mentioned above or due to a wrong number or email id being provided by the User for any reason whatsoever.</p><br>

<h3>Onus Of The User</h3>
<p class="details">INDIATOR is responsible only for the transactions that are done by the User through INDIATOR. INDIATOR will not be responsible for screening, censoring or otherwise controlling transactions, including whether the transaction is legal and valid as per the laws of the land of the User.
<br>
The User warrants that they will abide by all such additional procedures and guidelines, as modified from time to time, in connection with the use of the services. The User further warrants that they will comply with all applicable laws and regulations regarding use of the services with respect to the jurisdiction concerned for each transaction.<br>

The User represent and confirm that the User is of legal age to enter into a binding contract and is not a person barred from availing the Services under the laws of India or other applicable law.</p>

<h3>Force Majure Circumstances<h3></h3>
<p class="details">The user agrees that there can be exceptional circumstances where the service operators like the airlines, hotels, the respective transportation providers or concerns may be unable to honor the confirmed bookings due to various reasons like climatic conditions, labor unrest, insolvency, business exigencies, government decisions, operational and technical issues, route and flight cancellations etc. If INDIATOR is informed in advance of such situations where dishonor of bookings may happen, it will make its best efforts to provide similar alternative to its customers or refund the booking amount after reasonable service charges, if supported and refunded by that respective service operators. The user agrees that INDIATOR being an agent for facilitating the booking services shall not be responsible for any such circumstances and the customers have to contact that service provider directly for any further resolutions and refunds.<br>

The User agrees that in situations due to any technical or other failure in INDIATOR, services committed earlier may not be provided or may involve substantial modification. In such cases, INDIATOR shall refund the entire amount received from the customer for availing such services minus the applicable cancellation, refund or other charges, which shall completely discharge any and all liabilities of INDIATOR against such non-provision of services or deficiencies. Additional liabilities, if any, shall be borne by the User.<br>

INDIATOR shall not be liable for delays or inabilities in performance or nonperformance in whole or in part of its obligations due to any causes that are not due to its acts or omissions and are beyond its reasonable control, such as acts of God, fire, strikes, embargo, acts of government, acts of terrorism or other similar causes, problems at airlines, rails, buses, hotels or transporters end. In such event, the user affected will be promptly given notice as the situation permits.
<br>
Without prejudice to whatever is stated above, the maximum liability on part of INDIATOR arising under any circumstances, in respect of any services offered on the site, shall be limited to the refund of total amount received from the customer for availing the services less any cancellation, refund or others charges, as may be applicable. In no case the liability shall include any loss, damage or additional expense whatsoever beyond the amount charged by INDIATOR for its services.
<br>
In no event shall INDIATOR and/or its suppliers be liable for any direct, indirect, punitive, incidental, special, consequential damages or any damages whatsoever including, without limitation, damages for loss of use, data or profits, arising out of or in any way connected with the use or performance of the INDIATOR website(s) or any other channel . Neither shall INDIATOR be responsible for the delay or inability to use the INDIATOR websites or related services, the provision of or failure to provide services, or for any information, software, products, services and related graphics obtained through the INDIATOR website(s), or otherwise arising out of the use of the INDIATOR website(s), whether based on contract, tort, negligence, strict liability or otherwise.<br>

INDIATOR is not responsible for any errors, omissions or representations on any of its pages or on any links or on any of the linked website pages.<br>
</p>
<h3>Safety Of Data Downloaded</h3>
<p class="details">The User understands and agrees that any material and/or data downloaded or otherwise obtained through the use of the Service is done entirely at their own discretion and risk and they will be solely responsible for any damage to their computer systems or loss of data that results from the download of such material and/or data.<br>

Nevertheless, INDIATOR will always make its best endeavors to ensure that the content on its websites or other information channels are free of any virus or such other malwares.</p>

<h3>Feedback From Customer And Solicitation:</h3>
<p class="details">The User is aware that INDIATOR provides various services like hotel bookings, car rentals, holidays and would like to learn about them, to enhance his / her travel experience. The User hereby specifically authorizes INDIATOR to contact the User with offers on various services offered by it through direct mailers, e-mailers, telephone calls, short messaging services (SMS) or any other medium, from time to time. In case that the customer chooses not to be contacted, he /she shall write to INDIATOR for specific exclusion at info@indiator.com or provide his / her preferences to the respective service provider. The customers are advised to read and understand the privacy policy of INDIATOR on its website in accordance of which INDIATOR contacts, solicits the user or shares the user's information.</p>

<h3>Proprietary Rights</h3>
<p class="details">INDIATOR may provide the User with contents such as sound, photographs, graphics, video or other material contained in sponsor advertisements or information. This material may be protected by copyrights, trademarks, or other intellectual property rights and laws.<br>

The User may use this material only as expressly authorized by INDIATOR and shall not copy, transmit or create derivative works of such material without express authorization.<br>

The User acknowledges and agrees that he/she shall not upload post, reproduce, or distribute any content on or through the Services that is protected by copyright or other proprietary right of a third party, without obtaining the written permission of the owner of such right.
<br>
Any copyrighted or other proprietary content distributed with the consent of the owner must contain the appropriate copyright or other proprietary rights notice. The unauthorized submission or distribution of copyrighted or other proprietary content is illegal and could subject the User to personal liability or criminal prosecution.</p>

<h3>VISA obligations of the User</h3>
<p class="details">The travel bookings done by INDIATOR are subject to the applicable requirements of Visa which are to be obtained by the individual traveller. INDIATOR is not responsible for any issues, including inability to travel, arising out of such Visa requirements and is also not liable to refund for the untraveled bookings due to any such reason.</p><br>

<h3>Personal And Non-Commercial Use Limitation</h3>
<p class="details">Unless otherwise specified, the INDIATOR services are for the User's personal and non - commercial use. The User may not modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information, software, products or services obtained from the INDIATOR website(s) without the express written approval from INDIATOR.</p><br>

<h3>Indemnification</h3>
<p class="details">The User agrees to indemnify, defend and hold harmless INDIATOR and/or its affiliates, their websites and their respective lawful successors and assigns from and against any and all losses, liabilities, claims, damages, costs and expenses (including reasonable legal fees and disbursements in connection therewith and interest chargeable thereon) asserted against or incurred by INDIATOR and/or its affiliates, partner websites and their respective lawful successors and assigns that arise out of, result from, or may be payable by virtue of, any breach or non-performance of any representation, warranty, covenant or agreement made or obligation to be performed by the User pursuant to this agreement.<br>

The user shall be solely and exclusively liable for any breach of any country specific rules and regulations or general code of conduct and INDIATOR cannot be held responsible for the same.</p>

<h3>Right To Refuse</h3>
<p class="details">INDIATOR at its sole discretion reserves the right to not to accept any customer order without assigning any reason thereof. Any contract to provide any service by INDIATOR is not complete until full money towards the service is received from the customer and accepted by INDIATOR.<br>

Without prejudice to the other remedies available to INDIATOR under this agreement, the TOS or under applicable law, INDIATOR may limit the user's activity, or end the user's listing, warn other users of the user's actions, immediately temporarily/indefinitely suspend or terminate the user's registration, and/or refuse to provide the user with access to the website if:<br>

The user is in breach of this agreement, the TOS and/or the documents it incorporates by reference;<br>
INDIATOR is unable to verify or authenticate any information provided by the user; or<br>
INDIATOR believes that the user's actions may infringe on any third party rights or breach any applicable law or otherwise result in any liability for the user, other users of the website and/or INDIATOR.<br>
INDIATOR may at any time in its sole discretion reinstate suspended users. Once the user have been indefinitely suspended the user shall not register or attempt to register with INDIATOR or use the website in any manner whatsoever until such time that the user is reinstated by INDIATOR.<br>

Notwithstanding the foregoing, if the user breaches this agreement, the TOS or the documents it incorporates by reference, INDIATOR reserves the right to recover any amounts due and owing by the user to INDIATOR and/or the service provider and to take strict legal action as INDIATOR deems necessary.<br>

Right To Cancellation By INDIATOR In Case Of Invalid Infromation From User
The User expressly undertakes to provide to INDIATOR only correct and valid information while requesting for any services under this agreement, and not to make any misrepresentation of facts at all. Any default on part of the User would vitiate this agreement and shall disentitle the User from availing the services from INDIATOR.<br>

In case INDIATOR discovers or has reasons to believe at any time during or after receiving a request for services from the User that the request for services is either unauthorized or the information provided by the User or any of them is not correct or that any fact has been misrepresented by him, INDIATOR in its sole discretion shall have the unrestricted right to take any steps against the User(s), including cancellation of the bookings, etc. without any prior intimation to the User. In such an event, INDIATOR shall not be responsible or liable for any loss or damage that may be caused to the User or any of them as a consequence of such cancellation of booking or services.<br>

The User unequivocally indemnifies INDIATOR of any such claim or liability and shall not hold INDIATOR responsible for any loss or damage arising out of measures taken by INDIATOR for safeguarding its own interest and that of its genuine customers. This would also include INDIATOR denying/cancelling any bookings on account of suspected fraud transactions.</p>

<h3>Interpretation Number And Gender</h3>
<p class="details">The terms and conditions herein shall apply equally to both the singular and plural form of the terms defined. Whenever the context may require, any pronoun shall include the corresponding masculine, feminine and neuter form. The words "include", "includes" and "including" shall be deemed to be followed by the phrase "without limitation". Unless the context otherwise requires, the terms "herein", "hereof", "hereto", 'hereunder" and words of similar import refer to this agreement as a whole.</p><br>

<h3>Severability</h3>
<p class="details">If any provision of this agreement is determined to be invalid or unenforceable in whole or in part, such invalidity or unenforceability shall attach only to such provision or part of such provision and the remaining part of such provision and all other provisions of this Agreement shall continue to be in full force and effect.</p><br>

<h3>Headings</h3>
<p class="details">The headings and subheadings herein are included for convenience and identification only and are not intended to describe, interpret, define or limit the scope, extent or intent of this agreement, terms and conditions, notices, or the right to use this website by the User contained herein or any other section or pages of INDIATOR Websites or its partner websites or any provision hereof in any manner whatsoever.<br>

In the event that any of the terms, conditions, and notices contained herein conflict with the Additional Terms or other terms and guidelines contained within any particular INDIATOR website, then these terms shall control.</p><br>

<h3>Relationship</h3>
<p class="details">None of the provisions of any agreement, terms and conditions, notices, or the right to use this website by the User contained herein or any other section or pages of INDIATOR Websites or its partner websites, shall be deemed to constitute a partnership between the User and INDIATOR and no party shall have any authority to bind or shall be deemed to be the agent of the other in any way.<br>
</p>
<h3>Updation Of The Information By INDIATOR</h3>
<p class="details">User acknowledges that INDIATOR provides services with reasonable diligence and care. It endeavors its best to ensure that User does not face any inconvenience. However, at some times, the information, software, products, and services included in or available through the INDIATOR websites or other sales channels and ad materials may include inaccuracies or typographical errors which will be immediately corrected as soon as INDIATOR notices them. Changes are/may be periodically made/added to the information provided such. INDIATOR may make improvements and/or changes in the INDIATOR websites at any time without any notice to the User. Any advice received except through an authorized representative of INDIATOR via the INDIATOR websites should not be relied upon for any decisions.</p><br>

<h3>Modification Of These Terms Of Use</h3>
<p class="details">INDIATOR reserves the right to change the terms, conditions, and notices under which the INDIATOR websites are offered, including but not limited to the charges. The User is responsible for regularly reviewing these terms and conditions.<br>
</p>
<h3>Jurisdiction</h3>
<p class="details">INDIATOR hereby expressly disclaims any implied warranties imputed by the laws of any jurisdiction or country other than those where it is operating its offices. INDIATOR considers itself and intends to be subject to the jurisdiction only of the courts of NCR of Delhi, India.</p><br>

<h3>Responsibilities Of User Agreement</h3>
<p class="details">The User expressly agrees that use of the services is at their sole risk. To the extent INDIATOR acts only as a booking agent on behalf of third party service providers, it shall not have any liability whatsoever for any aspect of the standards of services provided by the service providers. In no circumstances shall INDIATOR be liable for the services provided by the service provider. The services are provided on an "as is" and "as available" basis. INDIATOR may change the features or functionality of the services at any time, in their sole discretion, without notice. INDIATOR expressly disclaims all warranties of any kind, whether express or implied, including, but not limited to the implied warranties of merchantability, fitness for a particular purpose and non-infringement. No advice or information, whether oral or written, which the User obtains from INDIATOR or through the services shall create any warranty not expressly made herein or in the terms and conditions of the services. If the User does not agree with any of the terms above, they are advised not to read the material on any of the INDIATOR pages or otherwise use any of the contents, pages, information or any other material provided by INDIATOR. The sole and exclusive remedy of the User in case of disagreement, in whole or in part, of the user agreement, is to discontinue using the services after notifying INDIATOR in writing.</p><br>

<p class="details">IndiaTor is leading provider of short tours, Things To Do, Ground Transportation, Guided Tours, Cooking classes, Excursion, day Tours, Attraction & activity tours across the India. Through its wide local set up and extensive Partnership with hotels, Transporter & Local Insider.</p>

<p class="details">If you are an editor or analyst and require further information, advertisement or an interview, don't hesitate to contact us <a href="mailto:info@indiator.com"><b>info@indiator.com</b></a></p>

</div>
<div class="col-md-3 box-content contact">
		<article class="blog-help">
                   <div class="help-txt"> 
                        <p class="help-phone"><i class="fa fa-phone"></i> +91 9871107030 </p>
                    </div> 
            <div class="col-md-12 travel-desc-agency" style="background-color:#DC6934;">
                <h3 style="color:white;">Need Assisstance ?</h3>
               <?php include("mail_form.php"); ?>
            </div>
                    
                </article>
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
jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
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