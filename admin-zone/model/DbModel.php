
<?php

function db_connect() {
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

function get_vehicle_category()
{

$conn = db_connect();
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }

}

function get_category_by_catname($catname) {
    $conn = db_connect();
    $sql = "SELECT * FROM category where category_name='$catname' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function add_category($catname,$catdesc)
{
  $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO category(category_name,cat_desc) values(?,?)");
    $stmt->bind_param('ss',$catname,$catdesc);
    $result = $stmt->execute();
    if ($result) {
        $stmt->close();
        $conn->close();
        return true;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }  
}
function find_vehicle_by_vRegNumber($vnumber)
{
    $conn = db_connect();
    $sql = "SELECT * FROM vehicle_item where v_number='$vnumber' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function get_booking_user_book()
{
    $conn = db_connect();
    $sql = "SELECT * FROM book ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function get_book_vechicle_uid($u_id)
{
    $conn = db_connect();
    $sql = "SELECT * FROM book where u_id= '$u_id'  ";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
} 

function get_vehicle_by_id($v_id)
{
    $conn = db_connect();
    $sql = "select * from vehicle_item where v_id = " . $v_id." limit 1" ;
    $result = $conn->query($sql);
    $conn->close();
     if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}
 
function get_vehicle_item()
{
$conn = db_connect();
$sql = "select * from vehicle_item ";
$result = $conn->query($sql);
$conn->close();
if($result->num_rows > 0)
{
    return $result;
}
else
{
    return false;
}

}

function view_users()
{
$conn = db_connect();
$sql = "select * from user";
$result = $conn->query($sql);
$conn->close();
if($result->num_rows > 0)
{
    return $result;
}
else
{
    return false;
}

}

function find_user_by_id($id) {
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


function update_vehicle_by_id($v_id,$vname ,$vnumber,$vdesc,$price,$target,$cat_id){
    $conn = db_connect();
    if($target=="")
    {
    $stmt = $conn->prepare("UPDATE vehicle_item set v_name = ? , v_number = ? , v_desc = ? , price = ? ,imgurl = ?,cat_id = ? where v_id = ?");
    $stmt->bind_param('sssisii', $vname,$vnumber,$vdesc,$price,$target,$cat_id,$v_id );
    }
    else
    {
    $stmt = $conn->prepare("UPDATE vehicle_item set v_name = ? , v_number = ? , v_desc = ? , price = ? , imgurl = ? ,cat_id = ? where v_id = ?");
    $stmt->bind_param('sssisii', $vname ,$vnumber,$vdesc,$price,$target,$cat_id,$v_id);
    }
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
 

function add_new_vehicle($vehiclename ,$vnumber,$vdesc,$price,$target,$cat_id){
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO vehicle_item(v_name,v_number,v_desc,price,imgurl,cat_id) values(?,?,?,?,?,?)");
    $stmt->bind_param('sssisi',$vehiclename ,$vnumber,$vdesc,$price,$target,$cat_id);
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
 

function delete_vehicle_by_id($v_id) {
    $conn = db_connect();
    $sql = "Delete from vehicle_item where v_id=$v_id";
    $conn->query($sql);
    if ($conn->affected_rows > 0) {
        $conn->close();
        return TRUE;
    } else {
        $conn->close();
        return false;
    }
}
 
 /*
function update_post($fk_id, $job_title, $company_name, $experience, $salary, $vacancy, $end_date, $qualification, $contact_us) {
    $conn = db_connect();
    $update = "Update jobpost set job_title='$job_title', company_name='$company_name', experience ='$experience',salary='$salary',vacency='$vacancy',end_date='$end_date',qualification='$qualification',contact_us='$contact_us' "
            . "where id=$fk_id and fk_id=" . $_SESSION['employer']['user_id'];
    $result = $conn->query($update);

    if ($result) {
        return $conn;
    } else {
        $conn->close();
        return false;
    }
}

function find_jobpost_by_id($id) {
    $conn = db_connect();
    $sql = "SELECT * FROM resume RIGHT JOIN jobpost ON jobpost.id=resume.fk_jobpost_id WHERE fk_user_id=$id order by resume.id desc";
    $result = $conn->query($sql);
    
    $conn->close();
    if ($result->num_rows > 0) {
        
        return $result;
    } else {
        
        return false;
    }
}

function find_post_by_id($id){
      $conn = db_connect();
    $sql = "SELECT * FROM jobpost where id=$id limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function find_user_by_apply_job($id, $today = FALSE) {
    $conn = db_connect();
    $todayQuery = "";
    if ($today) {
        $todayQuery = " AND resume.post_date>" . strtotime("today") . " AND resume.post_date<" . strtotime("tomorrow");
    }
    $sql = "SELECT * FROM resume RIGHT JOIN jobpost ON jobpost.fk_id=resume.fk_jobpost_id RIGHT JOIN user ON user.id=resume.fk_user_id WHERE jobpost.fk_id=$id $todayQuery ORDER BY resume.id desc";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function find_employer_by_id($id) {
    $conn = db_connect();
    $sql = "SELECT * FROM employer where id=$id limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function create_note($title, $description, $fk_user_id, $create_date) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO notes (title,description,fk_user_id,create_date) values(?, ?, ?, ?)");
    $stmt->bind_param('ssii', $title, $description, $fk_user_id, $create_date);
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

function search_job_by_key($key) {
    $conn = db_connect();


    $sql = "SELECT * FROM jobpost where job_title like '%$key%' or qualification like '%$key%' ";
    $result = $conn->query($sql);
    $conn->close();

    // var_dump($result);
    // die();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function search_job_by_key_paid($key) {
    $conn = db_connect();


    $sql = "SELECT * FROM jobpost where job_title like '%$key%' or qualification like '%$key%'  order by salary desc";
    $result = $conn->query($sql);
    $conn->close();

    // var_dump($result);
    // die();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function images_upload() {
    $id = $_SESSION['employer']['user_id'];
    $db = mysqli_connect("localhost", "root", "", "project");
    $result = mysqli_query($db, "SELECT * FROM employer where id=$id");
    $row = mysqli_fetch_array($result);
    return $row;
//       echo "<img src='images/".$row['images']." ' height=200px;>";
//   
//    
}

function images_view() {
    $id = $_SESSION['user']['user_id'];
    $db = mysqli_connect("localhost", "root", "", "project");
    $result = mysqli_query($db, "SELECT * FROM user where id=$id");
    $row = mysqli_fetch_array($result);
    return $row;
//       echo "<img src='images/".$row['images']." ' height=200px;>";
//   
//    
}

function get_jobpost($uid) {
    // $sql = "SELECT  resume.fk_jobpost_id as jobid,resume.name as username,resume.cv as image, jobpost.job_title as job_title FROM resume "
    //       . "INNER JOIN jobpost ON resume.fk_jobpost_id=jobpost.id where jobpost.fk_id=$fk_user_id order by resume.id desc";
    $conn = db_connect($uid);
    $sql = "SELECT *  FROM jobpost where fk_id=$uid";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function apply_post($uid) {

    $conn = db_connect($uid);
    $sql = "SELECT  resume.fk_jobpost_id as jobid,resume.name as username,resume.cv as image, jobpost.job_title as job_title FROM resume "
            . "INNER JOIN jobpost ON resume.fk_jobpost_id=jobpost.id where jobpost.fk_id=$ fk_user_id order by resume.id desc";
    $result = $conn->query($sql);

    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function get_resume($pid) {
    $conn = db_connect();
    $sql = "SELECT *  FROM resume where fk_jobpost_id=$pid order by id desc";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function apply_resume($uid) {
    $conn = db_connect();
    $sql = "SELECT *  FROM resume where fk_user_id=$uid order by id desc";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function resume_view($fk_user_id, $fk_jobpost_id) {
    $conn = db_connect();
    $sql = "SELECT *  FROM resume where fk_user_id=$fk_user_id and fk_jobpost_id=$fk_jobpost_id";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
//       echo "<img src='images/".$row['images']." ' height=200px;>";
//   
//    
}

function upload_resume($fk_user_id, $fk_jobpost_id, $name, $target, $time) {
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO resume (fk_user_id,fk_jobpost_id,name,cv,post_date) values(?,?, ? ,?,?)");

    $stmt->bind_param('iissi', $fk_user_id, $fk_jobpost_id, $name, $target, $time);
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
*/