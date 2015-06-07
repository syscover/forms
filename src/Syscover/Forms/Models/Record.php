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
    protected $fillable     = ['id_403', 'form_403', 'record_date_403', 'state_403', 'subject_403', 'name_403', 'surname_403', 'company_403', 'email_403', 'date_403', 'country_403', 'territorial_area_1_403', 'territorial_area_2_403', 'territorial_area_3_403', 'cp_403', 'locality_403', 'address_403', 'opened_403', 'data_403'];

    private static $rules   = [
        'name'  => 'required|between:2,50',
        'email' => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public static function getCustomRecordsLimit($parameters)
    {
        return Record::where('form_403', $parameters['ref'])->newQuery();
    }

    public function customCount($parameters)
    {
        return Record::where('form_403', $parameters['ref'])->newQuery();
    }
}