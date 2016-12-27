<?php include"common.php";
require_once('indiator_adm/connect.php');

if($_REQUEST['id']!=""){
	$user_id = $_REQUEST['id'];
	$query_res = mysql_query("select * from  booking_res where user_id_no=".$user_id);
	$row_res = mysql_fetch_array($query_res);
	$num_rows_res = mysql_num_rows($query_res);
	
	if($num_rows_res==1){ 
		if($row_res['res_code']==0){ $message = "Thank you for the Payment.<br>Please download the receipt of your payment from the link below.<br>Please contact us here if there was any complications in the payment process.";}
	}else{
		$message = $row_res['res_msg'];
		while($row = mysql_fetch_array($query_res)){
			$message_tot.= $row['res_msg']."##";
		}
		$message_tot = substr($message_tot,0,strlen($message_tot)-2);
		$last_pos = strrpos($message_tot,"##");
		$message = substr($message_tot, $last_pos+2,strlen($message_tot));
	}
}
// OPEN - ICICI PAYMENT Success RESPONSE 
if($_REQUEST['oid']!=""){
	$user_id = $_REQUEST['oid'];
	$query_res = mysql_query("select * from  open_payment where id=".$user_id);
	$row_res = mysql_fetch_array($query_res);
	$num_rows_res = mysql_num_rows($query_res);
	
	if($num_rows_res==1){ 
		if($row_res['res_code']==0){ $message = "Thank you for the Payment.<br>Please download the receipt of your payment from the link below.<br>Please contact us here if there was any complications in the payment process.";}
	} else{
		echo "Oops!!";
	}	
	
	//if($row_res['pay_by']=="Citrus"){
		$pdf="<a href='pdf/payment-pdf.php?ordr=".$user_id."' class='btn-brown' title='Download Payment Receipt pdf'><img src='".$domain."/images/pdf.png' alt='Download Payment Receipt pdf' width='18'> Download Payment Receipt</a>";
	/*}
	else {
		$pdf = "";
	}*/
}

$review_query = mysql_query("Select * from review where visibility=1 order by review_id ASC limit 3");
$review_count = mysql_num_rows($review_query);

include"top-inc.php";?>

<title>Success | Indiator</title>
<?php include"inc-script.php";?>
<link rel="stylesheet" href="<?php echo $domain;?>style/bxslider.css" type="text/css" media="screen" />

</head>

<body>

	<div class="main_content_area innerpage page">
    
    	<div class="breadcrumbs">
            <div class="block_container">
                <ol>
                    <li>
                        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                            <a href="<?php echo $domain;?>" itemprop="url" title="Home" class="pathway"><span itemprop="title">Home</span></a><strong>&nbsp; &gt; &nbsp;</strong>
                        </div>
                    </li>
                    
                    <li><div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="left"><span itemprop="title">Success</span></div></li>
                 </ol>                 
            </div>
        </div>
        
    	<div class="shadow_btm">
            <div class="block_container">
                <div>
                    <div class="left_content_area" id="top_desc">
                        <h1>Success</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="block_container">
        	<div>
        		<div class="page_relative">
                    <div class="left_content_area">
                    	
                        <p><?php echo $message; ?></p>
                    	<?php if($pdf!=""){echo $pdf;}?>
                        <div style="width:100%;">
                            <!-- Google Code for Booking Conversion Page -->
                            <script type="text/javascript">
                            /* <![CDATA[ */
                            var google_conversion_id = 981959998;
                            var google_conversion_language = "en";
                            var google_conversion_format = "2";
                            var google_conversion_color = "ffffcc";
                            var google_conversion_label = "L6ogCLDIlVgQvoqe1AM";
                            var google_remarketing_only = false;
                            /* ]]> */
                            </script>
                            <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
                            </script>
                            <noscript>
                            <div style="display:inline;">
                            <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/981959998/?label=L6ogCLDIlVgQvoqe1AM&amp;guid=ON&amp;script=0"/>
                            </div>
                            </noscript>                 
                         </div>
                    </div>
                    
                    <aside>
                                       
                        <div class="tour_info">
                            <h2><br><br>Instant Travel Assistance</h2>
                        </div>
                        
                        <div class="shadow_btm form">
                        	<?php include"instant-travel-form-inc.php";?>
                            <span class="txt_green small_txt">* Our destination expert will assist  you within 24 hrs.</span>
                        </div> 
                        
                        <?php if($review_count>0){?>
                        <div class="shadow_gray_all reviews_div">
                            <?php include"reviews-inc.php";?>
                        </div>
                        <?php }?>
                        
                    </aside>
                </div>
                
            </div>
        </div>
      
   </div>
    
	<?php include"header-inc.php";?>
    
     <?php include"find-short-tour-inc.php";?>
    
	<?php include"footer-inc.php";?> 
        	
<script type="text/javascript">
$('.find_short_tour_Area').insertBefore($('.breadcrumbs'));
$(document).ready(function(){
	/*hotels slider*/
	$('.reviewslider').bxSlider({
		mode: 'fade',
		captions: true,
		controls: false,
		auto: true
	});
});	
</script>
<script defer src="<?php echo $domain;?>script/bxslider.js"></script> 
</body>
</html>