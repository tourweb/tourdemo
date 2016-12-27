<?php
session_start();
include("indiator_admin/buslogic.php");
$tourid=$_POST["tourid"];
$b_date=$_POST["b_date"];
$tot_person=$_POST["tot_person"];
$total_trav=$_POST["total_trav"];
$tour_code=$_POST["tour_code"];
$tour_name=$_POST["tour_name"];
$inclusions=$_POST["inclusions"];
if(isset($_POST["btnbook"]))
{
  $amount=$_POST["amount"];
  $amnt_sts="Full Payment";
}
if(isset($_POST["btnhalf"]))
{
  $amount=$_POST["half"];
  $amnt_sts="20% payment";
}
$aname = implode(",",$_POST['adult_name']);
if(isset($_POST['child_name']))
$cname = implode(",",$_POST['child_name']);
else{ $cname=0;}
if(isset($_POST['infant_name']))
$iname = implode(",",$_POST['infant_name']);
else{ $iname=0;}
$aage = implode(",",$_POST['adult_age']);
if(isset($_POST['child_age']))
$cage = implode(",",$_POST['child_age']);
else{ $cage=0;}
if(isset($_POST['infant_age']))
$iage = implode(",",$_POST['infant_age']);
else{ $iage=0;}
$mrmsa = implode(",",$_POST['mrmsa']);
if(isset($_POST['mrmsc']))
$mrmsc = implode(",",$_POST['mrmsc']);
else{ $mrmsc=0;}
if(isset($_POST['mrmsi']))
$mrmsi = implode(",",$_POST['mrmsi']);
else{ $mrmsi=0;}
$con_name=$_POST['con_name'];
$con_email=$_POST['con_email'];
$con_country=$_POST['country'];
$con_state=$_POST['state'];
$con_city=$_POST['city'];
$con_zip=$_POST['zipcode'];
$con_ccode=$_POST['con_ccode'];
$con_phone=$_POST['con_phone'];
$con_add=$_POST['con_add'];
$con_pickup=$_POST['con_pickup'];
$con_special=$_POST['con_special'];
$today_date=date('y-m-d h:i:s');
$invoice_no="INV".rand(10,1000);
$customer_no="CUST".rand(10,1000);
$order_no="ORD".rand(10,1000);
$con=new clscon();
$link1=$con->db_connect();
$uquery="SELECT username FROM users WHERE username = '".$con_email."'";
$ures=  mysqli_query($link1,$uquery);
if(mysqli_num_rows($ures)>0)
{
echo "";
}
else{
$user_query="insert into users(name,username,password) values('$con_name','$con_email','$con_phone')";
$user_res=  mysqli_query($link1, $user_query);
}
$con=new clscon();
$link=$con->db_connect();
$qry1="insert into tb_booking(tour_id,date,adult_name,child_name,infant_name,adult_age,child_age,infant_age,mrmsa,mrmsc,mrmsi,con_name,con_email,city,country,state,zipcode,con_ccode,con_phone,con_add,con_pickup,con_special,booking_status,today_date,invoice_no,customer_no,order_no,amount,amnt_sts,total_trav) values ($tourid,'$b_date','$aname','$cname','$iname','$aage','$cage','$iage','$mrmsa','$mrmsc','$mrmsi','$con_name','$con_email','$con_city','$con_country','$con_state','$con_zip','$con_ccode','$con_phone','$con_add','$con_pickup','$con_special','Confirmed','$today_date','$invoice_no','$customer_no','$order_no','$amount','$amnt_sts','$total_trav')";
$res1=  mysqli_query($link, $qry1);
$tid=mysqli_insert_id($link);
echo mysqli_error($link);

