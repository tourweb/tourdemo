<?php 
include("indiator_admin/buslogic.php");
include("includes/domain.php");
session_start();
$type = $_REQUEST['type'];
$con=new clscon();
$link=$con->db_connect();
if(empty($type) || !isset($type)) {
  echo 'Request type is not set';
} 
else if($type == 'signup') {
$name = addslashes($_POST['name']);
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
	$query1 = "SELECT username FROM users WHERE username = '".$username."'";
	$res1= mysqli_query($link, $query1);
	 $count = mysqli_num_rows($res1); 
       if($count>0) {
       ?>
     	<script>
     	alert("Username already exist.Try again!!");
     	 window.location.href="#login-form";
     	</script>
     	<?php
       }  
       else{     
       $query = "INSERT INTO users (name, username, password) VALUES ('".$name."', '".$username."', '".md5($password)."')";
       $res= mysqli_query($link, $query);

       if(mysqli_affected_rows($link)==1)
        {
         ?>
     	<script>
     	alert("Registered Successfully. Login Now");
     	 window.location.href="login.php";
     	</script>
     	<?php
     	
     	}
     	else{
     	?>
     	<script>
     	alert("Please try again!!");
     	 window.location.href="login.php";
     	</script>
     	<?php
     	}
     	}
} 
else if($type == 'login') {
   $username = addslashes($_REQUEST['username']);
   $password = addslashes($_REQUEST['password']);
   $query2 = "SELECT username FROM users WHERE username = '".$username."' and password = '".md5($password)."'";
       $result2 = mysqli_query($link, $query2);
       $count2 = mysqli_num_rows($result2); 
       if($count2 == 0) {
       ?>
     	<script>
     	alert("Username/Password is incorrect.");
</script>
     	<?php
     	 $uri = $_SERVER['REQUEST_URI'];

          header("location:https://indiator.com/");
     	
     	}
     	else{
     	 $query3 = "SELECT id FROM users WHERE username = '".$username."' AND password = '".md5($password)."'";
     	   $result3 = mysqli_query($link, $query3);
     	    while($r=mysqli_fetch_assoc($result3))
                        {
                        $id=$r["id"];
                        $_SESSION["userid"]=$r["id"];
$uri = $_SERVER['REQUEST_URI'];

          header("location:https://indiator.com/");
          }
   }
} 
else if($type == 'logout') {
 unset($_SESSION["userid"]);
 session_destroy();
 header("location:https://indiator.com/");
}


?>

