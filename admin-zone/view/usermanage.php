<?php 
include "header.php";
?>
<br>
<div>
<?php
$users = view_users();
if($users)
{
	echo "<table border=1 class='table table-hover' > <tr><th>user_id </th><th>email </th><th>password </th><th>user name</th><th>phone </th><th>address </th><th>user type</th><th>created date </th></tr>";
	while($row = $users->fetch_assoc())
	{
	echo "<tr><td>". $row["user_id"] . 
	"</td><td>" . $row["email"] . 
	"</td><td>" . $row["password"] . 
	"</td><td>" . $row["uname"] . 
	"</td><td>" . $row["phone"] . 
	"</td><td>" . $row["address"] . 
	"</td><td>" . $row["user_type"] . 
	"</td><td>" . $row["created_date"] . 
	"</td><td><a href='" . $base_url . 
	"'</td></tr>" ;
	}
	echo "</table>";
}
else
{
	echo "no users found";
}

?>

</div>

<?php

include "footer.php";

?>