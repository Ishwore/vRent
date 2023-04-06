<?php
include "model/DbModel.php";
$u_id = 0;
if(isset($_GET["id"]))
{
$u_id = $_GET['id'];
}
$userbook= get_book_vechicle_uid($u_id);
include "view/userbook.php";

?>