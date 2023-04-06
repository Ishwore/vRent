<?php
include 'view/header.php';
?>
<br><br><br><br><br>
<div class="container">
<div class="container-fluid col-lg-offset-3 col-lg-5  ">

<div class="text-center border-1 border border-secondary">
    <div class=" bg-primary">
               <h2 class="text-white text-center bg-primary"><br>Forget User Password</h2><br>
            </div>
     

        <form class=" " action="<?php echo $base_url ?>?r=forgot" method="POST">
        
            <div>
            <br>
            <label class="text-primary"><h3><b><i>*Verify Email*</i></b></h3> </label><br>
            <input type="text" placeholder="Enter your email..." name='email' style="width:50%" >
            </div>
            <br>
            <div >
            <input type="submit" class="btn btn-primary" value="Send"> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="<?= $base_url ?>?r=login" class="btn btn-danger "  >Back</a>
            </div>
            <br>
        </form>
        <br>
</div>
</div>
</div>
<br><br><br><br><br><br><br><br>
<?php
include 'view/footer.php';
?>