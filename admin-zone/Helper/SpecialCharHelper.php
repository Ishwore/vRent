<?php

if (!function_exists("filterText")) {

    function filterText($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}


