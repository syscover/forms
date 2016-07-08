<?php namespace Syscover\Forms\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Support\Facades\Crypt;
use Syscover\Forms\Models\Forward;
use Syscover\Pulsar\Models\EmailAccount;
use Syscover\Forms\Models\Form;

/**
 * Class FormController
 * @package Syscover\Forms\Controllers
 */

class FormController extends Controller
{
    protected $routeSuffix  = 'formsForm';
    protected $folder       = 'form';
    protected $package      = 'forms';
    protected $indexColumns = ['id_401', 'name_401', ['type' => 'email', 'data' => 'email_013'], ['type' => 'active', 'data' => 'push_notification_401']];
    protected $nameM        = 'name_401';
    protected $model        = Form::class;
    protected $icon         = 'fa fa-file-text-o';
    protected $objectTrans  = 'form';

    public function initForm()
    {
        $form = Form::find($this->request->route()->parameters()['id']);

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

    public function jsonCustomDataBeforeActions($aObject, $actionUrlParameters, $parameters)
    {
        $unOpened = $aObject['n_unopened_401'] > 0? '<span class="badge bg-red">' . $aObject['n_unopened_401'] . '</span> ' : null;
        return is_allowed($this->resource, 'show')? '<a class="btn btn-xs bs-tooltip" href="' . route('formsRecord', [$aObject['id_401']]) . '" data-original-title="' . trans('forms::pulsar.view_records') . '">' . $unOpened . '<i class="fa fa-eye"></i></a>' : null;
    }

    public function createCustomRecord($parameters)
    {
        $parameters['emails'] = EmailAccount::all();

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        $form = Form::create([
            'name_401'              => $this->request->input('name'),
            'email_account_id_401'  => $this->request->input('emailAccount'),
            'push_notification_401' => $this->request->has('pushNotification')
        ]);

        $forwardsData = json_decode($this->request->input('forwardsData'));

        foreach($forwardsData as $forwardData)
        {
            $forwards[] = [
                "form_id_402"   =>  $form->id_401,
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
        $parameters['emails']   = EmailAccount::all();
        $parameters['forwards'] = json_encode($parameters['object']->getForwards);

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        Form::where('id_401', $parameters['id'])->update([
            'name_401'              => $this->request->input('name'),
            'email_account_id_401'  => $this->request->input('emailAccount'),
            'push_notification_401' => $this->request->has('pushNotification')
        ]);

        $forwardsData = json_decode($this->request->input('forwardsData'));

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
                    "form_id_402"   =>  $parameters['id'],
                    "name_402"      =>  $forwardData->name_402,
                    "email_402"     =>  trim(strtolower($forwardData->email_402)),
                    "comments_402"  =>  $forwardData->comments_402,
                    "states_402"    =>  $forwardData->states_402
                ];
            }
        }

        if(count($ids) > 0)
        {
            // to delete forwards the we have delete
            Forward::whereNotIn('id_402', $ids)->delete();
        }

        if(isset($forwards) && count($forwards) > 0)
        {
            Forward::insert($forwards);
        }
    }
}