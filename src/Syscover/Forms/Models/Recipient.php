<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Recipient
 *
 * Model with properties
 * <br><b>[id, record_id, forward, name, email, comments, states]</b>
 *
 * @package     Syscover\Forms\Models
 */

class Recipient extends Model
{
    use Eloquence, Mappable;

	protected $table        = '004_406_recipient';
    protected $primaryKey   = 'id_406';
    public $timestamps      = false;
    protected $fillable     = ['id_406', 'record_id_406', 'forward_406', 'name_406', 'email_406', 'comments_406', 'states_406'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function getRecord()
    {
        return $this->belongsTo('Syscover\Forms\Models\Record', 'record_id_406');
    }
}