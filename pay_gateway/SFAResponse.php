<?php require_once('../indiator_admin/connect.php');
include("Sfa/EncryptionUtil.php"); 
$user_id = $_COOKIE['Testuser'];
		 $strMerchantId="32017659";
		 $astrFileName="32017659.key";
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
			 $oEncryptionUtilenc = 	new EncryptionUtil();
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
	
	
	$to_date = date('Y-m-d H:i:s');
	$con=new clscon();
  	$link=$con->db_connect();
	switch ($ResponseCode)
	{
		case '0':	//"Transaction Successful"
			$updatequery = "UPDATE tb_booking SET status='5' WHERE book_id=$user_id";
			if(mysqli_query($link,$updatequery)){
				$insertquery = "INSERT INTO `booking_res` (`id`, `user_id_no`, `res_code`, `res_msg`, `auth_code`, `rrn`, `tran_id`, `epg_tran_id`, `cv_res_code`, `txn_date`, `pay_by`, `status`)
			    VALUES  				('NULL', $user_id, '$ResponseCode', '$Message', '$AuthIdCode', '$RRN', '$TxnID', '$ePGTxnID', '$CVRespCode', '$to_date', 'ICICI', '5')";
				if(mysqli_query($link,$insertquery)){
					setcookie("sucessmsg", $Message, time()+3600); 
					header("location:../success.php?oid=".$user_id);
				}
				else{echo mysqli_error();}
			}
		break;
		
		case '1':	//"Rejected by the Switch"
			$updatequery = "UPDATE tb_booking SET status='1' WHERE book_id=$user_id";
			if(mysqli_query($link,$updatequery)){
				$insertquery = "INSERT INTO `booking_res` (`id`, `user_id_no`, `res_code`, `res_msg`, `auth_code`, `rrn`, `tran_id`, `epg_tran_id`, `cv_res_code`, `txn_date`, `pay_by`, `status`)
			    VALUES  				('NULL', $user_id, '$ResponseCode', '$Message', '$AuthIdCode', '$RRN', '$TxnID', '$ePGTxnID', '$CVRespCode', '$to_date', 'ICICI', '1')";
				if(mysqli_query($link,$insertquery)){
					setcookie("failuremsg", $Message, time()+3600); 
					header("location:../failure.php?oid=".$user_id);
				}
				else{echo mysqli_error();}
			}
		break;
		
		case '2':	//"Rejected by the Payment Gateway"
			$updatequery = "UPDATE tb_booking SET status='2' WHERE book_id=$user_id";
			if(mysqli_query($link,$updatequery)){
				$insertquery = "INSERT INTO `booking_res` (`id`, `user_id_no`, `res_code`, `res_msg`, `auth_code`, `rrn`, `tran_id`, `epg_tran_id`, `cv_res_code`, `txn_date`, `pay_by`, `status`)
			    VALUES  				('NULL', $user_id, '$ResponseCode', '$Message', '$AuthIdCode', '$RRN', '$TxnID', '$ePGTxnID', '$CVRespCode', '$to_date', 'ICICI', '2')";
				if(mysqli_query($link,$insertquery)){	
					setcookie("failuremsg", $Message, time()+3600);  
					header("location:../failure.php?oid=".$user_id);
				}
				else{echo mysqli_error();}
			}
			else{echo mysqli_error();}
		break;

	}
?>