<?php
require_once('../indiator_admin/connect.php');
$con=new clscon();
$link=$con->db_connect();
set_include_path('lib'.PATH_SEPARATOR.get_include_path());
require_once 'Zend/Crypt/Hmac.php';

function generateHmacKey($data, $apiKey=null){
	$hmackey = Zend_Crypt_Hmac::compute($apiKey, "sha1", $data);
	return $hmackey;
}

$user_id = $_COOKIE['PaymentId'];

$txnid = "";
$txnrefno = "";
$txnstatus = "";
$txnmsg = "";
$firstName = "";
$lastName = "";
$email = "";
$street1 = "";
$city = "";
$state = "";
$country = "";
$pincode = "";
$mobileNo = "";
$signature = "";
$reqsignature = "";
$data = "";
$txnGateway = "";
$paymentMode = "";
$maskedCardNumber = "";
$cardType = "";
$flag = "dataValid";

if(isset($_POST['TxId']))
{
	$txnid = $_POST['TxId'];
	$data .= $txnid;
}
if(isset($_POST['TxStatus']))
{
	$txnstatus = $_POST['TxStatus'];
	$data .= $txnstatus;
}
if(isset($_POST['amount']))
{
	$amount = $_POST['amount'];
	$data .= $amount;
}
if(isset($_POST['pgTxnNo']))
{
	$pgtxnno = $_POST['pgTxnNo'];
	$data .= $pgtxnno;
}
if(isset($_POST['issuerRefNo']))
{
	$issuerrefno = $_POST['issuerRefNo'];
	$data .= $issuerrefno;
}
if(isset($_POST['authIdCode']))
{
	$authidcode = $_POST['authIdCode'];
	$data .= $authidcode;
}
if(isset($_POST['firstName']))
{
	$firstName = $_POST['firstName'];
	$data .= $firstName;
}
if(isset($_POST['lastName']))
{
	$lastName = $_POST['lastName'];
	$data .= $lastName;
}
if(isset($_POST['pgRespCode']))
{
	$pgrespcode = $_POST['pgRespCode'];
	$data .= $pgrespcode;
}
if(isset($_POST['addressZip']))
{
	$pincode = $_POST['addressZip'];
	$data .= $pincode;
}
if(isset($_POST['signature']))
{
	$signature = $_POST['signature'];
}
/*signature data end*/

if(isset($_POST['TxRefNo']))
{
	$txnrefno = $_POST['TxRefNo'];
}
if(isset($_POST['TxMsg']))
{
	$txnmsg = $_POST['TxMsg'];
}
if(isset($_POST['email']))
{
	$email = $_POST['email'];
}
if(isset($_POST['addressStreet1']))
{
	$street1 = $_POST['addressStreet1'];
}
if(isset($_POST['addressStreet2']))
{
	$street2 = $_POST['addressStreet2'];
}
if(isset($_POST['addressCity']))
{
	$city = $_POST['addressCity'];
}
if(isset($_POST['addressState']))
{
	$state = $_POST['addressState'];
}
if(isset($_POST['addressCountry']))
{
	$country = $_POST['addressCountry'];
}

if(isset($_POST['mandatoryErrorMsg']))
{
	$mandatoryerrmsg = $_POST['mandatoryErrorMsg'];
}
if(isset($_POST['successTxn']))
{
	$successtxn = $_POST['successTxn'];
}
if(isset($_POST['mobileNo']))
{
	$mobileNo = $_POST['mobileNo'];
}
if(isset($_POST['txnGateway']))
{
	$txnGateway = $_POST['txnGateway'];
}
if(isset($_POST['paymentMode']))
{
	$paymentMode = $_POST['paymentMode'];
}
if(isset($_POST['maskedCardNumber']))
{
	$maskedCardNumber = $_POST['maskedCardNumber'];
}
if(isset($_POST['cardType']))
{
	$cardType = $_POST['cardType'];
}

$respSignature = generateHmacKey($data,"cb6940d88da81b589c08998c126948a8738c9990");

if($signature != "" && strcmp($signature, $respSignature) != 0)
{
	$flag = "dataTampered";
}

$InvoiceId = $_COOKIE['PaymentId'];					
$modify_date = date('Y-m-d H:i:s');
	
switch ($pgrespcode)
{
	case '0':	//Successful Transaction
		$transactionstatus = ", status='yes'";
		$TransactionUpdateQuery = ("UPDATE open_payment SET res_code=$pgrespcode, res_msg='$txnmsg', auth_code='$authidcode', rrn='$txnrefno', tran_id='$txnid', epg_tran_id='$pgtxnno', cv_res_code='$issuerrefno', txn_date='$modify_date', pay_by='Citrus' $transactionstatus WHERE id=$InvoiceId");
		if(mysqli_query($link,$TransactionUpdateQuery)){
			setcookie("sucessmsg", $txnmsg, time()+3600); 
			header("location:../success.php?oid=".$user_id);
		}
	break;									
	case '1':	//Rejected By Bank
		$transactionstatus = "";
		$TransactionUpdateQuery = ("UPDATE open_payment SET res_code=$pgrespcode, res_msg='$txnmsg', auth_code='$authidcode', rrn='$txnrefno', tran_id='$txnid', epg_tran_id='$pgtxnno', cv_res_code='$issuerrefno', txn_date='$modify_date', pay_by='Citrus' $transactionstatus WHERE id=$InvoiceId");
		if(mysqli_query($link,$TransactionUpdateQuery)){
			setcookie("failuremsg", $txnmsg, time()+3600); 
			header("location:../failure.php?oid=".$user_id);
		}
	break;									
	case '2':	//Rejected By Gateway
		$transactionstatus = "";
		$TransactionUpdateQuery = ("UPDATE open_payment SET res_code=$pgrespcode, res_msg='$txnmsg', auth_code='$authidcode', rrn='$txnrefno', tran_id='$txnid', epg_tran_id='$pgtxnno', cv_res_code='$issuerrefno', txn_date='$modify_date', pay_by='Citrus' $transactionstatus WHERE id=$InvoiceId");
		if(mysqli_query($link,$TransactionUpdateQuery)){
			setcookie("failuremsg", $txnmsg, time()+3600); 
			header("location:../failure.php?oid=".$user_id);
		}
	break;									
	case '3':	//Txn Cancelled On SSL page
		$transactionstatus = "";
		$TransactionUpdateQuery = ("UPDATE open_payment SET res_code=$pgrespcode, res_msg='$txnmsg', auth_code='$authidcode', rrn='$txnrefno', tran_id='$txnid', epg_tran_id='$pgtxnno', cv_res_code='$issuerrefno', txn_date='$modify_date', pay_by='Citrus' $transactionstatus WHERE id=$InvoiceId");
		if(mysqli_query($link,$TransactionUpdateQuery)){
			setcookie("failuremsg", $txnmsg, time()+3600); 
			header("location:../failure.php?oid=".$user_id);
		}
	break;
}
?>