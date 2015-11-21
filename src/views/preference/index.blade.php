@extends('pulsar::layouts.form', ['action' => 'update', 'cancelButton' => false])

@section('script')
    @parent
    <!-- forms::preferences.index -->
    <link href="{{ asset('packages/syscover/pulsar/vendor/pnotify/pnotify.custom.min.css') }}" type="text/css" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('packages/syscover/pulsar/vendor/pnotify/pnotify.custom.min.js') }}"></script>
    @include('pulsar::includes.js.success_message')

    <script type="text/javascript">
        $(document).ready(function() {
            $(".custom-select2").select2({
                templateResult: formatState,
                templateSelection: formatState,
                minimumResultsForSearch: -1
            });
        });

        function formatState(option)
        {
            if (!option.id) { return option.text; }
            var $option = $(
                    '<span><i class="color" style="background-color:' + $(option.element).data('color') + '"></i>' + ' ' + option.text + '</span>'
            );
            return $option;
        };
    </script>
    <!-- /forms::preferences.index -->
@stop

@section('rows')
    <!-- forms::preferences.index -->
    @include('pulsar::includes.html.form_select_group', ['label' => trans_choice('pulsar::pulsar.state', 1), 'name' => 'defaultState', 'value' => (int)$defaultState->value_018, 'objects' => $states, 'idSelect' => 'id_400', 'nameSelect' => 'name_400', 'class' => 'form-control custom-select2', 'fieldSize' => 5, 'required' => true, 'dataOption' => ['color' => 'color_400']])
    @include('pulsar::includes.html.form_select_group', ['label' => trans('forms::pulsar.notifications_account'), 'name' => 'notificationsAccount', 'value' => (int)$notificationsAccount->value_018, 'objects' => $accounts, 'idSelect' => 'id_013', 'nameSelect' => 'name_013', 'class' => 'form-control', 'fieldSize' => 5, 'required' => true])
    <!-- /forms::preferences.index -->
@stop