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
use Illuminate\Http\Request as HttpRequest;
use Syscover\Forms\Models\Form;
use Syscover\Forms\Models\Message;
use Syscover\Forms\Models\Recipient;
use Syscover\Forms\Models\Record;
use Syscover\Forms\Models\State;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Libraries\PulsarAcl;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Models\User;
use Syscover\Pulsar\Traits\ControllerTrait;

class Records extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'FormsRecord';
    protected $folder       = 'records';
    protected $package      = 'forms';
    protected $aColumns     = ['id_403', ['type' => 'color', 'data' => 'color_400', 'tooltip' => true, 'title' => 'name_400'], 'date_403', 'text_date_403', 'name_403', 'surname_403', ['type' => 'email', 'data' => 'email_403'], ['type' => 'active', 'data' => 'opened_403']];
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
        $fields             = json_decode($request->input('_fields'));
        $form               = Form::find(Crypt::decrypt($request->input('_tokenForm')));
        $forwards           = $form->forwards;
        $recipients         = [];
        $names              = [];
        $messages           = [];

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

        $dataRecord         = [
            'form_403'              => $form->id_401,
            'date_403'              => $date,
            'text_date_403'         => date(config('pulsar.datePattern'), $date),
            'state_403'             => $defaultState->value_018,
            'subject_403'           => $request->input($fields->subject, null),
            'name_403'              => $request->input($fields->name, null),
            'surname_403'           => $request->input($fields->surname, null),
            'company_403'           => $request->input($fields->company, null),
            'email_403'             => $request->input($fields->email, null),
            'data_403'              => json_encode($data)
        ];

        $record = Record::create($dataRecord);
        $state  = $record->state;

        $form->increment('n_unopened_401');

        // set data index to preparate $dataRecord to message
        $dataRecord['data_403'] = $data;

        // set recipients
        foreach($forwards as $forward)
        {
            $names[] = $forward->name_402;
        }

        foreach($forwards as $forward)
        {
            $recipients[] = [
                'record_406'    => $record->id_403,
                'forward_406'   => true,
                'name_406'      => $forward->name_402,
                'email_406'     => $forward->email_402,
                'comments_406'  => $forward->comments_402,
                'states_406'    => $forward->states_402
            ];


            ///////////////
            $user = User::where('email_010', $forward->email_402)->find();
            if($user != null)
            {
                $userAcl = PulsarAcl::getProfileAcl($user->profile_010);
            }
            ///////////////

            $messages[] = [
                'type_405'          => 'record',
                'record_405'        => $record->id_403,


                // por crear
                'form_405'          => $form->id_401,
                'name_form_405'     => $form->name_401,
                'name_state_405'    => $state->name_400,
                'color_state_405'   => $state->color_400,
                'names_405'         => implode (", ", $names),

                // user
                // permission_state
                // permission_comment
                // permission_forward
                // permission_form



                'date_405'          => date('U'),
                'forward_405'       => true,
                'name_405'          => $forward->name_402,
                'email_405'         => $forward->email_402,
                'template_405'      => 'forms::emails.record',
                'text_template_405' => 'forms::emails.text_record',
                'data_405'          => json_encode($dataRecord)
            ];
        }

        if(count($recipients) > 0)  Recipient::insert($recipients);

        if(count($messages) > 0)    Message::insert($messages);

        if($request->input('_redirectOk') == '')
        {
            $response = [
                'success'   => true,
                'form'      => [
                    'date_403'              => $date,
                    'text_date_403'         => date(config('pulsar.datePattern'), $date),
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