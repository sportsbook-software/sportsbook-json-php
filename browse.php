<?php

    include "config.php";
    
    // in this example we get a list of sports, some leagues, some events (fixtures) and some market data
    // of course, this is all for the sake of example
    // an easier way would be to query for matches (with or without using the sport_id) and include the parameter dependencies:true to get the sport and league info
    $sports_filters = array(
	'filters' => array(
	        "0" => array(
	    	    'filter' => array(
	    			'attribute' => 'id',
	    			'operator' => '5',
	    			'value' => '1,7522'
	    	    )
		)
	)
    );
    
    $sports_data = get_data($browser_url."Sport.json/hash/".$hash , $sports_filters);
    
    foreach ($sports_data["result"] as $k => $data) {
	print " + Now getting leagues for sport: ".$data["sport"]["name"]."\r\n";
	$leagues_filters = array(
	    'filters' => array(
		'0' => array(
		    'filter' => array(
			'attribute' => 'sport_id',
			'operator' => '2',
			'value' => $data["sport"]["id"]
		    )
		)
	    )
	);
	
	$leagues_data = get_data($browser_url."League.json/hash/".$hash, $leagues_filters);
	
	foreach ($leagues_data["result"] as $l => $ldata) {
	    print " ++ Now getting matches for league ID ".$ldata["league"]["id"].": ".$ldata["league"]["name"]."\r\n";
	    $matches_filters = array(
		'filters' => array(
		    '0' => array(
			'filter' => array(
			    'attribute' => 'league_id',
			    'operator' => '2',
			    'value' => $ldata["league"]["id"]
			)
		    ),
		    '1' => array(
			'filter' => array(
			    'attribute' => 'sport_id',
			    'operator' => '2',
			    'value' => $data["sport"]["id"]
			)
		    ),
		    '2' => array(
			'filter' => array(
			    'attribute' => 'status',
			    'operator' => '2',
			    'value' => '1'
			)
		    )
		)
	    );
	    
	    $matches = get_data($browser_url."Match.json/hash/".$hash, $matches_filters);
	    //print_r($matches["result"]);
	    foreach ($matches["result"] as $m => $mdata ) {
		print " +++ Now getting market data for event ID ".$mdata["match"]["id"].":".$mdata["match"]["player1"]."\r\n";
		$props_filters = array(
		    'filters' => array(
			'0' => array(
			    'filter' => array(
				'attribute' => 'match_id',
				'operator' => '2',
				'value' => $mdata["match"]["id"]
			    )
			),
			'1' => array(
			    'filter' => array(
				'attribute' => 'status',
				'operator' => '2',
				'value' => '1'
			    )
			)
		    ),
		    "dependencies" => true
		    // setting dependencies: true will also include prop type information with each prop.
		);
		$props_data = get_data($browser_url."Prop.json/hash/".$hash, $props_filters);
		print_r($props_data);
	    }
	}
    }
    
    
    
    
    // functions
    function get_data($url, $filters) {
	    $r = curl_init($url);
	    curl_setopt_array($r, array(
    		CURLOPT_POST => TRUE,
    		CURLOPT_RETURNTRANSFER => TRUE,
    		CURLOPT_HTTPHEADER => array(
    		    'Content-Type: application/json'
    		),
    		CURLOPT_POSTFIELDS => json_encode($filters)
	    ));
    
	    $req = curl_exec($r);
	    $res_data = json_decode($req, TRUE);
	    return $res_data;
    }
    
?>