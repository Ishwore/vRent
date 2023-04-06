<?php
include 'view/header.php';
?>


<div class="container">
  <div class="row">
  <div class="container-fluid col-lg-6">
	<div>
            <br><br> <h2 class="text-danger"> <b>Opps !! Your vRent booking is empty!</b><br>&nbsp;&nbsp;Please Login OR Signup in website!   <h2>
	</div><br>
 	<div><center>
		<a href="<?= $base_url ?>?r=login" class="btn btn-primary btn btn-round text-white"  ><b>Login</b></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?= $base_url ?>?r=signup" class="btn btn-primary btn btn-round text-white"  ><b>SignUp</b></a>
		</center>
	</div>
	<br><br><br><br><br>
	<p class="text-info">  <i>
		The price and availability of items at MeroSawari.com are subject to change. The My Booking is a temporary place to store a list of your items and reflects each item's most recent price </i>
	</p>
   </div>
  </div>
</div>
<br><br><br><br>
<?php
include 'view/footer.php';
?>