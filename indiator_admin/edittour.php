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
        Edit Tour
        
      </h1>
      
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
         
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Tour Code</label>
                <input type="text" class="form-control" name="" placeholder="Enter Tour Code">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                
                <label>Select Category</label>
                <select class="form-control" style="width: 100%;">
                  <option selected="selected">One Day trip</option>
                  <option>Multi Days Trip</option>
                  <option>Tour & Sight Seeing</option>
                  
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
               <label>Select City/Location</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Noida</option>
                  <option>Delhi</option>
                  <option>Agra</option>
                  <option>Goa</option>
                  <option>Jaipur</option>
                  <option>Mumbai</option>
                  <option>Kerala</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-8">
              <div class="form-group">
               <label>Tour Name</label>
                <input type="text" class="form-control" name="" placeholder="Enter Tour Name">
              </div>
              <!-- /.form-group -->
              </div>
              
            <div class="col-md-4">
              <div class="form-group">
                <label>Duration</label>
                <input type="text" class="form-control" name="" placeholder="Enter Days, Nights and Hours">
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
               <label>Short Description</label>
                <input type="text" class="form-control" name="" placeholder="Enter Short Description">
              </div>
              <!-- /.form-group -->
              </div>
              
            <div class="col-md-4">
              <div class="form-group">
                <label>Ratings</label>
                <select class="form-control" style="width: 100%;">
                  <option selected="selected">Select Star Ratings</option>
                  <option>1 star</option>
                  <option>2 star</option>
                  <option>3 star</option>
                  <option>4 star</option>
                  <option>5 star</option>
                  
                </select>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
       
      </div>
      <!-- /.box -->

      <div class="row">
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Highlights</h3>
            </div>
             <div class="box-body pad">
             
                <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Price</h3>
            </div>
            <div class="box-body">
              <div class="col-md-6">
               <div class="form-group col-md-12">
              <div class="col-md-2"><label>Sr. No.</label></div>
              <div class="col-md-5"><label>Group Size</label></div>
              <div class="col-md-5"><label>Price per person</label></div>
             </div>

             <div class="form-group col-md-12">
              <div class="col-md-2"><label>1.</label></div>
             <div class="col-md-5"><input type="text" class="form-control"></div>
              
              <div class="col-md-5"><input type="text" class="form-control"></div>
             </div>
            <div class="form-group col-md-12">
              <div class="col-md-2"><label>2.</label></div>
             <div class="col-md-5"><input type="text" class="form-control"></div>
              
              <div class="col-md-5"><input type="text" class="form-control"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>3.</label></div>
             <div class="col-md-5"><input type="text" class="form-control"></div>
              
              <div class="col-md-5"><input type="text" class="form-control"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>4.</label></div>
             <div class="col-md-5"><input type="text" class="form-control"></div>
              
              <div class="col-md-5"><input type="text" class="form-control"></div>
             </div>
             </div>
             <div class="col-md-6">
               <div class="form-group col-md-12">
              <div class="col-md-2"><label>Sr. No.</label></div>
              <div class="col-md-5"><label>Group Size</label></div>
              <div class="col-md-5"><label>Price per person</label></div>
             </div>

             <div class="form-group col-md-12">
              <div class="col-md-2"><label>5.</label></div>
             <div class="col-md-5"><input type="text" class="form-control"></div>
              
              <div class="col-md-5"><input type="text" class="form-control"></div>
             </div>
            <div class="form-group col-md-12">
              <div class="col-md-2"><label>6.</label></div>
             <div class="col-md-5"><input type="text" class="form-control"></div>
              
              <div class="col-md-5"><input type="text" class="form-control"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>7.</label></div>
             <div class="col-md-5"><input type="text" class="form-control"></div>
              
              <div class="col-md-5"><input type="text" class="form-control"></div>
             </div>
             <div class="form-group col-md-12">
              <div class="col-md-2"><label>8.</label></div>
             <div class="col-md-5"><input type="text" class="form-control"></div>
              
              <div class="col-md-5"><input type="text" class="form-control"></div>
             </div>
             </div>
            </div>
            <!-- /.box-body -->
          </div>
         
        </div>
        <div class="col-md-12">
        <div class="box box-info">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          
          <div class="row">
            <div class="col-md-6">
              <h4><strong>Overview</strong></h4>
              <textarea rows="5" cols="75"></textarea>
               <h4><strong>Inclusions</strong></h4>
              <div class="box-body pad">
             
                <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              
            </div>
             <h4><strong>Exclusions</strong></h4>
             <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              
            </div>
            <div class="col-md-6">
              <h4><strong>Itinerary Details</strong></h4>
              <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              
               <h4><strong>Additional Info</strong></h4>
               <textarea rows="3" cols="75"></textarea>
                <h4><strong>Upload Images</strong></h4>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                </div>

            </div>
          </div>

        </div>

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
