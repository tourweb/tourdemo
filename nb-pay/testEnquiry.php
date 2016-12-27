<?php 

set_include_path('lib'.PATH_SEPARATOR.get_include_path());
require_once('lib/Citruspay.php');

if(isset($_POST['submit']))
{
	$merchantAccessKey = $_POST['merchantAccessKey'];
	$transactionId = $_POST['transactionId'];
	$bankName = $_POST['bankName'];


	$tarr = array(
			"merchantAccessKey" => "$merchantAccessKey",
			"transactionId" => "$transactionId",
			"bankName" => "$bankName",
	);

	CitrusPay::setApiKey("2ed3c0afebbad088dd55a6de3454ac66761c6ab2",'sandbox');

	$response = Enquiry::create($tarr,CitrusPay::getApiKey());

	if($response->get_resp_code() == 200 && is_a($response, 'EnquiryCollection')) 
	{
		$enquiry = $response->get_enquiry();

		$html = "<div style=\"overflow:auto;\">";
		$html .= "<h3>Transaction History</h3>";
		$html .= "<ul id=\"chkoutPageUserPramList\" class=\"tbl-wrapper clearfix\">" ;
		$html .= "<li class=\"tbl-header\" style=\"width: 960px;\">";
		$html .= "<div style=\"width: 2000px;\">";
		$html .= "<div class=\"tbl-col col-1\">TXN Response Code</div>";
		$html .= "<div class=\"tbl-col col-2\">TXN Response Message</div>";
		$html .= "<div class=\"tbl-col col-3\">TXN ID</div>";
		$html .= "<div class=\"tbl-col col-4\">AUTH ID</div>";
		$html .= "<div class=\"tbl-col col-5\">PG TXN ID</div>";
		$html .= "<div class=\"tbl-col col-6\">RRN</div>";
		$html .= "<div class=\"tbl-col col-7\">TXN TYPE</div>";
		$html .= "<div class=\"tbl-col col-8\">TXN DATE</div>";
		$html .= "<div class=\"tbl-col col-9\">Amount</div>";
		$html .= "<div class=\"tbl-col col-9\">Transaction Gateway</div>";
		$html .= "<div class=\"tbl-col col-10\">Payment Mode</div>";
		$html .= "<div class=\"tbl-col col-10\">Issuer Code</div>";
		$html .= "<div class=\"tbl-col col-10\">Masked Card Number</div>";
		$html .= "<div class=\"tbl-col col-10\">Card Type</div>";
		$html .= "<div class=\"tbl-col col-10\">Total Refunded Amount</div>";
		$html .= "</div>";
		$html .= "</li>";
		
		for($i=0;$i < count($enquiry);++$i)
		{
			$enqObj = $enquiry[$i];
			$html .= "<li style=\"width: 960px;\">";
			$html .= "<div style=\"width: 2000px;\">";
			$html .= "<div class=\"tbl-col col-1\">".$enqObj->get_resp_code()."</div>";
			$html .= "<div class=\"tbl-col col-2\">".$enqObj->get_resp_msg()."</div>";
			$html .= "<div class=\"tbl-col col-3\">".$enqObj->get_txn_id()."</div>";
			$html .= "<div class=\"tbl-col col-4\">".$enqObj->get_auth_id_code()."</div>";
			$html .= "<div class=\"tbl-col col-5\">".$enqObj->get_pg_txn_id()."</div>";
			$html .= "<div class=\"tbl-col col-6\">".$enqObj->get_rrn()."</div>";
			$html .= "<div class=\"tbl-col col-7\">".$enqObj->get_txn_type()."</div>";
			$html .= "<div class=\"tbl-col col-8\">".$enqObj->get_txn_date_time()."</div>";
			$html .= "<div class=\"tbl-col col-9\">".$enqObj->get_amount()."</div>";
			$html .= "<div class=\"tbl-col col-9\">".$enqObj->get_txn_gateway()."</div>";
			$html .= "<div class=\"tbl-col col-10\">".$enqObj->get_payment_mode()."</div>";
			$html .= "<div class=\"tbl-col col-10\">".$enqObj->get_issuer_code()."</div>";
			$html .= "<div class=\"tbl-col col-10\">".$enqObj->get_masked_card_number()."</div>";
			$html .= "<div class=\"tbl-col col-10\">".$enqObj->get_card_type()."</div>";
			if($enqObj->get_txn_type() == 'SALE'){
				$html .= "<div class=\"tbl-col col-1\">".$enqObj->get_total_refund_amount()."</div>";
			}else{
				$html .= "<div class=\"tbl-col col-1\">N/A</div>";
			}
			$html .= "</div>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		$html .= "</div>";
	}
	else
	{
		$html = "<p>Response Code is ".$response->get_resp_code()."</p>";
		$html .= "<p>Response Message is ".$response->get_resp_msg()."</p>";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CitrusPay: Test Enquiry</title>
<link href="css/default.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="page-header">
		<div class="page-wrap">
			<div class="logo-wrapper">
				<a href="http://www.citruspay.com/"> <img height="32" width="81"
					src="images/logo_citrus.png" alt="Citrus" />
				</a>
			</div>
		</div>
	</div>

	<div id="page-client-logo">&#160;</div>
	<div id="page-wrapper">
		<div class="box-white">
			<div class="page-content">
				<div>
					<ul class="form-wrapper add-merchant clearfix">
						<form action="testEnquiry.php" method="POST"
							name="TransactionForm">
							<li class="clearfix"><label width="125px;"> Merchant Access Key:</label><input
								name="merchantAccessKey" class="text" type="text" value="" />
							</li>
							<li class="clearfix"><label width="125px;"> Transaction ID:</label><input
								class="text" name="transactionId" type="text" value="" />
							</li> <input class="text" name="bankName" type="hidden"
								value="ABC" />
							<li class="clearfix"><label width="125px;"></label> <input
								type="submit" class="btn-orange" name="submit"
								value="Test Transaction" /> <input type="reset" class="btn"
								name="reset" value="Cancel" />
							</li>

						</form>
					</ul>
				</div>
				<?php 
				if(isset($_POST['submit']))
				{
					echo $html;
				}
				?>

			</div>
			<div
				style="padding-left: 700px; padding-bottom: 20px; padding-top: 20px;">
				<div>Copyrights © 2012 Citrus.</div>
			</div>
		</div>
	</div>

</body>
</html>
