@extends('pulsar::layouts.form', ['action' => 'update', 'newTrans' => 'new', 'modal' => true])

@section('head')
    @parent
    <!-- octopus::comments.edit -->
    <script>
        $(document).ready(function() {
            $('#cancel').bind('click', function(){
                parent.$.magnificPopup.close();
            });
        });
    </script>
    <!-- octopus::comments.edit -->
@stop

@section('rows')
    <!-- octopus::comments.edit -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'value' => $object->id_404, 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.subject'), 'name' => 'subject', 'value' => $object->subject_404, 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    @include('pulsar::includes.html.form_textarea_group', ['label' => trans_choice('pulsar::pulsar.comment', 1), 'name' => 'comment', 'value' => $object->comment_404, 'maxLength' => '100', 'rangeLength' => '2,100'])
    @include('pulsar::includes.html.form_hidden', ['name' => 'ref', 'value' => $ref])
    <!-- /octopus::comments.edit -->
@stop