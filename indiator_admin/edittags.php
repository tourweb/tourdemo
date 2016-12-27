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
    $header=$_POST["header"];
    $keywords=$_POST["keywords"];
   
    $description=$_POST["description"];
    $qry2="update tb_meta_tags set header='$header',keywords='$keywords',description='$description' where tour_id=".$tourid;
    $result=mysqli_query($link,$qry2);
    if(mysqli_affected_rows($link)==1)
    {

            ?>

            <script type="text/javascript">
                alert("Tags Updated Successfully");
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
       Meta Tags and Description
        
      </h1>
     
    </section>
    <section class="content">
     
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Meta Tag and Description</h3>
            </div>
           
            <form class="form-horizontal" action="" method="post">
              <?php $con=new clscon();
                  $link=$con->db_connect();
                  $qry1="select * from tb_meta_tags where tour_id=".$tourid;
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
                    $header=$_POST["header"];
                    $keywords=$_POST["keywords"];
                   
                    $description=$_POST["description"];
                   
                    $qry2="INSERT INTO tb_meta_tags VALUES (null,$tourid,'$header','$keywords','$description')";
                    $result2=mysqli_query($link,$qry2);
                    echo mysqli_error($link);
                    if(mysqli_affected_rows($link)==1)
                    {

                            ?>
                            <script type="text/javascript">
                                alert("Tags added Successfully");
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
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Header Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="header"  placeholder="Enter Header Title" >
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keywords</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="keywords"  placeholder="Enter Keywords">
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="description"  placeholder="Enter Meta Description">
                  </div>
                </div>
               <div class="form-group col-md-12 col-md-offset-4">
              <input type="submit" class="btn btn-primary btn-lg" value="Submit" name="btnadd">
             &nbsp; &nbsp; &nbsp; &nbsp;<a href="tours.php" class="btn btn-warning btn-lg">Cancel</a>
           </div>
               
              </div>
             
            </form>
            <?php }
               
               else{ ?>
                 <form class="form-horizontal" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Header Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="header"  placeholder="Enter Header Title" value="<?php if(isset($a[0][2])) echo $a[0][2]; ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keywords</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="keywords"  placeholder="Enter Keywords" value="<?php if(isset($a[0][3])) echo $a[0][3]; ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="description"  placeholder="Enter Meta Description" value="<?php if(isset($a[0][5])) echo $a[0][5]; ?>">
                  </div>
                </div>
              <div class="form-group col-md-12 col-md-offset-4">
              <input type="submit" class="btn btn-primary btn-lg" value="Update" name="btnsubmit">
             &nbsp; &nbsp; &nbsp; &nbsp;<a href="tours.php" class="btn btn-warning btn-lg">Cancel</a>
           </div>
               
              </div>
             
            </form>
            <?php } 
                ?>
          </div>
        

           </div>
      </div>
      
    </section>
   
  </div>
  
<?php include("includes/footer.php"); ?>
</body>
</html>
