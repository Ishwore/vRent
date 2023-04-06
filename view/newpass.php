<?php
   include 'view/header.php';
?>
<br><br>
<div class=" container-fluid col-lg-offset-3 col-lg-5">
    <div class="text-center border-1 border border-secondary">
         <div class=" bg-primary">
               <h2 class="text-white text-center bg-primary"><br> User Change Password</h2><br>
            </div>
        <form class="" action="<?php echo $base_url ?>?r=email" method="post">
            <div >
                <br>
                <label class="text-primary"><h5><b><i>*New Password*</i></b> </h5></label><br>
                <input  type="text" placeholder="Enter new password...." name='newpassword'style="width:40%"><br>
                <label class="text-primary"><h5><b><i>*Confirm Password*</i></b> </h5></label><br>
                <input  type="text" placeholder="Enter new confirm password..." name='newcpassword' style="width:40%">
            </div>
            <br>
            <button type="submit" class=" btn btn-primary" value="send">Send</button> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?= $base_url ?>?r=forgot" class="btn btn-danger "  >Back</a>
        </form>
        <br>
     </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
<?php
include 'view/footer.php';
?>
