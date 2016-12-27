<?php
include("includes/domain.php");
session_start();
include("indiator_admin/buslogic.php");
$tid=$_REQUEST["tid"];

if(isset($_POST["btnbook"]))
{
  $date=$_POST["date"];
 
    $adult=$_POST["adult"];
  
  $child=$_POST["child"];
  $infant=$_POST["infant"];

}
if(isset($_POST["search"])) {
  $location=$_POST["location"];
  $category=$_POST["category"];
  $con=new clscon();
  $link=$con->db_connect();
  $qry="select * from tb_cities where city_id=".$location;
  $res= mysqli_query($link, $qry);
  $r=mysqli_fetch_array($res);
  $loc="$r[1]";
   $qry1="select * from tb_tour_category where cat_id=".$category;
  $res1= mysqli_query($link, $qry1);
  $r1=mysqli_fetch_array($res1);
  $cat=str_replace(' ', '-',trim($r1[1]));
  header("location:$domain$loc/$cat/$location/$category");
}
?>
<!doctype html>
<html>
<head>
  <?php 
     $con=new clscon();
      $link=$con->db_connect();
      $qrym="select * from tb_meta_tags where tour_id=$tid";
      $resm= mysqli_query($link, $qrym);
      $arrm=array();
      $m=0;
        while($rm= mysqli_fetch_array($resm))
        {
            $arrm[$m]=$rm;
            $m++;
  ?>
    <title><?php echo $arrm[0][2]; ?></title>
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo $arrm[0][3]; ?>">
    <meta name="description" content="<?php echo $arrm[0][4]; ?>">
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>

<?php include_once 'includes/header.php';?>
        <link href="<?php echo $domain; ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/animate.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/settings_slide2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/travel-mega-menu.css" rel="stylesheet" type="text/css" />
        <!--Carousel-->
        <link href="<?php echo $domain; ?>css/carousel/component.css" rel="stylesheet" type="text/css" />
        <!--List-->
        <link href="<?php echo $domain; ?>css/list/component.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/layout2.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo $domain; ?>css/jquery-ui.css"/>
        <link href="<?php echo $domain; ?>css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $domain; ?>css/dcalendar.picker.css" rel="stylesheet" type="text/css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        body  {
          font-size:13px !important; 
          color:black !important; 
        }
        </style>
       
        <script type="text/javascript">
var country_arr = new Array("1","2", "3", "4","5", "6", "7", "8");

var s_a = new Array();
s_a[0]="";
s_a[1]="1|2|3|4|5|6|7";
s_a[2]="1|2|3|4|5|6";
s_a[3]="1|2|3|4|5";
s_a[4]="1|2|3|4";
s_a[5]="1|2|3";
s_a[6]="1|2";
s_a[7]="1";
s_a[8]="0";
function print_country(country){
    //given the id of the <select> tag as function argument, it inserts <option> tags
    var option_str = document.getElementById(country);
    option_str.length=0;
    option_str.options[0] = new Option('Adult','');
    option_str.selectedIndex = 0;
    for (var i=0; i<country_arr.length; i++) {
    option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
    }
}

function print_state(state, selectedIndex){
    var option_str = document.getElementById(state);
    option_str.length=0;    // Fixed by Julian Woods
    option_str.options[0] = new Option('Child','');
    option_str.selectedIndex = 0;
    var state_arr = s_a[selectedIndex].split("|");
    for (var i=0; i<state_arr.length; i++) {
    option_str.options[option_str.length] = new Option(state_arr[i],state_arr[i]);
    }
}
</script>
</head>
  <body><?php include_once("analyticstracking.php") ?>

<?php include("includes/contact-info.php"); ?>
<?php include("includes/login.php"); ?>
    <?php include("includes/menu.php"); ?>
    <div class="clear"></div>
    <section class="about-section-top">
       <div class="container">
<?php include("short_tour.php"); ?>
      </div>
    </section>
