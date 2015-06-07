@extends('pulsar::layouts.form', ['action' => 'store'])

@section('script')
    @parent
    <!-- forms::forms.create -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/magnific-popup.css') }}">
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.element-table/jquery.element-table.js') }}"></script>
    <!-- /forms::forms.create -->
@stop

@section('rows')
    <!-- forms::forms.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => Input::old('name'), 'maxLength' => '50', 'rangeLength' => '2,50', 'required' => true, 'fieldSize' => 5])
    @include('pulsar::includes.html.form_select_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => Input::old('email'), 'objects' => $emails, 'idSelect' => 'id_013', 'nameSelect' => 'name_013', 'class' => 'form-control', 'fieldSize' => 5, 'required' => true])
    @include('pulsar::includes.html.form_checkbox_group', ['label' => trans('forms::pulsar.push_notifications'), 'name' => 'push', 'value' => 1, 'isChecked' => Input::old('push')])
    @include('pulsar::includes.html.form_section_header', ['label' => trans_choice('pulsar::pulsar.forward', 2), 'icon' => 'icon-share-alt'])
    @include('pulsar::includes.html.form_element_table_group', [
        'id' => 'forwards',
        'label' => trans_choice('pulsar::pulsar.forward', 1),
        'icon'  => 'icon-share-alt',
        'thead' => [(object)['class' => null, 'data' => trans('pulsar::pulsar.name')], (object)['class' => null, 'data' => trans('pulsar::pulsar.email')]],
        'tbody' => [
                (object)['include' => 'pulsar::includes.html.form_text_group', 'properties' => ['label' => trans('pulsar::pulsar.name'), 'name' => 'name_402', 'required' => true, 'maxLength' => '100', 'rangeLength' => '2,100']],
                (object)['include' => 'pulsar::includes.html.form_text_group', 'properties' => ['label' => trans('pulsar::pulsar.email'), 'name' => 'email_402', 'type' => 'email', 'required' => true, 'maxLength' => '50', 'rangeLength' => '2,50', 'fieldSize' => 5]]
            ]
        ])
    <!-- /forms::forms.create -->
@stop