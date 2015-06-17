<?php namespace Syscover\Forms\Models;

/*
 * @package	    Pulsar
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\ModelTrait;

class Record extends Model {

    use ModelTrait;

	protected $table        = '004_403_record';
    protected $primaryKey   = 'id_403';
    public $timestamps      = false;
    protected $fillable     = ['id_403', 'form_403', 'date_403', 'text_date_403', 'state_403', 'subject_403', 'name_403', 'surname_403', 'company_403', 'email_403', 'country_403', 'territorial_area_1_403', 'territorial_area_2_403', 'territorial_area_3_403', 'opened_403', 'data_403'];

    private static $rules   = [
        'name'  => 'required|between:2,50',
        'email' => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function form()
    {
        return $this->belongsTo('Syscover\Forms\Models\Form', 'form_403');
    }

    public function state()
    {
        return $this->belongsTo('Syscover\Forms\Models\State', 'state_403');
    }

    public function comments()
    {
        return $this->hasMany('Syscover\Forms\Models\Comment', 'record_404');
    }

    public static function getCustomRecordsLimit($parameters)
    {
        return Record::leftJoin('004_400_state', '004_403_record.state_403', '=', '004_400_state.id_400')
            ->where('form_403', $parameters['form'])->newQuery();
    }

    public function customCount($parameters)
    {
        return Record::where('form_403', $parameters['form'])->newQuery();
    }
}