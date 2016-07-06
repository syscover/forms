<?php namespace Syscover\Forms\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;

/**
 * Class ReCaptchaController
 * @package Syscover\Forms\Controllers
 */

class ReCaptchaController extends BaseController
{
    /**
     * Function to verify captcha request
     *
     * @param   \Illuminate\Http\Request        $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request)
    {
        $recaptcha = new ReCaptcha(config('google_api.googleRecaptchaSecretKey'));

        $resp = $recaptcha->verify($request->input('g-recaptcha-response'), $request->getClientIp());

        if($resp->isSuccess())
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
                'error-codes'   => $resp->getErrorCodes()
            ];

            return response()->json($response);
        }
    }
}