<?php
include('indiator_admin/connect.php');
 $con=new clscon();
 $link=$con->db_connect();
if($_POST)
{
$name=$_POST['name'];
$email=$_POST['email'];
$comment_dis=addslashes($_POST['comment']);
$tid=$_POST['tid'];
$rating=$_POST['rating'];
$lowercase = strtolower($email);
  $image = md5( $lowercase );
  
mysqli_query($link,"insert into comments(com_name,com_email,com_dis,tid,rating) values ('$name','$email','$comment_dis','$tid','$rating')");

}

else { }

?>
<dt class="box col-md-12">
<span  class="com_name"><font color="#428BCA"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <b><?php echo $name;?></b></font></span> <br /><?php 
if($rating==1)
echo "<img src='https://indiator.com/images/star.png'>";
if($rating==2)
echo "<img src='https://indiator.com/images/2star.png'>";
if($rating==3)
echo "<img src='https://indiator.com/images/3star.png'>";
if($rating==4)
echo "<img src='https://indiator.com/images/4star.png'>";
if($rating==5)
echo "<img src='https://indiator.com/images/5star.png'>";
?><br>
<?php echo '"'.$comment_dis.'"'; ?>
</dt><br />