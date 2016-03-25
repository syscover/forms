<?php namespace Syscover\Forms\Controllers;

use Syscover\Forms\Models\State;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Traits\TraitController;

/**
 * Class PreferenceController
 * @package Syscover\Forms\Controllers
 */

class PreferenceController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'formsPreference';
    protected $folder       = 'preference';
    protected $package      = 'forms';
    protected $aColumns     = [];
    protected $nameM        = null;
    protected $model        = Preference::class;
    protected $icon         = 'fa fa-cog';
    protected $objectTrans  = 'preference';

    public function indexCustom($parameters)
    {
        $parameters['states']                       = State::all();
        $parameters['defaultState']                 = Preference::getValue('formsDefaultState', 4);

        $parameters['accounts']                     = EmailAccount::all();
        $parameters['notificationsAccount']         = Preference::getValue('formsNotificationsAccount', 4);

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Preference::setValue('formsDefaultState', 4, $this->request->input('defaultState'));
        Preference::setValue('formsNotificationsAccount', 4, $this->request->input('notificationsAccount'));
    }
}