<?php
include 'view/header.php';
?>
<div class="container">
  <div class="row">

    <h2 class="text-info "><br>*Vehicle Details*</h2><br>
    <?php
    $id = $_GET['id'];
    $vehicleitem = get_vehicle_item_by_id($id);

    if ($vehicleitem) {
      while ($row = $vehicleitem->fetch_assoc()) {
        echo "<br><br><div class='col-md-4 col-sm-6'>
            <div class='card'>
            <img class='image' src='" . $base_url . "Admin-zone/" . $row["imgurl"] . "' height='250px' width='100%' /><br>
             <h4 class='text-primary'><b><label class=''>Vehicle Name :</label>  &nbsp; "  . $row["v_name"] . "</b></h4> 
             <p class='text-primary'><label> Description: </label>&nbsp;" .  $row["v_desc"] . "</p>
             <p class='text-primary'><label> Rent Price One Day : NRS</label> " . $row["price"] . "</p> 
             <p class='text-primary'><label> Vehicle Register Number :</label> " . $row["v_number"] . "</p><br>
             <p>&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=book&id=" . $row["v_id"] . "' class='btn btn-danger' >Book Now </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=site' class='btn btn-danger' >Back </a> 
              <br></p><br>
            </div>
            </div>";
      }
    } else {
      echo "sorry no vehicle items available";
    }
    ?>
  </div>
</div>

<br><br><br>
<?php
include 'view/footer.php';
?>