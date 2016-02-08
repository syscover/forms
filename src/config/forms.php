<?php

return [
    /*
	|--------------------------------------------------------------------------
	| Secret Key Google reCAPTCHA
	|--------------------------------------------------------------------------
	|
	| To obtain this secret key, please visit this URL: https://www.google.com/recaptcha/admin
	|
	*/

    'secretKey' => env('GOOGLE_RECAPTCHA_SECRET_KEY', 'your secret key'),

	/*
	|--------------------------------------------------------------------------
	| Site Key Google reCAPTCHA
	|--------------------------------------------------------------------------
	|
	| To obtain this secret key, please visit this URL: https://www.google.com/recaptcha/admin
	|
	*/

	'siteKey' => env('GOOGLE_RECAPTCHA_SITE_KEY', 'your site key')
];