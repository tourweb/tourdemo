<?php  
 session_start();  
include_once 'indiator_admin/buslogic.php';
include_once 'includes/domain.php';
  $con=new clscon();
  $link=$con->db_connect();
 if(isset($_POST["username"]))  
 {  
      $query = "  
      SELECT * FROM users  
      WHERE username = '".$_POST["username"]."'  
      AND password = '".$_POST["password"]."'  
      ";  
      $result = mysqli_query($link, $query);  
      $r1=mysqli_fetch_array($result);
      if(mysqli_num_rows($result) > 0)  
      {  
           $_SESSION['userid'] = $r1[0];
           echo 'Yes';  
      }  
      else  
      {  
           echo 'No';  
      }  
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["userid"]);  
 }  
 ?>  