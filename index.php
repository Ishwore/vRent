<?php
session_start();
$base_url = 'http://localhost/vRent/';
$_SESSION['base_url'] = $base_url;
$_SESSION['active_url'] = '';
include 'Helper/SpecialCharHelper.php';
include 'Helper/FlashMessageHelper.php';
include 'Helper/ErrorHelper.php';
include 'Helper/RouteHelper.php';

if (isset($_GET['r'])) {
    $controller = $_GET['r'];
    switch ($controller) {

        case 'site':
            $_SESSION['active_url'] = 'site';
            include 'controller/SiteController.php';
            break;
        case 'login':
            $_SESSION['active_url'] = 'login';
            include 'controller/LoginController.php';
            break;
        case 'signup':
            $_SESSION['active_url'] = 'signup';
            include 'controller/SignupController.php';
            break;
        case 'contact':
            $_SESSION['active_url'] = 'contact';
            include 'controller/ContactController.php';
            break;
        case 'logout':
            include 'controller/LogoutController.php';
            break;
        case 'whywithus':
            $_SESSION['active_url'] = 'whywithus';
            include 'controller/whyWithUsController.php';
            break;
        case 'fileupload':
            $_SESSION['active_url'] = 'fileupload';
            include 'controller/FileUploadController.php';
            break;
        case 'ourteam':
            $_SESSION['active_url'] = 'ourteam';
            include 'controller/ourTeamController.php';
            break;
        case 'termcondition':
            $_SESSION['active_url'] = 'termcondition';
            include 'controller/termConditionController.php';
            break;
        case 'forgot':
            $_SESSION['active_url'] = 'forgot';
            include 'controller/forgotController.php';
            break;
        case 'email':
            $_SESSION['active_url'] = 'email';
            include 'controller/newpassController.php';
            break;
        case 'book':
            $_SESSION['active_url'] = 'book';
            include 'controller/bookController.php';
            break;
        case 'view':
            $_SESSION['active_url'] = 'view';
            include 'controller/viewController.php';
            break;
        case 'vans':
            $_SESSION['active_url'] = 'vans';
            include 'controller/vansController.php';
            break;
        case 'cars':
            $_SESSION['active_url'] = 'cars';
            include 'controller/carsController.php';
            break;
        case 'jeeps':
            $_SESSION['active_url'] = 'jeeps';
            include 'controller/jeepsController.php';
            break;
        case 'buses':
            $_SESSION['active_url'] = 'buses';
            include 'controller/busesController.php';
            break;
        case 'search':
            $_SESSION['active_url'] = 'search';
            include 'controller/searchController.php';
            break;
         case 'mybooking':
            $_SESSION['active_url'] = 'mybooking';
            include 'controller/myBookingController.php';
            break;
        case 'empty_user_login':
            $_SESSION['active_url'] = 'empty_user_login';
            include 'controller/empty_user_loginController.php';
            break;
        default:
            throwError(404, 'Requested page does not exists.');
            break;
    }
    return;
} else {
    include 'controller/SiteController.php';
}
