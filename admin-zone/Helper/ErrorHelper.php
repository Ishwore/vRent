<?php

if (!function_exists("throwError")) {

    function throwError($title = '???', $description = 'Unknown error occored')
    {
        $error['title'] = $title;
        $error['description'] = $description;
        $base_url = $_SESSION['base_url'];
    }
}
