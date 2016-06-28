@if($dataTextMessage->permission_record_405 || $dataTextMessage->permission_comment_405 || $dataTextMessage->permission_state_405)
    <tr>
        <td style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:#000000;padding:0;border-spacing:0;border-collapse:collapse'>
            <p class="small grey" style='font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:grey;font-size:12px;line-height:15px;margin:0 0 15px'>
                {{ trans('forms::pulsar.actions_email_record') }},
                @if($dataTextMessage->permission_record_405)
                    <a href="{{ route('showFormsRecord', ['id' => $dataMessage->record_id_405, 'form' => $dataMessage->form_id_405, 'offset' => 0, 'tab' => 1]) }}">{{ trans('forms::pulsar.view_on_forms') }}</a> @if($dataTextMessage->permission_comment_405 || $dataTextMessage->permission_state_405) {{ trans('forms::pulsar.or') }} @endif
                    <a href="{{ route('formsRecord', ['form' => $dataMessage->form_id_405, 'offset' => 0]) }}">{{ trans('forms::pulsar.view_all_records') }}</a> @if($dataTextMessage->permission_comment_405 || $dataTextMessage->permission_state_405) {{ trans('forms::pulsar.or') }} @endif
                @endif
                @if($dataTextMessage->permission_comment_405)
                    <a href="{{ route('showFormsRecord', ['id' => $dataMessage->record_id_405, 'form' => $dataMessage->form_id_405, 'offset' => 0, 'tab' => 0, 'newComment' => 1]) }}">{{ trans('forms::pulsar.create_comment') }}</a> @if($dataTextMessage->permission_state_405) {{ trans('forms::pulsar.or') }} @endif
                @endif
                @if($dataTextMessage->permission_state_405)
                    <a href="{{ route('showFormsRecord', ['id' => $dataMessage->record_id_405, 'form' => $dataMessage->form_id_405, 'offset' => 0, 'tab' => 0]) }}">{{ trans('forms::pulsar.change_state') }}</a>
                @endif
            </p>
        </td>
    </tr>
@endif