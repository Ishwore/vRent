<?php
unset($_SESSION["admin"]["login"]);
unset($_SESSION['admin']['user_id']);
unset($_SESSION['admin']['user_name']);
header("location:http://localhost/vRent/?r=site");

?>