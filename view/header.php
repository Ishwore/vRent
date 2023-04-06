<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href=" <?php echo $base_url ?>/resource/bootstrap/icons/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href=" <?php echo $base_url ?>/resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src=" <?php echo $base_url ?>/resource/bootstrap/js/bootstrap.bundle.min.js"></script>

  <title>vRent</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-dark " >
    <div class="container-fluid">
      <a class="navbar-brand text-warning" href="<?= $base_url ?>?r=site">&nbsp;&nbsp;<img src="resource/image/support1." alt="Logo" style="width: 70px; height: 60px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="<?= $base_url ?>?r=site"><b>Home</b></a>
          </li>
          &nbsp;&nbsp;&nbsp;
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-warning"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <b>Rental</b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= $base_url ?>?r=cars">Cars</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?= $base_url ?>?r=buses">Bus</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?= $base_url ?>?r=vans">Vans</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?= $base_url ?>?r=jeeps">Jeeps</a></li>
            </ul>
          </li>
          &nbsp;&nbsp;&nbsp;
           <li class=" nav-item">
                <a class="nav-link text-warning" href="<?= $base_url ?>?r=mybooking"><b>My Booking</b></a>
          </li>
           &nbsp;&nbsp;&nbsp;
          <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle text-warning"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <b>About Us</b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= $base_url ?>?r=whywithus">Why With Us</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?= $base_url ?>?r=ourteam"> Meet Our Team</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?= $base_url ?>?r=termcondition">Terms & Conditions </a></li>         
            </ul>
          </li>
          &nbsp;&nbsp;&nbsp;
          <li class=" nav-item">
              <a class="nav-link text-warning" href="<?= $base_url ?>?r=contact"><b>Contact Us</b></a>
          </li>
        </ul>
        <form class="d-flex" method="post" action="<?php echo $base_url ?>?r=search" enctype="multipart/form-data">

          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit " name="search_btn" >Search</button>
          &nbsp;&nbsp;&nbsp;&nbsp;

        </form>

        <div>
          
            <?php
            if (!empty($_SESSION['user']['login'])) { ?>
              <a href="<?= $base_url ?>?r=userprofile&id=<?php echo $_SESSION['user']['user_id'] ?>"> <button class="btn btn-outline-danger text-info "><i class="bi bi-person-circle" style="font-size: 1.5rem; color: cornflowerblue;"></i> &nbsp;<?php echo $_SESSION['user']['user_name'] ?> </button></a> &nbsp;
              <a style="margin: 7px;padding: 5px ; font-size: 18px;" href="<?= $base_url ?>?r=logout" class="btn btn-danger btn-round"><span class="glyphicon glyphicon-log-out">Logout</span></a>
            <?php
            } else {
            ?>
              <span class="<?php echo $_SESSION['active_url'] == 'login' ? 'active' : '' ?> navbtn" id="navbtn"> <a href="<?php echo $base_url; ?>?r=login"> <button class="btn btn-outline-danger" > <i class="bi bi-person-circle " style="font-size: 1.5rem;"></i> &nbsp;&nbsp;<b>Login</b> </button> </a></span>

            <?php

            }
            ?>
        
        </div>
      </div>
    </div>

  </nav>

  <div class="container-fluid">
    <?php
    if (hasFlash('message')) {
      $falshError = getFlash('message');
      foreach ($falshError as $fe) {
    ?>
        <div class="alert alert-warning alert-dismissible <?php echo $fe['type']; ?>" role="alert">
          <?php
          echo empty($fe['title']) ? '' : "<strong>" . $fe['title'] . "</strong> ";
          echo $fe['body'];
          ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

    <?php
      }
    }
    ?>
    