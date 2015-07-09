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

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;
use Syscover\Forms\Models\Forward;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Forms\Models\Form;

class Forms extends Controller {

    use TraitController;

    protected $routeSuffix  = 'FormsForm';
    protected $folder       = 'forms';
    protected $package      = 'forms';
    protected $aColumns     = ['id_401', 'name_401', ['type' => 'email', 'data' => 'email_013'], ['type' => 'active', 'data' => 'push_notification_401']];
    protected $nameM        = 'name_401';
    protected $model        = '\Syscover\Forms\Models\Form';
    protected $icon         = 'icon-file-text-alt';
    protected $objectTrans  = 'form';

    public function initForm(HttpRequest $request)
    {
        $form = Form::find($request->route()->parameters()['id']);

        if($form == null)
        {
            $response = [
                'success' => false,
                'message' => 'Form don\'t register'
            ];
        }
        else
        {
            $response = [
                'success'   => true,
                'action'    => route('recordFormsRecord'),
                'csfr'      => csrf_token(),
                'token'     => Crypt::encrypt($form->id_401)
            ];
        }

        return response()->json($response);
    }

    public function jsonCustomDataBeforeActions($aObject)
    {
        $unOpened = $aObject['n_unopened_401'] > 0? '<span class="badge bg-red">' . $aObject['n_unopened_401'] . '</span> ' : null;
        return session('userAcl')->isAllowed(Auth::user()->profile_010, $this->resource, 'show')? '<a class="btn btn-xs bs-tooltip" href="' . route('FormsRecord', [$aObject['id_401']]) . '" data-original-title="' . trans('forms::pulsar.view_forms') . '">' . $unOpened . '<i class="icon-eye-open"></i></a>' : null;
    }

    public function createCustomRecord($parameters)
    {
        $parameters['emails'] = EmailAccount::all();

        return $parameters;
    }

    public function storeCustomRecord()
    {

        $form = Form::create([
            'name_401'              => Request::input('name'),
            'email_account_401'     => Request::input('email'),
            'push_notification_401' => Request::input('push', 0)
        ]);

        $forwardsData = json_decode(Request::input('forwardsData'));

        foreach($forwardsData as $forwardData)
        {
            $forwards[] = [
                "form_402"      =>  $form->id_401,
                "name_402"      =>  $forwardData->name_402,
                "email_402"     =>  trim(strtolower($forwardData->email_402)),
                "comments_402"  =>  $forwardData->comments_402,
                "states_402"    =>  $forwardData->states_402
            ];
        }

        if(isset($forwards) && count($forwards) > 0)
        {
            Forward::insert($forwards);
        }
    }

    public function editCustomRecord($parameters)
    {
        $parameters['emails'] = EmailAccount::all();
        $parameters['forwards'] = json_encode($parameters['object']->forwards);

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Form::where('id_401', $parameters['id'])->update([
            'name_401'              => Request::input('name'),
            'email_account_401'     => Request::input('email'),
            'push_notification_401' => Request::input('push', 0)
        ]);

        $forwardsData = json_decode(Request::input('forwardsData'));

        $ids = [];
        foreach($forwardsData as $forwardData)
        {
            if(isset($forwardData->id_402))
            {
                $ids[] = $forwardData->id_402;

                Forward::where('id_402', $forwardData->id_402)->update([
                    "name_402"      =>  $forwardData->name_402,
                    "email_402"     =>  trim(strtolower($forwardData->email_402)),
                    "comments_402"  =>  $forwardData->comments_402,
                    "states_402"    =>  $forwardData->states_402
                ]);
            }
            else
            {
                $forwards[] = [
                    "form_402"  =>  $parameters['id'],
                    "name_402"  =>  $forwardData->name_402,
                    "email_402"     =>  trim(strtolower($forwardData->email_402)),
                    "comments_402"  =>  $forwardData->comments_402,
                    "states_402"    =>  $forwardData->states_402
                ];
            }
        }

        if(count($ids) > 0)
        {
            // to delete forwards the we have delete
            Forward::deleteRecordsNotIn($ids);
        }

        if(isset($forwards) && count($forwards) > 0)
        {
            Forward::insert($forwards);
        }
    }
}