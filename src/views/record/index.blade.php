@extends('pulsar::layouts.index', ['customTransHeader' => trans_choice($objectTrans, 2) . ': ' . $objForm->name_401])

@section('head')
    @parent
    <!-- forms::records.index -->
    <script>
        $(document).ready(function() {
            if ($.fn.dataTable)
            {
                $('.datatable-pulsar').dataTable({
                    "displayStart": {{ $offset }},
                    "columnDefs": [
                        { "visible": false, "searchable": false, "targets": [2]}, // hidden column 2 and prevents search on column 2
                        { "dataSort": 2, "targets": [3] }, // sort column 3 according hidden column 2 data
                        { "sortable": false, "targets": [8,9]},
                        { "class": "checkbox-column", "targets": [8]},
                        { "class": "align-center", "targets": [1,7,9]}
                    ],
                    "sorting": [[0, "desc"]],
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('jsonData' . ucfirst($routeSuffix), ['form' => $form]) }}",
                        "type": "POST",
                        "headers": {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }
                }).fnSetFilteringDelay();
            }
        });
    </script>
    <!-- /forms::records.index -->
@stop

@section('tHead')
    <!-- forms::records.index -->
    <tr>
        <th data-hide="phone,tablet">ID.</th>
        <th>{{ trans_choice('pulsar::pulsar.state', 1) }}</th>
        <th>{{ trans_choice('pulsar::pulsar.date', 1) }}</th>
        <th data-hide="phone">{{ trans_choice('pulsar::pulsar.date', 1) }}</th>
        <th data-class="expand">{{ trans('pulsar::pulsar.name') }}</th>
        <th data-hide="phone,tablet">{{ trans('pulsar::pulsar.surname') }}</th>
        <th data-hide="phone">{{ trans('pulsar::pulsar.email') }}</th>
        <th data-hide="phone,tablet">{{ trans('pulsar::pulsar.opened') }}</th>
        <th class="checkbox-column"><input type="checkbox" class="uniform"></th>
        <th>{{ trans_choice('pulsar::pulsar.action', 2) }}</th>
    </tr>
    <!-- /forms::records.index -->
@stop