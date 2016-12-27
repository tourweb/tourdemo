<?php
session_start();
include_once 'buslogic.php';

if(isset($_SESSION["admin_id"])==FALSE)
{
   header("location:index.php");
}

if(isset($_POST["btnsubmit"]))
{
    $obj= new clscity();
    $obj->city_name=$_POST["city_name"];
$obj->city_key=$_POST["city_key"];
$obj->city_desc=$_POST["city_desc"];
    $obj->save_rec();
}
if(isset($_REQUEST["ccod"]))
{
    if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=='D')
    {
        $obj=new clscity();
        $obj->city_id=$_REQUEST["ccod"];
        $obj->delete_city();
        header("location:cities.php");
    }
    if(isset($_REQUEST["mode"]) && $_REQUEST["mode"]=='E')
    {
        $obj=new clscity();
        $obj->city_id=$_REQUEST["ccod"];
        $obj->find_rec();
        $city_name=$obj->city_name;
$city_key=$obj->city_key;
$city_desc=$obj->city_desc;
        $_SESSION["cid"]=$_REQUEST["ccod"];
    }
}
if(isset($_POST["btnupd"]))
{
    $obj=new clscity();
    $obj->city_id=$_SESSION["cid"];
    $obj->city_name=$_POST["city_name"];
$obj->city_key=$_POST["city_key"];
$obj->city_desc=$_POST["city_desc"];
    $obj->update_rec();
    unset($_SESSION["cid"]);
    header("location:cities.php");
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
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New City</h3>
            </div>
           
            <form class="form-horizontal" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">City Name</label>

                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="city_name"  placeholder="Enter City Name" value="<?php if(isset($city_name)) echo $city_name; ?>">
                  </div>
                </div>
 
<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Meta Keywords</label>

                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="city_key"  placeholder="Enter Keywords" value="<?php if(isset($city_key)) echo $city_key; ?>">
                  </div>
                </div>
 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Meta Description</label>

                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="city_desc"  placeholder="Enter Description" value="<?php if(isset($city_desc)) echo $city_desc; ?>">
                  </div>
                </div>
               <div class="form-group">
                
                  <div class="col-sm-4">
                    <?php
                      if(!isset($city_name))
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
              <h4><strong>All Cities</strong></h4>
               <div class="table-responsive">
                  <?php
                    $obj=new clscity();
                    $arr=$obj->disp_rec();
                    if(count($arr)>0)
                        echo "<table class='table-bordered' width='100%'><tr><th style='width:5%'>Sr. No.</th><th>City Name</th><th style='width:30%'>Meta Keywords</th><th style='width:30%'>Meta Description</th><th style='width:20%'>Edit/Delete</th></tr>";
                    for($i=0;$i<count($arr);$i++)
                    {
                      ?>
                        <tr><td><?php echo $i+1; ?></td>
                        <td><?php echo $arr[$i][1]; ?></td>
<td><?php echo $arr[$i][2]; ?></td>
<td><?php echo $arr[$i][3]; ?></td>
                        <td><a href='cities.php?ccod=<?php echo $arr[$i][0]; ?>&mode=E' class="btn btn-success btn-sm">Edit</a>
                        <a href='cities.php?ccod=<?php echo $arr[$i][0]; ?>&mode=D' class="btn btn-danger btn-sm">Delete</a>
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
