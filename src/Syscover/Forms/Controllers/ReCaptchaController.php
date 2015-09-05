<?php namespace Syscover\Forms\Controllers;

/**
 * @package	    Pulsar
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Http\Request;
use Syscover\Pulsar\Controllers\Controller;
use ReCaptcha\ReCaptcha;

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
        $recaptcha = new ReCaptcha(config('forms.secretKey'));

        $resp = $recaptcha->verify($request->input('g-recaptcha-response'), $request->getClientIp());
        if ($resp->isSuccess()) {
            // verified!
            echo('ok');
        }
        else
        {
            $errors = $resp->getErrorCodes();
            echo('NO ok');
        }
    }
}