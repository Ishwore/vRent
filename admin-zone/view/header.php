<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href=" <?php echo $base_url ?>/resource/bootstrap/icons/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href=" <?php echo $base_url ?>/resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src=" <?php echo $base_url ?>/resource/bootstrap/js/bootstrap.min.js"></script>

  <title>vRent</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand text-warning" href="<?= $base_url ?>?r=site">&nbsp;&nbsp;<img src="resource/image/support1.jfi" alt="Logo" style="width: 70px; height: 60px;"></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="<?php echo $base_url ?>?r=site">&nbsp;Dashboard</a>
          </li>
          <li class=" nav-item">
            <a class="nav-link text-warning" href="<?php echo $base_url; ?>?r=addcategory">&nbsp;Add Vehicle Category</a>
          </li>

          <li class=" nav-item">
            <a class="nav-link text-warning" href="<?= $base_url ?>?r=addvehicle">&nbsp;Add Vehicle</a>
          </li>
          <li class=" nav-item">
            <a class="nav-link text-warning" href="<?= $base_url ?>?r=managevehicle">&nbsp;Manage Vehicle</a>
          </li>
          <li class=" nav-item">
            <a class="nav-link text-warning" href="<?= $base_url ?>?r=usermanage">&nbsp;Users</a>
          </li>
          <li class=" nav-item">
            <a class="nav-link text-warning" href="<?= $base_url ?>?r=bookingmanage">&nbsp;User Booking</a>
          </li>
        </ul>
        <div>
          <h2 class="text-warning">Admin Panel</h2>
        </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div>
          <?php
          if (!empty($_SESSION['admin']['login'])) { ?>
            <a href="<?= $base_url ?>?r=userprofile&id=<?php echo $_SESSION['admin']['user_id'] ?>"> <button class="btn btn-outline-danger text-info "><i class="bi bi-person-circle" style="font-size: 1.5rem; color: cornflowerblue;"></i> &nbsp;<?php echo $_SESSION['admin']['user_name'] ?> </button></a> &nbsp;
            <a style="margin: 7px;padding: 5px;" href="<?= $base_url ?>?r=logout" class="btn btn-danger btn-round"><span class="glyphicon glyphicon-log-out">Logout</span></a>
          <?php
          } else {
          ?>
            <li class="<?php echo $_SESSION['active_url'] == 'login' ? 'active' : '' ?> navbtn" id="navbtn"> <a href="<?php echo $base_url; ?>?r=login"> <button class="btn btn-outline-danger"> <i class="bi bi-person-circle " style="font-size: 1.5rem;"></i> &nbsp;&nbsp;<b>Login</b> </button> </a></li>

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