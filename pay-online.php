<?php include"includes/domain.php";
require_once('indiator_admin/connect.php');
date_default_timezone_set('Asia/Kolkata');
$con=new clscon();
$link=$con->db_connect();
date_default_timezone_set('Asia/Kolkata');
$nameErr = "";
$emailErr = "";
$contactErr = "";
$cntryErr = "";
$addErr = "";
$cityErr = "";
$stateErr = "";
$zipErr = "";
$currencyErr = "";
$amountErr = "";
if(isset($_POST['submit']))
{
	
	if((trim($_POST['mstrname'])!="") && (trim($_POST['mstremail'])!="") && (trim($_POST['mstrtel'])!="") && (trim($_POST['mstrCountry'])!="") && (trim($_POST['amount'])!=""))
	{
		//$ttlAmount = $_POST['amount'];
		$ttlAmount = number_format($_POST['amount'], 2, '.', '');		
		$insertBilling = "insert into open_payment(id, name, email, phone, country, address, city, state, zip, currency, payment, res_code, res_msg, auth_code, rrn, tran_id, epg_tran_id, cv_res_code, txn_date, pay_by, status) values(Null, '".$_POST['mstrname']."', '".$_POST['mstremail']."', '".$_POST['mstrtel']."', '".$_POST['mstrCountry']."', '".$_POST['mstrAdd']."', '".$_POST['mstrCity']."', '".$_POST['mstrState']."', '".$_POST['mstrZip']."', '".$_POST['mstrCurrency']."', ".$ttlAmount.", '', '', '', '', '', '', '', '', 'ICICI', 'no')";
		if(mysqli_query($link,$insertBilling))	{
			setcookie("PaymentId", mysqli_insert_id($link), time()+86400);
			header('location:pay_gateway/openSsl.php');
		}
		else{echo mysqli_error(); die;}
	}
	else{
		$nameErr = "Please Enter name!";
		$emailErr = "Please Enter Email!";
		$contactErr = "Please Enter Contact Number!";
		$cntryErr = "Please Enter Country!";
		$addErr = "Please Enter Address!";
		$cityErr = "Please Enter City!";
		$stateErr = "Please Enter State!";
		$zipErr = "Please Enter Zip!";
		$currencyErr = "&nbsp;";
		$amountErr = "Please Enter Amount!";
	}
}
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

</head>
	<body>

<?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
    
    <section id="about2" class="about-section-top">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
               <div class="page-title pull-left">
                    <h2 class="title-about">Pay Online</h2>
                </div>
               
             </div>
          </div>
      </div>
    </section>

<section id="contact-msg-info" style="padding: 10px 0 !important;">
   <div class="container">
      <div class="row">
         <div class="contact-page col-md-9 effect-5 effects">
                    <div class="text-center">
                        <h2>Billing & Payment Information</h2>
                        <h3>* provide information as per your credit card details</h3>
                       </div>

                <!-- FIFTH EXAMPLE -->
                <div class="box-information">
                    <div class="box-content contact col-md-12">
                        
                       <style>
