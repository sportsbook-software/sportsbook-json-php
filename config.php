<?php

    $username = "EMAIL";
    $password = "PASSWORD";
    $hash = md5($username.$password);

    $endpoint = "http://www.betvolt.com/connector/";
    $account_url = $endpoint."account.json/hash/".$hash;
    $browser_url = $endpoint."browse/";
    
?>