<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class State
 *
 * Model with properties
 * <br><b>[id, name, color]</b>
 *
 * @package     Syscover\Forms\Models
 */

class State extends Model
{
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