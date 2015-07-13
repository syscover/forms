@extends('pulsar::layouts.form', ['action' => 'store', 'newTrans' => 'new', 'modal' => true])

@section('script')
    @parent
    <!-- octopus::comments.create -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cancel').bind('click', function(){
                parent.$.magnificPopup.close();
            });
        });
    </script>
    <!-- octopus::comments.create -->
@stop

@section('rows')
    <!-- octopus::comments.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.subject'), 'name' => 'subject', 'value' => Input::old('subject'), 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    @include('pulsar::includes.html.form_textarea_group', ['label' => trans_choice('pulsar::pulsar.comment', 1), 'name' => 'comment', 'value' => Input::old('comment'), 'maxLength' => '100', 'rangeLength' => '2,100'])
    @include('pulsar::includes.html.form_hidden', ['name' => 'ref', 'value' => $ref])
    <!-- /octopus::comments.create -->
@stop