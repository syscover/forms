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
use Syscover\Pulsar\Traits\TraitModel;

class Forward extends Model {

    use TraitModel;

	protected $table        = '004_402_forward';
    protected $primaryKey   = 'id_402';
    public $timestamps      = false;
    protected $fillable     = ['id_402', 'form_402', 'name_402', 'email_402', 'comments_402', 'states_402'];
    private static $rules   = [
        'name'  => 'required|between:2,50',
        'email' => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public static function addToGetRecordsLimit()
    {
        return Forward::join('004_401_form', '004_402_forward.form_402', '=', '004_401_form.id_401')
            ->newQuery();
    }

    public static function deleteRecordsNotIn($ids)
    {
        Forward::whereNotIn('id_402', $ids)->delete();
    }
}