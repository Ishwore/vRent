<?php
include 'view/header.php';
?>

<div class="container">
    <h2 class="text-danger"><br>Now Available Buses Booking for Rent.<br></h2><br>
    <div class="row">
        <?php
        

          if ($vehicleitem) {
            while ($row = $vehicleitem->fetch_assoc()) {
                echo "<div class='col-md-4 col-sm-6'>
            <div class='card'>
            <img class='image' src='" . $base_url . "Admin-zone/" . $row["imgurl"] . "' height='250px' width='100%' />
             <h4><b>&nbsp;&nbsp;" . $row["v_name"] . "</b></h4> 
             <p>&nbsp;&nbsp;" . $row["v_desc"] . "</p>
                  <button class='btn btn-info btn-block'> Rent Price Per Day : NRS " . $row["price"] . "</button> <br>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=view&id=".$row["v_id"]."' class='btn btn-primary' >View vehicle </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=book&id=".$row["v_id"]."' class='btn btn-danger' >Book Now </a><br></p><br>
            </div>
            </div>";
            }
        } else {
            echo "sorry no buses available";
        }
        ?>
    </div>
</div>
<br><br>


<?php
include 'view/footer.php';
?>