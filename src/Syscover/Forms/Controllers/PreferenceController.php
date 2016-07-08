<?php namespace Syscover\Forms\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Http\Request;
use Syscover\Forms\Models\State;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Models\Preference;

/**
 * Class PreferenceController
 * @package Syscover\Forms\Controllers
 */

class PreferenceController extends Controller
{
    protected $routeSuffix  = 'formsPreference';
    protected $folder       = 'preference';
    protected $package      = 'forms';
    protected $indexColumns = [];
    protected $nameM        = null;
    protected $model        = Preference::class;
    protected $icon         = 'fa fa-cog';
    protected $objectTrans  = 'preference';

    function __construct(Request $request)
    {
        parent::__construct($request);

        $this->viewParameters['cancelButton'] = false;
    }
    
    public function customIndex($parameters)
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