<section id="top-list-trip">
   <div class="container">
      <div class="row">
        
         <div class="col-sm-12 col-md-12 effect-5 effects">
            <div class="main-switcher">
              <?php
              $con=new clscon();
              $link=$con->db_connect();
              $qry="select * from tb_tours where tour_id=$tid";
              $res= mysqli_query($link, $qry);
              $arr=array();
              $i=0;
                while($r= mysqli_fetch_array($res))
                {
                    $arr[$i]=$r;
                    $i++;
                

              ?>
                <h1 style="color:#2d3e52; font-size:27px"><?php echo $arr[0][2]; ?> </h1>
                <div class="row">
               <div class="col-md-9">     
             <div class="col-md-4">
                <h3><i class="fa fa-plane" aria-hidden="true"></i> Tour Code: <?php echo $arr[0][1]; ?></h3>
            </div>
             <div class="col-md-4">
                <h3><i class="fa fa-map-marker" aria-hidden="true"></i> Location:
                  <?php 
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select * from tb_cities where city_id=".($arr[0][4]);
                        $res= mysqli_query($link, $qry);
                        $r=mysqli_fetch_array($res);
                        echo $r[1];
                        $l=$r[1];
                    ?></h3>
            </div>
             <div class="col-md-4">
                <h3><i class="fa fa-clock-o" aria-hidden="true"></i> Duration: <?php echo $arr[0][5]; ?></h3>
            </div>
            <div class="col-md-12">
              <p style="font-size:13px; color:black;">
                  <?php echo $arr[0][7]; ?>
              </p>
            </div>
            <div class="col-md-12" id="slider">
                
                    <div class="row">
                      <div class="col-md-5 effect-5 effects">
                            <h3><i class="fa fa-bars"></i> Highlights</h3>
                          <?php echo $arr[0][8]; ?>
                          </div>
                        <div class="col-md-7" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                  <?php
                                    $tourid=$_REQUEST["tid"];
                                    $con=new clscon();
                                    $link=$con->db_connect();
                                    $qry4="select * from tb_images where tour_id=".$tid;
                                    $res4=  mysqli_query($link, $qry4);
                                    $ar1=array();
                                    $y=0;
                                    while ($r4=  mysqli_fetch_row($res4))
                                    {
                                      $ar1[$y]=$r4;
                                      $y++;
                                      ?>
                                    <div class="active item" data-slide-number="0">
                                        <img src="<?php echo $domain; ?>indiator_admin/uploads/<?php echo $ar1[0][2]; ?>" alt="<?php echo $ar1[0][5]; ?>">
                                      </div>

                                    <div class="item" data-slide-number="1">
                                        <img src="<?php echo $domain; ?>indiator_admin/uploads/<?php echo $ar1[0][3]; ?>" alt="<?php echo $ar1[0][6]; ?>"></div>

                                    <div class="item" data-slide-number="2">
                                        <img src="<?php echo $domain; ?>indiator_admin/uploads/<?php echo $ar1[0][4]; ?>" alt="<?php echo $ar1[0][7]; ?>"></div>

                                    <?php 
                                  } ?>

                                </div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                          </div>

                          </div>
            </div>
             <div class="row">
           <div class="col-md-12">
            
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#details" aria-controls="home" role="tab" data-toggle="tab" >Details</a></li>
              <li role="presentation"><a href="#others" aria-controls="profile" role="tab" data-toggle="tab">Other Info</a></li>
             
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="border:1px solid lightgrey; ">
              <div role="tabpanel" class="tab-pane active" id="details" style="padding-left:10px;">
                <br>
                
             
               <h3><i class="fa fa-cog" aria-hidden="true"></i> Itinerary Details</h3>
               
                <?php echo $arr[0][11]; ?>
               <h3><i class="fa fa-cog" aria-hidden="true"></i> Inclusions</h3>
               
                  <?php echo $arr[0][9]; ?>
                
                <h3><i class="fa fa-cog" aria-hidden="true"></i> Exclusions</h3>
               
                  <?php echo $arr[0][10]; ?>
              
            </div>
              <div role="tabpanel" class="tab-pane" id="others" style="padding-left:10px;">
                <br>
                
                
               <h3><i class="fa fa-cog" aria-hidden="true"></i> Additional Information</h3>
               <style type="text/css">
               ul {
                padding-left:17px;
               }
               p {
                padding-left:13px;
               }
               </style>
                  <p style="padding-left:14px;">  <?php echo $arr[0][12]; ?></p>
                
               
           </div>
             
            </div>

           </div>
          
            </div>
        </div>
             <div class="col-md-3">
               <center>
                <div class="boxes">
                        <div class="">
                          <h3>Price Starting From </h3>
                          <h2><?php
                              $tourid=$_REQUEST["tid"];
                              $con=new clscon();
                              $link=$con->db_connect();
                              $qry3="select * from tb_price where tour_id=".$tid;
                              $res3=  mysqli_query($link, $qry3);
                              $ar=array();
                              $x=0;
                              while ($r3=  mysqli_fetch_row($res3))
                              {
                                $ar[$x]=$r3;
                                $x++;
                                echo "$ ".$ar[0][9]."";
                              }
                                ?>
                          </h2>
                        </div>
                       <div class="content">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#priceModal">
                          View Price Guide
                        </button>
                          
                            <br><?php 
                              if($arr[0][6]==3)
                                echo "<img src='https://indiator.com/images/3star.png' class='img-responsive' >";
                              if($arr[0][6]==3.5)
                                echo "<img src='https://indiator.com/images/3.5.png' class='img-responsive' >";
                              if($arr[0][6]==4)
                                echo "<img src='https://indiator.com/images/4star.png' class='img-responsive' >";
                              if($arr[0][6]==4.5)
                                echo "<img src='https://indiator.com/images/4.5.png' class='img-responsive' >";
                              if($arr[0][6]==5)
                                echo "<img src='https://indiator.com/images/5star.png' class='img-responsive' >";
                              else{
                                echo "";
                              }
                            ?></p>

                        </div>   
            <p style="color:#2D3E52; font-size:25px">Book this Trip</p>
               <form action="<?php echo $domain; ?>booking.php" method="post" onsubmit="validate()">
                <div class="col-sm-12 cc-in" style="padding-left:10px">
                    <div class="form-group">
                      
                       <div class="content-checkin-data">
                            
                            <input class="form-control" id="demo" name="date" type="text" placeholder="Select Date" required>

                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email">Select Travellers:</label><br>
                      <h3>
                        <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="+12 years"> <i class="fa fa-info-circle"> </i> </div>Adults 
                      <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="2 till 12 years"> <i class="fa fa-info-circle "> </i> </div> Child  
                      <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="0 till 2 years"> <i class="fa fa-info-circle"> </i> </div> Infant</h3>
                      <select onchange="print_state('state',this.selectedIndex);" required="required" id="country" name="adult" style="width: 25%">
                        
                        
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select>
                      
                      <select name="child" id="state" style="width: 25%">
                        <script language="javascript">print_country("country");</script>
                        
                      </select>
                      
                      <select name="infant" required="required" style="width: 20%">
                        
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select>
                    </div>
                    <input type="hidden" value="<?php echo $tid; ?>" name="tid" />
                    <input type="submit" name="btnbook" class="btn btn-danger btn-lg" value="Book this Trip">
                  </form>
          </div></center>
           <article class="blog-help">
                   <div class="help-txt"> 
                        <p class="help-phone"><i class="fa fa-phone"></i> +91 9871107030 </p>
                    </div> 
            <div class="col-md-12 travel-desc-agency" style="background-color:#DC6934;">
                <h3 style="color:white;">Enquire Now </h3>
                <?php include("mail_form.php"); ?>

            </div>
                    
                </article><br><br>
         
      </div>
    </div>
            
    <div class="row">
           
            
            </div>
      </div> <?php } ?>
           </div><!--Close col 12 -->
           
          </div>
        </div>
