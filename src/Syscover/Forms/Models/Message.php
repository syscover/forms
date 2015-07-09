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

class Message extends Model {

    use TraitModel;

	protected $table        = '004_405_message';
    protected $primaryKey   = 'id_405';
    public $timestamps      = false;
    protected $fillable     = ['id_405', 'type_405', 'record_405', 'date_405', 'send_date_405', 'dispatched_405', 'forward_405', 'name_405', 'email_405', 'form_405', 'name_form_405', 'name_state_405', 'color_state_405', 'names_405', 'user_405', 'permission_state_405', 'permission_comment_405', 'permission_forward_405', 'permission_record_405', 'template_405', 'text_template_405', 'data_405'];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}