<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class State
 *
 * Model with properties
 * <br><b>[id, name, color]</b>
 *
 * @package     Syscover\Forms\Models
 */

class State extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '004_400_state';
    protected $primaryKey   = 'id_400';
    public $timestamps      = false;
    protected $fillable     = ['id_400', 'name_400', 'color_400'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}