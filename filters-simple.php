<?php

    include "config.php";
    
    // a somewhat more complex example where we query for a sport with a single filter - ID = 1 (Soccer)
    $post_data = array(
	'filters' => array(
	        "0" => array(
	    	    'filter' => array(
	    			'attribute' => 'id',
	    			'operator' => '2',
	    			'value' => '1'
	    	    )
		)
	)
    );
    
    $ch = curl_init($browser_url."Sport.json/hash/".$hash);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
    	    'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($post_data)
    ));
    
    $response = curl_exec($ch);
    $response_data = json_decode($response, TRUE);
    print_r($response_data);
?>