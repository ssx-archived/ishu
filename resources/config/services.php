<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],

	'twitter' => [
		'client_id' 	=> 'hOfYnXEoMGDzjnjtVM9JBpbdp',
		'client_secret' => 'XVZ4EWCgvJ59XsEP4fKVLAl715VPONvifI5lR7kW4jMfoNwOqh',
		'redirect' 		=> 'http://isfrankfamousyet.dev/auth/twitter/callback'
	],

];
