<?php namespace Syscover\Forms\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Record
 *
 * Model with properties
 * <br><b>[id, form, date, date_text, state, subject, name, surname, company, email, country, territorial_area_1, territorial_area_2, territorial_area_3, opened, data]</b>
 *
 * @package     Syscover\Forms\Models
 */

class Record extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '004_403_record';
    protected $primaryKey   = 'id_403';
    public $timestamps      = false;
    protected $fillable     = ['id_403', 'form_403', 'date_403', 'date_text_403', 'state_403', 'subject_403', 'name_403', 'surname_403', 'company_403', 'email_403', 'country_403', 'territorial_area_1_403', 'territorial_area_2_403', 'territorial_area_3_403', 'opened_403', 'data_403'];
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
        return $query->leftJoin('004_400_state', '004_403_record.state_403', '=', '004_400_state.id_400');
    }

    public function getForm()
    {
        return $this->belongsTo('Syscover\Forms\Models\Form', 'form_403');
    }

    public function getState()
    {
        return $this->belongsTo('Syscover\Forms\Models\State', 'state_403');
    }

    public function getComments()
    {
        return $this->hasMany('Syscover\Forms\Models\Comment', 'record_404');
    }

    public function getRecipients()
    {
        return $this->hasMany('Syscover\Forms\Models\Recipient', 'record_406');
    }

    public static function addToGetRecordsLimit($parameters)
    {
        return Record::builder()
            ->where('form_403', $parameters['form']);
    }

    public function customCount($parameters)
    {
        return Record::where('form_403', $parameters['form']);
    }
}