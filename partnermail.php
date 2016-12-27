<?php
session_start();
include("indiator_admin/buslogic.php");
$companyname=$_POST["companyname"];
 $officialname=$_POST["officialname"];
  $businesstype=$_POST["businesstype"];
  $fname=$_POST["fname"];
  $lname=$_POST["lname"];
  $position=$_POST["position"];
  $email=$_POST["email"];
  $phonenumber=$_POST["phonenumber"];
  $faxnumber=$_POST["faxnumber"];
  $website=$_POST["website"];
  $country=$_POST["country"];
  $state=$_POST["state"];
  $city=$_POST["city"];
  $address=$_POST["address"];
$con=new clscon();
$link=$con->db_connect();
$query="insert into partner(companyname,officialname,businesstype,firstname,lastname,position,email,phonenumber,faxnumber,website,country,state,city,address) values ('$companyname','$officialname','$businesstype','$fname','$lname','$position','$email','$phonenumber','$faxnumber','$website','$country','$state','$city','$address')";
$res1=  mysqli_query($link, $query);
$pid=mysqli_insert_id($link);
echo mysqli_error($link);
if(mysqli_affected_rows($link)==1)
{   
  
$to = "sunil@myflighttrip.com";
$subject = "Thanks for becoming a partner- Indiator";
$subjects = "Indiator- New Partner Details PTN10".$pid;
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
                      <table style='border:1px solid #FF590B;' width='600' align='center' cellpadding='0' cellspacing='0' class='container-middle'>
               
                <tr><td><img src='https://indiator.com/images/logo.jpg' alt='indiator' align='right'/></td></tr>
                
                <tr>
                  <td>
                    <table border='0' width='600' align='center' cellpadding='0' cellspacing='0' class='container-middle'>
                      <tr><td style='font-size:1.5em;color:#136ad5;font-family:Century Gothic;text-align:left;padding-left:10px;'>Dear $fname,</td></tr>
                      <tr>
                        <td style='font-size:2em;color:#136ad5;font-family:Century Gothic;text-align:center;'>Thanks for investing your precious time with us. </span></td>
                      </tr>
                      <tr><td height='20'></td></tr>
                      <tr>
                        <td style='font-size:1em; color:black;font-family:Lucida Sans;text-align:justify;line-height:1.8em;padding-left:5px;padding-right:5px;'>We are pleased to answer any questions you may have and aim to respond within 1-4 hours. It is a really great pleasure for us to become partners with such a firm as yours are. Your high reputation and many years’ experience mean a lot to us. We are sure that our cooperation will lead to the mutual benefits in a long term.

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
                      <table style='background-color:#F1F1F1;border:4px solid #DE5420;' width='700' align='justify' cellpadding='2' cellspacing='3' class='container-middle'>
               
                <tr><td><center><img src='https://indiator.com/images/logo.jpg' alt='indiator'/></center></td></tr>
                
                <tr>
                  <td>
                    <table  width='700' align='justify' cellpadding='2' cellspacing='3' class='container-middle'>
                      
                      
                      <tr style='background-color:#DE5420;'>
                        <td style='font-size:2em;color:white;font-family:Century Gothic;'><b>New Partner Details </b></td>
                      </tr>
                        <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Partner ID: PTN10 $pid<span style='color:black;'>$tour_code </span></td>
                      </tr>
                       <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Company Name:<span style='color:black;'> $companyname </span></td>
                      </tr>
                      <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Official Name: <span style='color:black;'>$officialname </span></td>
                      </tr>
                           <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Business Type: <span style='color:black;'>$businesstype</span></td>
                      </tr>
                           <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Website Address: <span style='color:black;'>$website</span></td>
                      </tr>
                      <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Phone Number: <span style='color:black;'>$phonenumber</span></td>
                      </tr>
                      <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Fax Number: <span style='color:black;'>$faxnumber</span></td>
                      </tr>
                      <tr style='background-color:#DE5420;'>
                        <td style='font-size:2em;color:white;font-family:Century Gothic;'><b>Personal Details</b> </td>
                      </tr>
                        <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Contact Person Name:<span style='color:black;'> $fname $lname </span></td>
                      </tr>
                       <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Job Position:<span style='color:black;'> $position </span></td>
                      </tr>
                      <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Email-id: <span style='color:black;'>$email </span></td>
                      </tr>
                       <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Country: <span style='color:black;'>$country </span></td>
                      </tr>
                       <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>State: <span style='color:black;'>$state </span></td>
                      </tr>
                       <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>City: <span style='color:black;'> $city </span></td>
                      </tr>
                           <tr>
                        <td style='font-size:1.1em;color:#4f90fe;font-family:Century Gothic;'>Address: <span style='color:black;'>$address </span></td>
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
mail($to,$subjects,$messages,$headers);
mail($email,$subject,$message,$headers); 
header("Location:thankyou.php");
    $con->db_close();  
}
else 
{ 
  $con->db_close();
  
}

 ?>