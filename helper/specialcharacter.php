<?php

if (!function_exists("filtertext")) {

    function filtertext($data) 
    {
        $data = str_replace(' ', '', $data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}