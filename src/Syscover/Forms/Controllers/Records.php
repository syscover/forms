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
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;
use Syscover\Forms\Models\Form;
use Syscover\Forms\Models\Record;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\ControllerTrait;

class Records extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'FormsRecord';
    protected $folder       = 'records';
    protected $package      = 'forms';
    protected $aColumns     = ['id_403', ['type' => 'date','format' => 'd-m-Y', 'data' => 'record_date_403'], 'name_403', 'surname_403', ['type' => 'email', 'data' => 'email_403'], ['type' => 'active', 'data' => 'opened_403']];
    protected $nameM        = 'name_403';
    protected $model        = '\Syscover\Forms\Models\Record';
    protected $icon         = 'icon-file-text-alt';
    protected $objectTrans  = 'record';
    protected $jsonParam    = ['edit' => false];

    public function recordForm(HttpRequest $request)
    {
        $fields = json_decode($request->input('_fields'));
        $form = Form::find(Crypt::decrypt($request->input('_tokenForm')));

        if($form == null)
        {
            $response = [
                'success'   => false,
                'message'   => "Form don't exist"
            ];

            return response()->json($response);
        }

        $data = [];
        foreach($fields->data as $field)
        {
            $data[] = [$field => $request->input($field)];
        }

        Record::create([
            'form_403'          => $form->id_401,
            'record_date_403'   => date('U'),
            'subject_403'       => $request->input($fields->subject, null),
            'name_403'          => $request->input($fields->name, null),
            'surname_403'       => $request->input($fields->surname, null),
            'company_403'       => $request->input($fields->company, null),
            'email_403'         => $request->input($fields->email, null),
            'date_403'          => $request->input($fields->date, null),
            'data_403'          => json_encode($data)
        ]);


        if($request->input('_redirectOk') == '')
        {
            $response = [
                'success'   => true,
                'form'      => [
                    'record_date_403'   => date('U'),
                    'subject_403'       => $request->input($fields->subject, null),
                    'name_403'          => $request->input($fields->name, null),
                    'surname_403'       => $request->input($fields->surname, null),
                    'company_403'       => $request->input($fields->company, null),
                    'email_403'         => $request->input($fields->email, null),
                    'date_403'          => $request->input($fields->date, null),
                    'data_403'          => json_encode($data)
                ]
            ];

            return response()->json($response);
        }
        else
        {
            return redirect($request->input('_redirectOk'));
        }
    }

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['ref']     = $parameters['ref'];

        return $actionUrlParameters;
    }

    public function jsonCustomDataBeforeActions($aObject)
    {
        return session('userAcl')->isAllowed(Auth::user()->profile_010, $this->resource, 'access')? '<a class="btn btn-xs bs-tooltip" href="' . route($this->routeSuffix, [$aObject['id_403']]) . '" data-original-title="' . trans('pulsar::pulsar.view_record') . '"><i class="icon-eye-open"></i></a>' : null;
    }
}