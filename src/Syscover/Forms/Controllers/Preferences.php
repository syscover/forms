<?php namespace Syscover\Forms\Controllers;

/**
 * @package	    Forms
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Support\Facades\Request;
use Syscover\Forms\Models\State;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Traits\ControllerTrait;

class Preferences extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'FormsPreference';
    protected $folder       = 'preferences';
    protected $package      = 'forms';
    protected $aColumns     = ['id_200', 'name_200'];
    protected $nameM        = 'name_200';
    protected $model        = '\Syscover\Pulsar\Models\Preference';
    protected $icon         = 'icon-cog';
    protected $objectTrans  = 'preference';

    public function indexCustom($parameters)
    {
        $parameters['states'] = State::all();
        $parameters['defaultState']  = Preference::getValue('defaultState', 4);

        $parameters['accounts'] = EmailAccount::all();
        $parameters['notificationsAccount']  = Preference::getValue('defaultState', 4);

        return $parameters;
    }
    
    public function updateCustomRecord()
    {
        Preference::setValue('defaultState', Request::input('defaultState'), 4);
        Preference::setValue('notificationsAccount', Request::input('notificationsAccount'), 4);
    }
}