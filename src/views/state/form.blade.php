@extends('pulsar::layouts.form')

@section('head')
    @parent
    <!-- forms::states.create -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <script src="{{ asset('packages/syscover/pulsar/vendor/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- /forms::states.create -->
@stop

@section('rows')
    <!-- forms::states.create -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => old('id', isset($object)? $object->id_400 : null),
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object)? $object->name_400 : null),
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    @include('pulsar::includes.html.form_colorpicker_group', [
        'label' => trans_choice('pulsar::pulsar.color', 1),
        'fieldSize' => 5,
        'name' => 'color',
        'value' => old('color', isset($object)? $object->color_400 : '#ff0000'),
        'required' => true
    ])
    <!-- /forms::states.create -->
@stop