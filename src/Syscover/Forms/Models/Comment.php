<?php namespace Syscover\Forms\Models;

/**
 * @package	    Forms
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;

class Comment extends Model {

    use TraitModel;

	protected $table        = '004_404_comment';
    protected $primaryKey   = 'id_404';
    public $timestamps      = false;
    protected $fillable     = ['id_404', 'record_404', 'user_404', 'date_404', 'subject_404', 'comment_404'];
    private static $rules   = [
        'subject'       => 'required|between:2,255'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public static function addToGetRecordsLimit($parameters)
    {
        return Comment::join('001_010_user', '004_404_comment.user_404', '=', '001_010_user.id_010')
            ->where('record_404', $parameters['ref'])->newQuery();
    }

    public function customCount($parameters)
    {
        return Comment::where('record_404', $parameters['ref'])->newQuery();
    }

    public static function getRecord($parameters)
    {
        return Comment::join('001_010_user', '004_404_comment.user_404', '=', '001_010_user.id_010')
            ->find($parameters['id']);
    }
}