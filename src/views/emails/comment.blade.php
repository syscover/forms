@extends('forms::layouts.mail')

@section('mainContent')
<table cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;margin:0;padding:0;border:0;text-align:left;border-collapse:collapse;border-spacing:0">
    <tr>
        <td class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important;'>
            {{ trans('forms::pulsar.form_comment') }}, <strong>{{ $dataTextMessage->name_form_405 }}</strong>
        </td>
    </tr>
    <tr>
        <td width="100%">&nbsp;</td>
    </tr>
    <tr>
        <td class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important'>
            <strong style="color:brown;">{{ trans('forms::pulsar.comment') }}</strong>
        </td>
    </tr>
    <tr>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            <br>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>Autor:</strong> {{ $dataTextMessage->author_comment_405 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>Fecha:</strong> {{ $dataTextMessage->date_comment_405 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>Asunto:</strong> {{ $dataTextMessage->subject_comment_405 }}
            </div>
            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                <strong>Comentario:</strong> {!! nl2br($dataTextMessage->comment_405) !!}
            </div>
        </td>
    </tr>
    <tr>
        <td width="100%">&nbsp;</td>
    </tr>
    <tr>
        <td class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important'>
            <strong style="color:brown;">{{ trans('forms::pulsar.state_record') }}:</strong> <strong>{{ $dataTextMessage->name_state_405 }}</strong> <span style="width: 45px; height: 45px; background-color: {{ $dataTextMessage->color_state_405 }}">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </td>
    </tr>
    <tr>
        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
            @include('forms::includes.block.data_record_form')
        </td>
    </tr>
</table>
@stop
