<?php
include 'view/header.php';
?>
<br>
<div class="container ">

    <div class="row">

   

    <div class=" col-lg-offset-3 col-lg-5 container-fluid  ">
        <div class="row">
            <div class=" container-fluid bg-primary ">
                <h2 class="text-white text-center "><br>User Login</h2><br>
            </div>

            <form action="<?php echo $base_url ?>?r=login" class="border border-secondary bg-secoundary" method="post" enctype="multipart/form-data">
                <center>
                    <div> <i class="bi bi-person-circle" style="font-size: 5rem;"></i></div>
                </center>
                <div class="form-group ">
                    <br><label for="email" class="text-primary"> <b> <big> *Email* </big> </b></label><br>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                        <input type="text" class="form-control" placeholder="Enter email" name="email" required><br>
                    </div>
                    <label for="password" class="text-primary"><b> <big> *Password* </big> </b></label><br>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-key"></i></div>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required><br>
                    </div>
                    </br>
                    <input type="submit" class=" btn btn round bg-success text-white" value=" Login" />
                    <a href="<?= $base_url ?>?r=site" class="btn btn-danger float-end "  >Back</a>
                   
                    <br>
                </div>
                <div>
                    <br><br>
                     <span class="text-info "> *If you create new account*</span>  <a href="<?php echo $base_url ?>?r=signup">
                        <span class="text-primary"> SignUp </span>
                        </a>
                    <span class="password float-end"> <a href="<?php echo $base_url ?>?r=forgot">*Forgot Password?*</a></span>
                </div>
                <br><br>
            </form>
        </div>
    </div>
</div>
</div>
<br><br><br><br>
<?php
include 'view/footer.php';
?>