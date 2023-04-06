<?php
include "view/header.php";
?>
<br> <br>
<style>
	.border {
		border-style: solid;
		border-color: aqua;
		border-radius: 5px;
		margin: 10px;
		padding: 10px;
	}
</style>
<div class="container-fluid">
	<div class="row">

		<div class=" col-lg-offset-3 col-lg-5 container-fluid">
			<div class="row border border-primary">
				<div class="container-fluid bg-primary text-white text-center ">
					<h2>Add Category Form</h2>
				</div>
				<form method="post" action="<?php echo $base_url; ?>?r=addcategory" >
					<label> category name : </label>
					<input type="text" name="catname" class="form-control" />
					<br>
					<label> category description : </label>
					<input type="text" class="form-control" name="catdesc" />
					<br><br>
					<input type="submit" value="add category" name="send" class="btn btn-primary" /> &nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" value="clear" name="clear" class="btn btn-danger" />
				</form>
			</div>
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include "view/footer.php";
?>