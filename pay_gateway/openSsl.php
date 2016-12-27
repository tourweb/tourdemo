<?php require_once('../indiator_admin/connect.php');
$con=new clscon();
$link=$con->db_connect();
$PaymentId = $_COOKIE['PaymentId'];
$invoicedata = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM open_payment WHERE id='".$PaymentId."'"));
$billname = $invoicedata['name'];
$billemail = $invoicedata['email'];
$billcntry = $invoicedata['country'];
$billadd = $invoicedata['address'];
$billcity = $invoicedata['city'];
$billstate = $invoicedata['state'];
$billzip = $invoicedata['zip'];
$ttlAmount = $invoicedata['payment'];
$CurrCode = $invoicedata['currency'];

$merchant_arr = array('INR' => "32017642", 'USD' => "32017659");

$MermainID = $merchant_arr[$CurrCode];
//echo $MermainID; die;

setcookie("MerchantID",$MermainID,time()+86400);



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


	/*$erroContent = "$oMerchant->setMerchantDetails ('".$MermainID."', '".$MermainID."', '".$MermainID."', '".$_SERVER['REMOTE_ADDR']."', '".rand()."', '"."INDTOR".$PaymentId."', 'https://indiator.com/pay_gateway/SFAopenResponse.php', 'POST', '".$CurrCode."', 'IT".$PaymentId."', 'req.Preauthorization', '".$ttlAmount.".00', '', 'Ext1', 'true', 'Ext3', 'Ext4', 'Ext5')<br>
	$oBTA->setAddressDetails ('ITOR".$PaymentId."', '".$bill_name."', '".$billadd."', '', '', '".$billcity."', '".$billstate."', '".$billzip."', '".$billcntry."', '".$billemail."')<br>
	$oSTA->setAddressDetails ('".$billadd."', '', '', '".$billcity."', '".$billstate."', '".$billzip."', '".$billcntry."', '".$billemail."')";
	$my_file = 'paymentError.txt';
	$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);		
	$data = $erroContent."\n";
	fwrite($handle, $data);		
	fclose($handle);*/	
	
	$oMerchant->setMerchantDetails($MermainID,$MermainID,$MermainID,$_SERVER['REMOTE_ADDR'],rand(),"INDTOR".$PaymentId,"https://indiator.com/pay_gateway/SFAopenResponse.php","POST",$CurrCode,"IT".$PaymentId,"req.Preauthorization",$ttlAmount.".00","","Ext1","true","Ext3","Ext4","Ext5");
	$oBTA->setAddressDetails ("ITOR".$PaymentId,$billname,$billadd,'','',$billcity,$billstate,$billzip,$billcntry,$billemail);
	$oSTA->setAddressDetails ($billadd,'','',$billcity,$billstate,$billzip,$billcntry,$billemail);
	
	$oPGResp=$oPostLibphp->postSSL($oBTA,$oSTA,$oMerchant,$oMPI,$oPGReserveData);


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