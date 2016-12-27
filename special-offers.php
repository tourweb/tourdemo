<?php
session_start();
include("indiator_admin/buslogic.php");
include("includes/domain.php");
?>
<?php
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
    <title>Get upto 10% off on Indiator special offers- Indiator</title>
    <meta charset="utf-8">
    <meta name="description" content="special offers">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'/>
        <?php include_once 'includes/header.php';?>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/settings_slide2.css" rel="stylesheet" type="text/css" />
        <link href="css/travel-mega-menu.css" rel="stylesheet" type="text/css" />
        <!--Carousel-->
        <link href="css/carousel/component.css" rel="stylesheet" type="text/css" />
        <!--Gallery-->
        <link href="css/gallery/component.css" rel="stylesheet" type="text/css" />
        <link href="css/layout2.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
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
<section id="top-offerts" class='home4-section'>
   <div class="container">
      <div class="row">
         <div class="col-md-12 effect-5 effects no-border-img">
                
               <div class="text-center top-txt-title">
<center><img src="images/off.jpg" class="img-responsive"></center><br>
                    <h2>Our Best Private Tours</h2>
                    <div class="separator">
                      <div class="separator-style"></div>
                    </div>

                    </div>
                 <?php
                 $con=new clscon();
                 $link=$con->db_connect();
                 $query="select * from special_offers";
                 $result=mysqli_query($link,$query);
                 if(mysqli_affected_rows($link)>=1)
                 {
                     while($r=mysqli_fetch_assoc($result))
                     {
                     
                 ?>
                <!-- FIFTH EXAMPLE -->
                <div class="col-md-4 trip-travego-disc">
                <?php
                if($r['tour_id']==25){
                  echo "<div class='trip-discount triggerAnimation animated' data-animate='zoomIn' style='animation-delay: 1000ms;'>10% Off</div>";
                  }
                  else{
                  echo "";
                  }
                  ?>
                    <div class="view view-fifth">
                        <figure class="triggerAnimation animated" data-animate="fadeInDown">
                            <div class="img-effect-flash">
                                <?php
                                      $con=new clscon();
                                      $link=$con->db_connect();
                                      $qry4="select img1,alttext1 from tb_images where tour_id=".$r['tour_id'];
                                      $res4=  mysqli_query($link, $qry4);
                                      $ar1=array();
                                      $y=0;
                                      while ($r4=  mysqli_fetch_row($res4))
                                      {
                                        $ar1[$y]=$r4;
                                        $y++;
                                    
                                      ?>
                                    <img src="<?php echo $domain; ?>indiator_admin/uploads/<?php echo $ar1[0][0]; ?>" alt="<?php echo $ar1[0][1]; ?>"/>
                                    <?php } ?>
                            </div>
                         </figure>
                    <div class="mask">
                     <?php
                
	                  $con=new clscon();
	                  $link=$con->db_connect();
	                  $qry3="select substring(tour_name,1,84) tour_name,tour_city_id,substring(short_description,1,130) short_description,page_url from tb_tours where tour_id=".$r['tour_id'];
	                  $res3=  mysqli_query($link, $qry3);
	                  $ar=array();
	                  $x=0;
	                  while ($r3=  mysqli_fetch_row($res3))
	                  {
	                    $ar[$x]=$r3;
	                    $x++;
	                
	                  ?>
                        <div class="main">
                          <h3 style="text-align:justify;"><?php echo $ar[0][0]; ?>..</h3>
                          
                        </div>
                       <div class="content">
                          <p><?php echo $ar[0][2]; } ?></p>
                          <?php
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select tb_cities.city_id,tb_cities.city_name from tb_cities INNER JOIN tb_tours ON tb_tours.tour_city_id=tb_cities.city_id where city_id=".$ar[0][1];
                        $res=  mysqli_query($link,$qry) or die(mysqli_error($link));
                        
                        $arr=array();
                        $i=0;

                        $r1=mysqli_fetch_row($res);
                        $arr[$i]=$r1;
                        
                        ?>
                <a class="btn btn-primary btn-block" href="<?php echo $domain.$arr[0][1].'/tour-packages/'.$ar[0][3].'/'.$r['tour_id'];?>" target="blank">Read More</a>
                        </div>
                       
                    </div>
                   </div>
                </div>
              <?php } } ?>
               
            
           
            </div><!--Close col 12 -->
        </div>
    </div>
 </section>   

  
<?php include("includes/footer.php") ?>
	</body>
</html>