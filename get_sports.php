<?php

    include "config.php";
    
    // simple query example - HTTP GET - a list of all sports
    $sports = json_decode(file_get_contents($browser_url."Sport.json/hash/".$hash),true);
    print_r($sports);
?>