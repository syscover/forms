@extends('pulsar::layouts.form', ['action' => 'store', 'newTrans' => 'new', 'modal' => true])

@section('head')
    @parent
    <!-- form::comments.create -->
    <script>
        $(document).ready(function() {
            $('#cancel').bind('click', function(){
                parent.$.magnificPopup.close();
            });
        });
    </script>
    <!-- form::comments.create -->
@stop

@section('rows')
    <!-- form::comments.create -->
    @include('pulsar::includes.html.form_text_group', ['label' => 'ID', 'name' => 'id', 'readOnly' => true, 'fieldSize' => 2])
    @include('pulsar::includes.html.form_text_group', ['label' => trans('pulsar::pulsar.subject'), 'name' => 'subject', 'value' => old('subject'), 'maxLength' => '255', 'rangeLength' => '2,255', 'required' => true])
    @include('pulsar::includes.html.form_textarea_group', ['label' => trans_choice('pulsar::pulsar.comment', 1), 'name' => 'comment', 'value' => old('comment'), 'maxLength' => '100', 'rangeLength' => '2,100'])
    @include('pulsar::includes.html.form_hidden', ['name' => 'ref', 'value' => $ref])
    <!-- /.form::comments.create -->
@stop