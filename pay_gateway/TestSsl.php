<?php require_once('../indiator_admin/connect.php');
$id=$_REQUEST['id'];
 $con=new clscon();
  $link=$con->db_connect();
  $query="select * from tb_booking where book_id=".$id;
  $res= mysqli_query($link, $query);

$num_rows = mysqli_num_rows($res);

if($num_rows<1){	echo "Client Id does not match. Go back and try again!"; die;	}

else{  $row = mysqli_fetch_array($res);

	$id 			= $row['book_id'];
	setcookie("Testuser", $id, time()+3600);  
	$tour_code		= $row['tour_id'];
	$MermainID 		= "32017659";
	$IP_addr 		= trim($_SERVER['REMOTE_ADDR']);
//setMerchantDetails
	$order_no 		= "INDTOR".$id;
	$response_url 	= "https://indiator.com/pay_gateway/SFAResponse.php";
	$method 		= "POST";
	$amount 		= number_format($row['amount'], 2, '.', '');//$amount 		= $row['amt'];	//$amount 		= "1";
	$currency 		= "USD";
	if($currency=="USD"){$currency_code	= "840";}	
	$invoice_no 	= "IT".$id;
	$booking_date 	= $row['date'];
	$tour_name 		= trim(iconv('UTF-8', 'ISO-8859-1',$row['tour_id']));
	$cust_code = "ITOR".$id;
//oBTA setAddressDetails
	$bill_name 		= trim(iconv('UTF-8', 'ISO-8859-1',$row['con_name']));
	$bill_email		= trim($row['con_email']);
	$bill_ph 		= trim($row['con_phone']);
	$bill_add1 		= trim($row['con_add']);
	$bill_add2 		= "";												//trim($_POST['mstrAddLine2']);
	$bill_add3 		= "";												//trim($_POST['mstrAddLine3']);
	$bill_city 		= trim($row['city']);
	$bill_state 	= trim($row['state']);
	$bill_zip 		= trim($row['zipcode']);
	$bill_country	= trim($row['country']);
//oSTA setAddressDetails	
	/*
	$ship_name 		= trim(iconv('UTF-8', 'ISO-8859-1',$_POST['shipmstrname']));
	$ship_email		= trim($_POST['shipmstremail']);
	$ship_ph 		= trim($_POST['shipmstrtel']);
	$ship_add1 		= trim($_POST['shipmstrAddLine1']);
	$ship_add2 		= "";												//trim($_POST['shipmstrAddLine2']);
	$ship_add3 		= "";												//trim($_POST['shipmstrAddLine3']);
	$ship_city 		= trim($_POST['shipmstrCity']);
	$ship_state 	= trim($_POST['shipmstrState']);
	$ship_zip 		= trim($_POST['shipmstrZip']);
	$ship_country	= trim($_POST['shipmstrCountry']);*/
	$ship_name 		= trim(iconv('UTF-8', 'ISO-8859-1',$row['con_name']));
	$ship_email		= trim($row['con_email']);
	$ship_ph 		= trim($row['con_phone']);
	$ship_add1 		= trim($row['con_add']);
	$ship_add2 		= "";												//trim($_POST['mstrAddLine2']);
	$ship_add3 		= "";												//trim($_POST['mstrAddLine3']);
	$ship_city 		= trim($row['city']);
	$ship_state 	= trim($row['state']);
	$ship_zip 		= trim($row['zipcode']);
	$ship_country	= trim($row['country']);
	
	if(($bill_name=="") || ($bill_email=="") || ($bill_ph=="") || ($bill_add1=="") || ($bill_city=="") || ($bill_state=="") || ($bill_zip=="") || ($bill_country=="") || ($ship_name=="") || ($ship_email=="") || ($ship_ph=="") || ($ship_add1=="") || ($ship_city=="") || ($ship_state=="") || ($ship_zip=="") || ($ship_country=="")){
		echo "Some fields are missing go back and try again"; die;
	}
	
	//$update_query = mysql_query("Update booking_info set currency='".$currency."', currency_code='".$currency_code."', cust_code='".$cust_code."', order_no='".$order_no."', invoice_no='".$invoice_no."', bill_name='".$bill_name."', bill_email='".$bill_email."', bill_ph='".$bill_ph."', bill_add1='".$bill_add1."', bill_add2='".$bill_add2."', bill_add3='".$bill_add3."', bill_city='".$bill_city."', bill_state='".$bill_state."', bill_zip='".$bill_zip."', bill_country='".$bill_country."', ship_name='".$ship_name."', ship_email='".$ship_email."', ship_ph='".$ship_ph."', ship_add1='".$ship_add1."', ship_add2='".$ship_add2."', ship_add3='".$ship_add3."', ship_city='".$ship_city."', ship_state='".$ship_state."', ship_zip='".$ship_zip."', ship_country='".$ship_country."' where id=".$id);
}


