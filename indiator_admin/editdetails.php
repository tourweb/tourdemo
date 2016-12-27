<?php
session_start();
include_once 'buslogic.php';

if(isset($_SESSION["admin_id"])==FALSE)
{
   header("location:index.php");
}
 $tourid=$_REQUEST["tid"];

 if(isset($_POST["btnupdate"])) 
 {
  $tour_name=addslashes($_POST["tour_name"]);
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
  $qry2="update tb_tours set tour_name='$tour_name',duration='$duration',ratings='$ratings',short_description='$short_description',
  highlights='$highlights',inclusions='$inclusions',exclusions='$exclusions',itinerary_details='$itinerary_details',
  additional_info='$additional_info',page_url='$page_url' where tour_id=".$tourid;
    $result=mysqli_query($link,$qry2);
     echo mysqli_error($link);
    if(mysqli_affected_rows($link)==1)
    {
            ?>
            <script type="text/javascript">
                alert("Details Updated Successfully");
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
        Edit Tour details
        
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
            <?php
                  $con=new clscon();
                  $link=$con->db_connect();
                  $qry1="select * from tb_tours where tour_id=".$tourid;
                  $res1=  mysqli_query($link, $qry1);
                  $a=array();
                  $j=0;
                  $r= mysqli_fetch_row($res1);
                  $a[$j]=$r;
                  $j++;
                  ?>
            <div class="col-md-4">
              <div class="form-group">
                <label>Tour Code</label>
                <input type="text" class="form-control" name="tour_code" value="<?php if(isset($a[0][1])) echo $a[0][1]; ?>" placeholder="Enter Tour Code" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                
                <label>Select Category</label>
               <?php
                    $obj=new clscat();
                    $arr=$obj->disp_rec();
                    if(count($arr)>0)
                    {
                         echo "<select class='form-control' name=tour_cat_id style='width: 100%;' disabled>";
                      
                    for($i=0;$i<count($arr);$i++)
                    {
                    if($a[0][3]==$arr[$i][0]) {
                     echo "<option value=".$arr[$i][0]." selected >".$arr[$i][1]."</option>";
                    }
                    else{
                      echo "<option value=".$arr[$i][0]." >".$arr[$i][1]."</option>";
                    }
                  
                }}
                ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
               <label>Select City/Location</label>
                <?php
                    $obj=new clscity();
                    $ar=$obj->disp_rec();
                    if(count($ar)>0)
                    {
                         echo "<select class='form-control select2' name=tour_city_id style='width: 100%;' disabled>";
                       
                    for($k=0;$k<count($ar);$k++)
                    {
                   if($a[0][4]==$ar[$k][0]) {
                     echo "<option value=".$ar[$k][0]." selected >".$ar[$k][1]."</option>";
                    }
                    else{
                      echo "<option value=".$ar[$k][0]." >".$ar[$k][1]."</option>";
                    }
                }}
                ?>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-9">
              <div class="form-group">
               <label>Tour Name</label>
                <input type="text" class="form-control" name="tour_name" value="<?php if(isset($a[0][2])) echo $a[0][2]; ?>" placeholder="Enter Tour Name">
              </div>
              <!-- /.form-group -->
              </div>
              
            <div class="col-md-3">
              <div class="form-group">
                <label>Duration</label>
                <input type="text" class="form-control" name="duration" value="<?php if(isset($a[0][5])) echo $a[0][5]; ?>" placeholder="Enter Days, Nights and Hours">
              </div>
            </div>

            <!-- /.col -->
            <div class="col-md-9">
              <div class="form-group">
               <label>Short Description</label>
                <input type="text" class="form-control" name="short_description" value="<?php if(isset($a[0][7])) echo $a[0][7]; ?>" placeholder="Enter Short Description">
              </div>
              <!-- /.form-group -->
              </div>
              
            <div class="col-md-3">
              <div class="form-group">
                <label>Ratings</label>
                <select class="form-control" name="ratings" style="width: 100%;">
                  <option value="3" <?php if($a[0][6]=='3') echo 'selected'; else echo ''; ?> >3 star</option>
                  <option value="3.5" <?php if($a[0][6]=='3.5') echo 'selected'; else echo '';?> >3.5 star</option>
                  <option value="4" <?php if($a[0][6]=='4') echo 'selected'; else echo ''; ?> >4 star</option>
                  <option value="4.5" <?php if($a[0][6]=='4.5') echo 'selected'; else echo '';?> >4.5 star</option>
                  <option value="5" <?php if($a[0][6]=='5') echo 'selected'; else echo ''; ?> >5 star</option>
                  
                  
                </select>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
       
      </div>

        <div class="box box-info">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          
          <div class="row">
            <div class="col-md-6">
              <h4><strong>Highlights</strong></h4>
              <textarea class="textarea" name="highlights" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  <?php if(isset($a[0][8])) echo $a[0][8]; ?>
              </textarea>
             
              
               <h4><strong>Inclusions</strong></h4>
              <div class="box-body pad">
             
                <textarea class="textarea" name="inclusions" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    <?php if(isset($a[0][9])) echo $a[0][9]; ?>
                </textarea>
              
            </div>
             <h4><strong>Exclusions</strong></h4>
             <textarea class="textarea" name="exclusions" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                <?php if(isset($a[0][10])) echo $a[0][10]; ?>
             </textarea>
              
            </div>
            <div class="col-md-6">
              
              <h4><strong>Itinerary Details</strong></h4>
              <textarea class="textarea" name="itinerary_details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  <?php if(isset($a[0][11])) echo $a[0][11]; ?>
              </textarea>
              
               <h4><strong>Additional Info</strong></h4>
                <textarea class="textarea" name="additional_info" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    <?php if(isset($a[0][12])) echo $a[0][12]; ?>
                </textarea>
              

            </div>
            <div class="col-md-12 col-md-offset-8">
              <input type="submit" name="btnupdate" value="Edit Details" class="btn btn-primary btn-lg">
              <a href="tours.php" name="btnupdate" class="btn btn-warning btn-lg">Cancel</a>
            </div>
          </div>

        </div>

      </div>
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
