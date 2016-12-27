<?php require_once('../indiator_admin/connect.php');

//$id = "4";<span style="float:left; margin-bottom:15px;"><small style="font-size:12px; color:#72A701;">India&acute;s #1 Transfers, Things To Do,<br>Activity N day tours Portal.</small></span>
$id = $_REQUEST['ordr'];

if($id!="")
{
	$con=new clscon();
	$link=$con->db_connect();
	$sql = mysqli_query($link,"SELECT * FROM open_payment WHERE id='".$id."' AND status='yes'");
	if(mysqli_num_rows($sql)==1){
		$sqlexqry = mysqli_fetch_array($sql);
		if($sqlexqry['pay_by']=="Citrus"){$paymentmode="NetBanking";}else{$paymentmode="Credit Card";}
	} else{
		echo "Oops!! there might be some problem. Go back and try again."; die;
	}	
	if($sqlexqry['status']=="yes"){$status="Paid";}
	$date = explode(' ', $sqlexqry['txn_date']);
	$html = '<h3 style="width:100%; margin-top:30px; text-align:center; margin-bottom:40px; font-size:20px;">Bill Receipt</h3>
	<h1 style="margin:0px; padding:30px 10px; background:url(https://indiator.com/images/logo.jpg); background-repeat:no-repeat; background-position:10px 7px; width:200px; "></h1><br>
	<small style="font-size:12px; color:black; font-family:Verdana, Arial, Helvetica, sans-serif; margin-top:5px;">India&acute;s #1 Transfers, Things To Do,<br>Activity N day tours Portal.</small>
		
	
	<div style="width:400px; float:left; margin-top:35px; line-height:23px;">
		<h3 style="margin:0px;">Bill To</h3>
		<div style="float:left; font-size:15px;">'.$sqlexqry['name'].'</div>
		<div style="float:left; font-size:15px; width:250px;">'.$sqlexqry['address'].',<br>'.$sqlexqry['city'].', '.$sqlexqry['state'].', '.$sqlexqry['zip'].'</div>
	</div>
	<div style="width:230px; float:right; margin-top:35px; line-height:29px; text-align:right;">	
		Invoice Number : IT-86'.$sqlexqry['id'].'<br>
		Date: '.$date[0].'
	</div>
	<div style="width:100%; margin-top:40px; font-size:14px; padding:4px 0; background-color:#CCCCCC;">
		<div style="width:120px; float:left; padding-left:5px;">AuthID Code</div>
		<div style="width:140px; float:left;">Transaction id</div>
		<div style="width:135px; float:left;">Payment Mode</div>
		<div style="width:140px; float:left;">Amount Paid</div>
		<div style="width:140px; float:left;">Payment Status</div>
	</div>
	<div style="width:100%; font-size:13px; padding:8px 0; border-bottom:1px solid #999">
		<div style="width:120px; float:left; padding-left:5px;">'.$sqlexqry['auth_code'].'&nbsp;</div>
		<div style="width:140px; float:left;">'.$sqlexqry['tran_id'].'&nbsp;</div>
		<div style="width:135px; float:left;">'.$paymentmode.'&nbsp;</div>
		<div style="width:140px; float:left;">'.$sqlexqry['currency'].' '.$sqlexqry['payment'].'&nbsp;</div>
		<div style="width:140px; float:left;">'.$status.'&nbsp;</div>
	</div>
	<address style="width:100%; text-align:right; font-size:12px; margin-top:80px;">Indiator<br>
	A-15, Sector-3 Noida<br>
	Uttar Pradesh , India Pin - 201301<br>
	Phone No: + 0091 9871107030<br>
	E-Mail : <a href="mailto:info@indiator.com">info@indiator.com</a><br>
	Website : indiator.com</address>';
	include("mpdf.php");
	$mpdf=new mPDF();
	$mpdf->WriteHTML($html);
	$mpdf->Output();
	$mpdf->Output('IT-Invoice.pdf', 'D');
	exit;	
} else {
	header('Location:../success.php');
}
//<div style="float:left; font-size:13px; color:#111111; width:110px;">Service / Product:</div><div style="float:left; font-size:15px;">'.$sqlexqry['service'].'</div>
?>