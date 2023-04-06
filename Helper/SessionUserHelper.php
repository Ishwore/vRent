<?php 
if (!isset($_SESSION['user']['login'])) {
    $_SESSION['back_url'] = $_SERVER['HTTP_REFERER'];
    header("location:$base_url/index.php?r=login");
    return;
}
