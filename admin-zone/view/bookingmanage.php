<?php
include "view/header.php";
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			$book  =  get_booking_user_book();
			if ($book) {
				$sno = 1;
				echo "<table border=1 class='table table-hover'><tr><th>s.no </th><th> Email </th><th> Address </th><th>Phone Number</th><th> Action </th> </tr>";
				while($row = $book->fetch_assoc())
				{
					echo "<tr><td>" . $sno .
						"</td><td>" . $row["email"] .
						"</td><td>" . $row["address"] .
						"</td><td>" . $row["phone"] .
						"</td><td> <a href='" . $base_url . "?r=userbook&id=" . $row["u_id"] . "' class='btn btn-primary'> Veiw Booking </a></td></tr>";

					$sno++;
				}
				echo "</table>";
			} else {
				echo "No vehicle are booking yet";
			}



			?>

		</div>
	</div>
</div>
<br>
<?php
include "view/footer.php";
?>