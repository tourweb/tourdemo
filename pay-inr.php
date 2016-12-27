<?php include"domain.php";
require_once('indiator_admin/connect.php');
date_default_timezone_set('Asia/Kolkata');
$con=new clscon();
$link=$con->db_connect();
$findInvoice = mysqli_fetch_array(mysqli_query($link,"SELECT max(id) FROM open_payment"));
$invoice = "IndTor028".$findInvoice[0];

set_include_path('nb-pay/lib'.PATH_SEPARATOR.get_include_path());
require_once('nb-pay/lib/CitrusPay.php');
require_once 'nb-pay/lib/Zend/Crypt/Hmac.php';

function generateHmacKey($data, $apiKey=null){
	$hmackey = Zend_Crypt_Hmac::compute($apiKey, "sha1", $data);
	return $hmackey;
}

$action = "pay-inr.php";
$flag = "";

CitrusPay::setApiKey("2ed3c0afebbad088dd55a6de3454ac66761c6ab2",'production');
$nameErr = "";
$lNameErr = "";
$emailErr = "";
$contactErr = "";
$addErr = "";
$cityErr = "";
$stateErr = "";
$zipErr = "";
$amountErr = "";
$cntryErr = "";
if(isset($_POST['submit']))
{
	if((trim($_POST['firstName'])!="") && (trim($_POST['lastName'])!="") && (trim($_POST['orderAmount'])!="") && (trim($_POST['email'])!="") && (trim($_POST['phoneNumber'])!="") && (trim($_POST['addressStreet1'])!="") && (trim($_POST['addressState'])!="") && (trim($_POST['addressCity'])!="") && (trim($_POST['addressZip'])!=""))
	{
		$ttlAmount = number_format($_POST['orderAmount'], 2, '.', '');		
		$insertBilling = "insert into open_payment(id, name, email, phone, country, address, city, state, zip, currency, payment, res_code, res_msg, auth_code, rrn, tran_id, epg_tran_id, cv_res_code, txn_date, pay_by, status) values(Null, '".$_POST['firstName']." ".$_POST['lastName']."', '".$_POST['email']."', '".$_POST['phoneNumber']."', '".$_POST['addressCountry']."', '".$_POST['addressStreet1']."', '".$_POST['addressCity']."', '".$_POST['addressState']."', '".$_POST['addressZip']."', 'INR', ".$ttlAmount.", '', '', '', '', '".$_POST['merchantTxnId']."', '', '', '', 'Citrus', 'no')";
		//echo $insertBilling; die;
		if(mysqli_query($link,$insertBilling))	
		{
			setcookie("PaymentId", mysql_insert_id(), time()+86400);
			$vanityUrl = "indiator";
			$currency = "INR";
			$merchantTxnId = $_POST['merchantTxnId'];
			$addressState = $_POST['addressState'];
			$addressCity = $_POST['addressCity'];
			$addressStreet1 = $_POST['addressStreet1'];
			$addressCountry = $_POST['addressCountry'];
			$addressZip = $_POST['addressZip'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$phoneNumber = $_POST['phoneNumber'];
			$email = $_POST['email'];
			$paymentMode = $_POST['paymentMode'];
			$issuerCode = $_POST['issuerCode'];
			$cardHolderName = $_POST['cardHolderName'];
			$cardNumber = $_POST['cardNumber'];
			$expiryMonth = $_POST['expiryMonth'];
			$cardType = $_POST['cardType'];
			$cvvNumber = $_POST['cvvNumber'];
			$expiryYear = $_POST['expiryYear'];
			$returnUrl = "https://indiator.com/nb-pay/Response.php";
			$orderAmount = $ttlAmount;
			$flag = "post";
			$data = "$vanityUrl$orderAmount$merchantTxnId$currency";
			$secSignature = generateHmacKey($data,CitrusPay::getApiKey());
			$action = CitrusPay::getCPBase()."$vanityUrl";  
			$time = time()*1000;
			$time = number_format($time,0,'.','');
			/* $iscod = $_POST['COD']; */
			
			/*$customParamsName = $_POST['customParamsName'];*/
			/*$customParamsValue = $_POST['customParamsValue'];*/
		}
	}
	else{
		$nameErr = "Please Enter First Name!";
		$lNameErr = "Please Enter Last Name!";
		$emailErr = "Please Enter Email!";
		$contactErr = "Please Enter Contact Number!";
		$addErr = "Please Enter Address!";
		$cityErr = "Please Enter City!";
		$stateErr = "Please Enter State!";
		$zipErr = "Please Enter Zip!";
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
<style>
.txt_red{
color:red;
}
</style>
                <!-- FIFTH EXAMPLE -->
                <div class="box-information">
                    <div class="box-content contact col-md-12">
                        
                       
                        <form action="<?php echo $action;?>" method="POST" name="TransactionForm" id="transactionForm">
                        <?php if($flag == "post") { ?>
                        	<input type="text" name="merchantTxnId" value="<?php echo $merchantTxnId;?>" />
                            <input type="text" name="firstName" value="<?php echo $firstName;?>" />
                            <input type="text" name="lastName" value="<?php echo $lastName;?>" />
                            <input type="text" name="addressStreet1" value="<?php echo $addressStreet1;?>" />
                            <input type="text" name="addressCity" value="<?php echo $addressCity;?>" />
                            <input type="text" name="addressState" value="<?php echo $addressState;?>" />                            	
                            <input type="text" name="addressZip" value="<?php echo $addressZip;?>" />
                            <input type="text" name="addressCountry" value="<?php echo $addressCountry;?>" />
                            <input type="text" name="phoneNumber" value="<?php echo $phoneNumber;?>" />
                            <input type="text" name="email" value="<?php echo $email;?>" />
                            <input type="hidden" name="paymentMode" value="<?php echo $paymentMode;?>" />
                            <input type="hidden" name="issuerCode" value="<?php echo $issuerCode;?>" />
                            <input type="hidden" name="cardHolderName" value="<?php echo $cardHolderName;?>" />
                            <input type="hidden" name="cardNumber" value="<?php echo $cardNumber;?>" />
                            <input type="hidden" name="expiryMonth" value="<?php echo $expiryMonth;?>" />
                            <input type="hidden" name="cardType" value="<?php echo $cardType;?>" />
                            <input type="hidden" name="cvvNumber" value="<?php echo $cvvNumber;?>" />
                            <input type="hidden" name="expiryYear" value="<?php echo $expiryYear;?>" />
                            <input type="hidden" name="returnUrl" value="<?php echo $returnUrl;?>" />
                            <input type="text" name="orderAmount" value="<?php echo $orderAmount;?>" />
                            <input type="hidden" name="reqtime" value="<?php echo $time;?>" />
                            <input type="hidden" name="secSignature" value="<?php echo $secSignature;?>" />
                            <input type="hidden" name="currency" value="<?php echo $currency;?>" />
                             <!-- Custom parameter section starts here. 
                            You can omit this section if no custom parameters have been defined. Hidden field value should be the name of the parameter created in Checkout settings page.
                            It should follow customParams[0].name, customParams[1].name .. naming convention. For each custom parameter created, a text field with the naming convention  
                            customParams[0].value,customParams[1].value .. should be captured. Please refer below code snippet for passing parameters to SSL Page.
                            Uncomment the for loop after the PHP tag to pass parameters to SSL Page
                            
                            Also refer the else part of this loop to see how to capture Custom Params on your website-->
                            <!-- Code for COD --> <!-- <p><label> COD:</label><input name="COD" type="text" value="<?php //echo $iscod;?>" /></p> -->
                        <?php 
							for($i=0;$i<count($customParamsName);++$i)
							{                                
							echo "<div><input type=\"text\" name=\"customParams[$i].name\" value=\"$customParamsName[$i]\" /></div>";
							echo "<div>$customParamsName[$i]: <input type=\"text\" name=\"customParams[$i].value\" value=\"$customParamsValue[$i]\" /></div>";
							}
							echo "</div>"; 
						} else {?>    
                    	<div class="block_leftarea">
                            <div class="col-md-6 fc-content">
                            <label>First Name:</label>
                            <span class="txt_red small_txt"><?php echo $nameErr;?></span>
                            <input name="firstName" class="input-contact" type="text" value="" required />
</div>
<div class="col-md-6 fc-content">
                             <label>Last Name:</label>
                            <span class="txt_red small_txt"><?php echo $lNameErr;?></span>
                            <input name="lastName" class="input-contact" type="text" value="" required />
                            
                            </div>
<div class="col-md-6 fc-content">
                            <label>State:</label>
                            <span class="txt_red small_txt"><?php echo $stateErr;?></span>
                            <input name="addressState" class="input-contact" type="text" value="" required />
                            </div>
<div class="col-md-6 fc-content">
                            <label>Zip Code:</label>
                            <span class="txt_red small_txt"><?php echo $zipErr;?></span>
                            <input name="addressZip" class="input-contact" type="text" value="" required />
                            </div>
<div class="col-md-6 fc-content">
                            <label>Email Id:</label>
                            <span class="txt_red small_txt"><?php echo $emailErr;?></span>
                            <input name="email" type="text" class="input-contact" value="" required />
                            </div>

                        
<div class="col-md-6 fc-content">
                            
                            <label>City:</label>
                            <span class="txt_red small_txt"><?php echo $cityErr;?></span>
                            <input name="addressCity" class="input-contact" type="text" value="" required />
                            </div>
<div class="col-md-6 fc-content">
                            <label>Country:</label>
                            <span class="txt_red small_txt"><?php echo $cntryErr;?></span>
                            <select name="addressCountry" class="input-contact"><option value="India">India &nbsp;</option></select>
                            </div>
<div class="col-md-6 fc-content">
                        	<label>Address:</label>
                            <span class="txt_red small_txt"><?php echo $addErr;?></span>
                            <input name="addressStreet1" class="input-contact" type="text" value="" required />
                           </div>

<div class="col-md-6 fc-content">
                            <label>Payment Mode:</label>
                            <span class="txt_red small_txt"><?php echo $cntryErr;?></span>
                            <select class="text input-contact" name="paymentMode" class="">
                                 <option value="NET_BANKING">NetBanking</option>
                                 <option value="CREDIT_CARD">Credit Card</option>
                                 <option value="DEBIT_CARD">Debit Card</option>
                            </select>
                            </div>
<div class="col-md-6 fc-content">
                            <label>Phone Number:</label>
                            <span class="txt_red small_txt"><?php echo $contactErr;?></span>
                            <input name="phoneNumber" class="input-contact" type="text" value="" required />
                            </div>
<div class="col-md-6 fc-content">
                            <label>Enter amount you want to pay:</label>
                            <span class="txt_red small_txt"><?php echo $amountErr;?></span>
                            <input type="text" class="input-contact" name="orderAmount" required />
                            
                            <label>&nbsp;</label>
                            <span>&nbsp;</span>
                            <span>&nbsp;</span>
                            
                        </div>
<div class="col-md-6 fc-content"><br>
                        	<input type="hidden" name="merchantTxnId" value="<?php echo $invoice;?>" />
                            <input type="hidden" name="returnUrl" value="https://indiator.com/nb-pay/Response.php" />
                            <input type="submit" name="submit" value="Pay Now" class="btn btn-primary btn-lg auto_width" /> 
                            <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg auto_width" /></div>
                            <?php }?>
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

<?php if($flag == "post"){?>
<script type="text/javascript">document.getElementById("transactionForm").submit();</script>
<?php }	?>

<?php include("includes/footer.php"); ?>
    

	</body>

</html>