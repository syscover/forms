<?php namespace Syscover\Forms\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use ReCaptcha\ReCaptcha;

/**
 * Class ReCaptchaController
 * @package Syscover\Forms\Controllers
 */

class ReCaptchaController extends Controller {

    /**
     *  Function to verify captcha request
     *
     * @access  public
     * @return  string
     */
    public function verify()
    {
        $recaptcha = new ReCaptcha(config('api.googleRecaptchaSecretKey'));

        $resp = $recaptcha->verify($this->request->input('g-recaptcha-response'), $this->request->getClientIp());

        if ($resp->isSuccess())
        {
            $response = [
                'success'   => true
            ];

            return response()->json($response);
        }
        else
        {
            $response = [
                'success'       => false,
                "error-codes"   => $resp->getErrorCodes()
            ];

            return response()->json($response);
        }
    }
}