@extends('pulsar::layouts.form', ['action' => 'update'])

@section('script')
    @parent
    <link href="{{ asset('packages/syscover/pulsar/vendor/colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
@stop

@section('rows')
    <!-- forms::states.edit -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'value' => $object->id_400, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_400, 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true])
    @include('pulsar::includes.html.form_colorpicker_group', ['label' => trans_choice('pulsar::pulsar.color', 1), 'name' => 'color', 'value' => $object->color_400, 'required' => true])
    <!-- /forms::states.edit -->
@stop