</section>      
<section id="top-meet-our">
   <div class="container">
      <div class="row">
         <div class="about-page-2 col-md-12 effect-5 effects">
                <div class="about-text-center team-meet">
                    <h3 class="title-heading-left">Your Travel Experience</h3>
                    <div class="title-sep-container">
                        <div class="title-sep sep-double"></div>
                    </div>
                    </div>
                <dl id="update" class="timeline" style="margin-bottom:0px !important;">

                    <?php
 $con=new clscon();
                $link_rev=$con->db_connect();
$qry="select * from comments where tid=".$tid;
$sql=mysqli_query($link_rev,$qry);
 if(mysqli_affected_rows($link_rev)>=1)
{
while($row=mysqli_fetch_array($sql))
{
$name=$row['com_name'];
$email=$row['com_email'];
$comment_dis=$row['com_dis'];
$rating=$row['rating'];
$lowercase = strtolower($email);
?>
<dt class="box col-md-12">
<span class="com_name"> <font color="#428BCA"><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo $name; ?></b></font></span> <br /><?php 
if($rating==1)
echo "<img src='https://indiator.com/images/star.png'>";
if($rating==2)
echo "<img src='https://indiator.com/images/2star.png'>";
if($rating==3)
echo "<img src='https://indiator.com/images/3star.png'>";
if($rating==4)
echo "<img src='https://indiator.com/images/4star.png'>";
if($rating==5)
echo "<img src='https://indiator.com/images/5star.png'>";
 ?><br>
<?php echo '"'.$comment_dis.'"'; ?></dt>

<?php
}
}
else{ echo "No Reviews yet"; }


