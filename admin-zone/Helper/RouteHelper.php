<?php

if (!function_exists("redirect")) {

    function redirect($controller, $data = []) {
        $link = $_SESSION['base_url'] . "?r=" . $controller;
        if (!empty($data)) {
            foreach ($data as $key => $dat) {
                $link .= '&' . $key . "=" . $dat;
            }
        }
        header('location:' . $link);
    }

}