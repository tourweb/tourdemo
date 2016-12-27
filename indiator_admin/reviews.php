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
        Reviews
        
      </h1>
     
    </section>
    <section class="content">
     
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Review</h3>
            </div>
           
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control"  placeholder="Enter Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Comment</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  placeholder="Your Comment">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Reviews</label>
                     <div class="col-sm-9">
                      1 <input type="radio" name="r3" class="flat-red" checked>
                      2 <input type="radio" name="r3" class="flat-red">
                      3 <input type="radio" name="r3" class="flat-red">
                      4 <input type="radio" name="r3" class="flat-red">
                      5 <input type="radio" name="r3" class="flat-red">
                      
                  </div>
                </div>
               <div class="form-group">
                
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                  </div>
                </div>
               
              </div>
             
            </form>
          </div>
          </div>
            <div class="col-md-12"
          <div class="box box-success">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          
           <div class="col-md-12">
              <h4><strong>All Reviews</strong></h4>
               <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Comment</th>
                <th></th>
              </tr>
              <tr>
                <td>1</td>
                <td>Shivani</td>
                <td>Thank you so very much for another wonderful trip! It was so kind of you to meet for our final meal and airport trip as well. </td>
                <td>
                4 stars
                </td>
              </tr>
              <tr>
               <td>2</td>
                <td>John</td>
                 <td>Thank you so very much for another wonderful trip! It was so kind of you to meet for our final meal and airport trip as well. </td>
                <td>
                5 stars
                </td>
              </tr>
              
            </table>
          </div>
            </div>
            </div>
        
            </div>


           </div>
      </div>
      
    </section>
   
  </div>
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script type="text/javascript">
   $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

  </script>
<?php include("includes/footer.php"); ?>
</body>
</html>
