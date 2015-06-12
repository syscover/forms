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
use Syscover\Forms\Models\State;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Traits\ControllerTrait;

class Records extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'FormsRecord';
    protected $folder       = 'records';
    protected $package      = 'forms';
    protected $aColumns     = ['id_403', ['type' => 'color', 'data' => 'color_400', 'tooltip' => true, 'title' => 'name_400'], 'record_date_403', 'record_text_date_403', 'name_403', 'surname_403', ['type' => 'email', 'data' => 'email_403'], ['type' => 'active', 'data' => 'opened_403']];
    protected $nameM        = 'name_403';
    protected $model        = '\Syscover\Forms\Models\Record';
    protected $icon         = 'icon-file-text-alt';
    protected $objectTrans  = 'record';
    protected $jsonParam    = ['edit' => false, 'show' => true];

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        // set reference to form
        $actionUrlParameters['form'] = $parameters['form'];
        // init record on tap 1
        $actionUrlParameters['tab'] = 1;

        return $actionUrlParameters;
    }

    public function showCustomRecord($parameters)
    {
        if($parameters['object']->opened_403 == false)
        {
            $parameters['object']->opened_403 = true;
            $parameters['object']->save();

            $form = $parameters['object']->form;
            $form->decrement('n_unopened_401');
        }

        $parameters['states'] = State::all();

        return $parameters;
    }

    public function jsonSetStateRecordForm(HttpRequest $request)
    {
        Record::where('id_403', $request->input('record'))->update([
            'state_403'                  => $request->input('value')
        ]);

        $response = [
            'success'   => true,
            'record'    => $request->input('record'),
            'value'     => $request->input('value')
        ];

        return response()->json($response);
    }

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
            $obj = [
                'type'  => $field->type,
                'name'  => $field->name,
                'value' => $request->input($field->name)
            ];

            if(isset($field->length)) $obj['length'] = $field->length;

            $data[] = $obj;
        }

        $defaultState   = Preference::getValue('defaultState', 4);
        $date           = date('U');

        Record::create([
            'form_403'              => $form->id_401,
            'record_date_403'       => $date,
            'record_text_date_403'  => date(config('pulsar.datePattern'), $date),
            'state_403'             => $defaultState->value_018,
            'subject_403'           => $request->input($fields->subject, null),
            'name_403'              => $request->input($fields->name, null),
            'surname_403'           => $request->input($fields->surname, null),
            'company_403'           => $request->input($fields->company, null),
            'email_403'             => $request->input($fields->email, null),
            'date_403'              => $request->input($fields->date, null),
            'data_403'              => json_encode($data)
        ]);

        $form->increment('n_unopened_401');

        if($request->input('_redirectOk') == '')
        {
            $response = [
                'success'   => true,
                'form'      => [
                    'record_date_403'       => $date,
                    'record_text_date_403'  => date(config('pulsar.datePattern'), $date),
                    'subject_403'           => $request->input($fields->subject, null),
                    'state_403'             => $defaultState->value_018,
                    'name_403'              => $request->input($fields->name, null),
                    'surname_403'           => $request->input($fields->surname, null),
                    'company_403'           => $request->input($fields->company, null),
                    'email_403'             => $request->input($fields->email, null),
                    'date_403'              => $request->input($fields->date, null),
                    'data_403'              => json_encode($data)
                ]
            ];

            return response()->json($response);
        }
        else
        {
            return redirect($request->input('_redirectOk'));
        }
    }
}