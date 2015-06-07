<?php namespace Syscover\Forms\Models;

/*
 * @package	    Pulsar
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\ModelTrait;

class Form extends Model {

    use ModelTrait;

	protected $table        = '004_401_form';
    protected $primaryKey   = 'id_401';
    public $timestamps      = false;
    protected $fillable     = ['id_401', 'name_401', 'email_account_401', 'push_notification_401'];
    private static $rules   = [
        'name'  => 'required|between:2,50',
        'email' => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function forwards()
    {
        return Form::hasMany('Syscover\Forms\Models\Forward','form_402');
    }

    public static function getCustomRecordsLimit()
    {
        return Form::join('001_013_email_account', '004_401_form.email_account_401', '=', '001_013_email_account.id_013')
            ->newQuery();
    }
}