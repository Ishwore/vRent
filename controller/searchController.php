
<?php
include "model/DbModel.php";
if(empty($_POST['search']))
{
    $error["body"] = 'search input field  are required.';
    $error["title"] = "Danger! ";
    $error["type"] = "Danger";
    setFlash('message',$error);
    header("location:" . $base_url . "?r=site");
    return;
}
include 'view/header.php';
$found=strtolower(filterText($_POST['search']));
?>
<div class="container">
    <div class="row">
        <?php
        $vehicleitem =get_vehicle_item_by_search($found);
        if ($vehicleitem) {
            echo "<h2 class= 'text-danger  '> <b><br>Search result  $found is Found... <br><br>  </b>       </h2><br><br>";
            while ($row = $vehicleitem->fetch_assoc()) {
                echo "<div class='col-md-4 col-sm-6'>
            <div class='card'>
            <img class='image' src='" . $base_url . "Admin-zone/" . $row["imgurl"] . "' height='250px' width='100%' />
             <h4><b>" . $row["v_name"] . "</b></h4> 
             <p>" . $row["v_desc"] . "</p>
                  <button class='btn btn-info btn-block'> Rent Price Per Day : NRS " . $row["price"] . "</button> <br>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=view&id=".$row["v_id"]."' class='btn btn-primary' >View vehicle </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=book&id=".$row["v_id"]."' class='btn btn-danger' >Book Now </a><br></p><br>
            </div>
            </div>";
            }
        } else {
            echo "<h2 class= 'text-danger '><b> <br>Search result $found is not Found..  <br><br><br><br></b> <br> <br><br> <br> <br></h2>";
        }

        ?>
    </div>
</div>
<br>
<?php
include 'view/footer.php';

?>

