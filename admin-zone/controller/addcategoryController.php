<?php
if(empty($_POST))
{
	include "view/addcategory.php";
	return;
}
try
{
include "model/DbModel.php";
if(empty($_POST["catname"])|| empty($_POST["catdesc"]) )
{
	$error["body"] = "All inputs are required";
	$error["title"] = "Info ! ";
	$error["type"] = "Danger";
	setFlash("message",$error);
	include "view/addcategory.php";
	return;
}
$catname = filtertext($_POST["catname"]);
$valudate = get_category_by_catname($catname);
if ($valudate) {
	$error['body'] = 'Category already taken.';
	$error['title'] = 'Danger!!';
	$error['type'] = 'danger';
	setFlash('message', $error);
	include 'view/addcategory.php';
	return;
}

$catname = filtertext($_POST["catname"]);
$catdesc = filtertext($_POST["catdesc"]);

$result = add_category($catname,$catdesc);
if($result)
{
	$msg["body"] = "New category $catname is successfully added";
	$msg["title"] = "Success";
	$msg["type"] = "success";
	setFlash("message",$msg);
	include "view/addcategory.php";
	return;
}
else
{
	$msg["body"] = "Sorry failed to add category $catname";
	$msg["title"] = "Warning !";
	$msg["type"] = "Danger";
	setFlash("message",$msg);
	include "view/addcategory.php";
	return;
}


}
catch (Exception $ex) {
    throwError();
}
?>