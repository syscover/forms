<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Form
 *
 * Model with properties
 * <br><b>[id, name, email_account, push_notification]</b>
 *
 * @package     Syscover\Forms\Models
 */

class Form extends Model
{
    use Eloquence, Mappable;

	protected $table        = '004_401_form';
    protected $primaryKey   = 'id_401';
    public $timestamps      = false;
    protected $fillable     = ['id_401', 'name_401', 'email_account_401', 'push_notification_401'];
    protected $maps         = [];
    protected $relationMaps = [
        'email_account'      => \Syscover\Pulsar\Models\EmailAccount::class,
    ];
    private static $rules   = [
        'name'          => 'required|between:2,50',
        'emailAccount'  => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('001_013_email_account', '004_401_form.email_account_401', '=', '001_013_email_account.id_013');
    }

    public function getForwards()
    {
        return Form::hasMany('Syscover\Forms\Models\Forward','form_402');
    }
}