<?php
include "view/header.php"
?>
<br> 
<div class="container " >
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators .carousel .carousel-indicators li {  background-color: green; }">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner ">
    <div class="carousel-item active">
      <img src="images/1.jpg" class="d-block w-100" height='400px' width='80%' image= 'blur(10px)' alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Audi_Q8_Premium_55</h5>
        <p class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The car has very well for family visiting.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/4.jpg" class="d-block w-100"  height='400px' width='80%'image= 'blur(10px)' alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BYD T3</h5>
        <p class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The van has comfortable carrying goods.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/3.jpg" class="d-block w-100" height='400px' width='80%' alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Renegade Altitude</h5>
        <p class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The jeep has very well for family visiting</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon "  style="font-size: 2.5rem; color: black;" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon "  style="font-size: 2.5rem; color:black;" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<div class="container">
    <h2 class="text-danger"><br>Now Available Vehicle Booking for Rent.<br><br></h2>
    <div class="row">
        <?php
        $vehicleitem = get_vehicle_item();

        if ($vehicleitem) {
            while ($row = $vehicleitem->fetch_assoc()) {
                echo "<div class='col-md-4 col-sm-6'>
            <div class='card'>
            <img class='image' src='" . $base_url . "Admin-zone/" . $row["imgurl"] . "' height='250px' width='100%' />
             <h4><b>&nbsp;&nbsp;" . $row["v_name"] . "</b></h4> 
             <p>&nbsp;&nbsp;" . $row["v_desc"] . "</p>
                  <button class='btn btn-info btn-block'> Rent Price Per Day : NRS " . $row["price"] . "</button> <br>
             <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=view&id=".$row["v_id"]."' class='btn btn-primary' >View vehicle </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=book&id=".$row["v_id"]."' class='btn btn-danger' >Book Now </a><br></p><br>
            </div>
            </div>";
            }
        } else {
            echo "sorry no vehicle items available";
        }
        ?>
    </div>
</div>
<?php
include "view/footer.php";
?>