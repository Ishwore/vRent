<?php
include 'view/header.php';
?>

<br>

<div>
	<a href="<?= $base_url ?>?r=bookingmanage" class="btn btn-danger float-end ">Back</a><br><br>
<?php

if($userbook)
{
	echo "<table border=1 class='table table-hover' > <tr><th>S.No </th><th>Vehicle Name </th><th>vehicle Image</th><th>Vehicle Number </th><th>From Date</th><th>Day</th><th>Total Rent Price </th></tr>";
	$sno = 1; 
	while($row = $userbook->fetch_assoc())
	{
	echo "<tr><td>". $sno . 
	"</td><td>" . $row["v_name"] . 
	"</td><td><img src='" . $base_url . $row["imageurl"] .
	"' height='100px' width='120px' /></td><td>" . $row["v_number"] . 
	"</td><td>" . $row["from_date"] . 
	"</td><td>" . $row["day"] . 
	"</td><td>" . $row["total_price"] . 
	"</td></tr>" ;
	$sno = $sno+1; 
	}
	echo "</table>";
}
else
{
	echo "No vehicles are booking!. ";
}

?>

</div>

<br>

<?php

include "view/footer.php";

?>