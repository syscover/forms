@extends('pulsar::layouts.form', ['action' => 'store'])

@section('script')
    @parent
    <link href="{{ asset('packages/syscover/pulsar/vendor/colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
@stop

@section('rows')
    <!-- forms::states.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name'), 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true])
    @include('pulsar::includes.html.form_colorpicker_group', ['label' => trans_choice('pulsar::pulsar.color', 1), 'name' => 'color', 'value' => Input::old('color', '#ff0000'), 'required' => true])
    <!-- /forms::states.create -->
@stop