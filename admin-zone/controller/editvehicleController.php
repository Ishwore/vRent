<?php

include "model/DbModel.php";

$v_id = "";
if(isset($_GET["id"]))
$v_id = $_GET["id"];

$vehicle= ""; 
if(empty($_POST))
{
$vehicle = get_vehicle_by_id($v_id);
include 'view/editvehicle.php';
return;
}

try{
$flag = empty($_POST["vname"]) || empty($_POST["vnumber"]) || empty($_POST["vdesc"]) || empty($_POST["price"]);
if($flag)
{
	$error["body"] = "All inputs are required";
	$error["title"] = "danger";
	$error["type"] = "danger";
	setFlash("message",$error);
	$vehicle = get_vehicle_by_id($v_id);
	include 'view/editvehicle.php';
	return;
}
  //checking if Vechicle Registration Number already exists.
    $vnumber = filterText($_POST['vnumber']);
    $valudate = find_vehicle_by_vRegNumber($vnumber);
    if ($valudate) {
        $error['body'] = ' Vechicle Registration Number already taken.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        $vehicle = get_vehicle_by_id($v_id);
        include 'view/editvehicle.php';
        return;
    }
$cat_id= filterText($_POST["cat_name"]);
$vname = filterText($_POST["vname"]);
$vnumber = filterText($_POST["vnumber"]);
$vdesc = filterText($_POST["vdesc"]);
$price = filterText($_POST["price"]);
$target="";
       if (!empty($_FILES["vehicleimgupload"]) && $_FILES["vehicleimgupload"]["error"] == 0) {
        $target = "images/".basename($_FILES['vehicleimgupload']['name']);
      //  echo $target;
        //die();
        move_uploaded_file($_FILES['vehicleimgupload']['tmp_name'],$target);
$update = update_vehicle_by_id($v_id, $vname , $vnumber, $vdesc, $price, $target,$cat_id);
if($update)
{
	$error["body"] = "data updated successfully";
	$error["title"] = "success";
	$error["type"] = "success";
	setFlash("message",$error);
	redirect("managevehicle");
}
else
{
	$error["body"] = "data not updated successfully";
	$error["title"] = "danger";
	$error["type"] = "danger";
	setFlash("message",$error);
	include 'view/editvehicle.php';
	return;
}

}
} catch (Exception $ex) {
    throwError();
}


?>