<?php namespace Syscover\Forms\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Forms\Models\State;

/**
 * Class StateController
 * @package Syscover\Forms\Controllers
 */

class StateController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'formsState';
    protected $folder       = 'state';
    protected $package      = 'forms';
    protected $aColumns     = ['id_400', 'name_400', ['type' => 'color', 'data' => 'color_400']];
    protected $nameM        = 'name_400';
    protected $model        = State::class;
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