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
        Dashboard
        <small>Control panel</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
              $con=new clscon();
               $link=$con->db_connect();
               $qryb="SELECT * FROM tb_booking";
               $resb= mysqli_query($link, $qryb);
              $num_rowsb = mysqli_num_rows($resb);

            echo "<h3> $num_rowsb </h3>";
                
              ?>

              <p>Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="booking-info.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
              $con=new clscon();
               $link=$con->db_connect();
               $qry="SELECT * FROM tb_tours";
               $res= mysqli_query($link, $qry);
              $num_rows = mysqli_num_rows($res);

            echo "<h3>$num_rows</h3>";
                
              ?>
              

              <p>Total Tour Packages</p>
            </div>
            <div class="icon">
              <i class="ion ion-plane"></i>
            </div>
            <a href="tours.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
              $con=new clscon();
               $link=$con->db_connect();
               $qry1="SELECT * FROM tb_cities";
               $res1= mysqli_query($link, $qry1);
              $num_rows1 = mysqli_num_rows($res1);

            echo "<h3> $num_rows1 </h3>";
                
              ?>
              <p>Total Cities</p>
            </div>
            <div class="icon">
              <i class="ion ion-map"></i>
            </div>
            <a href="cities.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>User Reviews</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
       <center><h1>Welcome to Indiator Admin Panel</h1>

        <img src="images/hdlogo.png">
       </center>
     
          

        </section>
     
        
      </div>
      
    </section>
   
  </div>
  
<?php include("includes/footer.php"); ?>
</body>
</html>
