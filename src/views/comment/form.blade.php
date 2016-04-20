@extends('pulsar::layouts.form')

@section('head')
    @parent
    <!-- form::comment.form -->
    <script>
        $(document).ready(function() {
            $('#cancel').bind('click', function(){
                parent.$.magnificPopup.close();
            });
        });
    </script>
    <!-- /.form::comment.form -->
@stop

@section('rows')
    <!-- form::comment.form -->
    @include('pulsar::includes.html.form_text_group', [
        'label' => 'ID',
        'name' => 'id',
        'value' => isset($object->id_404)? $object->id_404 : null,
        'readOnly' => true,
        'fieldSize' => 2
    ])
    @include('pulsar::includes.html.form_text_group', [
        'label' => trans('pulsar::pulsar.subject'),
        'name' => 'subject',
        'value' => isset($object->subject_404)? $object->subject_404 : null,
        'maxLength' => '255',
        'rangeLength' => '2,255',
        'required' => true
    ])
    @include('pulsar::includes.html.form_textarea_group', [
        'label' => trans_choice('pulsar::pulsar.comment', 1),
        'name' => 'comment',
        'value' => isset($object->comment_404)? $object->comment_404 : null
    ])
    @include('pulsar::includes.html.form_hidden', [
        'name' => 'ref',
        'value' => $ref
    ])
    <!-- /.form::comment.form -->
@stop