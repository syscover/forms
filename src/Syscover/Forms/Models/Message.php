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
use Syscover\Pulsar\Traits\ModelTrait;

class Message extends Model {

    use ModelTrait;

	protected $table        = '004_405_message';
    protected $primaryKey   = 'id_405';
    public $timestamps      = false;
    protected $fillable     = ['id_405', 'record_405', 'date_405', 'send_date_405', 'dispatched_405', 'template_405', 'data_405'];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}