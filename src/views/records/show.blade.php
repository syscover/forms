@extends('pulsar::layouts.tab', ['tabs' => [['id' => 'box_tab1', 'name' => trans_choice('pulsar::pulsar.record', 1)], ['id' => 'box_tab2', 'name' => trans_choice('pulsar::pulsar.comment', 2)]]])

@section('script')
    @parent
    @include('pulsar::includes.js.datatable_config')
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/magnific-popup.css') }}">

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/jquery.cookie/js.cookie.js') }}"></script>
    <!-- forms::records.show -->
    <script type="text/javascript">
        $(document).ready(function() {

            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    'iDisplayStart' : 0,
                    'aaSorting': [[ 0, "desc" ]],
                    'aoColumnDefs': [
                        { 'bSortable': false, 'aTargets': [3,4]},
                        { 'sClass': 'checkbox-column', 'aTargets': [3]},
                        { 'sClass': 'align-center', 'aTargets': [4]}
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{{ route('jsonDataFormsComment', ['ref' => $object->id_403, 'modal' => 0]) }}"
                }).fnSetFilteringDelay().on('xhr.dt', function (e, settings, json)
                {
                    $('[name="urlTarget"]').val('{{ route('showFormsRecord', ['id' => $object->id_403, 'form' => $form]) }}/' + settings._iDisplayStart + '/0');
                });
            }

            $('.magnific-popup').magnificPopup({
                type: 'iframe',
                removalDelay: 300,
                mainClass: 'mfp-fade'
            });

            // set tab active
            @if($tab == 0)
            $('.tabbable li:eq(0) a').tab('show');
            @elseif($tab == 1)
            $('.tabbable li:eq(1) a').tab('show');
            @endif
        });
    </script>
    <!-- /forms::records.show -->
@stop

@section('box_tab1')
    <!-- forms::records.show -->
    @include('pulsar::includes.html.form_record_header', ['action' => 'show'])
        @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'value' => $object->id_403, 'fieldSize' => 2, 'readOnly' => true])
        @include('pulsar::includes.html.form_text_group', ['label' => trans('forms::pulsar.record_date'), 'name' => 'recordDate', 'value' => date('d-m-Y', $object->record_date_403), 'fieldSize' => 4, 'readOnly' => true])
        @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.subject'), 'name' => 'subject', 'value' => $object->subject_403, 'fieldSize' => 10, 'readOnly' => true,])
        @if(isset($object->company_403))
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.company'), 'name' => 'company', 'value' => $object->company_403, 'fieldSize' => 10, 'readOnly' => true])
        @endif
        @if(isset($object->name_403))
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.name'), 'name' => 'name', 'value' => $object->name_403, 'fieldSize' => 5, 'readOnly' => true])
        @endif
        @if(isset($object->surname_403))
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.surname'), 'name' => 'surname', 'value' => $object->surname_403, 'fieldSize' => 10, 'readOnly' => true])
        @endif
        @if(isset($object->email_403))
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.email'), 'name' => 'email', 'value' => $object->email_403, 'fieldSize' => 5, 'readOnly' => true])
        @endif
        @if(isset($object->date_403))
            @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.date'), 'name' => 'date', 'value' => date('d-m-Y', $object->date_403), 'fieldSize' => 4, 'readOnly' => true])
        @endif
        @foreach(json_decode($object->data_403) as $field)
            @if($field->type == 'text')
                @include('pulsar::includes.html.form_text_group', ['label' => ucfirst($field->name), 'name' => '', 'value' => $field->value, 'fieldSize' => isset($field->length)? $field->length : 10 , 'readOnly' => true])
            @elseif($field->type == 'textarea')
                @include('pulsar::includes.html.form_textarea_group', ['label' => ucfirst($field->name), 'name' => '', 'value' => $field->value, 'labelSize' => 2, 'fieldSize' => 10, 'readOnly' => true])
            @elseif($field->type == 'checkbox')
                @include('pulsar::includes.html.form_checkbox_group', ['label' => ucfirst($field->name), 'name' => '', 'value' => $field->value, 'isChecked' => $field->value, 'disabled' => true])
            @endif
        @endforeach
    @include('pulsar::includes.html.form_record_footer', ['action' => 'show'])
    <!-- /forms::records.show -->
@stop

@section('box_tab2')
    <!-- forms::records.show -->
    <a href="{{ route('createFormsComment', $urlParameters) }}" class="magnific-popup bs-tooltip btn marginB10"><i class="icon-comments"></i> {{ trans('pulsar::pulsar.new') }} {{ trans_choice('pulsar::pulsar.comment', 1) }}</a>
    <div class="widget box">
        <div class="widget-content no-padding">
            <form id="formView" method="post" action="{{ route('deleteSelectFormsComment', $urlParameters) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable-pulsar">
                    <thead>
                    <tr>
                        <th data-hide="expand">{{ trans('pulsar::pulsar.date') }}</th>
                        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.user', 1) }}</th>
                        <th data-hide="phone">{{ trans('pulsar::pulsar.subject') }}</th>
                        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
                        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <input type="hidden" name="nElementsDataTable">
                <input type="hidden" name="urlTarget">
            </form>
        </div>
    </div>
    <!-- /forms::records.show -->
@stop