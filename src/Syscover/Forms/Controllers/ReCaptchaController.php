<?php namespace Syscover\Forms\Controllers;

use Illuminate\Http\Request;
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
     * @param   \Illuminate\Http\Request   $request
     * @return  string
     */
    public function verify(Request $request)
    {
        $recaptcha = new ReCaptcha(config('api.googleRecaptchaSecretKey'));

        $resp = $recaptcha->verify($request->input('g-recaptcha-response'), $request->getClientIp());

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