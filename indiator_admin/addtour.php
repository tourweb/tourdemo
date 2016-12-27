<?php
session_start();
include_once 'buslogic.php';

if(isset($_SESSION["admin_id"])==FALSE)
{
   header("location:index.php");
}
if(isset($_POST["btnsubmit"]))
{
  
  $tour_code=$_POST["tour_code"];
  $tour_name=addslashes($_POST["tour_name"]);
  $tour_cat_id=$_POST["tour_cat_id"];
  $tour_city_id=$_POST["tour_city_id"];
  $duration=$_POST["duration"];
  $ratings=$_POST["ratings"];
  $short_description=addslashes($_POST["short_description"]);
  $highlights=addslashes($_POST["highlights"]);
  
  $inclusions=addslashes($_POST["inclusions"]);
  $exclusions=addslashes($_POST["exclusions"]);
  $itinerary_details=addslashes($_POST["itinerary_details"]);
  $additional_info=addslashes($_POST["additional_info"]);
  $url=strtolower(addslashes($_POST["tour_name"]));
  $string = str_replace(' ', '-', trim($url));
  $page_url=$string;
  $con=new clscon();
        $link=$con->db_connect();
        $qry="insert into tb_tours(tour_code,tour_name,tour_cat_id,tour_city_id,duration,ratings,short_description,highlights,inclusions,exclusions,itinerary_details,additional_info,page_url) values('$tour_code','$tour_name',$tour_cat_id,$tour_city_id,'$duration','$ratings','$short_description','$highlights','$inclusions','$exclusions','$itinerary_details','$additional_info','$page_url') ";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {            
            ?>

            <script type="text/javascript">
                alert("Data added Successfully");
                window.location.href="tours.php";
            </script>

            <?php
            $con->db_close();
        }
        else 
        {
          echo mysqli_error($link);
         $con->db_close();    
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
        Add new Tour
        
      </h1>
      
    </section>
    <section class="content">
      <form action="" method="post">
      <div class="box box-primary">
        <div class="box-header with-border">
         
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">

              <div class="form-group">
                <label>Tour Code</label>
                <input type="text" class="form-control" name="tour_code" placeholder="Enter Tour Code">
              </div>
            </div>
           <div class="col-md-4">
              <div class="form-group">
               <label>Select Category</label>
              <?php
                    $obj=new clscat();
                    $arr=$obj->disp_rec();
                    if(count($arr)>0)
                         echo "<select class='form-control' name=tour_cat_id style='width: 100%;'>";
                      
                    for($i=0;$i<count($arr);$i++)
                    {
                    
                  echo "<option value=".$arr[$i][0].">".$arr[$i][1]."</option>";
                }
                ?>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
              <div class="form-group">
               <label>Select City/Location</label>
              <?php
                    $obj=new clscity();
                    $arr=$obj->disp_rec();
                    if(count($arr)>0)
                         echo "<select class='form-control select2' name=tour_city_id style='width: 100%;'>";
                       
                    for($i=0;$i<count($arr);$i++)
                    {
                    
                  echo "<option value=".$arr[$i][0].">".$arr[$i][1]."</option>";
                }
                ?>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-9">
              <div class="form-group">
               <label>Tour Name</label>
                <input type="text" class="form-control" name="tour_name" placeholder="Enter Tour Name">
              </div>
              <!-- /.form-group -->
              </div>
              
            <div class="col-md-3">
              <div class="form-group">
                <label>Duration</label>
                <input type="text" class="form-control" name="duration" placeholder="Enter Days, Nights and Hours">
              </div>
            </div>

            
            <!-- /.col -->
            <div class="col-md-10">
              <div class="form-group">
               <label>Short Description</label>
                <input type="text" class="form-control" name="short_description" placeholder="Enter Short Description">
              </div>
              <!-- /.form-group -->
              </div>
               <div class="col-md-2">
              <div class="form-group">
                <label>Ratings</label>
                <select class="form-control" name="ratings" style="width: 100%;">
                  
                  <option value="3">3 star</option>
                  <option value="3.5">3.5 star</option>
                  <option value="4">4 star</option>
                  <option value="4.5">4.5 star</option>
                  <option value="5">5 star</option>
                  
                </select>
              </div>
            </div>
           
          </div>
          <!-- /.row -->
        </div>
       
      </div>
      <!-- /.box -->

      <div class="row">
        
        <div class="col-md-12">
        <div class="box box-info">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          
          <div class="row">
            <div class="col-md-6">
<div class="box-body pad">
              <h4><strong>Highlights</strong></h4>

<textarea class="textarea" name="highlights" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
               <h4><strong>Inclusions</strong></h4>
              
             
                <textarea class="textarea" name="inclusions" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              
            </div>
             <h4><strong>Exclusions</strong></h4>
             <textarea class="textarea" name="exclusions" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              
            </div>
            <div class="col-md-6">
              <h4><strong>Itinerary Details</strong></h4>
              <textarea class="textarea" name="itinerary_details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              
               <h4><strong>Additional Info</strong></h4>
               <textarea class="textarea" name="additional_info" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              

            </div>
            <div class="col-md-8">
              <input type="reset" class="btn btn-success btn-sm" value="Reset">
              <a href="tours.php" class="btn btn-danger btn-sm" >Cancel</a>
            </div>
             <div class="col-md-4">
              
              <input type="submit" name="btnsubmit" class="btn btn-primary btn-lg" value="Save Details">
            </div>
          </div>

        </div>

      </div>
        </div>
         
      </div>
      <!-- /.row -->
    </form>
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
