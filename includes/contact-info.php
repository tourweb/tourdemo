<?php session_start(); ?>
<section class='section-top-header'>
      <div class='top-header'>
        <div class="container">
            <div class="row" style="background-color:#DF4608;">
              <div class="col-md-6">
                    <div class='top-contact'><i class="fa fa-phone"></i><span>+91 987 110 7030</span><i class="fa fa-envelope"></i><span>info@indiator.com</span></div>
</div><div class="col-md-6">
                    <div class='top-login'><i class="fa fa-plus"></i><a class='' href='https://indiator.com/agent-registration.php'>Agent Register</a><i class="fa fa-lock"></i>
<?php
if(isset($_SESSION["userid"])){
$rid=$_SESSION["userid"];
echo "<a href='#' id='logout'>Logout</a>";
 
echo "&nbsp; &nbsp; <a class='' href='https://indiator.com/myprofile.php?userid=$rid'>My Profile</a>";
}
else{
echo "<a href='' class='' data-toggle='modal' data-target='#myModal'>Login/Register</a>";
}
 ?>                       
                    </div>
              </div>
            </div>
        </div>
      </div>
    </section>