if(mysqli_affected_rows($link)==1)
{   
$to = "sunil@myflighttrip.com";
$subject = "Indiator- Booked Trip Detail Reference No. INTOR".$tid;
$message = "<html>";
$message .= "<head>\r\n";
$message .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n";
$message .= "<title>Indiator</title>\r\n";
$message .= "<style type=\"text/css\">\r\n";
$message .= " body{
            width: 100%; 
            background-color: #9f9fa3; 
            margin:0; 
            padding:0; 
            -webkit-font-smoothing: antialiased;
        }
        
        html{
            width: 100%; 
        }
        
        table{
            font-size: 14px;
            border: 0;
        }
     /* ----------- responsivity ----------- */
     @media only screen and (max-width: 768px){
      .container {
        width: 650px;
        }
      .4_grids{
        width: 300px !important;
      }
      .container-middle{width: 420px !important;}
     }
        @media only screen and (max-width: 640px){
        
            /*------ top header ------ */
            .header-bg{width: 440px !important; height: 10px !important;}
            .main-header{line-height: 28px !important;}
            .main-subheader{line-height: 28px !important;}
            
            /*----- --features ---------*/
            .feature{width: 420px !important;}
            .feature-middle{width: 400px !important; text-align: center !important;}
            .feature-img{width: 440px !important; height: auto !important;}
            
            .container{width: 500px !important;}
            .container-middle{width: 420px !important;}
            .mainContent{width: 400px !important;}
            
            .main-image{width: 400px !important; height: auto !important;}
            .banner{width: 400px !important; height: auto !important;}
            /*------ sections ---------*/
            .section-item{width: 400px !important;}
            .section-img{width: 400px !important; height: auto !important;}
            /*------- prefooter ------*/
            .prefooter-header{padding: 0 10px !important; line-height: 24px !important;}
            .prefooter-subheader{padding: 0 10px !important; line-height: 24px !important;}
            /*------- footer ------*/
            .top-bottom-bg{width: 420px !important; height: auto !important;}
            .feature1{
        width:200px !important;
      }
      .img-responsive{
        width:100%;
      }
        }
    @media only screen and (max-width: 480px){
      .container {
        width: 200px !important;
      }
      .icon {
        width: 70%;
      }
    }
        @media only screen and (max-width: 479px){
        
          /*------ top header ------ */
            .header-bg{width: 280px !important; height: 10px !important;}
            .top-header-left{width: 260px !important; text-align: center !important;}
            .top-header-right{width: 260px !important;}
            .main-header{line-height: 28px !important; text-align: center !important;}
            .main-subheader{line-height: 28px !important; text-align: center !important;}
            
            /*------- header ----------*/
            .logo{width: 260px !important;}
            .nav{width: 260px !important;}
            
            /*----- --features ---------*/
            .feature{width: 260px !important;}
            .feature-middle{width: 240px !important; text-align: center !important;}
            .feature-img{width: 260px !important; height: auto !important;}

            
            .container{width: 290px !important;}
            .container-middle{width: 260px !important;}
            .mainContent{width: 240px !important;}
            
            .main-image{width: 240px !important; height: auto !important;}
            .banner{width: 240px !important; height: auto !important;}
            /*------ sections ---------*/
            .section-item{width: 240px !important;}
            .section-img{width: 240px !important; height: auto !important;}
            /*------- prefooter ------*/
            .prefooter-header{padding: 0 10px !important;line-height: 28px !important;}
            .prefooter-subheader{padding: 0 10px !important; line-height: 28px !important;}
            /*------- footer ------*/
            .top-bottom-bg{width: 260px !important; height: auto !important;}
      table {
          width: 100% !important;
      }
            .gallery-img a img {
        height: 134px !important;
      }
      .gallery-img1 a img {
        height: 60px !important;
      }
      .gallery-img2 a img {
        height: 60px !important;
      }
      }
    @media only screen and (max-width: 320px){
      .ban{
        background: url(images/banner.jpg) no-repeat -260px 0px;
        background-size: cover;
      }
    }
     ";
    
