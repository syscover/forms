@extends('pulsar::layouts.form')

@section('head')
    @parent
    <!-- forms::forms.create -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/magnific-popup.css') }}">
    <script src="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('packages/syscover/pulsar/vendor/jquery.element-table/jquery.element-table.js') }}"></script>
    <!-- /forms::forms.create -->
@stop

@section('rows')
    <!-- forms::forms.create -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => old('id', isset($object)? $object->id_401 : null),
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.name'),
        'name' => 'name',
        'value' => old('name', isset($object)? $object->name_401 : null),
        'maxLength' => '50',
        'rangeLength' => '2,50',
        'required' => true,
        'fieldSize' => 5
    ])
    @include('pulsar::includes.html.form_select_group', [
        'label' => trans('pulsar::pulsar.email'),
        'name' => 'emailAccount',
        'value' => old('emailAccount', isset($object)? $object->email_account_id_401 : null),
        'objects' => $emails,
        'idSelect' => 'id_013',
        'nameSelect' => 'name_013',
        'fieldSize' => 5,
        'required' => true
    ])
    @include('pulsar::includes.html.form_checkbox_group', [
        'label' => trans('forms::pulsar.push_notifications'),
        'name' => 'pushNotification',
        'value' => 1,
        'checked' => old('pushNotification', isset($object)? $object->push_notification_401 : true)
    ])
    @include('pulsar::includes.html.form_section_header', [
        'label' => trans_choice('pulsar::pulsar.forward', 2),
        'icon' => 'fa fa-share'
    ])
    @include('pulsar::includes.html.form_element_table_group', [
        'id' => 'forwards',
        'label' => trans_choice('pulsar::pulsar.forward', 1),
        'icon'  => 'fa fa-share',
        'dataJson'  => isset($forwards)? $forwards : null,
        'thead' => [(object)['class' => null, 'data' => trans('pulsar::pulsar.name')], (object)['class' => null, 'data' => trans('pulsar::pulsar.email')], (object)['class' => 'align-center', 'data' => trans_choice('pulsar::pulsar.comment', 2)], (object)['class' => 'align-center', 'data' => trans_choice('pulsar::pulsar.state', 2)]],
        'tbody' => [
            (object)['include' => 'pulsar::includes.html.form_text_group', 'properties' => ['label' => trans('pulsar::pulsar.name'), 'name' => 'name_402', 'required' => true, 'maxLength' => '100', 'rangeLength' => '2,100']],
            (object)['include' => 'pulsar::includes.html.form_text_group', 'properties' => ['label' => trans('pulsar::pulsar.email'), 'name' => 'email_402', 'type' => 'email', 'required' => true, 'maxLength' => '50', 'rangeLength' => '2,50', 'fieldSize' => 5]],
            (object)['include' => 'pulsar::includes.html.form_checkbox_group', 'class' => 'align-center', 'properties' => ['label' => trans_choice('pulsar::pulsar.comment', 2), 'name' => 'comments_402', 'value' => 1]],
            (object)['include' => 'pulsar::includes.html.form_checkbox_group', 'class' => 'align-center', 'properties' => ['label' => trans_choice('pulsar::pulsar.state', 2), 'name' => 'states_402', 'value' => 1]]
        ]
    ])
    <!-- /forms::forms.create -->
@stop