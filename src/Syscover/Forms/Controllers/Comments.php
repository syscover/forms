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

use Illuminate\Support\Facades\Request;
use Syscover\Forms\Models\Message;
use Syscover\Forms\Models\Recipient;
use Syscover\Forms\Models\Record;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Models\User;
use Syscover\Pulsar\Traits\ControllerTrait;
use Syscover\Forms\Models\Comment;

class Comments extends Controller {

    use ControllerTrait;

    protected $routeSuffix      = 'FormsComment';
    protected $folder           = 'comments';
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

    public function storeCustomRecord($parameters)
    {
        $comment = Comment::create([
            'record_404'                => Request::input('ref'),
            'user_404'                  => Request::input('user'),
            'date_404'                  => date('U'),
            'subject_404'               => Request::input('subject'),
            'comment_404'               => Request::input('comment')
        ]);

        $record     = Record::find(Request::input('ref'));
        $user       = User::find(Request::input('user'));

        $form       = $record->form;
        $forwards   = $form->forwards;
        $recipients = [];

        foreach($forwards as $forward)
        {
            if($forward->comments_402)
            {
                $recipients[] = [
                    'record_406'    => $record->id_403,
                    'forward_406'   => true,
                    'name_406'      => $record->name_403,
                    'email_406'     => $record->email_403
                ];
            }

            if($forward->comments_402)
            {

            }
        }

        if(count($recipients) > 0)
        {
            Recipient::insert($recipients);
        }

/*
        Message::create([
            'record_405'                => Request::input('ref'),
            'date_405'                  => date('U'),
            'template_405'              => 'forms::emails.comment',
            'data_405'                  => json_encode([
                'user'  => [
                    'id'        => $user->id_010,
                    'user'      => $user->user_010,
                    'name'      => $user->name_010,
                    'surname'   => $user->surname_010,
                    'email'     => $user->email_010
                ],
                'record'    => $record->toArray(),
                'comment'   => $comment->toArray(),
                'forwards'  => [
                    ['name' => 'minombre', 'email' => '']
                ]
            ])
        ]);
*/

        $parameters['modal'] = 1;

        return $parameters;
    }
    
    public function updateCustomRecord($parameters)
    {
        if(Request::input('favorite')) Address::resetFavorite(Request::input('ref'));

        Comment::where('id_404', $parameters['id'])->update([
            'date_404'                  => date('U'),
            'subject_404'               => Request::input('subject'),
            'comment_404'               => Request::input('comment')
        ]);

        $parameters['modal'] = 1;

        return $parameters;
    }

    public function deleteCustomRecordRedirect($object, $parameters)
    {
        $parameters['tab'] = 0;

        return redirect()->route('showFormsRecord', $parameters)->with([
            'msg'        => 1,
            'txtMsg'     => trans('pulsar::pulsar.message_delete_record_successful', ['name' => $object->{$this->nameM}])
        ]);
    }

    public function deleteCustomRecordsRedirect($parameters)
    {
        $parameters['tab'] = 0;

        return redirect()->route('showFormsRecord', $parameters)->with([
            'msg'        => 1,
            'txtMsg'     => trans('pulsar::pulsar.message_delete_records_successful')
        ]);
    }
}