$message .= "</style>\r\n";
$message .= "</head>\r\n";
$message .="
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
  <table border=0 width=100% cellpadding=0 cellspacing=0>
   <tr bgcolor='FFFFFF'>

                    <td>
                      <table style='background-color:#F1F1F1;border:4px solid #DE5420;' width='700' align='justify' cellpadding='2' cellspacing='3' class='container-middle'>
               <tr><td align='right'><a href='javascript:window.print()'>Print</a></td></tr>
                <tr><td><center><img src='https://indiator.com/images/logo.jpg' alt='indiator'/></center></td></tr>
                
                <tr>
                  <td>
                    <table  width='700' align='justify' cellpadding='2' cellspacing='3' class='container-middle'>
                      <tr><td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Dear $con_name,</td></tr>
                      <tr>
                        <td style='font-size:1.1em; color:black;font-family:Lucida Sans;line-height:1.8em;'><b>Thank you for your booking! Please find below, the summary of your booking with Reference no. INTOR$tid</b>
                        </td>
                      </tr>
                      <tr style='background-color:#DE5420;'>
                        <td style='font-size:2em;color:white;font-family:Century Gothic;'><b>Booking Details </b></td>
                      </tr>
                        <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Tour Code: <span style='color:black;'>$tour_code </span></td>
                      </tr>
                       <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Tour Name:<span style='color:black;'> $tour_name </span></td>
                      </tr>
                      <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Total Passengers: <span style='color:black;'>$total_trav </span></td>
                      </tr>
                           <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Travelling date: <span style='color:black;'>$b_date </span></td>
                      </tr>
                           <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Amount: <span style='color:black;'>USD $ $amount ( $amnt_sts ) </span></td>
                      </tr>
                      <tr style='background-color:#DE5420;'>
                        <td style='font-size:2em;color:white;font-family:Century Gothic;'><b>Passenger Details</b> </td>
                      </tr>
                        <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Lead Passenger Name:<span style='color:black;'> $con_name </span></td>
                      </tr>
                       <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Contact No.:<span style='color:black;'> $con_phone </span></td>
                      </tr>
                      <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Email-id: <span style='color:black;'>$con_email </span></td>
                      </tr>
                           <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Address: <span style='color:black;'>$con_add </span></td>
                      </tr>
                           <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Pickup Details: <span style='color:black;'> $con_pickup </span></td>
                      </tr>
                       <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Special Requirements: <span style='color:black;'> $con_special </span></td>
                      </tr>
                      <tr>
                        <td style='font-size:1em; color:black;font-family:Lucida Sans;line-height:1.8em;'>We are pleased to answer any questions you may have and aim to respond within 24 hours.
                        </td>
                      </tr>
                      <tr style='background-color:#DE5420;'>
                        <td style='font-size:2em;color:white;font-family:Century Gothic;'><b>Trip Inclusions</b> </td>
                      </tr>
                        <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'><span style='color:black;'> $inclusions </span></td>
                      </tr>
                       <tr style='background-color:#DE5420;'>
                        <td style='font-size:2em;color:white;font-family:Century Gothic;'><b>Login Details</b> </td>
                      </tr>
                        <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'><span style='color:black;'>Username/Email-id : $con_email</span></td>
                      </tr>
                      <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'><span style='color:black;'>Password : $con_phone</span></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr><td height='20'></td></tr>
                
                <tr>
                  <td>
                    <table border='0' width='400' align='left' cellpadding='0' cellspacing='0' class='container-middle'>
                    
                      
                      <tr>
                        <td style='font-size:1.0em;color:#4f90fe;font-family:Century Gothic;text-align:justify;'>Contact Us</td>
                      </tr>
                      
                     
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                  <td style='font-size:1em;color:#999;font-family:Lucida Sans;text-align:justify;'>A-15,SECTOR-3 NOIDA,U.P,INDIA PIN - 201301 </td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                  <td style='font-size:1em;color:#999;font-family:Lucida Sans;text-align:justify;'>Phone : +91 9871107030 <a href='mailto:info@indiator.com' style='color:#fb8a2e;'>info@indiator.com</a></td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>

               
                    </table>

                  </td>
                  <tr>
                <table width='700'>
                 <tr style='background-color:#DE5420;'>
                        <td style='font-size:1em;color:white;font-family:Century Gothic;text-align:center;'><b>Book 2nd Tour<br> Get 10% Discount</b> </td>
                        <td style='font-size:1em;color:white;font-family:Century Gothic;text-align:center;'><b>Book 3rd Tour<br> Get 15% Discount</b> </td>
                        <td style='font-size:1em;color:white;font-family:Century Gothic;text-align:center;'><b>Book Airport Transfer<br> Get $5 Discount</b></td>
                      </tr>
                      </table>
                      </tr>
                       <tr>
                  <td style='font-family: Century Gothic; font-size: 1em; color: #999999;text-align:center; line-height: 24px;' class='editable'>
                    *Terms and Conditions apply 
                  </td>
                </tr>
                <tr>
                  <td style='font-family: Century Gothic; font-size: 1em; color: #999999;text-align:center; line-height: 24px;' class='editable'>
                    
                    <!-- Edit Copyright Text -->
                    
                    © 2016 Indiator All rights reserved. Website: <a href='https://indiator.com/' style='color:#4f90fe; text-decoration:none;'>Indiator.com</a>


                  </td>
                </tr>
                
                <tr><td height='10'></td></tr>
                
              </table>
            </td>
          </tr>
  </table>
</body>
</html>
";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$headers .= 'From: <info@indiator.com>' . "\r\n";


mail($to,$subject,$message,$headers);
mail($con_email,$subject,$message,$headers); 
header("Location:pay_gateway/TestSsl.php?id=$tid");
    $con->db_close();  
}
else 
{ 
  $con->db_close();
}

 ?>