?>

</dl><br>
<div id="flash" align="left"  ></div> 
            </div><!--Close col 12 -->
<div class="col-md-12">
            <br><h3> Share your Travel Experience </h3>
            <form action="#" method="post" id="review" class="form-inline col-md-8">
              <input type="hidden" name="tid" id="tid" value="<?php echo $tid; ?>"/>
              <div class="form-group col-md-6">
              <input type="text" name="title" id="name" placeholder="Your Name" class="form-control" style="margin-top:0px !important;"/>
              </div>
              <div class="form-group col-md-6">
              <input type="text" name="email" id="email" placeholder="Your Email-id" class="form-control" style="margin-top:0px !important;" />
            </div>
            <br>
<div class="form-group col-md-12">
<p>Your star ratings: </p>&nbsp;

        <label for="rating">1</label>
        <input type="radio" name="rating" id="rating" value="1"/>
       <label for="rating">2</label>
        <input type="radio" name="rating" id="rating" value="2" />
        <label for="rating">3</label>
        <input type="radio" name="rating" id="rating" value="3"/>
        <label for="rating">4</label>
        <input type="radio" name="rating" id="rating" value="4"/>
        <label for="rating">5</label>
        <input type="radio" name="rating" id="rating" value="5"/>
            </div>
            <div class="form-group  col-md-12">
              <textarea rows="3" cols="60" name="comment" id="comment" placeholder="Your Message" class="form-control"></textarea>
            </div>
            <br>
            <div class="form-group col-md-12">
              <br><input type="submit" class="submit btn btn-primary" value=" Submit Comment " />
            </div>
              </form>
</div>
          </div>
        </div>

