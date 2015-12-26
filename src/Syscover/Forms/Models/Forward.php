<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Forward
 *
 * Model with properties
 * <br><b>[id, form, name, email, comments, states]</b>
 *
 * @package     Syscover\Forms\Models
 */

class Forward extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '004_402_forward';
    protected $primaryKey   = 'id_402';
    public $timestamps      = false;
    protected $fillable     = ['id_402', 'form_402', 'name_402', 'email_402', 'comments_402', 'states_402'];
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
        return $query->join('004_401_form', '004_402_forward.form_402', '=', '004_401_form.id_401');
    }

    public static function addToGetIndexRecords($parameters)
    {
        return Forward::builder();
    }
}