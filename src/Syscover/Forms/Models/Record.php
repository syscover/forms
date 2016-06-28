<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Record
 *
 * Model with properties
 * <br><b>[id, form_id, date, date_text, state_id, subject, name, surname, company, email, country_id, territorial_area_1_id, territorial_area_2_id, territorial_area_3_id, opened, data]</b>
 *
 * @package     Syscover\Forms\Models
 */

class Record extends Model
{
    use Eloquence, Mappable;

	protected $table        = '004_403_record';
    protected $primaryKey   = 'id_403';
    public $timestamps      = false;
    protected $fillable     = ['id_403', 'form_id_403', 'date_403', 'date_text_403', 'state_id_403', 'subject_403', 'name_403', 'surname_403', 'company_403', 'email_403', 'country_id_403', 'territorial_area_1_id_403', 'territorial_area_2_id_403', 'territorial_area_3_id_403', 'opened_403', 'data_403'];
    protected $maps         = [];
    protected $relationMaps = [
        'state'      => \Syscover\Forms\Models\State::class,
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
        return $query->leftJoin('004_400_state', '004_403_record.state_id_403', '=', '004_400_state.id_400');
    }

    public function getForm()
    {
        return $this->belongsTo('Syscover\Forms\Models\Form', 'form_id_403');
    }

    public function getState()
    {
        return $this->belongsTo('Syscover\Forms\Models\State', 'state_id_403');
    }

    public function getComments()
    {
        return $this->hasMany('Syscover\Forms\Models\Comment', 'record_id_404');
    }

    public function getRecipients()
    {
        return $this->hasMany('Syscover\Forms\Models\Recipient', 'record_id_406');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        return $this->builder()
            ->where('form_id_403', $parameters['form']);
    }

    public function customCount($request, $parameters)
    {
        return Record::where('form_id_403', $parameters['form']);
    }
}