include("Sfa/BillToAddress.php");
include("Sfa/CardInfo.php");
include("Sfa/Merchant.php");
include("Sfa/MPIData.php");
include("Sfa/ShipToAddress.php");
include("Sfa/PGResponse.php");
include("Sfa/PostLibPHP.php");
include("Sfa/PGReserveData.php");

$oMPI 			= 	new MPIData();
$oCI			=	new	CardInfo();
$oPostLibphp	=	new	PostLibPHP();
$oMerchant		=	new	Merchant();
$oBTA			=	new	BillToAddress();
$oSTA			=	new	ShipToAddress();
$oPGResp		=	new	PGResponse();
$oPGReserveData =	new PGReserveData();
	
	$oMerchant->setMerchantDetails($MermainID,$MermainID,$MermainID,$IP_addr,$id,$order_no,$response_url,$method,$currency,$invoice_no,"req.Preauthorization",$amount,"","Ext1","true","Ext3","Ext4","Ext5");
	$oBTA->setAddressDetails ($cust_code,$bill_name,$bill_add1,$bill_add2,$bill_add3,$bill_city,$bill_state,$bill_zip,$ship_country,$bill_email	);
	$oSTA->setAddressDetails ($ship_add1,$ship_add2,$ship_add3,$ship_city,$ship_state,$ship_zip,$ship_country,$ship_email);
	
	$oPGResp=$oPostLibphp->postSSL($oBTA,$oSTA,$oMerchant,$oMPI,$oPGReserveData);
	
/*$oMerchant->setMerchantDetails("00002116","00002116","00002116","10.10.10.238",rand()."","Ord1234","http://localhost/merchant/SFAResponse.php","POST","INR","INV123","req.Sale","100","","Ext1","true","Ext3","Ext4","New PHP");
$oBTA->setAddressDetails ("CID","Tester","Aline1","Aline2","Aline3","Pune","A.P","48927489","IND","info@myflighttrip.com");
$oSTA->setAddressDetails ("Add1","Add2","Add3","City","State","443543","IND","info@myflighttrip.com");*/
#$oMPI->setMPIRequestDetails("1245","12.45","356","2","2 shirts","12","20011212","12","0","","image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/vnd.ms-powerpoint, application/vnd.ms-excel, application/msword, application/x-shockwave-flash, */*","Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0)");

if($oPGResp->getRespCode() == '000'){
	$url	=$oPGResp->getRedirectionUrl();
	#$url =~ s/http/https/;
	#print "Location: ".$url."\n\n";
	#header("Location: ".$url);
	redirect($url);
}else{
	print "Error Occured.<br>";
	print "Error Code:".$oPGResp->getRespCode()."<br>";
	print "Error Message:".$oPGResp->getRespMessage()."<br>";
}

# This will remove all white space
#$oResp =~ s/\s*//g;

# $oPGResp->getResponse($oResp);

#print $oPGResp->getRespCode()."<br>";

#print $oPGResp->getRespMessage()."<br>";

#print $oPGResp->getTxnId()."<br>";

#print $oPGResp->getEpgTxnId()."<br>";

function redirect($url) {
	if(headers_sent()){
	?>
		<html><head>
			<script language="javascript" type="text/javascript">
				window.self.location='<?php print($url);?>';
			</script>
		</head></html>
	<?php
		exit;
	} else {
		header("Location: ".$url);
		exit;
	}
}
?>