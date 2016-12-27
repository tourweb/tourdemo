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
        Booking Details
        <a href="booking-info.php" style="float:right;" class="btn btn-success">Back to Bookings</a>
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
              $bookid=$_REQUEST["bid"];
              $con=new clscon();
              $link=$con->db_connect();
              $qry="select * from tb_booking where book_id=".$bookid;
              $res=  mysqli_query($link, $qry);
              $arr=array();
              $i=0;
              while($r=mysqli_fetch_row($res))
              {
                $arr[$i]=$r;
                $i++;
            
              ?>
              <tr>
                <th>Booking ID:</th>
                <td><?php echo "IND".$arr[0][0]; ?></td>
              </tr>
              <tr>
                <th style="width:50%">Tour Code:</th>
                <?php
                        $con=new clscon();
                        $link=$con->db_connect();
                        $qry1="select tour_code,tour_name from tb_tours where tour_id=".$arr[0][1];
                        $res1= mysqli_query($link, $qry1);
                        $r1=mysqli_fetch_array($res1);
                        echo "<td>".$r1[0]."</td>";
                    ?>
                
              </tr>
              <tr>
                <th>Tour Name:</th>
                <td><?php echo $r1[1]; ?></td>
              </tr>
              <tr>
                <th>Booking Date:</th>
                <td><?php  echo $arr[0][24];  ?>
                </td>
              </tr>
              
            </table>
          </div>
            </div>
            <div class="col-md-6">
              <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">No. Of Travellers</th>
                <td><?php echo $arr[0][30]; ?>
                </td>
              </tr>
              <tr>
                <th>Travelling Date</th>
                <td><?php echo $arr[0][2]; ?></td>
              </tr>
              <tr>
                <th>Amount Paid</th>
                <td><?php echo $arr[0][28]; ?></td>
              </tr>
              <tr>
                <th>Amount Status</th>
                <td><?php echo $arr[0][29]; ?></td>
              </tr>
               <tr>
                <th>Amount Status by Bank</th>
                <td><?php 
                	if($arr[0][31]==0 && $arr[0][31]!='null'){
                echo "Transaction Successful";
                }
                if($arr[0][31]==1){
                echo "Rejected by the Switch";
                }
                if($arr[0][31]==2){
                echo "Rejected by the Payment Gateway";
                }
               if($arr[0][31]==''){
                echo " No";
                }
                ?></td>
              </tr>
            </table>
          </div>
            </div>
            
          </div>
</div>
      </div>
      <div class="row">
      <div class="col-md-6">
          <div class="box box-info">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          <div class="col-md-12">
            <h4><strong>Traveller Details</strong></h4>
              <?php
            
              $am=explode(",",$arr[0][9]);
              $an=explode(",",$arr[0][3]);
              $ag=explode(",",$arr[0][6]);

              ?>
                <table class="table">
                  <tr>  
                    <th>Mr./Ms.</th>
                    <th>Adult Name</th>
                    <th>Adults Age</th>
                  </tr>
                  <tr>
                   
                    <td><?php foreach($am as $amv)
                        {
                          echo $amv."<br/>";
                        }
                        ?>
                    </td>
                    <td><?php foreach($an as $anv)
                        {
                          echo $anv."<br/>";
                        } ?></td>
                    <td>
                      <?php foreach($ag as $agv)
                        {
                          echo $agv."<br/>";
                        } ?>
                    </td>
                  </tr>
                </table>
                <?php
              $cm=explode(",",$arr[0][10]);
              $cn=explode(",",$arr[0][4]);
              $cg=explode(",",$arr[0][7]);
              ?>
                 <table class="table">
                  <tr>
                   
                    <th>Mr./Ms.</th>
                    <th>Child Name</th>
                    <th>Child Age</th>
                  </tr>
                  <tr> 
                    <td><?php foreach($cm as $cmv)
                        {
                          echo $cmv."<br/>";

                        } ?>
                    </td>
                    <td><?php foreach($cn as $cnv)
                        {
                          echo $cnv."<br/>";
                        } ?></td>
                    <td>
                      <?php foreach($cg as $cgv)
                        {
                          echo $cgv."<br/>";
                        } ?>
                    </td>
                  </tr>
                </table>
                <?php
              $im=explode(",",$arr[0][11]);
              $in=explode(",",$arr[0][5]);
              $ig=explode(",",$arr[0][8]);
              ?>
                 <table class="table">
                  <tr> 
                    <th>Mr./Ms.</th>
                    <th>Infant Name</th>
                    <th>Infant Age</th>
                  </tr>
                  <tr> 
                    <td><?php foreach($im as $imv)
                        {
                          echo $imv."<br/>";

                        } ?>
                    </td>
                    <td><?php foreach($in as $inv)
                        {
                          echo $inv."<br/>";
                        } ?></td>
                    <td>
                      <?php foreach($ig as $igv)
                        {
                          echo $igv."<br/>";
                        } ?>
                    </td>
                  </tr>
                </table>  
            </div> 
          </div> 
            </div>
          </div>
          <div class="col-md-6">
          <div class="box box-danger">
        <div class="box-header with-border">
         </div>
        <div class="box-body">
          
           <div class="col-md-12">
              <h4><strong>Contact Information</strong></h4>
              
               <div class="table-responsive">
            <table class="table">
              
              <tr>
                <td><b>Name:</b>
                <?php echo $arr[0][12];?></td>
              
                <td><b>Email-id:</b>
                <?php echo $arr[0][13];?></td>
              </tr>
              <tr>
                <td><b>City:</b>
                <?php echo $arr[0][14];?></td>
              
                <td><b>Country:</b>
                <?php echo $arr[0][15];?></td>
              </tr>
              <tr>
                <td><b>State:</b>
                <?php echo $arr[0][16];?></td>

                <td><b>ZIP Code:</b>
                <?php echo $arr[0][17];?></td> 
              </tr>
              <tr>
                <td><b>Country Code:</b>
                <?php echo $arr[0][18];?></td>
              
                <td><b>Phone No.:</b>
                <?php echo $arr[0][19];?></td>
              </tr>
              <tr>
                <td><b>Address:</b>
                <?php echo $arr[0][20];?></td>
              </tr>             
               <tr>
                <td><b>Pickup Details:</b>
                <?php echo $arr[0][21];?></td>
              </tr>
               <tr>
                <td><b>Special Requirements:</b>
                <?php echo $arr[0][22];?></td>
              </tr>
            </table>
           
          </div>
            </div>
            </div>
        
            </div>
     </div>
     </div><?php } ?>
     
       
    </section>
   
  </div>
  
<?php include("includes/footer.php"); ?>
</body>
</html>
