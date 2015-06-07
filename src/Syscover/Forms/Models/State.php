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

class State extends Model {

    use ModelTrait;

	protected $table        = '004_400_state';
    protected $primaryKey   = 'id_400';
    public $timestamps      = false;
    protected $fillable     = ['id_400', 'name_400', 'color_400'];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}