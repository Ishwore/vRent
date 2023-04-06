<?php
include 'view/header.php';
?>

<br><br>
<div class="container ">
    <div class="row">
    <div class=" col-lg-offset-3 col-lg-6 container-fluid  ">
        <div class="row">
            <div class=" container-fluid bg-primary">
                <h2 class="text-white text-center">Booking Form</h2><br>
            </div>

            <form action="<?php echo $base_url ."?r=book&id=$v_id"; ?>" class="border border-secondary bg-secoundary" method="post" enctype="multipart/form-data">
                
                <div class="form-group ">
                    <br><label for="phone" class="text-primary"> <b> <big> *Phone Number* </big> </b></label><br>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter vehicle needed customer Number....." name="phone" required><br>
                    </div>

                    <label for="phone" class="text-primary"> <b> <big> *Address* </big> </b></label><br>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter vehicle needed customer Address....." name="address" required><br>
                    </div>
                    <label for="password" class="text-primary"><b> <big> *When our need vehicle* </big> </b></label><br>
                   <div class="row">
                       <div class="col-6">
                           <label class="text-primary"><b>*From Date*</b></label>
                           <div class="input-group" style="width:100%;">
                                <input type="date" class="form-control"  name="date" required>
                            </div>
                       </div>
                       <div class="col-6">
                           <label class="text-primary"><b>*Days*</b></label>
                           <div class="input-group" style="width:100%;">
                                <input type="text" class="form-control" placeholder=" How much days needed vehicle...." name="day" required><br>
                            </div>
                       </div>
                   </div>
                   <br><label for="phone" class="text-primary"> <b> <big> *Message* </big> </b></label><br>
                    <div class="input-group">
                       <textarea  name="message" placeholder="Write why you need vehicle...." style="height:100px; width: 100%;"></textarea><br>
                    </div>
                    <br><br>
                    <div class="form-group">
                         <input type="submit" class="btn btn-primary"  name="submit" value="Book Now">
                         <a href="<?= $base_url ?>?r=site" class="btn btn-danger float-end"  >Back</a>
                    </div><br>
                <br>
            </form>
        </div>
    </div>
</div>
</div>
<br><br>
<?php
include 'view/footer.php';
?>    