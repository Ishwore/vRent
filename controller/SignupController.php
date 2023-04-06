<?php

include 'model/DbModel.php';


if (empty($_POST)) {
    include 'view/signup.php';
    return;
}

try {
    $flag = empty($_POST['uname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['address']) || empty($_POST['phone']);

    //validate user inputdata
    if ($flag) {
        $error['body'] = 'All input field are required.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return;
    }
    $uname = filterText($_POST['uname']);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) {
        $error['body'] = 'Only letters and white space allowed';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return;
        }
    //checking minimum length of password.
    $pass = filterText($_POST['password']);
    if (strlen($pass) < 7) {
        $error['body'] = 'Password minimum length is 7.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return;
    }

    //checking if email already exists.
    $email = filterText($_POST['email']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
    $error['body'] = 'Email is not valid.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return; 
    }

    $valudate = find_user_by_email($email);
    if ($valudate) {
        $error['body'] = 'Email already taken.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return;
    }
    $phone = filterText($_POST['phone']);
    if(!preg_match("/^([0-9]{3,5}-)?[0-9]{10}$/",$phone))
    {
        $error['body'] = 'phone number is not valid';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/signup.php';
        return;
    }
    
    $address = filterText($_POST['address']);
    $password= md5($pass);
    $usertype = 0;
    $create_date = date("Y-m-d"); 
    $user = signup_new_user($uname, $email, $password, $address, $phone, $usertype, $create_date);
    if ($user) {
        $msg['title'] = 'Success!!';
        $msg['body'] = "You have successfully signup.";
        $msg['type'] = 'success';
        setFlash('message', $msg);
        header("location:" . $base_url . "?r=login");
    } else {
        throwError(500, 'Unable to complete your request.');
    }
} catch (Exception $ex) {
    throwError();
}
