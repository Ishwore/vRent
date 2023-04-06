<?php

if (empty($_SESSION['employer']['login'])) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $_SESSION['back_url'] = $_SERVER["REQUEST_URI"];
    } elseif (isset($_SERVER['REQUEST_URI'])) {
        $_SESSION['back_url'] = $_SERVER["REQUEST_URI"];
    } else {
        $_SESSION['back_url'] = $base_url;
    }
    header("location:$base_url/index.php?r=employerlogin");
    return;
}
