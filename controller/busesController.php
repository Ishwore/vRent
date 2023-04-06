<?php
include 'model/DbModel.php';
$cat_id = 1;
$vehicleitem = get_vehicle_item_by_cat_name($cat_id);
include 'view/buses.php';
?>