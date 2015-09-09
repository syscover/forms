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

    'secretKey' => env('FORMS_SECRET_KEY', 'your secret key'),

	/*
	|--------------------------------------------------------------------------
	| Site Key Google reCAPTCHA
	|--------------------------------------------------------------------------
	|
	| To obtain this secret key, please visit this URL: https://www.google.com/recaptcha/admin
	|
	*/

	'siteKey' => env('FORMS_SITE_KEY', 'your site key')
];