<?php
session_start();
include_once 'buslogic.php';

if(isset($_SESSION["admin_id"])==FALSE)
{
   header("location:index.php");
}
  $tourid=$_REQUEST["tid"];
 
 
  if(isset($_POST["btnsubmit"]))
  {
     $con=new clscon();
    $link=$con->db_connect();
    $price1=$_POST["price1"];
    $price2=$_POST["price2"];
    $price3=$_POST["price3"];
    $price4=$_POST["price4"];
    $price5=$_POST["price5"];
    $price6=$_POST["price6"];
    $price7=$_POST["price7"];
    $price8=$_POST["price8"];
    $qry2="update tb_price set price1=$price1,price2=$price2,price3=$price3,price4=$price4,price5=$price5,price6=$price6,price7=$price7,price8=$price8 where tour_id=".$tourid;
    $result=mysqli_query($link,$qry2);
    if(mysqli_affected_rows($link)==1)
    {

            ?>

            <script type="text/javascript">
                alert("Data added Successfully");
                window.location.href="tours.php";
            </script>

            <?php
      $con->db_close();
      return TRUE;
    }
    else
    {
         $con->db_close();
         return FALSE;
        
    }
  }

  
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin| Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-black.min.css">
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
        Edit Tour Price
        
      </h1>
      
    </section>
    <section class="content">
     

      <div class="row">
       
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Price</h3>
            </div>
            <div class="box-body">
              
              <div class="col-md-6">
               <div class="form-group col-md-12">
                <form name="add" action="" method="post">
                <?php
                  $con=new clscon();
                  $link=$con->db_connect();
                  $qry1="select * from tb_price where tour_id=".$tourid;
                  $res1=  mysqli_query($link, $qry1);
                  $a=array();
                  $j=0;
                  $r= mysqli_fetch_row($res1);
                  $a[$j]=$r;
                  $j++;
                  if(($a[0][1])==null) {
                      
                  if(isset($_POST["btnadd"]))
                  {
                     $con=new clscon();
                    $link=$con->db_connect();
                    $tourid=$_REQUEST["tid"];
                    $price1=$_POST["price1"];
                    $price2=$_POST["price2"];
                    $price3=$_POST["price3"];
                    $price4=$_POST["price4"];
                    $price5=$_POST["price5"];
                    $price6=$_POST["price6"];
                    $price7=$_POST["price7"];
                    $price8=$_POST["price8"];
                    $qry2="INSERT INTO tb_price VALUES (null,$tourid,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8)";
                    $result2=mysqli_query($link,$qry2);
                    echo mysqli_error($link);
                    if(mysqli_affected_rows($link)==1)
                    {

                            ?>
                            <script type="text/javascript">
                                alert("Price added Successfully");
                                window.location.href="tours.php";
                            </script>

                            <?php
                      $con->db_close();
                      return TRUE;
                    }
                    else
                    {
                         $con->db_close();
                         return FALSE;
                        
                    }
                  }
                        
                    ?>
               
              <div class="col-md-2"><label>Sr. No.</label></div>
              
              <div class="col-md-5"><label>Price per person</label></div>
             </div>

             <div class="form-group col-md-12">
              <div class="col-md-2"><label>1.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price1" class="form-control"></div>
             </div>
            <div class="form-group col-md-12">
              <div class="col-md-2"><label>2.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price2" class="form-control" ></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>3.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price3" class="form-control"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>4.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price4" class="form-control"></div>
             </div>
             </div>
             <div class="col-md-6">
               <div class="form-group col-md-12">
              <div class="col-md-2"><label>Sr. No.</label></div>
              
              <div class="col-md-5"><label>Price per person</label></div>
             </div>

             <div class="form-group col-md-12">
              <div class="col-md-2"><label>5.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price5" class="form-control"></div>
             </div>
            <div class="form-group col-md-12">
              <div class="col-md-2"><label>6.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price6" class="form-control"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>7.</label></div>
            
              <div class="col-md-5"><input type="text" name="price7" class="form-control"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>8.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price8" class="form-control" ></div>
             </div>
             <div class="form-group col-md-12 col-md-offset-4">
              <input type="submit" class="btn btn-primary btn-lg" value="Add Price" name="btnadd">
             &nbsp; &nbsp; &nbsp; &nbsp;<a href="tours.php" class="btn btn-warning btn-lg">Cancel</a>
           </div>
         </form>
             <?php }
               
               else{
                ?>
                <form name="edit" action="" method="post">
                 <div class="col-md-2"><label>Sr. No.</label></div>
              
              <div class="col-md-5"><label>Price per person</label></div>
             </div>

             <div class="form-group col-md-12">
              <div class="col-md-2"><label>1.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price1" class="form-control" value="<?php if(isset($a[0][2])) {echo $a[0][2];} ?>"></div>
             </div>
            <div class="form-group col-md-12">
              <div class="col-md-2"><label>2.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price2" class="form-control" value="<?php if(isset($a[0][3])) echo $a[0][3]; ?>"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>3.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price3" class="form-control" value="<?php if(isset($a[0][4])) echo $a[0][4]; ?>"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>4.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price4" class="form-control" value="<?php if(isset($a[0][5])) echo $a[0][5]; ?>"></div>
             </div>
             </div>
             <div class="col-md-6">
               <div class="form-group col-md-12">
              <div class="col-md-2"><label>Sr. No.</label></div>
              
              <div class="col-md-5"><label>Price per person</label></div>
             </div>

             <div class="form-group col-md-12">
              <div class="col-md-2"><label>5.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price5" class="form-control" value="<?php if(isset($a[0][6])) echo $a[0][6]; ?>"></div>
             </div>
            <div class="form-group col-md-12">
              <div class="col-md-2"><label>6.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price6" class="form-control" value="<?php if(isset($a[0][7])) echo $a[0][7]; ?>"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>7.</label></div>
            
              <div class="col-md-5"><input type="text" name="price7" class="form-control" value="<?php if(isset($a[0][8])) echo $a[0][8]; ?>"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>8.</label></div>
             
              
              <div class="col-md-5"><input type="text" name="price8" class="form-control" value="<?php if(isset($a[0][9])) echo $a[0][9]; ?>"></div>
             </div>
             <div class="form-group col-md-12 col-md-offset-4">
              <input type="submit" class="btn btn-primary btn-lg" value="Save Price" name="btnsubmit">
             &nbsp; &nbsp; &nbsp; &nbsp;<a href="tours.php" class="btn btn-warning btn-lg">Cancel</a>
           </div>
                <?php

               }

                ?>
             </div>
             
           </form>
            </div>
            <!-- /.box-body -->
          </div>
         
        </div>
       
         
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2014-2016 Indiator</strong> All rights
    reserved.
  </footer>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    $(".textarea").wysihtml5();
  });
</script>
</body>
</html>
