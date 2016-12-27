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
    <?php include("includes/nav.php"); ?>
  </header>

  <aside class="main-sidebar">
   <?php include("includes/menu.php"); ?>
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Affiliates Details
        <a href="affiliates.php" style="float:right;" class="btn btn-success">Back to Aaffiliates</a>
      </h1>
     
    </section>
    <section class="content">
    
      <div class="box box-primary">
       
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            
            <div class="table-responsive">
            <table class="table">
              <?php
              $aid=$_REQUEST["aid"];
              $con=new clscon();
              $link=$con->db_connect();
              $qry="select * from affiliate where affiliateid=".$aid;
              $res=  mysqli_query($link,$qry);
              $arr=array();
              $i=0;
              while($r=mysqli_fetch_row($res))
              {
                $arr[$i]=$r;
                $i++;
            
              ?>
              <tr>
                <th>Affiliate ID:</th>
                <td><?php echo "AFF10".$arr[0][0]; ?></td>
              </tr>
              
             
              <tr>
                <th>Company Name:</th>
                <td><?php  echo $arr[0][1];  ?>
                </td>
              </tr>
              <tr>
                <th>Official Name:</th>
                <td><?php  echo $arr[0][2];  ?>
                </td>
              </tr>
              <tr>
                <th>Business Type:</th>
                <td><?php  echo $arr[0][3];  ?>
                </td>
              </tr>
              <tr>
                <th>Country</th>
                <td><?php  echo $arr[0][11];  ?>
                </td>
              </tr>
              <tr>
                <th>State</th>
                <td><?php  echo $arr[0][12];  ?>
                </td>
              </tr>
              <tr>
                <th>City</th>
                <td><?php  echo $arr[0][13];  ?>
                </td>
              </tr>
               <tr>
                <th>Address</th>
                <td><?php  echo $arr[0][14];  ?>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
            </div>
            <div class="col-md-6">
            
            <div class="table-responsive">
            <table class="table">
            <tr>
                <th>Contact Person Name:</th>
                <td><?php  echo $arr[0][4]." ".$arr[0][5];  ?>
                </td>
              </tr>
              <tr>
                <th>Job Position:</th>
                <td><?php  echo $arr[0][6];  ?>
                </td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?php  echo $arr[0][7];  ?>
                </td>
              </tr>
               <tr>
                <th>Phone Number</th>
                <td><?php  echo $arr[0][8];  ?>
                </td>
              </tr>
               <tr>
                <th>Website Address:</th>
                <td><?php  echo $arr[0][10];  ?>
                </td>
              </tr>
              <tr>
                <th>Fax number:</th>
                <td><?php  echo $arr[0][9];  ?>
                </td>
              </tr>
             
            </table>
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
