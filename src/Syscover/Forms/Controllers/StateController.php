<?php namespace Syscover\Forms\Controllers;

/**
 * @package	    Pulsar
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Forms\Models\State;

class StateController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'FormsState';
    protected $folder       = 'state';
    protected $package      = 'forms';
    protected $aColumns     = ['id_400', 'name_400', ['type' => 'color', 'data' => 'color_400']];
    protected $nameM        = 'name_400';
    protected $model        = '\Syscover\Forms\Models\State';
    protected $icon         = 'fa fa-fire';
    protected $objectTrans  = 'state';

    public function storeCustomRecord($request, $parameters)
    {
        State::create([
            'id_400'        => $request->input('id'),
            'name_400'      => $request->input('name'),
            'color_400'     => $request->input('color')
        ]);
    }
    
    public function updateCustomRecord($request, $parameters)
    {
        State::where('id_400', $parameters['id'])->update([
            'name_400'  => $request->input('name'),
            'color_400'  => $request->input('color')
        ]);
    }
}