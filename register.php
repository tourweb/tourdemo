<?php  
 session_start();  
include_once 'indiator_admin/buslogic.php';
include_once 'includes/domain.php';
  $con=new clscon();
  $link=$con->db_connect();
$username=$_POST["r_username"];
$password=$_POST["r_password"];
$query1 = "SELECT username FROM users WHERE username = '".$username."'";
	$res1= mysqli_query($link, $query1);
	 $count = mysqli_num_rows($res1); 
echo "<pre>$count</pre>";
       if($count>0) {
       ?>
     	<script>
     	alert("Username already exist.Try again!!");
     	</script>
     	<?php
 echo 'wrong';
       }  
       else{
       $query = "INSERT INTO users (username, password) VALUES ('".$username."', '".$password."')";
       $res= mysqli_query($link,$query);
	$uid=mysqli_insert_id($link);
       if(mysqli_affected_rows($link)==1)
        {
         $_SESSION['userid'] = $uid; 
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