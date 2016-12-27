<?php
session_start();
include("../indiator_admin/buslogic.php");
$name=$_POST["name"];
$mob=$_POST["phone"];
$email=$_POST["email"];
$date=$_POST["arrvl_date"];
$dest = $_POST['city'];
$days=$_POST["people"];
$msg=$_POST["message"];
$id=rand(10,10000);
$to = "sunil@myflighttrip.com";
//$to="shivani.indiator@gmail.com";
$subject = "Thanks for contacting Indiator-QRY10".$id;
$subjects= "Query regarding Tours- QRY10".$id;
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

                    <td >
                      <table style='border:1px solid #FF590B;' width='600'  cellpadding='0' cellspacing='0' class='container-middle'>
               
                <tr><td align='center'><img src='https://indiator.com/images/logo.jpg' alt='indiator' align='center'/></td></tr>
                
                <tr>
                  <td>
                    <table border='0' width='600' align='center' cellpadding='0' cellspacing='0' class='container-middle'>
                      <tr><td style='font-size:1.0em;color:#136ad5;font-family:Century Gothic;text-align:center;'>Dear $name,</td></tr>
                      <tr>
                        <td style='font-size:2em;color:#136ad5;font-family:Century Gothic;text-align:center;'>Thank you <span style='color:#fb8a2e;'>for enquiring with us.</span></td>
                      </tr>
                      
                      <tr>
                        <td style='font-size:1em; color:#999;font-family:Lucida Sans;text-align:center;line-height:1.8em;'>We are pleased to answer any questions you may have and aim to respond within 1-4 hours.
                        </td>
                      </tr>
                     
                    </table>
                  </td>
                </tr>
                
                <tr><td height='20'></td></tr>
                
                <tr>
                  <td>
                    <table border='0' width='400' align='center' cellpadding='0' cellspacing='0' class='container-middle'>
                    
                      
                      <tr>
                        <td style='font-size:1.5em;color:#136ad5;font-family:Century Gothic;text-align:center;'>Contact Us</td>
                      </tr>
                      
                     
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                  <td style='font-size:1em;color:#999;font-family:Lucida Sans;text-align:center;'>A-15,SECTOR-3 NOIDA,U.P,INDIA PIN - 201301 </td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                  <td style='font-size:1em;color:#999;font-family:Lucida Sans;text-align:center;'>Phone : +91 9871107030 <a href='mailto:info@indiator.com' style='color:#fb8a2e;'>info@indiator.com</a></td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                  <td style='font-family: Century Gothic; font-size: 1em; color: #999999;text-align:center; line-height: 24px;' class='editable'>
                    
                    <!-- Edit Copyright Text -->
                    
                    © 2016 Indiator All rights reserved. Website: <a href='https://indiator.com/' style='color:#136AD5; text-decoration:none;'>Indiator.com</a>


                  </td>
                </tr>
                    </table>
                  </td>
                </tr>
                
                <tr><td height='30'></td></tr>
                
              </table>
            </td>
          </tr>
  </table>
</body>
</html>
";

$messages = "<html>";
$messages .= "<head>\r\n";
$messages .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n";
$messages .= "<title>Indiator</title>\r\n";
$messages .= "<style type=\"text/css\">\r\n";
$messages .= " body{
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
$messages .= "</style>\r\n";
$messages .= "</head>\r\n";
$messages .="
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
  <table border=0 width=100% cellpadding=0 cellspacing=0>
   <tr bgcolor='FFFFFF'>

                    <td>
                      <table style='border:1px solid #FF590B;' width='600' align='center' cellpadding='0' cellspacing='0' class='container-middle'>
               
                <tr><td align='center'><img src='https://indiator.com/images/logo.jpg' alt='indiator' /></td></tr>
                
                <tr>
                  <td>
                    <table border='0' width='600' align='center' cellpadding='3' cellspacing='2' class='container-middle'>
                      <tr><td style='font-size:1.2em;color:#136ad5;font-family:Century Gothic;'>Name :- $name </td></tr>
                    <tr><td style='font-size:1.2em;color:#136ad5;font-family:Century Gothic;'>Phone :- $mob </td></tr>
                      <tr><td style='font-size:1.2em;color:#136ad5;font-family:Century Gothic;'>Email :- $email </td></tr>
                      <tr><td style='font-size:1.2em;color:#136ad5;font-family:Century Gothic;'>Destinations :- $dest </td></tr>
                     
                     <tr><td style='font-size:1.2em;color:#136ad5;font-family:Century Gothic;'>No. of Days :- $date </td></tr>
                     <tr><td style='font-size:1.2em;color:#136ad5;font-family:Century Gothic;'>No. Of people :- $days </td></tr>
                     <tr><td style='font-size:1.2em;color:#136ad5;font-family:Century Gothic;'>Message :- $msg </td></tr>
                    </table>
                  </td>
                </tr>
                
                <tr><td height='20'></td></tr>
                
                <tr>
                  <td>
                    <table border='0' width='400' align='center' cellpadding='0' cellspacing='0' class='container-middle'>
                  
                
                <tr>
                  <td style='font-size:1em;color:#999;font-family:Lucida Sans;text-align:center;'>A-15,SECTOR-3 NOIDA,U.P,INDIA PIN - 201301 </td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                  <td style='font-size:1em;color:#999;font-family:Lucida Sans;text-align:center;'>Phone : +91 9871107030 <a href='mailto:info@indiator.com' style='color:#fb8a2e;'>info@indiator.com</a></td>
                </tr>
                
                <tr><td>&nbsp;</td></tr>
                
                <tr>
                  <td style='font-family: Century Gothic; font-size: 1em; color: #999999;text-align:center; line-height: 24px;' class='editable'>
                    
                    <!-- Edit Copyright Text -->
                    
                    © 2016 Indiator All rights reserved. Website: <a href='https://indiator.com/' style='color:#136AD5; text-decoration:none;'>Indiator.com</a>


                  </td>
                </tr>
                    </table>
                  </td>
                </tr>
                
                <tr><td height='30'></td></tr>
                
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


mail($to,$subjects,$messages,$headers);
mail($email,$subject,$message,$headers);
header("Location:https://indiator.com/holiday-offers/thank_you.html");

?>