<?php 

set_include_path('lib'.PATH_SEPARATOR.get_include_path());
require_once('lib/Citruspay.php');

if(isset($_POST['submit']))
{
	$merchantAccessKey = $_POST['merchantAccessKey'];
	$transactionId = $_POST['transactionId'];
	$pgTxnId = $_POST['pgTxnId'];
	$RRN = $_POST['RRN'];
	$authIdCode = $_POST['authIdCode'];
	$currencyCode = "INR";
	$txnType = $_POST['txnType'];
	$amount = $_POST['amount'];
	$bankName = "ABC Bank";

	$tarr = array(
			"merchantAccessKey" => "$merchantAccessKey",
			"transactionId" => "$transactionId",
			"pgTxnId" => "$pgTxnId",
			"RRN" => "$RRN",
			"authIdCode" => "$authIdCode",
			"currencyCode" => "$currencyCode",
			"txnType" => "$txnType",
			"amount" => "$amount",
			"bankName" => "$bankName",
	);

	CitrusPay::setApiKey("2ed3c0afebbad088dd55a6de3454ac66761c6ab2",'sandbox');

	$response = Refund::create($tarr,CitrusPay::getApiKey());

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Test Refund</title>
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
						<?php 
						if(!isset($_POST['submit']))
						{
							?>
						<form action="testRefund.php" method="POST" name="TransactionForm">
							<li class="clearfix"> <label width="125px;"> Merchant Access Key:</label><input class="text"
									name="merchantAccessKey" type="text" value="" />
							</li>
							<li class="clearfix"> <label width="125px;"> Transaction ID:</label><input class="text" name="transactionId"
									type="text" value="" />
							</li>
							<li class="clearfix"> <label width="125px;"> pgTxnId:</label><input class="text" name="pgTxnId" type="text"
									value="" />
							</li>
							<li class="clearfix"> <label width="125px;"> RRN:</label><input class="text" class="text" name="RRN" type="text"
									value="" />
							</li>
							<li class="clearfix"> <label width="125px;"> authIdCode:</label><input class="text" name="authIdCode" type="text"
									value="" />
							</li>
							<input name="txnType" type="hidden" value="R" />
							<li class="clearfix"> <label width="125px;"> amount:</label><input class="text" name="amount" type="text"
									value="" />
							</li>
							<li class="clearfix"> <label width="125px;"></label>
								<input type="submit" class="btn-orange" name="submit" value="Test Transaction" /> <input
									type="reset" class="btn" name="reset" value="Cancel" />
							</li>

						</form>
						<?php
						}
						else
						{
							echo "<p>Response Code is ". $response->get_resp_code()."</p>";
							echo "<p>Response Message is ". $response->get_resp_msg()."</p>";
							echo "<p>Transaction ID is ". $response->get_txn_id()."</p>";
							echo "<p>PG Transaction ID is ". $response->get_pg_txn_id()."</p>";
							echo "<p>Auth ID Code is ". $response->get_auth_id_code()."</p>";
							echo "<p>RRN is ". $response->get_rrn()."</p>";
							echo "<p>Amount is ". $response->get_amount()."</p>";
						}
						?>
					</ul>
				</div>
			</div>
			<div
				style="padding-left: 700px; padding-bottom: 20px; padding-top: 20px;">
				<div>Copyrights © 2012 Citrus.</div>
			</div>
		</div>
	</div>
</body>
</html>
