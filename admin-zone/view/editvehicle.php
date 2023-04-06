<?php
include "view/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
               <br> <a href="<?= $base_url ?>?r=managevehicle" class="btn btn-danger float-end ">Back</a><br><br>
            <form class="form" method="post" action="<?php echo $base_url; ?>?r=editvehicle&id=<?php echo $v_id; ?>" enctype="multipart/form-data">
            <label> Vehicle Category </label>
                <input type="text" class="form-control" name="cat_name" value="
<?php
echo $vehicle["cat_id"];
?>
" placeholder="enter vehicle category name here" /><br>
                <label> Vehicle Name </label>
                <input type="text" class="form-control" name="vname" value="
<?php
echo $vehicle["v_name"];
?>
" placeholder="enter vehicle name here" /><br>
 <label> Vehicle Registration Number </label>
                <input type="text" name="vnumber" class="form-control" value="
<?php
echo $vehicle["v_number"];
?>
" placeholder="enter vehicle registration number here" /><br>
                <label> Vehicle desc </label>
                <input type="text" name="vdesc" class="form-control" value="
<?php
echo $vehicle["v_desc"];
?>
" placeholder="enter vehicle desc here" /><br>

                <label> vehicle Rent price </label>
                <input type="number" name="price" class="form-control" value="<?php
                                                                                echo $vehicle["price"];
                                                                                ?>
" placeholder="enter price" /><br>

                <label> image </label>
                <input type="file" name="vehicleimgupload" class="form-control" /> <img src='<?php echo $base_url . $vehicle["imgurl"]; ?>' width="100px" height="100px" /> <br><br>

                <input type="submit" class="btn btn-primary" value="update vehicle" name="updatevehicle" /> <input type="reset" class="btn btn-info float-end" value="clear" name="resetvehicle" />

            </form>

        </div>
    </div>
</div>
<br><br>
<?php
include "view/footer.php";
?>