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
use Illuminate\Http\Request as HttpRequest;
use Syscover\Pulsar\Controllers\Controller;
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

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['modal']   = true;
        $actionUrlParameters['ref']     = $parameters['ref'];
        //$actionUrlParameters['form']    = $parameters['form'];

        return $actionUrlParameters;
    }

    public function storeCustomRecord($parameters)
    {
        Comment::create([
            'record_404'                => Request::input('ref'),
            'user_404'                  => Request::input('user'),
            'date_404'                  => date('U'),
            'subject_404'               => Request::input('subject'),
            'comment_404'               => Request::input('comment')
        ]);

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