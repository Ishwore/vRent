<?php
include "model/DbModel.php";
$u_id=$_SESSION['user']['user_id'];
if (empty($u_id)) {
        $msg['title']='Please login !!!';
        $msg['body']="You have not login in Website!";
        $msg['type']='Danger';
        setFlash('message', $msg);
        header("location:" . $base_url . "?r=login");
}
$v_id = 0;
if(isset($_GET["id"]))
{
$v_id = $_GET['id'];
}

if(empty($_POST))
{
    include 'view/book.php';
    return; 
}

try {
    if (empty($_POST['phone']) || empty($_POST['date']) || empty($_POST['day'])) {
        $error['body'] = 'All input field are required.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/book.php';
        return;
    }
    
    $phone = filterText($_POST["phone"]);
    $date = filterText($_POST["date"]);
    //classifyiny user enter date
    $ey = date('Y',strtotime($date));//entered year
    $em = date('m',strtotime($date));//entered month
    $ed = date('d',strtotime($date));//entered days
    $edays=($ey-1)*365 + ($em-1) + $ed;
//classifyiny system enter date
    $sy= date('Y');
    $sm = date('m');
    $sd = date('d');
    $sdays=($sy-1)*365 + ($sm-1) + $sd;

    $diff = ($edays-$sdays);
    if($diff > 0 && $diff <= 31){
        
        $edate = filterText($_POST["date"]);
      }else{
        $msg['title']='Date!!';
        $msg['body']="Booking vehicle Within Date!";
        $msg['type']='Danger';
        setFlash('message', $msg);
        include 'view/book.php';
        }
    $day = filterText($_POST["day"]);
    $address = filterText($_POST["address"]);

    $mail = find_user_by_uid($u_id);
    $email = "";
    $u_name = "";
     if($mail){
        $email= $mail["email"];
        $u_name= $mail["uname"];
      }

      $book_date= date('Y/m/d');
    $v_name = "";
    $target = "";
    $price = 0;
    $v_number ="";
    $vehicleitem = get_vehicle_item_by_vid($v_id);
    if($vehicleitem){
          $v_name= $vehicleitem["v_name"];
          $target= $vehicleitem["imgurl"];
          $price=$vehicleitem["price"];
          $v_number=$vehicleitem["v_number"];
    }
    $total_price = ($price) * ($day);  
    $message = filterText($_POST["message"]);
    //die($email . ",". $phone. "," .$address ."," . $edate. "," . $day . "," .$message . "," . $v_name . "," . $target. "," . $v_number . "," .$total_price);

	$booking = book_vehicle($email,$phone,$address,$edate,$day,$message,$v_name,$target,$v_number,$total_price,$u_id,$u_name,$v_id,$book_date);
    if ($booking) {
        $msg['title']='Success!!';
        $msg['body']="You have successfully booked vehicle.";
        $msg['type']='success';
        setFlash('message', $msg);
        header("location:" . $base_url . "?r=mybooking");
    } else {
        throwError(500, 'Unable to complete your request.');
    }
}
 catch (Exception $ex) {
    throwError();
}


