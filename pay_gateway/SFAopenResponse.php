<?php require_once('../indiator_admin/connect.php');
include("Sfa/EncryptionUtil.php");
$PaymentId = $_COOKIE['PaymentId'];
$con=new clscon();
$link=$con->db_connect();
$open_pay_data = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM open_payment WHERE id='".$PaymentId."'"));
$CurrCode = $open_pay_data['currency'];
$merchant_arr = array('INR' => "32017642", 'USD' => "32017659", 'GBP' => "32017667", 'EUR' => "32017675", 'CAD' => "32017683");
//$MermainID = $merchant_arr[$CurrCode];

		 $strMerchantId=$merchant_arr[$CurrCode];
		 $astrFileName=$merchant_arr[$CurrCode].".key";
		 $astrClearData;
		 $ResponseCode = "";
		 $Message = "";
		 $TxnID = "";
		 $ePGTxnID = "";
	     $AuthIdCode = "";
		 $RRN = "";
		 $CVRespCode = "";
		 $Reserve1 = "";
		 $Reserve2 = "";
		 $Reserve3 = "";
		 $Reserve4 = "";
		 $Reserve5 = "";
		 $Reserve6 = "";
		 $Reserve7 = "";
		 $Reserve8 = "";
		 $Reserve9 = "";
		 $Reserve10 = "";


		 if($_POST){

			if($_POST['DATA']==null){
				print "null is the value";
			}
			 $astrResponseData=$_POST['DATA'];
			 $astrDigest = $_POST['EncryptedData'];
			 $oEncryptionUtilenc = 	new 	EncryptionUtil();
			 $astrsfaDigest  = $oEncryptionUtilenc->getHMAC($astrResponseData,$astrFileName,$strMerchantId);

			if (strcasecmp($astrDigest, $astrsfaDigest) == 0) {
			 parse_str($astrResponseData, $output);
			 if( array_key_exists('RespCode', $output) == 1) {
			 	$ResponseCode = $output['RespCode'];
			 }
			 if( array_key_exists('Message', $output) == 1) {
			 	$Message = $output['Message'];
			 }
			 if( array_key_exists('TxnID', $output) == 1) {
			 	$TxnID=$output['TxnID'];
			 }
			 if( array_key_exists('ePGTxnID', $output) == 1) {
			 	$ePGTxnID=$output['ePGTxnID'];
			 }
			 if( array_key_exists('AuthIdCode', $output) == 1) {
			 	$AuthIdCode=$output['AuthIdCode'];
			 }
			 if( array_key_exists('RRN', $output) == 1) {
			 	$RRN = $output['RRN'];
			 }
			 if( array_key_exists('CVRespCode', $output) == 1) {
			 	$CVRespCode=$output['CVRespCode'];
			 }
			}
		 }
	/*print "<h6>Response Code:: $ResponseCode <br>";
	print "<h6>Response Message:: $Message <br>";
	print "<h6>Auth ID Code:: $AuthIdCode <br>";
	print "<h6>RRN:: $RRN<br>";
	print "<h6>Transaction id:: $TxnID<br>";
	print "<h6>Epg Transaction ID:: $ePGTxnID<br>";
	print "<h6>CV Response Code:: $CVRespCode<br>";
	die;*/
	
	
	$to_date = date('Y-m-d H:i:s');
	switch ($ResponseCode)
	{
		case '0':	//"Transaction Successful"
				$updatequery = ("UPDATE open_payment SET `res_code`='$ResponseCode', `res_msg`='$Message', `auth_code`='$AuthIdCode', `rrn`='$RRN', `tran_id`='$TxnID', `epg_tran_id`='$ePGTxnID', `cv_res_code`='$CVRespCode', `txn_date`='$to_date', status='yes' WHERE id=$PaymentId");
				if(mysqli_query($link,$updatequery)){	
						setcookie("sucessmsg", $Message, time()+3600); 
						header("location:../success.php?oid=".$PaymentId);
					}
				else{mysqli_error();}
		break;
		
		case '1':	//"Rejected by the Switch"
				$updatequery = ("UPDATE open_payment SET `res_code`='$ResponseCode', `res_msg`='$Message', `auth_code`='$AuthIdCode', `rrn`='$RRN', `tran_id`='$TxnID', `epg_tran_id`='$ePGTxnID', `cv_res_code`='$CVRespCode', `txn_date`='$to_date' WHERE id=$PaymentId");
				if(mysqli_query($link,$updatequery)){
					setcookie("failuremsg", $Message, time()+3600); 
					header("location:../failure.php?oid=".$PaymentId);
				}
				else{mysqli_error();}
		break;
		
		case '2':	//"Rejected by the Payment Gateway"
				$updatequery = ("UPDATE open_payment SET `res_code`='$ResponseCode', `res_msg`='$Message', `auth_code`='$AuthIdCode', `rrn`='$RRN', `tran_id`='$TxnID', `epg_tran_id`='$ePGTxnID', `cv_res_code`='$CVRespCode', `txn_date`='$to_date' WHERE id=$PaymentId");
				if(mysqli_query($link,$updatequery)){	
					setcookie("failuremsg", $Message, time()+3600);  
					header("location:../failure.php?oid=".$PaymentId);
				}
				else{mysqli_error();}
		break;
	}
?>