</section>     
<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Package Price </h3>
      </div>
      <div class="modal-body">
         <div class="table-responsive">
          <table class="table" style="color: #3276B1;">
            <?php
                $tourid=$_REQUEST["tid"];
                $con=new clscon();
                $link=$con->db_connect();
                $qry3="select * from tb_price where tour_id=".$tid;
                $res3=  mysqli_query($link, $qry3);
                $ar=array();
                $x=0;
                while ($r3=  mysqli_fetch_row($res3))
                {
                  $ar[$x]=$r3;
                  $x++;
                  ?>
            <th>Group Size</th>
            <th>Price per Adult<br>(12+ years)</th>
<th>Price per Child<br> (2 to 12 years)</th>
<th>Price per Infant<br> (0 to 2 years)</th>
            <tr>
                <td>1 Person</td>
                <td><?php echo "$ ".$ar[0][2];?></td>
                        
                <td><?php echo "$ ".$c=(0.25*$ar[0][2]);?></td>
                <td>Free of Cost</td>
              </tr>
              <tr>
                <td>2 Persons</td>
                <td><?php echo "$ ".$ar[0][3];?></td>
 <td><?php echo "$ ".$c=(0.25*$ar[0][3]);?></td>
                <td>Free of Cost</td>
              </tr>
              <tr>
                <td>3 Persons</td>
                <td><?php echo "$ ".$ar[0][4];?></td>
 <td><?php echo "$ ".$c=(0.25*$ar[0][4]);?></td>
                <td>Free of Cost</td>
              </tr>
              <tr>
                <td>4 Persons</td>
                <td><?php echo "$ ".$ar[0][5];?></td>
 <td><?php echo "$ ".$c=(0.25*$ar[0][5]);?></td>
                <td>Free of Cost</td>
              </tr>
              <tr>
                <td>5 Persons</td>
                <td><?php echo "$ ".$ar[0][6];?></td>
 <td><?php echo "$ ".$c=(0.25*$ar[0][6]);?></td>
                <td>Free of Cost</td>
              </tr>
              <tr>
                <td>6 Persons</td>
                <td><?php echo "$ ".$ar[0][7];?></td>
 <td><?php echo "$ ".$c=(0.25*$ar[0][7]);?></td>
                <td>Free of Cost</td>
              </tr>
              <tr>
                <td>7 Persons</td>
                <td><?php echo "$ ".$ar[0][8];?></td>
 <td><?php echo "$ ".$c=(0.25*$ar[0][8]);?></td>
                <td>Free of Cost</td>
              </tr>
              <tr>
                <td>8 Persons</td>
                <td><?php echo "$ ".$ar[0][9];?></td>
 <td><?php echo "$ ".$c=(0.25*$ar[0][9]);?></td>
                <td>Free of Cost</td>
              </tr>
          </table>
          <?php 
        } ?>
        </div>
      
      </div>
      
    </div>
  </div>
</div>

<?php include("includes/footer.php"); ?>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?php echo $domain; ?>js/dcalendar.picker.js"></script>
<script>
$('#demo').dcalendarpicker();
$('#calendar-demo').dcalendar(); //creates the calendar
</script>
<script src="<?php echo $domain; ?>js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/list/cbpViewModeSwitch.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/list/classie.js" type="text/javascript"></script>
<script src="<?php echo $domain; ?>js/list/jquery.mixitup.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    "use strict";
    $('#Grid').mixItUp();
    $('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
});
</script>
<script>
    $(function(){           
        if (!Modernizr.inputtypes.date) {
            $('input[type=date]').datepicker({
                    dateFormat : 'yy-mm-dd'
                },
                $.datepicker.regional['it']
            );
        }
    });
</script>
 <script type="text/javascript" src="https://indiator.com/js/jquery.js"></script>
 <script type="text/javascript">
$(function() {

$(".submit").click(function() {

var name = $("#name").val();
var email = $("#email").val();
  var comment = $("#comment").val();
    var tid = $("#tid").val();
var rating = $('input[name=rating]:checked', '#review').val()
    var dataString = 'name='+ name + '&email=' + email + '&comment=' + comment + '&tid=' + tid + '&rating=' + rating;
  
  if(name=='' || email=='' || comment=='' || rating=='')
     {
    alert('Please Give Valide Details');
     }
  else
  {
  $("#flash").show();
  $("#flash").fadeIn(400).html('<img src="https://indiator.com/images/ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
$.ajax({
    type: "POST",
  url: "https://indiator.com/commentajax.php",
   data: dataString,
  cache: false,
  success: function(html){
 
  $("dl#update").append(html);
  $("dl#update dt:last").fadeIn("slow");
 
  document.getElementById('email').value='';
   document.getElementById('name').value='';
    document.getElementById('comment').value='';
  $("#name").focus();
 
  $("#flash").hide();
  
  }
 });
}
return false;
  });



});


</script>
<style type="text/css">
.boxes{
    border-radius: 10px;
    border: 2px solid #DF4608;
    padding-bottom: 20px;
}
.boxes-two{

    border: 2px solid grey;
}
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;

}
@media only screen and (max-width: 1030px)
{
#top-list-trip{
    margin-top:120px;
}
.about-section-top .col-md-12
{
  background-color: #2D3E52;
  padding-bottom: 4px;
}

}

</style>
 </body>
</html>