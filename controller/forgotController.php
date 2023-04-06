<?php
include 'model/DbModel.php';
if (empty($_POST))
{

include 'view/emailverify.php';
return;
}
try {
    if (empty($_POST['email'])) {  
    $msg['title']='Error!!';
    $msg['body']="Please enter your email";
    $msg['type']='danger';
    setFlash('message', $msg);
    redirect('forgot');
    return;
    }
    $email =$_POST['email'];
    $forget=lost($email);
    if ($forget) {
        header("location:".$base_url."?r=email&check=$email");
    }

     else {
     $msg['title']='Sorry';
     $msg['body']="Incorrect Email";
     $msg['type']='error';
     setFlash('message', $msg);
     redirect('forgot');
    // header("location:" . $base_url . "?r=site");
     return;
}
}
catch (Exception $ex) {
    include 'controller/ErrorController.php';
}

?>
