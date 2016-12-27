<?php
include "../login-chk.php";
$iid = $_REQUEST['iid'];
if($iid!="")
{
	$userdetail = mysql_fetch_array(mysql_query("SELECT uid,cname FROM client_login WHERE username='".$username."'"));
	
	$sql = mysql_query("SELECT * FROM client_invoice WHERE iid='".$iid."' AND uid='".$userdetail['uid']."' AND status='yes'");
	if(mysql_num_rows($sql)==1){
		$sqlexqry = mysql_fetch_array($sql);
	} else{
		echo "Oops!! there might be some problem. Go back and try again."; die;
	}
	$date = explode(' ', $sqlexqry['TxnDate']);
	$html = '<h1 style="margin:0px; color:#095539;">Memorable India</h1><h3 style="margin-top:0px;">Bill Receipt</h3>
	<div style="border:1px solid #095539; width:330px; padding:5px 10px; -webkit-border-radius:8px; -moz-border-radius:8px; border-radius:8px; float:left"><img src="http://www.memorableindia.com/images/memorable-india-logo.png" alt="" height="90" /><br><span style="color:#095539;">India Tours, Tour Operator and Travel Agent</span></div>
	<div style="width:230px; float:right; text-align:right; line-height:29px; padding-top:0px;">	
		Invoice Number : MI-'.$sqlexqry['invoice_nmbr'].'<br>
		Date: '.$date[0].'<br>
		Customer No.: 100'.$sqlexqry['iid'].'<br>
		Payment Mode: Card
	</div>
	<div style="width:100%; margin-top:20px; line-height:23px"><h3 style="margin:0px;">Bill To</h3>
		<div style="float:left; font-size:15px;">'.$userdetail['cname'].'</div>
		<div style="float:left; font-size:13px; color:#111111; width:110px;">Service / Product:</div><div style="float:left; font-size:15px;">'.$sqlexqry['service'].'</div>
		<div style="float:left; font-size:13px; color:#111111; width:56px;">Amount:</div><div style="float:left; font-size:15px;">'.$sqlexqry['currency'].' '.$sqlexqry['payment'].'</div>
	</div>
	<div style="width:100%; margin-top:25px; font-size:14px; padding:4px 0; background-color:#CCCCCC;">
		<div style="width:100px; float:left; padding-left:5px;">AuthID Code</div>
		<div style="width:140px; float:left;">RRN</div>
		<div style="width:130px; float:left;">Transaction id</div>
		<div style="width:155px; float:left;">Epg Transaction ID</div>
		<div style="width:150px; float:left;">CV Response Code</div>
	</div>
	<div style="width:100%; font-size:13px; padding:8px 0; border-bottom:1px solid #999">
		<div style="width:100px; float:left; padding-left:5px;">'.$sqlexqry['authIdCode'].'</div>
		<div style="width:140px; float:left;">'.$sqlexqry['rrn'].'</div>
		<div style="width:130px; float:left;">'.$sqlexqry['transactionId'].'</div>
		<div style="width:155px; float:left;">'.$sqlexqry['epgTransactionId'].'</div>
		<div style="width:150px; float:left;">'.$sqlexqry['cvResponseCode'].'</div>
	</div>
	<address style="width:100%; text-align:right; font-size:12px; margin-top:20px;">2nd Floor, 69 Shivaji Enclave<br>
	Rajouri Garden-110027<br>
	Mob. No: +91-9871148514 / +91-9999799453<br>
	E-Mail : <a href="mailto:info@memorableindia.com">info@memorableindia.com</a><br>
	Web : www.memorableindia.com</address>';
	include("mpdf.php");
	$mpdf=new mPDF();
	$mpdf->WriteHTML($html);
	//$mpdf->Output();
	$mpdf->Output('MyPDF.pdf', 'D');
	exit;
} else {
	header('Location:../previous.php');
}
?>