<?php

    include "config.php";
    
    // in this example we query for sports with an ID between 1 and 5
    $post_data = array(
	'filters' => array(
	        "0" => array(
	    	    'filter' => array(
	    			'attribute' => 'id',
	    			'operator' => '0',
	    			'value' => '1'
	    	    )
		),
	        "1" => array(
	    	    'filter' => array(
	    			'attribute' => 'id',
	    			'operator' => '1',
	    			'value' => '5'
	    	    )
		),
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