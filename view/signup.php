<?php
include 'view/header.php';
?>
<br>
<div class="container">

    <div class="row">


        <div class=" col-lg-5 container-fluid  ">
            <div class="row">
                <div class=" container-fluid bg-primary ">
                    <h3 class="text-white text-center"> <br>User SignUp</h3> <br>
                </div>

                <form action="<?php echo $base_url ?>?r=signup" class="border border-secondary" method="post" enctype="multipart/form-data">

                    <div class="form-group ">
                        <label for="uname" class="text-primary"> <b> *Name* </b></label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-person"></i></div>
                            <input type="text" class="form-control" placeholder="Enter your name" name="uname"  required>
                        </div>
                        <label for="uname" class="text-primary"> <b> *Email* </b></label> &nbsp;
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                            <input type="email" class="form-control" placeholder="Enter email" name="email"  required>
                        </div>
                        <label for="upass" class="text-primary"><b> *Password* </b></label> &nbsp;
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-file-lock"></i></div>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password" data-empty="true" required>
                        </div> 
                        <label for="upass" class="text-primary"><b> *Address* </b></label> &nbsp;
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-geo-alt-fill"></i></div>
                            <input type="text" class="form-control" placeholder="Enter your address" name="address" required>
                        </div>

                        <label for="upass" class="text-primary"><b> *Phone Number* </b></label> &nbsp;
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-phone"></i></div>
                            <input type="text" class="form-control" placeholder="Enter your phone number" name="phone" required><br>
                        </div>

                        </br>
                        <input type="submit" class=" btn btn round bg-success text-white" value="Signup" />

                        <a href="<?= $base_url ?>?r=login" class="btn btn-danger float-end ">Back</a>
                        <br>


                        <div>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="text-info "> *If you have already account.*</span>
                            <a href="<?php echo $base_url ?>?r=login"> <span class="text-primary">Login </span>

                            </a>

                        </div>

                </form>

            </div>

        </div>

    </div>
</div>
<br>

<?php
include 'view/footer.php';
?>