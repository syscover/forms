<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=10.0,initial-scale=1.0">
    <style data-immutable>
        @media only screen and (max-device-width: 480px){
            div[class="padded"]{padding:16px !important}
            td[class="icon"]{display:none !important}
            div[class*="limits"]{padding:20px !important}
            div[class*="limits"] p[class="discount"]{margin:0 0 20px !important}
            div[class*="limits"] td[class="avatar"]{display:none}
            td[class="content_body"]{padding:10px 0 0 !important}
            td[class="main_body"]{padding:15px 0 20px !important}
            p[class="small"],a[class="caption"]{font-size:13px !important;line-height:15px !important}
            table.class_invitation{width:100% !important}
            table.class_invitation .header_image{width:100% !important}
            table.class_invitation .box{padding:15px !important}
        }
        div[class="padded"] { padding: 10px 25px; }
    </style>
</head>
<body marginheight="0" topmargin="0" marginwidth="0" leftmargin="0" padding="0" margin="0" style="background:#ffffff;text-align:left;margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%">
    <div class="padded" style="font-weight:400;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%">
        <table cellspacing="0" cellpadding="0" class="layout" style="border-spacing:0;background:#ffffff;margin:0;padding:0;border-collapse:collapse;text-align:left;border:0;width:100%"><tr>
                <td style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:#000000;padding:0;border-spacing:0;border-collapse:collapse'>
                    <table cellspacing="0" cellpadding="0" class="layout" style="border-spacing:0;background:#ffffff;margin:0;padding:0;border-collapse:collapse;text-align:left;border:0;width:100%">
                        <tr>
                            <td style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:#000000;padding:0;border-spacing:0;border-collapse:collapse'>
                                <p class="small grey" style='font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:grey;font-size:12px;line-height:15px;margin:0 0 15px'>
                                    {{ trans('forms::pulsar.actions_email_record') }}, <a href="#">{{ trans('forms::pulsar.view_on_forms') }}</a> {{ trans('forms::pulsar.or') }} <a href="">{{ trans('forms::pulsar.create_comment') }}</a> {{ trans('forms::pulsar.or') }} <a href="">{{ trans('forms::pulsar.change_state') }}</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="main_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:20px 0'>
                                <table cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;margin:0;padding:0;border:0;text-align:left;border-collapse:collapse;border-spacing:0">
                                    <tr>
                                        <td class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important;'>
                                            {{ trans('forms::pulsar.form_received') }}, <strong>XXNOMBRE FORMULARIOXX</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="100%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="header_body brown" valign="middle" width="100%" style='background:#ffffff;text-align:left;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;border-collapse:collapse;padding:0;border-spacing:0;vertical-align:middle;padding-left:10px;width:auto !important'>
                                            <strong style="color:brown;">{{ trans('forms::pulsar.state_record') }}:</strong> <strong>XXEN PROCESOXX</strong> <span style="width: 45px; height: 45px; border: 1px solid #cccccc; background-color: #cc3d3d">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="content_body" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;border-collapse:collapse;color:#000000;border-spacing:0;font-family:"Helvetica Neue",helvetica,arial,sans-serif;padding:0 0 0 55px'>
                                            <h2>{{ trans('forms::pulsar.record_data') }}</h2>

                                            @if(isset($text_date_403))
                                                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                                                    <strong>Fecha:</strong> {{ $text_date_403 }}
                                                </div>
                                            @endif
                                            @if(isset($subject_403))
                                                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                                                    <strong>Asunto:</strong> {{ $subject_403 }}
                                                </div>
                                            @endif
                                            @if(isset($name_403))
                                            <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                                                <strong>Nombre:</strong> {{ $name_403 }}
                                            </div>
                                            @endif
                                            @if(isset($surname_403))
                                                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                                                    <strong>Apellidos:</strong> {{ $surname_403 }}
                                                </div>
                                            @endif
                                            @if(isset($company_403))
                                                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                                                    <strong>Empresa:</strong> {{ $company_403 }}
                                                </div>
                                            @endif
                                            @if(isset($email_403))
                                                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                                                    <strong>Email:</strong> <a href="mailto:{{ $email_403 }}">{{ $email_403 }}</a>
                                                </div>
                                            @endif
                                            @foreach($data_403 as $data)
                                                <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
                                                    <strong>{{ $data['name'] }}:</strong> {{ $data['value'] }}
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:#000000;padding:0;border-spacing:0;border-collapse:collapse'>
                                <p class="small grey" style='font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:grey;font-size:12px;line-height:15px;margin:0 0 15px'>
                                    {{ trans('forms::pulsar.actions_email_record') }}, <a href="#">{{ trans('forms::pulsar.view_on_forms') }}</a> {{ trans('forms::pulsar.or') }} <a href="">{{ trans('forms::pulsar.create_comment') }}</a> {{ trans('forms::pulsar.or') }} <a href="">{{ trans('forms::pulsar.change_state') }}</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:#000000;padding:0;border-spacing:0;border-collapse:collapse'>
                                <p class="small grey footer" style='font-family:"Helvetica Neue",helvetica,arial,sans-serif;line-height:15px;color:grey;font-size:12px;margin:0 0 15px;margin-bottom:8px'>
                                    {{ trans('forms::pulsar.sent_to') }} Jose Carlos Rodríguez Palacín, Octavio Molano, Sol del Yerro, Rafael ausejo, Cristina  Alonso Martin , and Marta Sanz.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="subscription_footer" style='background:#ffffff;text-align:left;vertical-align:top;font-size:15px;line-height:19px;font-family:"Helvetica Neue",helvetica,arial,sans-serif;color:#000000;padding:0;border-spacing:0;border-collapse:collapse'>
                                <p class="message small grey footer" style='font-family:"Helvetica Neue",helvetica,arial,sans-serif;margin:0 0 15px;line-height:15px;font-size:12px;color:grey;margin-bottom:8px;border-top:1px solid #ddd;margin-top:10px;padding-top:15px'>
                                    <a href="#" style="color:grey">{{ trans('forms::pulsar.stop_email_form') }}</a> {{ trans('forms::pulsar.stop_email_form2') }}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>