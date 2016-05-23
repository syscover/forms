<?php namespace Syscover\Forms\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Syscover\Forms\Libraries\Miscellaneous;
use Syscover\Forms\Models\Form;
use Syscover\Forms\Models\Message;
use Syscover\Forms\Models\Recipient;
use Syscover\Forms\Models\Record;
use Syscover\Forms\Models\State;
use Syscover\Pulsar\Libraries\AclLibrary;
use Syscover\Pulsar\Models\Preference;
use Syscover\Pulsar\Models\User;

/**
 * Class RecordController
 * @package Syscover\Forms\Controllers
 */

class RecordController extends Controller
{
    protected $routeSuffix      = 'formsRecord';
    protected $folder           = 'record';
    protected $package          = 'forms';
    protected $aColumns         = ['id_403', ['type' => 'color_400', 'data' => 'name_400', 'tooltip' => true, 'title' => 'name_400'], 'date_403', 'date_text_403', 'name_403', 'surname_403', ['type' => 'email', 'data' => 'email_403'], ['type' => 'active', 'data' => 'opened_403']];
    protected $nameM            = 'id_403';
    protected $model            = Record::class;
    protected $icon             = 'fa fa-file-text';
    protected $objectTrans      = 'record';

    function __construct(Request $request)
    {
        parent::__construct($request);

        $this->viewParameters['newButton']      = true;
        $this->viewParameters['showButton']     = true;
        $this->viewParameters['editButton']     = false;
    }

    public function customIndex($parameters)
    {
        $parameters['objForm'] = Form::find($parameters['form']);

        return $parameters;
    }

    public function customColumnType($row, $aColumn, $aObject)
    {
        switch ($aColumn['type'])
        {
            case 'color_400':
                $row[] = $aObject['name_400'] . ' <i class="color' . (isset($aColumn['tooltip']) && $aColumn['tooltip']? ' bs-tooltip' : null) . '"' . (isset($aColumn['title'])? ' title="' . $aObject[$aColumn['title']] . '"' : null) . ' style="background-color: ' . $aObject['color_400'] . '"></i>';
                break;
        }

        return $row;
    }

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        // set reference to form
        $actionUrlParameters['form']    = $parameters['form'];

        // init record on tap 1
        $actionUrlParameters['tab']     = 1;

