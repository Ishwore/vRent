
<?php
include 'model/DbModel.php';
$email = "";
if(isset($_GET["check"]))
{
	$email = $_GET["check"];
    $_SESSION['email']= $email;
}

if(empty($_POST))
{
 
   // $password=search($email);
    
include "view/newpass.php";
return;
}


try {
    if (empty($_POST['newpassword']) || empty($_POST['newcpassword'])){
       
    $msg['title']='Sorry';
    $msg['body']="Incorrect Email";
    $msg['type']='error';
    setFlash('message', $msg);
    redirect('forgot');
        return;
    }
   
    $newpassword = filtertext($_POST['newpassword']);
    if (strlen($newpassword) < 7) {
        
    $msg['title']='Sorry';
    $msg['body']="Password must be greater than 8";
    $msg['type']='error';
    setFlash('message', $msg);
    redirect('email');
        return;
    }

    $newcpassword = filtertext($_POST['newcpassword']);
   if ($newpassword != $newcpassword) {
   
    $msg['title']='Sorry';
    $msg['body']="Password and confirm password is not matched";
    $msg['type']='error';
    setFlash('message', $msg);
    redirect('email');
       return;
   }
   $email = $_SESSION['email'];
   $newpass=md5($newpassword);
$new=update_password($newpass,$email);
if ($new) {
    
    $msg['title']='Congrulation!!';
    $msg['body']="Password changed sucessfully";
    $msg['type']='success';
    setFlash('message', $msg);
    redirect('login');
    
   } else {
       throwError(500, 'Unable to complete your request.');
   }
    } catch (Exception $ex) {
        include 'controller/ErrorController.php';
    }
?>