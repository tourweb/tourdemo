<?php
session_start();
include_once 'buslogic.php';

if(isset($_SESSION["admin_id"])==FALSE)
{
   header("location:index.php");
}
if(isset($_REQUEST["delete_id"]))
{
   
      $obj=new clstour();
      $obj->tour_id=$_REQUEST["delete_id"];
      $obj->delete_rec();
      header("location:tours.php");
                
}
?>
<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript">
function delete_id(id)
{
 if(confirm('Sure To Remove This Record ?'))
 {
  window.location.href='tours.php?delete_id='+id;
 }
}
</script>
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
       All Tours 
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 43px;">Sr. No.</th>
                  <th>Tour Code</th>
                  <th style="width: 404.778px;">Tour Name</th>
                  <th>Category</th>
                  <th>Location</th>
                  <th style="width: 200px;"></th>
                </tr>
                </thead>
                <tbody>
                   <?php
                    $obj= new clstour();
                    $a=$obj->disp_rec();
                    for($i=0;$i<count($a);$i++)
                    {
                      $c=$i+1;
                  ?>
                <tr>
                  <td><?php echo $c; ?></td>
                  <td><?php echo $a[$i][1]; ?></td>
                  <td><?php echo $a[$i][2]; ?></td>
                  <td><?php  
                       $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select * from tb_tour_category where cat_id=".($a[$i][3]);
                        $res= mysqli_query($link, $qry);
                        $r=mysqli_fetch_array($res);
                        echo $r[1];
                        

                     ?></td>
                  <td><?php  
                       $con=new clscon();
                        $link=$con->db_connect();
                        $qry="select * from tb_cities where city_id=".($a[$i][4]);
                        $res= mysqli_query($link, $qry);
                        $r=mysqli_fetch_array($res);
                        echo $r[1];
                        

                     ?></td>
                  <td>
                   
                      <a href="viewtour.php?tid=<?php echo $a[$i][0]; ?>" class="btn btn-success btn-sm">View Details</a>
                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-flat btn-sm">Edit</button>
                  <button type="button" class="btn btn-info btn-flat btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="editdetails.php?tid=<?php echo $a[$i][0]; ?>">Edit Details</a></li>
                    <li><a href="editprice.php?tid=<?php echo $a[$i][0]; ?>">Add/Edit Price</a></li>
                    <li><a href="editimages.php?tid=<?php echo $a[$i][0]; ?>">Add/Edit Images</a></li>
                    <li><a href="edittags.php?tid=<?php echo $a[$i][0]; ?>">Add/Edit Meta Tags</a></li>
                  </ul>
                </div>
                      <a href="javascript:delete_id(<?php echo $a[$i][0]; ?>)" class="btn btn-danger btn-sm" onclick="delete()">Delete</a>
                    
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
