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

use Illuminate\Support\Facades\Auth;
use Syscover\Forms\Libraries\Miscellaneous;
use Syscover\Forms\Models\Message;
use Syscover\Forms\Models\Recipient;
use Syscover\Forms\Models\Record;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Libraries\PulsarAcl;
use Syscover\Pulsar\Models\User;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Forms\Models\Comment;

class CommentController extends Controller {

    use TraitController;

    protected $routeSuffix      = 'FormsComment';
    protected $folder           = 'comment';
    protected $package          = 'forms';
    protected $aColumns         = [['type' => 'date','format' => 'd-m-Y', 'data' => 'date_404'], 'user_010', 'subject_404'];
    protected $nameM            = 'id_404';
    protected $model            = '\Syscover\Forms\Models\Comment';
    protected $icon             = 'icon-comments';
    protected $objectTrans      = 'comment';
    protected $jsonParam        = ['onlyEditOwner' => 'user_404', 'showIfNotEdit' => true, 'show' => true];

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['modal']   = true;
        $actionUrlParameters['ref']     = $parameters['ref'];

        return $actionUrlParameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        $record             = Record::find($request->input('ref'));
        $record->data_403   = json_decode($record->data_403);
        $form               = $record->form;
        $state              = $record->state;
        $names              = [];
        $usersEmails        = [];
        $messages           = [];

        $comment = Comment::create([
            'record_404'                => $request->input('ref'),
            'user_404'                  => Auth::user()->id_010,
            'date_404'                  => date('U'),
            'subject_404'               => $request->input('subject'),
            'comment_404'               => $request->input('comment')
        ]);

        // check new recipients
        Miscellaneous::checkRecipients($record, $form);

        // get recipient emails to compare with new user email
        $recipients = Recipient::where('record_406', $request->input('ref'))->where('comments_406', true)->get();

        // set recipients
        foreach($recipients as $recipient)
        {
            if($recipient->email_406 != Auth::user()->email_010)
            {
                $names[]        = $recipient->name_406;
                $usersEmails[]  = $recipient->email_406;
            }
        }

        // get users with the emails recipients
        $users = User::whereIn('email_010', $usersEmails)->get();
        $matchAuthor = false;
        foreach($recipients as $recipient)
        {
            if($recipient->email_406 == Auth::user()->email_010)
            {
                $matchAuthor = true;
            }
            else
            {
                // send to all recipients less Author recipient
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
                    $userAcl = PulsarAcl::getProfileAcl($matchUser->profile_010);
                }

                $messages[] = [
                    'type_405'                  => 'comment',
                    'record_405'                => $record->id_403,
                    'date_405'                  => date('U'),
                    'recipient_405'             => $recipient->id_406,
                    'forward_405'               => $recipient->forward_406,
                    'subject_405'               => 'forms::pulsar.subject_comment',
                    'name_405'                  => $recipient->name_406,
                    'email_405'                 => $recipient->email_406,
                    'form_405'                  => $form->id_401,
                    'user_405'                  => $matchUser == null? null : $matchUser->id_010,
                    'template_405'              => 'forms::emails.comment',
                    'text_template_405'         => 'forms::emails.text_comment',
                    'data_message_405'          => json_encode([
                        'name_form_405'             => $form->name_401,
                        'author_comment_405'        => Auth::user()->name_010 . ' ' .  Auth::user()->surname_010,
                        'date_comment_405'          => date(config('pulsar.datePattern')),
                        'subject_comment_405'       => $comment->subject_404,
                        'comment_405'               => $comment->comment_404,
                        'name_state_405'            => $state->name_400,
                        'color_state_405'           => $state->color_400,
                        'names_405'                 => implode (", ", $names),
                        'permission_state_405'      => $matchUser == null? false : $userAcl->isAllowed($matchUser->profile_010, 'forms-record', 'edit'),
                        'permission_comment_405'    => $matchUser == null? false : $userAcl->isAllowed($matchUser->profile_010, 'forms-comment', 'create'),
                        'permission_forward_405'    => $matchUser == null? false : $userAcl->isAllowed($matchUser->profile_010, 'forms-form', 'edit'),
                        'permission_record_405'     => $matchUser == null? false : $userAcl->isAllowed($matchUser->profile_010, 'forms-record', 'show'),
                    ]),
                    'data_405'                  => json_encode($record->toArray())
                ];
            }
        }

        if(!$matchAuthor)
        {
            // Include Author to recipients but not forward
            Recipient::create([
                'record_406'    => $record->id_403,
                'forward_406'   => false,
                'name_406'      => Auth::user()->name_010 . ' ' .  Auth::user()->surname_010,
                'email_406'     => Auth::user()->email_010,
                'comments_406'  => true,
                'states_406'    => true
            ]);
        }

        if(count($messages) > 0)    Message::insert($messages);

        $parameters['modal'] = 1;

        return $parameters;
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        if($request->input('favorite')) Address::resetFavorite($request->input('ref'));

        Comment::where('id_404', $parameters['id'])->update([
            'date_404'                  => date('U'),
            'subject_404'               => $request->input('subject'),
            'comment_404'               => $request->input('comment')
        ]);

        $parameters['modal'] = 1;

        return $parameters;
    }

    public function deleteCustomRecordRedirect($request, $object, $parameters)
    {
        $parameters['tab'] = 0;

        return redirect()->route('showFormsRecord', $parameters)->with([
            'msg'        => 1,
            'txtMsg'     => trans('pulsar::pulsar.message_delete_record_successful', ['name' => $object->{$this->nameM}])
        ]);
    }

    public function deleteCustomRecordsRedirect($request, $parameters)
    {
        $parameters['tab'] = 0;

        return redirect()->route('showFormsRecord', $parameters)->with([
            'msg'        => 1,
            'txtMsg'     => trans('pulsar::pulsar.message_delete_records_successful')
        ]);
    }
}