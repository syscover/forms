@extends('pulsar::layouts.tab', [
    'tabs' => [
        ['id' => 'box_tab1', 'name' => trans_choice('pulsar::pulsar.record', 1)],
        ['id' => 'box_tab2', 'name' => trans_choice('pulsar::pulsar.comment', 2)]
    ]
])

@section('head')
    @parent

    <!-- forms::records.show -->
    <link rel="stylesheet" href="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/magnific-popup.css') }}">

    <script src="{{ asset('packages/syscover/pulsar/vendor/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    @include('pulsar::includes.js.messages')
    @include('pulsar::includes.js.datatable_config')

    <script>
        $(document).ready(function() {

            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": 0,
                    "sorting": [[0, "desc"]],
                    "columnDefs": [
                        { "sortable": false, "targets": [3,4]},
                        { "class": "checkbox-column", "targets": [3]},
                        { "class": "align-center", "targets": [4]}
                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('jsonDataFormsComment', ['ref' => $object->id_403, 'modal' => 0]) }}",
                        "type": "POST",
                        "headers": {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }
                }).fnSetFilteringDelay().on('xhr.dt', function (e, settings, json) {

                    // set url to call from modal when submit any action
                    var url = '{{ route('showFormsRecord', ['id' => $object->id_403, 'form' => $form, 'offset' => '%offset%', 'tab' => 0]) }}'

                    console.log(settings);

                    $('[name="urlTarget"]').val(url.replace('%offset%', settings._iDisplayStart))

                })
            }

            $("#selectState").select2({
                templateResult: formatState,
                templateSelection: formatState,
                minimumResultsForSearch: -1
            }).on('change', function() {
                $.ajax({
                    url: '{{ route('jsonSetStateFormsRecord') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        record: '{{ $object->id_403 }}',
                        value: this.value
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(response)
                    {
                        new PNotify({
                            type:   'success',
                            title:  '{{ trans('pulsar::pulsar.action_successful') }}',
                            text:   '{{ trans('forms::pulsar.message_change_state') }}',
                            opacity: .9,
                            styling: 'fontawesome'
                        })
                    }
                })
            })

            $('.magnific-popup').magnificPopup({
                type: 'iframe',
                removalDelay: 300,
                mainClass: 'mfp-fade'
            })

            // set tab active
            $('.tabbable li:eq({{ $tab }}) a').tab('show')

            // new comment
            @if(isset($newComment) && $newComment)
                $('.magnific-popup').magnificPopup('open')
            @endif
        })

        function formatState(option)
        {
            if (!option.id) { return option.text }
            var $option = $(
                '<span><i class="color" style="background-color:' + $(option.element).data('color') + '"></i>' + ' ' + option.text + '</span>'
            )
            return $option
        }
    </script>
    <!-- /forms::records.show -->
@stop

@section('box_tab1')
    <!-- forms::records.show -->
    @include('pulsar::includes.html.form_record_header')

        @include('pulsar::includes.html.form_text_group', [
            'label' => 'ID',
            'name' => 'id',
            'value' => $object->id_403,
            'fieldSize' => 2,
            'readOnly' => true
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans('forms::pulsar.record_date'),
            'name' => 'recordDate',
            'value' => date(config('pulsar.datePattern'), $object->date_403),
            'fieldSize' => 4,
            'readOnly' => true
        ])
        @include('pulsar::includes.html.form_text_group', [
            'label' => trans('pulsar::pulsar.subject'),
            'name' => 'subject',
            'value' => $object->subject_403,
            'fieldSize' => 10,
            'readOnly' => true
        ])
        @if(isset($object->company_403))
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans_choice('pulsar::pulsar.company', 1),
                'name' => 'company',
                'value' => $object->company_403,
                'fieldSize' => 10,
                'readOnly' => true
            ])
        @endif
        @if(isset($object->name_403))
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.name'),
                'name' => 'name',
                'value' => $object->name_403,
                'fieldSize' => 5,
                'readOnly' => true
            ])
        @endif
        @if(isset($object->surname_403))
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.surname'),
                'name' => 'surname',
                'value' => $object->surname_403,
                'fieldSize' => 10,
                'readOnly' => true
            ])
        @endif
        @if(isset($object->email_403))
            @include('pulsar::includes.html.form_text_group', [
                'label' => trans('pulsar::pulsar.email'),
                'name' => 'email',
                'value' => $object->email_403,
                'fieldSize' => 5,
                'readOnly' => true
            ])
        @endif
        @foreach(json_decode($object->data_403) as $field)
            @if($field->type == 'text' || $field->type == 'select-one'|| $field->type == 'select-multiple' || $field->type == 'hidden' || $field->type == 'tel' || $field->type == 'email')
                @include('pulsar::includes.html.form_text_group', [
                    'label' => isset($field->label)? $field->label : ucfirst($field->name),
                    'name' => '',
                    'value' => $field->value,
                    'fieldSize' => isset($field->length)? $field->length : 10 ,
                    'readOnly' => true
                ])
            @elseif($field->type == 'textarea')
                @include('pulsar::includes.html.form_textarea_group', [
                    'label' => isset($field->label)? $field->label : ucfirst($field->name),
                    'name' => '',
                    'value' => $field->value,
                    'labelSize' => 2,
                    'fieldSize' => 10,
                    'readOnly' => true
                ])
            @elseif($field->type == 'checkbox')
                @include('pulsar::includes.html.form_checkbox_group', [
                    'label' => isset($field->label)? $field->label : ucfirst($field->name),
                    'name' => '',
                    'value' => $field->value,
                    'checked' => $field->value,
                    'disabled' => true
                ])
            @endif
        @endforeach

    @include('pulsar::includes.html.form_record_footer')
    <!-- /.forms::records.show -->
@stop

@section('box_tab2')
    <!-- forms::records.show -->
    <a href="{{ route('createFormsComment', $urlParameters) }}" class="magnific-popup bs-tooltip btn margin-b10 fl"><i class="fa fa-comments"></i> {{ trans('pulsar::pulsar.new') }} {{ trans_choice('pulsar::pulsar.comment', 1) }}</a>
    <div id="select2-records" class="fr col-xs-6 col-md-4">
        <select id="selectState" data-width="100%">
            @foreach($states as $state)
                <option value="{{ $state->id_400 }}" data-color="{{ $state->color_400 }}"{{ $state->id_400 == $object->state_403? ' selected' : null }}>{{ $state->name_400 }}</option>
            @endforeach
        </select>
    </div>
    <div class="widget box">
        <div class="widget-content no-padding">
            <form id="formView" method="post" action="{{ route('deleteSelectFormsComment', $urlParameters) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">
                <table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable-pulsar">
                    <thead>
                    <tr>
                        <th data-hide="expand">{{ trans_choice('pulsar::pulsar.date', 1) }}</th>
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
    <!-- /.forms::records.show -->
@stop