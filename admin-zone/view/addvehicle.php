<?php
include "view/header.php";
?>
<style>
	.border {
		border-style: solid;
		border-color: aqua;
		border-radius: 5px;
		margin: 10px;
		padding: 10px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-8">

			<div class="border border-primary">

				<form class="form" method="post" action="<?php echo $base_url; ?>?r=addvehicle" enctype="multipart/form-data">

					<label> Vehicle category </label>
					<select class="form-control" name="category">
						<?php
						$category = get_vehicle_category();
						if ($category) {
							while ($row = $category->fetch_assoc()) {
								echo "<option value=" . $row["cat_id"] . ">" . $row["category_name"] . "</option>";
							}
						} else {
							echo "<option value=0> no category available</option>";
						}
						?>

					</select><br>

					<label> Vehicle item </label>
					<input type="text" class="form-control" name="vname" value="" placeholder="enter vehicle name here" /><br>
					<label> Vechicle Registration Number </label>
					<input type="text" name="vnumber" class="form-control" value="" placeholder="enter vehicle registration number here" /><br>
					<label> Vechicle desc </label>
					<input type="text" name="vdesc" class="form-control" value="" placeholder="enter vehicle desc here" /><br>

					<label> Vehicle Rent price </label>
					<input type="number" name="price" class="form-control" value="" placeholder="enter vehicle rent  price" /><br>

					<label> image </label>
					<input type="file" name="vehicleimgupload" class="form-control" /> <br>

					<input type="submit" class="btn btn-primary" value="add vehcile" name="addvehicle" /> <input type="reset" class="btn btn-info float-end" value="clear" name="resetvehicle" />

				</form>
			</div>
		</div>
	</div>
</div>
<br> <br> <br> <br>
<?php
include "view/footer.php";
?>