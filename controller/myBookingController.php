<?php
include "model/DbModel.php";
$u_id=$_SESSION['user']['user_id'];
if (empty($u_id)) {
        $msg['title']='Please login or Create New Account !!!';
        $msg['body']="You have not login in Website!";
        $msg['type']='Danger';
        setFlash('message', $msg);
        header("location:" . $base_url . "?r=empty_user_login");


}


 $mail = find_user_by_uid($u_id);
 $email = "";
     if($mail){
        $email= $mail["email"];
      }
$mybooking = get_book_vechicle_email($email);



include "view/mybooking.php";


?>