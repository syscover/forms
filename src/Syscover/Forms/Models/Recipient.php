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

class Recipient extends Model {

    use ModelTrait;

	protected $table        = '004_406_recipient';
    protected $primaryKey   = 'id_406';
    public $timestamps      = false;
    protected $fillable     = ['id_406', 'record_406', 'forward_406', 'name_406', 'email_406', 'comments_406', 'states_406'];

    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function record()
    {
        return $this->belongsTo('Syscover\Forms\Models\Record', 'record_406');
    }
}