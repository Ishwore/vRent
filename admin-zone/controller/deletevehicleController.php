
<?php
include "model/DbModel.php";

$v_id = "";
if(isset($_GET["id"]))
{
	$v_id = $_GET["id"];
}

$delvehicle = delete_vehicle_by_id($v_id);
if($delvehicle)
{
	$msg["body"] = "data deleted successfully";
	$msg["title"] = "Warning";
	$msg["type"]="danger";
	setFlash("message",$msg);
	redirect("managevehicle");
}
else
{
	$msg["body"] = "data not deleted successfully";
	$msg["title"] = "Warning";
	$msg["type"]="danger";
	setFlash("message",$msg);
	redirect("managevehicle");
}