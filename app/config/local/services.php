<?php

	return array(
        'stripe' => array(
    		'model'  => 'User',
    		'secret' => $_ENV['STRIPE_SECRET'],
    	),
	);
