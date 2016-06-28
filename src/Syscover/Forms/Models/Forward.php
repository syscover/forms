<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Forward
 *
 * Model with properties
 * <br><b>[id, form_id, name, email, comments, states]</b>
 *
 * @package     Syscover\Forms\Models
 */

class Forward extends Model
{
    use Eloquence, Mappable;

	protected $table        = '004_402_forward';
    protected $primaryKey   = 'id_402';
    public $timestamps      = false;
    protected $fillable     = ['id_402', 'form_id_402', 'name_402', 'email_402', 'comments_402', 'states_402'];
    protected $maps         = [];
    protected $relationMaps = [
        'form'      => \Syscover\Forms\Models\Form::class,
    ];
    private static $rules   = [
        'name'  => 'required|between:2,50',
        'email' => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('004_401_form', '004_402_forward.form_id_402', '=', '004_401_form.id_401');
    }
}