<?php
session_start();
include_once 'buslogic.php';

if(isset($_SESSION["admin_id"])==FALSE)
{
   header("location:index.php");
}

if(isset($_POST["btnsubmit"]))
{
    $obj= new clscat();
    $obj->cat_name=$_POST["cat_name"];
    $obj->save_rec();
}
if(isset($_REQUEST["ccod"]))
{
    if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=='D')
    {
        $obj=new clscat();
        $obj->cat_id=$_REQUEST["ccod"];
        $obj->delete_rec();
        header("location:tour-categories.php");
    }
    if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=='E')
    {
        $obj=new clscat();
        $obj->cat_id=$_REQUEST["ccod"];
        $obj->find_rec();
        $cat_name=$obj->cat_name;
        $_SESSION["cid"]=$_REQUEST["ccod"];
    }
}
if(isset($_POST["btnupd"]))
{
    $obj=new clscat();
    $obj->cat_id=$_SESSION["cid"];
    $obj->cat_name=$_POST["cat_name"];
    $obj->update_rec();
    unset($_SESSION["cid"]);
    header("location:tour-categories.php");
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
        Cities
        
      </h1>
     
    </section>
    <section class="content">
     
      <div class="row">
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Category</h3>
            </div>
           
            <form class="form-horizontal" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>

                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="cat_name"  placeholder="Enter Category Name" value="<?php if(isset($cat_name)) echo $cat_name; ?>">
                  </div>
                </div>
               <div class="form-group">
                
                  <div class="col-sm-4">
                    <?php
                      if(!isset($cat_name))
                      echo "<input type='submit' class='btn btn-info pull-right' name='btnsubmit' value='Submit'>";
                      else
                        echo "<input type=Submit class='btn btn-info pull-right' name=btnupd value=Update />";
                    ?>
                  </div>
                </div>
               
              </div>
             
            </form>
          </div>
          <div class="box box-success">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          
           <div class="col-md-12">
              <h4><strong>All Categories</strong></h4>
               <div class="table-responsive">
                  <?php
                    $obj=new clscat();
                    $arr=$obj->disp_rec();
                    if(count($arr)>0)
                        echo "<table class='table-bordered' width='100%'><tr><th>Sr. No.</th><th>Category Name</th><th></th></tr>";
                    for($i=0;$i<count($arr);$i++)
                    {
                      ?>
                        <tr><td><?php echo $i+1; ?></td>
                        <td><?php echo $arr[$i][1]; ?></td>
                        <td><a href='tour-categories.php?ccod=<?php echo $arr[$i][0]; ?>&mode=E' class="btn btn-success btn-sm">Edit</a>
                        <a href='tour-categories.php?ccod=<?php echo $arr[$i][0]; ?>&mode=D' class="btn btn-danger btn-sm">Delete</a>
                        <?php
                    }
                    
                  ?>
                  </table>
          </div>
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