<?php

    include "config.php";

    // log in, test account hash, get account information
    $account_info = json_decode(file_get_contents($account_url), true);
    print_r($account_info);

?>