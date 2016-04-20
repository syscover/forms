@extends('pulsar::layouts.form', ['newTrans' => 'new'])

@section('head')
    @parent
    <!-- form::comment.edit -->
    <script>
        $(document).ready(function() {
            $('#cancel').bind('click', function(){
                parent.$.magnificPopup.close();
            });
        });
    </script>
    <!-- /.form::comment.edit -->
@stop

@section('rows')
    <!-- form::comment.edit -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => $object->id_404,
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.subject'),
        'name' => 'subject',
        'value' => $object->subject_404,
        'readOnly' => true
    ])
    @include('pulsar::includes.html.form_textarea_group', [
        'label' => trans_choice('pulsar::pulsar.comment', 1),
        'name' => 'comment',
        'value' => $object->comment_404,
        'readOnly' => true
    ])
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'ref',
        'value' => $ref
    ])
    <!-- /.form::comment.edit -->
@stop