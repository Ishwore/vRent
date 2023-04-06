<?php
session_start();
if (!isset($_SESSION['admin']['login'])) {
    header("location:http://localhost/vRent/");
}

$base_url = 'http://localhost/vRent/admin-zone/';
$_SESSION['base_url'] = $base_url;
$_SESSION['active_url'] = '';
include 'Helper/SpecialCharHelper.php';
include 'Helper/FlashMessageHelper.php';
include 'Helper/ErrorHelper.php';
include 'Helper/RouteHelper.php';

if (isset($_GET['r'])) {
    $controller = $_GET['r'];
    switch ($controller) {

        case 'addcategory':
            $_SESSION['active_url'] = 'addcategory';
            include 'controller/addcategoryController.php';
            break;
        case 'site':
            $_SESSION['active_url'] = 'site';
            include 'controller/SiteController.php';
            break;
        case 'addvehicle':
            $_SESSION['active_url'] = 'addvehicle';
            include 'controller/addvehicleController.php';
            break;
        case 'editvehicle':
            $_SESSION['active_url'] = 'editvehicle';
            include 'controller/editvehicleController.php';
            break;
        case 'deletevehicle':
            $_SESSION['active_url'] = 'deletevehicle';
            include 'controller/deletevehicleController.php';
            break;
        case 'managevehicle':
            $_SESSION['active_url'] = 'managevechicle';
            include 'controller/managevehicleController.php';
            break;
        case 'bookingmanage':
            $_SESSION['active_url'] = 'bookingmanage';
            include 'controller/bookingManageController.php';
            break;
        case 'usermanage':
            $_SESSION['active_url'] = 'usermanage';
            include 'controller/usermanageController.php';
            break;
        case 'userbook':
            $_SESSION['active_url'] = 'userbook';
            include 'controller/userBookController.php';
            break;
        case 'logout':
            include 'controller/LogoutController.php';
            break;
        case 'fileupload':
            $_SESSION['active_url'] = 'fileupload';
            include 'controller/FileUploadController.php';
            break;
    
        default:
            throwError(404, 'Requested page does not exists.');
            break;
    }
    return;
} else {
    include 'controller/SiteController.php';
}
