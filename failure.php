<?php include("includes/domain.php");
require_once('indiator_admin/connect.php');
$con=new clscon();
$link=$con->db_connect();
if($_REQUEST['oid']!=""){
  $user_id = $_REQUEST['oid'];
  $query_res = mysqli_query($link,"select * from  booking_res where user_id_no=".$user_id);
  $row_res = mysqli_fetch_array($query_res,$link);
  $num_rows_res = mysqli_num_rows($query_res);
  
  if($num_rows_res==1){ $res_code = $row_res['res_code']; $message = $row_res['res_msg'];}
  else{
    $res_code = $row_res['res_code'];
    $message = $row_res['res_msg'];
    while($row = mysqli_fetch_array($query_res)){
      $message_tot.= $row['res_msg']."##";
    }
    $message_tot = substr($message_tot,0,strlen($message_tot)-2);
    $last_pos = strrpos($message_tot,"##");
    $message = substr($message_tot, $last_pos+2,strlen($message_tot));
  }
}
if($_REQUEST['oid']!=""){
  $user_id = $_REQUEST['oid'];
  $query_res = mysqli_query($link,"select * from  open_payment where id=".$user_id);
  $row_res = mysqli_fetch_array($query_res);
  $num_rows_res = mysqli_num_rows($link,$query_res);
  
  if($num_rows_res==1){ $res_code = $row_res['res_code']; $message = $row_res['res_msg'];}
  else{
    $res_code = $row_res['res_code'];
    $message = $row_res['res_msg'];
    while($row = mysqli_fetch_array($query_res)){
      $message_tot.= $row['res_msg']."##";
    }
    $message_tot = substr($message_tot,0,strlen($message_tot)-2);
    $last_pos = strrpos($message_tot,"##");
    $message = substr($message_tot, $last_pos+2,strlen($message_tot));
  }
}

if($res_code=="1"){ $head = "Rejected by the Switch";}
else { $head = "Rejected by the Payment Gateway";}
?>
<!doctype html>

<html>
<head>
    <title>Failure-Indiator</title>
    <meta charset="utf-8">
    <meta name="description" content="travel, trip, store, shopping, siteweb, cart">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'/>


        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/travel-mega-menu.css" rel="stylesheet" type="text/css" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" />
        <!--Carousel-->
        <link href="css/carousel/component.css" rel="stylesheet" type="text/css" />

        <link href="css/layout2.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp" type="text/javascript"></script>

</head>
	<body>

    <!-- Section Form Login and Register -->
    

<?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
    
  <section id="about2" class="about-section-top">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
               <div class="page-title pull-left">
                    <h2 class="title-about">Failure</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="index.php">HOME</a></li>
                    <li>/</li>
                   
                 
                </ul>
             </div>
          </div>
      </div>
    </section>
<section id="top-info-contact">
   <div class="container">
      <div class="row">
         <div class="contact-page col-md-12 effect-5 effects">
                <h1 style="color:red">Failure <?php echo $head;?></h1>
             <h3>Check your mail for Order and login Details</h3>
                  <p><?php echo $message; ?></p>
                      <?php if($pdf!=""){echo $pdf;}?>
               
                
              </div>
          </div>
     </div>
</section>   
                 




<?php include("includes/footer.php"); ?>
    

	</body>

</html>
