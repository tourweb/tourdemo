<?php
session_start();
include_once 'buslogic.php';

if(isset($_SESSION["admin_id"])==FALSE)
{
   header("location:index.php");
}
  
?>

<!DOCTYPE html>
<html>
<head>
  <?php include("includes/header.php"); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Indiator</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php include("includes/nav.php"); ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
   <?php include("includes/menu.php"); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tour Details
        <a href="tours.php" style="float:right;" class="btn btn-success">Back to Tours</a>
      </h1>
     
    </section>
    <section class="content">
    
      <div class="box box-primary">
       
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            
            <div class="table-responsive">
            <table class="table">
              <?php
              $tourid=$_REQUEST["tid"];
              $con=new clscon();
              $link=$con->db_connect();
              $qry="select * from tb_tours where tour_id=".$tourid;
              $res=  mysqli_query($link, $qry);
              $arr=array();
              $i=0;
              while ($r=  mysqli_fetch_row($res))
              {
                $arr[$i]=$r;
                $i++;
            
              ?>
              <tr>
                <th style="width:50%">Tour Code:</th>
                <td><?php echo $arr[0][1]; ?></td>
              </tr>
              <tr>
                <th>Tour Name:</th>
                <td><?php echo $arr[0][2]; ?></td>
              </tr>
              <tr>
                <th>Category</th>
                <td><?php
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select * from tb_tour_category where cat_id=".($arr[0][3]);
                        $res= mysqli_query($link, $qry);
                        $r=mysqli_fetch_array($res);
                        echo $r[1];
                    ?>
                </td>
              </tr>
              
            </table>
          </div>
            </div>
            <div class="col-md-6">
              <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">City:</th>
                <td><?php 
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select * from tb_cities where city_id=".($arr[0][4]);
                        $res= mysqli_query($link, $qry);
                        $r=mysqli_fetch_array($res);
                        echo $r[1];
                    ?>
                </td>
              </tr>
              <tr>
                <th>Duration:</th>
                <td><?php echo $arr[0][5]; ?></td>
              </tr>
              <tr>
                <th>Ratings</th>
                <td><?php echo $arr[0][6]; ?></td>
              </tr>
              
            </table>
          </div>
            </div>
            
          </div>
</div>
      </div>
      <div class="row">
      <div class="col-md-6">
          <div class="box box-info">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          <div class="col-md-12">
            <h4><strong>Short Description</strong></h4>
              <p><?php echo $arr[0][7]; ?></p>
               
              <h4><strong>Highlights</strong></h4>
              <p><?php echo $arr[0][8]; ?></p>
            </div>
           
            
          </div>
           
            </div>
          </div>
          <div class="col-md-6">
          <div class="box box-danger">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          
           <div class="col-md-12">
              <h4><strong>Tour Price</strong></h4>
              <?php
              $tourid=$_REQUEST["tid"];
              $con=new clscon();
              $link=$con->db_connect();
              $qry3="select * from tb_price where tour_id=".$tourid;
              $res3=  mysqli_query($link, $qry3);
              $ar=array();
              $x=0;
              while ($r3=  mysqli_fetch_row($res3))
              {
                $ar[$x]=$r3;
                $x++;
            
              ?>
               <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Group Size</th>
                <th>Price per person</th>
              </tr>
              <tr>
                <td>1 Person</td>
                <td><?php echo $ar[0][2];?></td>
              </tr>
              <tr>
                <td>2 Persons</td>
                <td><?php echo $ar[0][3];?></td>
              </tr>
              <tr>
                <td>3 Persons</td>
                <td><?php echo $ar[0][4];?></td>
              </tr>
              <tr>
                <td>4 Persons</td>
                <td><?php echo $ar[0][5];?></td>
              </tr>
              <tr>
                <td>5 Persons</td>
                <td><?php echo $ar[0][6];?></td>
              </tr>
              <tr>
                <td>6 Persons</td>
                <td><?php echo $ar[0][7];?></td>
              </tr>
              <tr>
                <td>7 Persons</td>
                <td><?php echo $ar[0][8];?></td>
              </tr>
              <tr>
                <td>8 Persons</td>
                <td><?php echo $ar[0][9];?></td>
              </tr>
            </table>
            <?php } ?>
          </div>
            </div>
            </div>
        
            </div>
     </div>
     </div>
      <div class="box box-success">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          
          <div class="row">
            <div class="col-md-6">
              
               <h4><strong>Inclusions</strong></h4>
              <p><?php echo $arr[0][9]; ?></p>
             <h4><strong>Exclusions</strong></h4>
              <p><?php echo $arr[0][10]; ?></p>
            </div>
            <div class="col-md-6">
              <h4><strong>Itenary Details</strong></h4>
              <p><?php echo $arr[0][11]; ?></p>
               <h4><strong>Additional Info</strong></h4>
             <p><?php echo $arr[0][12]; ?></p>
            </div>
          </div>
<?php } ?>
        </div>
      </div>
       <div class="row">
        
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Meta Tags</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <?php
              $tourid=$_REQUEST["tid"];
             $con=new clscon();
      $link=$con->db_connect();
      $qrym="select * from tb_meta_tags where tour_id=".$tourid;
      $resm= mysqli_query($link, $qrym);
      $arrm=array();
      $m=0;
        while($rm= mysqli_fetch_array($resm))
        {
            $arrm[$m]=$rm;
            $m++;
            
              ?>
              <div class="col-md-6"><strong>Title: </strong><?php echo $arrm[0][2]; ?>
                <br><strong>Description: </strong><?php echo $arrm[0][4]; ?>
              </div>
              <div class="col-md-6"><strong>Keywords: </strong><?php echo $arrm[0][3]; ?></div>
              
              <?php } ?>
            </div>
             
            </div>
          </div>
        </div>
      </div>
       <div class="row">
        
        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Images</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <?php
              $tourid=$_REQUEST["tid"];
              $con=new clscon();
              $link=$con->db_connect();
              $qry4="select * from tb_images where tour_id=".$tourid;
              $res4=  mysqli_query($link, $qry4);
              $ar1=array();
              $y=0;
              while ($r4=  mysqli_fetch_row($res4))
              {
                $ar1[$y]=$r4;
                $y++;
            
              ?>
              <div class="col-md-3"><img src="uploads/<?php echo $ar1[0][2]; ?>" style="width:300px; height:150px;"><br>
                <strong><?php echo $ar1[0][5]; ?></strong>
              </div>
              <div class="col-md-3"><img src="uploads/<?php echo $ar1[0][3]; ?>" style="width:300px; height:150px;"><br>
                <strong><?php echo $ar1[0][6]; ?></strong>
              </div>
              <div class="col-md-3"><img src="uploads/<?php echo $ar1[0][4]; ?>" style="width:300px; height:150px;"><br>
                <strong><?php echo $ar1[0][7]; ?></strong>
              </div>
              <?php } ?>
            </div>
             
            </div>
          </div>
        </div>
      </div>
    </section>
   
  </div>
  
<?php include("includes/footer.php"); ?>
</body>
</html>
