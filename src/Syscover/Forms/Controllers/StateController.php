<?php namespace Syscover\Forms\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Forms\Models\State;

/**
 * Class StateController
 * @package Syscover\Forms\Controllers
 */

class StateController extends Controller
{
    protected $routeSuffix  = 'formsState';
    protected $folder       = 'state';
    protected $package      = 'forms';
    protected $indexColumns = ['id_400', 'name_400', ['type' => 'color', 'data' => 'color_400']];
    protected $nameM        = 'name_400';
    protected $model        = State::class;
    protected $icon         = 'fa fa-fire';
    protected $objectTrans  = 'state';

    public function storeCustomRecord($parameters)
    {
        State::create([
            'id_400'        => $this->request->input('id'),
            'name_400'      => $this->request->input('name'),
            'color_400'     => $this->request->input('color')
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        State::where('id_400', $parameters['id'])->update([
            'name_400'  => $this->request->input('name'),
            'color_400'  => $this->request->input('color')
        ]);
    }
}