.txt_red {
color:red;
}
</style>
                         <form action="pay-online.php" class="form email-form" method="POST" name="checkoutform" id="checkoutform">
                        <div class="block_leftarea">
                            <div class="col-md-6 fc-content"> 
                            <label>Please provide your name:</label>
                            <span class="txt_red small_txt"><?php echo $nameErr;?></span>
                            <input type="text" name="mstrname" class="input-contact"  maxlength="80" required />
                            
                            <label>Phone number:</label>
                            <span class="txt_red small_txt"><?php echo $contactErr;?></span>
                            <input type="text" class="input-contact"  name="mstrtel" required />
                            </div>
                             <div class="col-md-6 fc-content">
                            <label>Address:</label>
                            <span class="txt_red small_txt"><?php echo $addErr;?></span>
                            <input type="text" class="input-contact"  name="mstrAdd" required />
                            
                            <label>State:</label>
                            <span class="txt_red small_txt"><?php echo $stateErr;?></span>
                            <input type="text" class="input-contact"  name="mstrState" required />
                            </div>
                             <div class="col-md-6 fc-content">
                            <label>Currency:</label>
                            <span class="txt_red small_txt"><?php echo $currencyErr;?></span>
                            <select name="mstrCurrency" class="input-contact">                            
                                <option value="INR">Indian Rupee (INR)</option>
                                <option value="USD">United States dollar (USD)</option>
                                
                            </select>
                            
                       
                            
                            <label>Email ID: </label>
                            <span class="txt_red small_txt"><?php echo $emailErr;?></span>
                            <input type="text" class="input-contact"  name="mstremail" maxlength="80" required />
                            </div>
                             <div class="col-md-6 fc-content">
                            <label>Country:</label>
                            <span class="txt_red small_txt"><?php echo $cntryErr;?></span>
                            <select name="mstrCountry" class="input-contact">
                                <option value="AGO">Angola</option>
                                <option value="AIA">Anguilla</option>   
                                <option value="ALA">Aland Islands</option> 
                                <option value="ALB">Albania</option> 
                                <option value="AND">Andorra</option> 
                                <option value="ANT">Netherlands Antilles</option> 
                                <option value="ARE">United Arab Emirates</option> 
                                <option value="ARG">Argentina</option> 
                                <option value="ARM">Armenia</option> 
                                <option value="ASM">American Samoa</option> 
                                <option value="ATA">Antarctica</option> 
                                <option value="ATF">French Southern Territories</option>
                                <option value="ATG">Antigua and Barbuda</option> 
                                <option value="AUS">Australia</option> 
                                <option value="AUT">Austria</option> 
                                <option value="AZE">Azerbaijan</option> 
                                <option value="BDI">Burundi</option> 
                                <option value="BEL">Belgium</option> 
                                <option value="BEN">Benin</option> 
                                <option value="BFA">Burkina Faso</option> 
                                <option value="BGD">Bangladesh</option> 
                                <option value="BGR">Bulgaria</option> 
                                <option value="BHR">Bahrain</option> 
                                <option value="BHS">Bahamas</option> 
                                <option value="BIH">Bosnia and Herzegovina</option> 
                                <option value="BLM">Saint-Barthelemy</option> 
                                <option value="BLR">Belarus</option> 
                                <option value="BLZ">Belize</option> 
                                <option value="BMU">Bermuda</option> 
                                <option value="BOL">Bolivia</option> 
                                <option value="BRA">Brazil</option> 
                                <option value="BRB">Barbados</option> 
                                <option value="BRN">Brunei Darussalam</option> 
                                <option value="BTN">Bhutan</option> 
                                <option value="BVT">Bouvet Island</option> 
                                <option value="BWA">Botswana</option> 
                                <option value="CAF">Central African Republic</option> 
                                <option value="CAN">Canada</option> 
                                <option value="CCK">Cocos (Keeling) Islands</option> 
                                <option value="CHE">Switzerland</option> 
                                <option value="CHL">Chile</option> 
                                <option value="CHN">China</option> 
                                <option value="CIV">Cote d Ivoire</option>
                                <option value="CMR">Cameroon</option>
                                <option value="COD">Congo</option>
                                <option value="COG">Congo (Brazzaville)</option>
                                <option value="COK">Cook Islands</option>
                                <option value="COL">Colombia</option>
                                <option value="COM">Comoros</option>
                                <option value="CPV">Cape Verde</option>
                                <option value="CRI">Costa Rica</option>
                                <option value="CUB">Cuba</option>
                                <option value="CXR">Christmas Island</option>
                                <option value="CYM">Cayman Islands</option>
                                <option value="CYP">Cyprus</option>
                                <option value="CZE">Czech Republic</option>
                                <option value="DEU">Germany</option>
                                <option value="DJI">Djibouti</option>
                                <option value="DMA">Dominica</option>
                                <option value="DNK">Denmark</option>
                                <option value="DOM">Dominican Republic</option>
                                <option value="DZA">Algeria</option>
                                <option value="ECU">Ecuador</option>
                                <option value="EGY">Egypt</option>
                                <option value="ERI">Eritrea</option>
                                <option value="ESH">Western Sahara</option>
                                <option value="ESP">Spain</option>
                                <option value="EST">Estonia</option>
                                <option value="ETH">Ethiopia</option>
                                <option value="FIN">Finland</option>
                                <option value="FJI">Fiji</option>
                                <option value="FLK">Falkland Islands (Malvinas)</option>
                                <option value="FRA">France</option>
                                <option value="FRO">Faroe Islands</option>
                                <option value="FSM">Micronesia</option>
                                <option value="GAB">Gabon</option>
                                <option value="GBR">United Kingdom</option>
                                <option value="GEO">Georgia</option>
                                <option value="GGY">Guernsey</option>
                                <option value="GHA">Ghana</option>
                                <option value="GIB">Gibraltar</option>
                                <option value="GIN">Guinea</option>
                                <option value="GLP">Guadeloupe</option>
                                <option value="GMB">Gambia</option>
                                <option value="GNB">Guinea-Bissau</option>
                                <option value="GNQ">Equatorial Guinea</option>
                                <option value="GRC">Greece</option>
                                <option value="GRD">Grenada</option>
                                <option value="GRL">Greenland</option>
                                <option value="GTM">Guatemala</option>
                                <option value="GUF">French Guiana</option>
                                <option value="GUM">Guam</option>
                                <option value="GUY">Guyana</option> 
                                <option value="HKG">Hong Kong</option>  
                                <option value="HMD">Heard Island and Mcdonald Islands</option>
                                <option value="HND">Honduras</option>   
                                <option value="HRV">Croatia</option>    
                                <option value="HTI">Haiti</option>  
                                <option value="HUN">Hungary</option>    
                                <option value="IDN">Indonesia</option>  
                                <option value="IMN">Isle of Man</option>    
                                <option value="IND">India</option>  
                                <option value="IOT">British Indian Ocean Territory</option> 
                                <option value="IRL">Ireland</option>    
                                <option value="IRN">Iran</option>   
                                <option value="IRQ">Iraq</option>   
                                <option value="ISL">Iceland</option>    
                                <option value="ISR">Israel</option> 
                                <option value="ITA">Italy</option>  
                                <option value="JAM">Jamaica</option>    
                                <option value="JEY">Jersey</option> 
                                <option value="JOR">Jordan</option> 
                                <option value="JPN">Japan</option>  
                                <option value="KAZ">Kazakhstan</option> 
                                <option value="KEN">Kenya</option>  
                                <option value="KGZ">Kyrgyzstan</option> 
                                <option value="KHM">Cambodia</option>   
                                <option value="KIR">Kiribati</option>   
                                <option value="KNA">Saint Kitts and Nevis</option>  
                                <option value="KOR">Korea</option>  
                                <option value="KWT">Kuwait</option> 
                                <option value="LAO">Lao PDR</option>    
                                <option value="LBN">Lebanon</option>    
                                <option value="LBR">Liberia</option>    
                                <option value="LBY">Libya</option>  
                                <option value="LCA">Saint Lucia</option>
                                <option value="LIE">Liechtenstein</option>
                                <option value="LKA">Sri Lanka</option>
                                <option value="LSO">Lesotho</option>
                                <option value="LTU">Lithuania</option>
                                <option value="LUX">Luxembourg</option>
                                <option value="LVA">Latvia</option>
                                <option value="MAC">Macao</option>
                                <option value="MAF">Saint-Martin</option>
                                <option value="MAR">Morocco</option>
                                <option value="MCO">Monaco</option>
                                <option value="MDA">Moldova</option>
                                <option value="MDG">Madagascar</option>
                                <option value="MDV">Maldives</option>
                                <option value="MEX">Mexico</option>
                                <option value="MHL">Marshall Islands</option>
                                <option value="MKD">Macedonia</option>
                                <option value="MLI">Mali</option>
                                <option value="MLT">Malta</option>
                                <option value="MMR">Myanmar</option>
                                <option value="MNE">Montenegro</option>
                                <option value="MNG">Mongolia</option>
                                <option value="MNP">Northern Mariana Islands</option>
                                <option value="MOZ">Mozambique</option>
                                <option value="MRT">Mauritania</option>
                                <option value="MSR">Montserrat</option>
                                <option value="MTQ">Martinique</option>
                                <option value="MUS">Mauritius</option>
                                <option value="MWI">Malawi</option>
                                <option value="MYS">Malaysia</option>
                                <option value="MYT">Mayotte</option>
                                <option value="NAM">Namibia</option>
                                <option value="NCL">New Caledonia</option>
                                <option value="NER">Niger</option>
                                <option value="NFK">Norfolk Island</option>
                                <option value="NGA">Nigeria</option>
                                <option value="NIC">Nicaragua</option>
                                <option value="NIU">Niue</option>
                                <option value="NLD">Netherlands</option>
                                <option value="NOR">Norway</option>
                                <option value="NPL">Nepal</option>
                                <option value="NRU">Nauru</option>
                                <option value="NZL">New Zealand</option>
                                <option value="OMN">Oman</option>
                                <option value="PAK">Pakistan</option>
                                <option value="PAN">Panama</option>
                                <option value="PCN">Pitcairn</option>
                                <option value="PER">Peru</option>
                                <option value="PHL">Philippines</option>
                                <option value="PLW">Palau</option>
                                <option value="PNG">Papua New Guinea</option>
                                <option value="POL">Poland</option>
                                <option value="PRI">Puerto Rico</option>
                                <option value="PRK">Korea</option>
                                <option value="PRT">Portugal</option>
                                <option value="PRY">Paraguay</option>
                                <option value="PSE">Palestinian Territory</option>
                                <option value="PYF">French Polynesia</option>
                                <option value="QAT">Qatar</option>
                                <option value="REU">Reunion</option>
                                <option value="ROU">Romania</option>
                                <option value="RUS">Russian Federation</option>
                                <option value="RWA">Rwanda</option>
                                <option value="SAU">Saudi Arabia</option>
                                <option value="SDN">Sudan</option>
                                <option value="SEN">Senegal</option>
                                <option value="SGP">Singapore</option>
                                <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                <option value="SHN">Saint Helena</option>
                                <option value="SJM">Svalbard and Jan Mayen Islands</option>
                                <option value="SLB">Solomon Islands</option>
                                <option value="SLE">Sierra Leone</option>
                                <option value="SLV">El Salvador</option>
                                <option value="SMR">San Marino</option>
                                <option value="SOM">Somalia</option>
                                <option value="SPM">Saint Pierre and Miquelon</option>
                                <option value="SRB">Serbia</option>
                                <option value="SSD">South Sudan</option>
                                <option value="STP">Sao Tome and Principe</option>
                                <option value="SUR">Suriname</option>
                                <option value="SVK">Slovakia</option>
                                <option value="SVN">Slovenia</option>
                                <option value="SWE">Sweden</option>
                                <option value="SWZ">Swaziland</option>
                                <option value="SYC">Seychelles</option>
                                <option value="SYR">Syrian Arab Republic (Syria)</option>
                                <option value="TCA">Turks and Caicos Islands</option>
                                <option value="TCD">Chad</option>
                                <option value="TGO">Togo</option>
                                <option value="THA">Thailand</option>
                                <option value="TJK">Tajikistan</option>
                                <option value="TKL">Tokelau</option>
                                <option value="TKM">Turkmenistan</option>
                                <option value="TLS">Timor-Leste</option>
                                <option value="TON">Tonga</option>
                                <option value="TTO">Trinidad and Tobago</option>
                                <option value="TUN">Tunisia</option>
                                <option value="TUR">Turkey</option>
                                <option value="TUV">Tuvalu</option>
                                <option value="TWN">Taiwan, Republic of China</option>
                                <option value="TZA">Tanzania</option>
                                <option value="UGA">Uganda</option>
                                <option value="UKR">Ukraine</option>
                                <option value="UMI">United States Minor Outlying Islands</option>
                                <option value="URY">Uruguay</option>
                                <option value="USA">United States of America</option>
                                <option value="UZB">Uzbekistan</option>
                                <option value="VAT">Holy See</option>
                                <option value="VCT">Saint Vincent and Grenadines</option>
                                <option value="VEN">Venezuela</option>
                                <option value="VGB">British Virgin Islands</option>
                                <option value="VIR">Virgin Islands, US</option>
                                <option value="VNM">Viet Nam</option>
                                <option value="VUT">Vanuatu</option>
                                <option value="WLF">Wallis and Futuna Islands</option>
                                <option value="WSM">Samoa</option>  
                                <option value="YEM">Yemen</option>      
                                <option value="ZAF">South Africa</option>
                                <option value="ZMB">Zambia</option>
                                <option value="ZWE">Zimbabwe</option>                           
                            </select>
                            
                            <label>City:</label>
                            <span class="txt_red small_txt"><?php echo $cityErr;?></span>
                            <input type="text" class="input-contact"  name="mstrCity" required />
                            </div>
                             <div class="col-md-6 fc-content">
                            <label>Zip:</label>
                            <span class="txt_red small_txt"><?php echo $zipErr;?></span>
                            <input type="text" class="input-contact" name="mstrZip" required />
                            </div>
                            <div class="col-md-6 fc-content">
                            <label>Enter amount you want to pay:</label>
                            <span class="txt_red small_txt"><?php echo $amountErr;?></span>
                            <input type="text" class="input-contact"  name="amount" required />
                            </div>
                        </div>
                        <div class="col-md-12 fc-content2 col-md-offset-8" >
                        <br>
                            <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg" />
                            <input type="submit" name="submit" value="Pay Now" class="btn btn-primary btn-lg" /> 
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div><!--Close col 12 -->
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
    

	</body>

</html>