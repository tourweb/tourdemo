<?php
session_start();
include("indiator_admin/buslogic.php");
$tid=$_REQUEST["tid"];
$date=$_REQUEST["date"];
$adult=$_REQUEST["adult"];
$child=$_REQUEST["child"];
$infant=$_REQUEST["infant"];
$tot_person=$adult+$child;
$total_trav=$adult+$child+$infant;
$con=new clscon();
                      $link=$con->db_connect();
                      $qry3="select * from tb_price where tour_id=".$tid;
                      $res3=  mysqli_query($link, $qry3);
                      $ar=array();
                      $x=0;
                      while ($r3= mysqli_fetch_row($res3))
                      {
                        $ar[$x]=$r3;
                        $x++;
                        if($adult==1)
                        {
                          $adamount=$ar[0][2];
                        }
                        if($adult==0)
                        {
                          $adamount=0;
                        }
                        if($adult==2)
                        {
                          $adamount=2*$ar[0][3];
                        }
                        if($adult==3)
                        {
                          $adamount=3*$ar[0][4];
                        }
                        if($adult==4)
                        {
                          $adamount=4*$ar[0][5];
                        }
                        if($adult==5)
                        {
                          $adamount=5*$ar[0][6];
                        }
                        if($adult==6)
                        {
                          $adamount=6*$ar[0][7];
                        }
                        if($adult==7)
                        {
                          $adamount=7*$ar[0][8];
                        }
                        if($adult==8)
                        {
                          $adamount=8*$ar[0][9];
                        }
                       if($child==1)
                        {
                          $chamount=(0.25*$ar[0][2]);
                        }
                        if($child==0)
                        {
                          $chamount=0;
                        }
                        if($child==2)
                        {
                          $chamount=(2*0.25*$ar[0][3]);
                        }
                        if($child==3)
                        {
                          $chamount=(3*0.25*$ar[0][4]);
                        }
                        if($child==4)
                        {
                          $chamount=(4*0.25*$ar[0][5]);
                        }
                        if($child==5)
                        {
                          $chamount=(5*0.25*$ar[0][6]);
                        }
                        if($child==6)
                        {
                          $chamount=(6*0.25*$ar[0][7]);
                        }
                        if($child==7)
                        {
                          $chamount=(7*0.25*$ar[0][8]);
                        }
                        if($child==8)
                        {
                          $chamount=(8*0.25*$ar[0][9]);
                        }
                        $amount=$adamount+$chamount;
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
    <title>Indiator</title>
    <meta charset="utf-8">
    <meta name="description" content="travel, trip, store, shopping, siteweb, cart">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/settings_slide2.css" rel="stylesheet" type="text/css" />
        <link href="css/travel-mega-menu.css" rel="stylesheet" type="text/css" />
        <!--Carousel-->
        <link href="css/carousel/component.css" rel="stylesheet" type="text/css" />
        <!--List-->
        <link href="css/list/component.css" rel="stylesheet" type="text/css" />
        <link href="css/layout2.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/jquery-ui.css"/>
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
     
<script type="text/javascript">
$(document).ready(function()
{	
	//using $.ajax() function
	
	$(document).on('submit', '#reg-form', function()
	{
	        	
                        if($.trim($('#first_name').val()) == ''){
			alert('Please enter valid code');
			$('#first_name').focus()
                        
			return false;
		}
                if($.trim($('#first_name').val()) != 'XMAS10'){
			alert('Please enter valid code');
			$('#first_name').focus()
                        
			return false;
		}
			
		var data = $(this).serialize();
		$.ajax({
		type : 'POST',
		url  : 'submit.php',
		data : data,
		success :  function(data)
				   {						
						$("#reg-form").fadeIn(500).show(function()
						{
							$(".result").fadeIn(500).show(function()
							{
								$(".result").html(data);
							});
						});
					$('.success').fadeIn(200).show();
                                        $('.error').fadeOut(200).hide();	
				   }
		});
		return false;
	});
	
});
</script>
<style type="text/css">
  .squared{
  width: 18px;
  height: 18px;
  position: relative;
  background: blue;
  background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
  
  input[type=checkbox] {
    visibility: hidden;
    &:checked + label:after {
      opacity: 1;
    }    
  }
}
  </style>
</head>
  <body>

   
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
              $qry="select tour_code,tour_name,tour_cat_id from tb_tours where tour_id=$tid";
              $res= mysqli_query($link, $qry);
              $arr=array();
              $x=0;
              while($r=mysqli_fetch_array($res))
                {
                    $arr[$x]=$r;
                    $x++;
                ?>
                <h1 style="color:#2d3e52; font-size:20px"><?php echo $arr[0][1]; ?></h1>
                <div class="row">
                  <div class="col-md-9" style="padding-bottom:25px;">  
                   
                      <div class="col-md-6"><p class="para"><i class="fa fa-plane" aria-hidden="true"></i> Package Tour Code: <?php echo $arr[0][0]; ?></p></div>
                      <div class="col-md-6"><p class="para"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Travel date: <?php echo $date; ?></p></div>
                      <div class="col-md-6"><p class="para">No. of Travellers: 
                        <img src="images/adult.png"> <?php echo $adult; ?> <img src="images/child.png"> <?php echo $child; ?> <img src="images/infant.png"> <?php echo $infant; ?></p></div>
                   <?php $cat_promo=$arr[0][2];  } ?>      
                  </div>
                     <div class="col-md-3 promo " id="form">
                          <h3>Apply Promo Code</h3>   
                    <form name="promo" id="reg-form" action="" method="post" class="form-inline">
                        <div class="form-group"> 
                          <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter Coupon Code" />
                          <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
                             <input type="hidden" name="cat_promo" value="<?php echo $cat_promo; ?>" />    
                        </div>
                        <input type="submit" name="promo" class="btn btn-info code" value="Apply" >
                    </form>
                    <h3 class="error" style="display:none"> Please Enter Valid Code</h3>
                    <h3  class="success" style="display:none"><?php if($cat_promo==2) { echo "Coupon Applied Successfully"; } else{ echo "Coupon Valid only for Multi days Tour";} ?> </h3>
                  </div>
                </div>
                   
            </div>   
                 <hr style="width:100%">    
                 <form name="book" method="post" action="book_db.php">
                   <div class="col-md-5" >     
                    <h3>Traveller Details</h3>
                    <p class="para">* Enter traveller name(mandatory) and Age</p>
                    <?php 
                    for ($i=0; $i < $adult; $i++) { 
                    ?>
                    <div class="form-inline">
                       <div class="form-group">
                       
                      </div>
                      <div class="form-group">
                       
                        <select name="mrmsa[]" class="form-control">
                          <option value="Mr">Mr.</option>
                          <option value="Ms">Ms.</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                       
                        <input type="text" name="adult_name[]" class="form-control" placeholder="Adult Name" required>
                      </div>
                      <div class="form-group">
                      
                        <input type="text" name="adult_age[]" class="form-control" placeholder="Adult Age">
                      </div>
                    </div>
                    <?php } ?>
                     <?php if($child>=1){
                    for ($j=0; $j < $child; $j++) { 
                    ?>
                    <div class="form-inline">
                       <div class="form-group">
                       
                      </div>
                      <div class="form-group">
                       
                        <select name="mrmsc[]" class="form-control">
                          <option value="Mr">Mr.</option>
                          <option value="Ms">Ms.</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                       
                        <input type="text" name="child_name[]" class="form-control" placeholder="Child Name" required>
                      </div>
                      <div class="form-group">
                      
                        <input type="text" name="child_age[]" class="form-control" placeholder="Child Age">
                      </div>
                    </div>
                    <?php } }?>
                     <?php if($infant>=1)
                     {
                    for ($k=0; $k < $infant; $k++) { 
                    ?>
                    <div class="form-inline">
                     
                     
                       <div class="form-group">
                       
                      </div>
                      <div class="form-group">
                       
                        <select name="mrmsi[]" class="form-control">
                          <option value="Mr">Mr.</option>
                          <option value="Ms">Ms.</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                       
                        <input type="text" name="infant_name[]" class="form-control" placeholder="Infant Name" required>
                      </div>
                      <div class="form-group">
                      
                        <input type="text" name="infant_age[]" class="form-control" placeholder="Infant Age">
                      </div>
                      
                     
                    </div>
                    <?php } }?>
                    
                  </div>
                  <div class="col-md-5">
                    <h3>Contact Information</h3>
                    
                       <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="con_name" placeholder="Name" required>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="con_email" placeholder="Email Id" required>
                      </div>
                        <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="con_ccode" placeholder="Country Code" required>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="con_phone" placeholder="Phone No." required>
                      </div>
                     <div class="form-group col-md-6">
<input type="text" class="form-control" name="country" placeholder="Enter Country Name" required>
                      
                       
                      </div>
                        <div class="form-group col-md-6">
<input type="text" class="form-control" name="state" placeholder="Enter State Name" required>
                      
                      </div>
                         <div class="form-group col-md-6">
<input type="text" class="form-control" name="city" placeholder="Enter City Name" required>
                      
                      </div>
                       
                       
                        
                          <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="zipcode" placeholder="ZIP Code" required>
                      </div>
                       <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="con_add" placeholder="Address" required>
                      </div>
                      
                       <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="con_pickup" placeholder="Pickup Details(If any)">
                      </div>
                       <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="con_special" placeholder="Special Requirements(If any)">
                        <label><input type="checkbox" class="squared" name="con_check" value="" required> I have read and agree to <a href="https://indiator.com/booking-condition.php" target="_blank">Terms & Conditions</a></label>
                      </div>
                     
                    <input type="hidden" name="tourid" value="<?php echo $tid; ?>" >
                    <input type="hidden" name="b_date" value="<?php echo $date; ?>" >
                    <input type="hidden" name="tot_person" value="<?php echo $tot_person; ?>" >
                    <input type="hidden" name="total_trav" value="<?php echo $total_trav; ?>" >
                  </div>
                  <div class="col-md-2 " style="border:2px solid #DF4608; border-radius:15px;padding-top:10px;padding-left: 6px;">
                     <center class="result"><div class="form-group col-md-12">
                       <h3 class="btn btn-success btn-lg">Total Package Price</h3>
                     </div>
                     <div class="form-group col-md-12">
                      
               <div class="myPrice" id="tot">USD $ <?php echo $amount; ?></div>
             </div>
               <div class="form-group col-md-12">
              <input type="submit" class="btn btn-primary btn-lg" value="Make Full Payment" name="btnbook" >
               </div>
              <div class="form-group col-md-12">
             <button class="btn btn-warning" style="border-radius: 23px;">OR</button>
              </div>
             <div class="form-group col-md-12">
               <div class="myPrice " id="half">USD $ <?php echo $half=$amount*(20/100); ?></div>
             </div>
            
               <div class="form-group col-md-12">
                <input type="submit" class="btn btn-primary btn-lg" value="Pay Only 20% Now" name="btnhalf">
                <input type="hidden" name="amount" value="<?php echo $amount; ?>" >
                <input type="hidden" name="half" value="<?php echo $half; ?>" >
              </div>
                         
              </center>
          </div>
                      <?php 
             $queryt="select tour_code,tour_name,inclusions from tb_tours where tour_id=".$tid;
              $resultt=mysqli_query($link,$queryt) or die(mysqli_error($link));                       
                $arrt=array();
                $it=0;
                $rt=mysqli_fetch_row($resultt);
                $arrt[$it]=$rt;

             ?>
              <input type="hidden" name="tour_code" value="<?php echo $arrt[0][0]; ?>" >
                <input type="hidden" name="tour_name" value="<?php echo $arrt[0][1]; ?>" >
<input type="hidden" name="inclusions" value="<?php echo $arrt[0][2]; ?>" >
        </div>
      </form>
            </div>
             
          </div><!-- /main -->
        </div><!--Close col 12 -->
    </div>    
</section>      
   <section class='last-minute-banner' style='background-color:#3276B1;'>
        <div class="container">
            <div class="row">
                <div class="col-md-9 promotext">
                 <p>Get upto 10% Off on all Multi days tour with promo code:</p>
                
                </div>
                 <div class="col-sm-3 col-md-3 button-banner"><a class="shortcode_button btn_large btn_type1 left_icon" href="javascript:void(0);"><i class="fa fa-hand-o-right"></i>XMAS10</a></div>
            </div>
        </div>
</section> 

<?php include("includes/footer.php"); ?>


<script src="js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>

<!--List-->
<script src="js/list/cbpViewModeSwitch.js" type="text/javascript"></script>
<script src="js/list/classie.js" type="text/javascript"></script>
<script src="js/list/jquery.mixitup.js" type="text/javascript"></script>



<script>

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
.para{
  color:#484848;
  font-size:15px;
}
.para1{
  color:#484848;
  font-size:20px;
  text-align: center;
}
.myPrice{
    font-weight: bold;
    color: #47A447;
    font-size: 22px;
    text-align: center;
    }
    .promo{
      border: 1px dashed orangered;
    border-radius: 17px;
    padding-top: 5px;
    padding-bottom: 9px;
    }
    .promotext{
      font-size: 27px;
    padding-top: 29px;
    }
    .error{
  
  color:#d12f19;
  font-size:12px;
  
    
  }
  .success{
  
  color:#006600;
  font-size:12px;
  
    
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