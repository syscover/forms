<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Message
 *
 * Model with properties
 * <br><b>[id, type, record, date, send_date, dispatched, forward, name, email, form, name_form, name_state, color_state, names, user, permission_state, permission_comment, permission_forward, permission_record, template, text_template, data]</b>
 *
 * @package     Syscover\Forms\Models
 */

class Message extends Model
{
    use Eloquence, Mappable;

	protected $table        = '004_405_message';
    protected $primaryKey   = 'id_405';
    public $timestamps      = false;
    protected $fillable     = ['id_405', 'type_405', 'record_405', 'date_405', 'send_date_405', 'dispatched_405', 'forward_405', 'name_405', 'email_405', 'form_405', 'name_form_405', 'name_state_405', 'color_state_405', 'names_405', 'user_405', 'permission_state_405', 'permission_comment_405', 'permission_forward_405', 'permission_record_405', 'template_405', 'text_template_405', 'data_405'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}