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
  
  <aside class="main-sidebar">
    <?php include("includes/menu.php"); ?>
  </aside>

  <div class="content-wrapper">
   <section class="content-header">
      <h1>
       Booking Information
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tour Booking Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Booking ID</th>
                  <th>Tour Code</th>
                  <th>Amount Recieved</th>
                  <th>Amount Status</th>
                  <th>Booking Date</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                   <?php
                    $obj= new clsbook();
                    $arr=$obj->disp_rec();
                    for($i=0;$i<count($arr);$i++)
                    {
                      $c=$i+1;
                  ?>
                <tr>
                  <td><?php echo $c; ?></td>
                  <td><?php echo "INTOR".$arr[$i][0]; ?></td>
                  <td><?php  
                       $con=new clscon();
                        $link=$con->db_connect();
                        $qry1="select tour_code from tb_tours where tour_id=".($arr[$i][1]);
                        $res1= mysqli_query($link, $qry1);
                        $r1=mysqli_fetch_array($res1);
                        echo $r1[0];
                        

                     ?></td>
                  <td><?php echo $arr[$i][2]; ?></td>
                  <td><?php echo $arr[$i][3]; ?></td>
                  <td><?php echo $arr[$i][4]; ?></td>
                  <td>
                   
                      <a href="booking-details.php?bid=<?php echo $arr[$i][0]; ?>" class="btn btn-success btn-sm">View Details</a>
                  
                      
                  </td>
                   
                </tr>
                <?php } ?>
              
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   
     <strong>Copyright &copy; 2012-2016 Indiator </strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