        return $actionUrlParameters;
    }

    public function showCustomRecord($parameters)
    {
        if($parameters['object']->opened_403 == false)
        {
            $parameters['object']->opened_403 = true;
            $parameters['object']->save();

            $form = $parameters['object']->getForm;
            $form->decrement('n_unopened_401');
        }

        $parameters['states'] = State::all();

        return $parameters;
    }

    public function deleteCustomRecord($record)
    {
        // set records unopened
        if(!$record->opened_403)
        {
            $record->getForm->decrement('n_unopened_401');
        }
    }

    public function deleteCustomRecordsSelect($ids)
    {
        $nUnopenedToDelete = Record::where('opened_403', false)->whereIn('id_403', $ids)->count();
        // set records unopened
        if($nUnopenedToDelete > 0)
        {
            $record = Record::find($ids[0]);
            $record->getForm->decrement('n_unopened_401', $nUnopenedToDelete);
        }
    }

    /**
     *  Delete recipient from record
     *
     * @access	public
     * @return  \Illuminate\Support\Facades\Redirect
     */
    public function deleteRecipient()
    {
        $parameters = $this->request->route()->parameters();
        $recipient  = Recipient::find($parameters['id']);
        $record     = $recipient->record;

        if(isset($parameters['id']))
        {
            Recipient::where('id_406', $parameters['id'])->delete();
        }

        return redirect()->route('showFormsRecord', ['id' => $record->id_403, 'form' => $record->form_403, 'offset' => 0, 'tab' => 0])->with([
            'msg'        => 1,
            'txtMsg'     => trans('pulsar::pulsar.message_delete_record_successful', ['name' => $recipient->email_406])
        ]);
    }

    /**
     *  Change state record
     *
     * @access	public
     * @return  json
     */
    public function jsonSetStateRecordForm()
    {
        $record             = Record::find($this->request->input('record'));
        $record->data_403   = json_decode($record->data_403);
        $form               = $record->getForm;
        $oldState           = $record->getState;
        $state              = State::find($this->request->input('value'));
        $names              = [];
        $usersEmails        = [];

        Record::where('id_403', $this->request->input('record'))->update([
            'state_403' => $this->request->input('value')
        ]);

        // check new recipients
        Miscellaneous::checkRecipients($record, $form);

        // get recipients emails to compare with new user email
        $recipients = Recipient::where('record_406', $this->request->input('record'))->where('states_406', true)->get();

        // set recipients
        foreach($recipients as $recipient)
        {
            $names[]        = $recipient->name_406;
            $usersEmails[]  = $recipient->email_406;
        }

        // get users with the emails recipients
        $users = User::whereIn('email_010', $usersEmails)->get();

        foreach($recipients as $recipient)
        {
            // get user and permissions
            $matchUser = null;
            foreach($users as $user)
            {
                if($user->email_010 == $recipient->email_406)
                {
                    $matchUser = $user;
                    break;
                }
            }

            if($matchUser != null)
            {
                $userAcl = AclLibrary::getProfileAcl($matchUser->profile_010);
            }

            $messages[] = [
                'type_405'                  => 'state',
                'record_405'                => $record->id_403,
                'date_405'                  => date('U'),
                'recipient_405'             => $recipient->id_406,
                'forward_405'               => $recipient->forward_406,
                'subject_405'               => 'forms::pulsar.subject_change_state',
                'name_405'                  => $recipient->name_406,
                'email_405'                 => $recipient->email_406,
                'form_405'                  => $form->id_401,
                'user_405'                  => $user == null? null : $user->id_010,
                'template_405'              => 'forms::emails.state',
                'text_template_405'         => 'forms::emails.text_state',
                'data_message_405'          => json_encode([
                    'name_form_405'             => $form->name_401,
                    'name_old_state_405'        => $oldState->name_400,
                    'color_old_state_405'       => $oldState->color_400,
                    'name_state_405'            => $state->name_400,
                    'color_state_405'           => $state->color_400,
                    'names_405'                 => implode (", ", $names),
                    'permission_state_405'      => $user == null? false : $userAcl->allows('forms-record', 'edit', $user->profile_010),
                    'permission_comment_405'    => $user == null? false : $userAcl->allows('forms-comment', 'create', $user->profile_010),
                    'permission_forward_405'    => $user == null? false : $userAcl->allows('forms-form', 'edit', $user->profile_010),
                    'permission_record_405'     => $user == null? false : $userAcl->allows('forms-record', 'show', $user->profile_010),
                ]),
                'data_405'                  => json_encode($record->toArray())
            ];
        }

        if(count($messages) > 0)    Message::insert($messages);

        $response = [
            'success'   => true,
            'record'    => $this->request->input('record'),
            'value'     => $this->request->input('value')
        ];

        return response()->json($response);
    }

    /**
     *  Function to record a data form
     *
     * @access	public
     * @return  json | \Illuminate\Http\RedirectResponse
     */
    public function recordForm()
    {
        $fields             = json_decode($this->request->input('_fields'));
        $form               = Form::find(Crypt::decrypt($this->request->input('_tokenForm')));
        $forwards           = $form->getForwards;
        $recipients         = [];
        $names              = [];
        $messages           = [];
        $recordDate         = date('U');

        // test that, there are any form
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
                'value' => $this->request->input($field->name)
            ];

            if(isset($field->length)) $obj['length']    = $field->length;
            if(isset($field->label)) $obj['label']      = $field->label;

            $data[] = $obj;
        }

        $defaultState   = Preference::getValue('formsDefaultState', 4);

        $dataRecord     = [
            'form_403'              => $form->id_401,
            'date_403'              => $recordDate,
            'date_text_403'         => date(config('pulsar.datePattern'), $recordDate),
            'state_403'             => $defaultState->value_018,
            'subject_403'           => $this->request->input($fields->subject, null),
            'name_403'              => $this->request->input($fields->name, null),
            'surname_403'           => $this->request->input($fields->surname, null),
            'company_403'           => $this->request->input($fields->company, null),
            'email_403'             => $this->request->input($fields->email, null),
            'data_403'              => json_encode($data)
        ];

        $record = Record::create($dataRecord);
        $state  = $record->getState;

        // set data with array with decode information to make $dataRecord for message
        $dataRecord['data_403'] = $data;

        // set ID record
        $dataRecord['id_403']   = $record->id_403;

        // set records unopened
        $form->n_unopened_401 = Record::where('form_403', $form->id_401)->where('opened_403', false)->count();
        $form->save();

        foreach($forwards as $forward)
        {
            // set recipients from forwards to sow in the email message
            $names[] = $forward->name_402;

            $recipients[] = [
                'record_406'    => $record->id_403,
                'forward_406'   => true,
                'name_406'      => $forward->name_402,
                'email_406'     => $forward->email_402,
                'comments_406'  => $forward->comments_402,
                'states_406'    => $forward->states_402
            ];
        }

        if(count($recipients) > 0)  Recipient::insert($recipients);

        // get recipient emails to compare with new user email
        $recipients = $record->getRecipients;

        foreach($recipients as $recipient)
        {
            // get user and permissions
            $user = User::where('email_010', $recipient->email_406)->first();
            if($user != null)
            {
                $userAcl = AclLibrary::getProfileAcl($user->profile_010);
            }

            $messages[] = [
                'type_405'                  => 'record',
                'record_405'                => $record->id_403,
                'date_405'                  => date('U'),
                'recipient_405'             => $recipient->id_406,
                'forward_405'               => true,
                'subject_405'               => 'forms::pulsar.subject_email_record',
                'name_405'                  => $recipient->name_406,
                'email_405'                 => $recipient->email_406,
                'form_405'                  => $form->id_401,
                'user_405'                  => $user == null? null : $user->id_010,
                'template_405'              => 'forms::emails.record',
                'text_template_405'         => 'forms::emails.text_record',
                'data_message_405'          => json_encode([
                    'name_form_405'             => $form->name_401,
                    'name_state_405'            => $state->name_400,
                    'color_state_405'           => $state->color_400,
                    'names_405'                 => implode (", ", $names),
                    'permission_state_405'      => $user == null? false : $userAcl->allows('forms-record', 'edit', $user->profile_010),
                    'permission_comment_405'    => $user == null? false : $userAcl->allows('forms-comment', 'create', $user->profile_010),
                    'permission_forward_405'    => $user == null? false : $userAcl->allows('forms-form', 'edit', $user->profile_010),
                    'permission_record_405'     => $user == null? false : $userAcl->allows('forms-record', 'show', $user->profile_010),
                ]),
                'data_405'                  => json_encode($dataRecord)
            ];
        }

        if(count($messages) > 0)    Message::insert($messages);

        if($this->request->input('_redirectOk') == '')
        {
            $response = [
                'success'   => true,
                'form'      => [
                    'date_403'              => $recordDate,
                    'date_text_403'         => date(config('pulsar.datePattern'), $recordDate),
                    'subject_403'           => $this->request->input($fields->subject, null),
                    'state_403'             => $defaultState->value_018,
                    'name_403'              => $this->request->input($fields->name, null),
                    'surname_403'           => $this->request->input($fields->surname, null),
                    'company_403'           => $this->request->input($fields->company, null),
                    'email_403'             => $this->request->input($fields->email, null),
                    'data_403'              => json_encode($data)
                ]
            ];

            return response()->json($response);
        }
        else
        {
            return redirect($this->request->input('_redirectOk'));
        }
    }
}