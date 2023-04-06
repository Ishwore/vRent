
<?php

function db_connect()
{
    $db['host'] = "localhost";
    $db['username'] = "root";
    $db['password'] = "";
    $db['db_name'] = "vrent";
    $conn = new mysqli($db['host'], $db['username'], $db['password'], $db['db_name']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function login_user($email, $password)
{
    $conn = db_connect();
    $sql = "SELECT user_id,uname,user_type FROM user where email='$email' and password='$password' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

function get_aboutus()
{
    $conn = db_connect();
    $sql = "SELECT * FROM about ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function find_user_by_email($email)
{
    $conn = db_connect();
    $sql = "SELECT * FROM user where email='$email' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}
function get_book_vechicle_email($email)
{
    $conn = db_connect();
    $sql = "SELECT * FROM book where email='$email' ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function find_user_by_id($id)
{
    $conn = db_connect();
    $sql = "SELECT * FROM user where user_id=$id limit 1";
    $result = $conn->query($sql);
    //var_dump($result);die;
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function find_user_by_uid($u_id)
{
    $conn = db_connect();
    $sql = "SELECT * FROM user where user_id=$u_id  limit 1";
    $result = $conn->query($sql);
    //var_dump($result);die;
    $conn->close();
    if($result->num_rows > 0){
         $row = $result->fetch_assoc();
            return $row;

    } else {
        return false;
    }
}

function signup_new_user($uname, $email, $password, $address, $phone, $usertype, $create_date)
{
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO user (uname,email,password,address,phone,user_type,created_date) values(?, ?,?, ?, ?,?,?)");
    $stmt->bind_param('sssssis', $uname, $email, $password, $address, $phone, $usertype, $create_date);
    $result = $stmt->execute();
    if ($result) {
        $stmt->close();
        $conn->close();
        return $result;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}


function db_login($email, $password)
{

    $conn = db_connect();
    $sql = "SELECT user_id,uname,user_type FROM user where email='$email' and password='$password' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

function book_vehicle($email,$phone,$address,$edate,$day,$message,$v_name,$target,$v_number,$total_price,$u_id,$u_name,$v_id,$book_date){
     $conn = db_connect();
    
    // die("hello");
     $stmt = $conn->prepare("INSERT INTO book(email,phone,from_date,day,message,v_name,imageurl,v_number,total_price,address,u_id,u_name,v_id,book_date) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
     $stmt->bind_param('sssissssisisis',$email,$phone,$edate,$day,$message,$v_name,$target,$v_number,$total_price,$address,$u_id,$u_name,$v_id,$book_date);
   //  die($stmt);
    $result = $stmt->execute();
    if ($result) {
        $stmt->close();
        $conn->close();
        return $result;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

function images_upload()
{
    $id = $_SESSION['employer']['user_id'];
    $db = mysqli_connect("localhost", "root", "", "project");
    $result = mysqli_query($db, "SELECT * FROM employer where id=$id");
    $row = mysqli_fetch_array($result);
    return $row;
    //    echo "<img src='images/".$row['images']." ' height=200px;>";


}

function images_view()
{
    $id = $_SESSION['user']['user_id'];
    $db = mysqli_connect("localhost", "root", "", "project");
    $result = mysqli_query($db, "SELECT * FROM user where user_id=$id");
    $row = mysqli_fetch_array($result);
    return $row;
    //       echo "<img src='images/".$row['images']." ' height=200px;>";
    //   
    //    
}

function get_vehicle_item()
{
    $conn = db_connect();
    $sql = "select * from vehicle_item";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}


function get_vehicle_item_by_id($id)
{
    $conn = db_connect();
    $sql = "SELECT * from vehicle_item where v_id='$id' limit 1 ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function get_vehicle_item_by_vid($id)
{
    $conn = db_connect();
    $sql = "SELECT * FROM vehicle_item WHERE v_id='$id' ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}



function get_vehicle_item_by_cat_name($cat_id)
{
    $conn = db_connect();
    $sql = "SELECT * FROM vehicle_item WHERE cat_id='$cat_id' ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}



function get_vehicle_item_by_search($found)
{
    $conn = db_connect();
    $sql = "SELECT * FROM vehicle_item WHERE v_name like '%$found%' ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

/*
function get_vehicle_item_by_search()
{
    $conn = db_connect();
    $search_filter = $_POST['search'];
    $s= "select * from vehicle_item where v_name Like '%$search_filter%'";
    $result = $conn->query($s);
    $conn->close();
    if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 col-sm-6'>
            <div class='card'>
            <img class='image' src='" . $base_url . "Admin-zone/" . $row["imgurl"] . "' height='250px' width='100%' />
             <h4><b>" . $row["v_name"] . "</b></h4> 
             <p>" . $row["v_desc"] . "</p>
                  <button class='btn btn-info btn-block'> Price : " . $row["price"] . "</button> <br>
             <p><a href='" . $base_url . "?r=viewvehicledetail' class='btn btn-primary' >View vehicle </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=ordernow' class='btn btn-danger' >Order Now </a><br></p><br>
            </div>
            </div>";
            }
        } else {
            echo "sorry no vehicle items available";
        }
    } 
    


*/

function lost($email)
{
   
    $conn = db_connect();

    $sql = "SELECT * FROM user where email='$email'limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        return $row;
    } 
    else 
    {
        return false;
    }
}


function update_password($newpassword,$email)
{ $conn = db_connect();
    $sql = "UPDATE `user` SET `password`='$newpassword' WHERE `email`='$email'";
$result = $conn->query($sql);
if($result){
        
        $conn->close();
        return $result;
}
else {
        
        $conn->close();
        return false;
}
}



