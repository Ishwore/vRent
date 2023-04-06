<?php 
include "model/DbModel.php";

if(empty($_POST))
{
	include "view/addvehicle.php";
	return;
}

try{
$flag = false;
$flag = empty($_POST["vname"]) || empty($_POST["vnumber"]) || empty($_POST["vdesc"]) || empty($_POST["price"]) || empty($_POST["category"]) ;

if ($flag) {
        $error['body'] = 'All input field are required.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/addvehicle.php';
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
        include 'view/addvehicle.php';
        return;
    }

   $cat_id = filtertext($_POST["category"]);
   $vehiclename = filtertext($_POST["vname"]);
   $vnumber =  filtertext($_POST["vnumber"]);
   $vdesc =  filtertext($_POST["vdesc"]);
   $price = filtertext($_POST["price"]);
 	$target="";
       if (!empty($_FILES["vehicleimgupload"]) && $_FILES["vehicleimgupload"]["error"] == 0) {
        $target = "images/".basename($_FILES['vehicleimgupload']['name']);
      //  echo $target;
        //die();
        move_uploaded_file($_FILES['vehicleimgupload']['tmp_name'],$target);
   $vehicle = add_new_vehicle($vehiclename ,$vnumber,$vdesc,$price,$target,$cat_id);
   if($vehicle)
   {
   		$msg['title']='Success!!';
        $msg['body']="successfully added new vehicle item";
        $msg['type']='success';
        setFlash('message', $msg);
        include "view/addvehicle.php";
        return;
   }
   else
   {
   		$msg['title']='danger!!';
        $msg['body']="vehicle item not added successfully";
        $msg['type']='danger';
        setFlash('message', $msg);
        include "view/addvehicle.php";
        return;
   }

}
} catch (Exception $ex) {
    throwError();
}

?>
