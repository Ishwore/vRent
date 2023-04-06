<?php
include "view/header.php";
?>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			$vehicleitem  =  get_vehicle_item();
			if ($vehicleitem) {
				$sno = 1;
				echo "<table border=1 class='table table-hover'><tr><th>s.no </th><th>Vehicle image</th><th>vehicle name </th><th>Vehicle Reg. Number </th><th>Vehicle description </th><th>price</th><th> action </th> </tr>";
				while($row = $vehicleitem->fetch_assoc())
				{
					echo "<tr><td>" . $sno .
						"</td><td><img src='" . $base_url . $row["imgurl"] .
						"' height='100px' width='100px' /></td><td>" . $row["v_name"] .
						"</td><td>" . $row["v_number"] .
						"</td><td>" . $row["v_desc"] .
						"</td><td>" . $row["price"] .
						"</td><td> <a href='" . $base_url . "?r=editvehicle&id=" . $row["v_id"] . "' class='btn btn-info'> Edit </a> <a href ='" . $base_url . "?r=deletevehicle&id=" . $row["v_id"] . "' class='btn btn-danger' onclick='return checkdelete()' > Delete </a> </td></tr>";

					$sno++;
				}
				echo "</table> <br>";
			} else {
				echo "no vehicle item to display";
			}

		?>
			<script type="text/javascript">
				function checkdelete(){
					return confirm('Are you sure want to delete this Record!! ');
				}
			</script>

		</div>
	</div>
</div>
<br>




<?php
include "view/footer.php";
?>