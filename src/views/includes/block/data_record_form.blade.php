<h2>{{ trans('forms::pulsar.record_data') }}</h2>

@if(isset($data->date_text_403))
    <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
        <strong>Fecha:</strong> {{ $data->date_text_403 }}
    </div>
@endif
@if(isset($data->subject_403))
    <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
        <strong>Asunto:</strong> {{ $data->subject_403 }}
    </div>
@endif
@if(isset($data->name_403))
    <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
        <strong>Nombre:</strong> {{ $data->name_403 }}
    </div>
@endif
@if(isset($data->surname_403))
    <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
        <strong>Apellidos:</strong> {{ $data->surname_403 }}
    </div>
@endif
@if(isset($data->company_403))
    <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
        <strong>Empresa:</strong> {{ $data->company_403 }}
    </div>
@endif
@if(isset($data->email_403))
    <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
        <strong>Email:</strong> <a href="mailto:{{ $data->email_403 }}">{{ $data->email_403 }}</a>
    </div>
@endif
@foreach($data->data_403 as $field)
    <div class="formatted_content" style="padding-bottom:19px;padding:0 !important;border:none !important;margin:0 0 5px !important;max-width:none !important">
        <strong>{{ isset($field->label)? $field->label : ucfirst($field->name) }}:</strong> {{ $field->value }}
    </div>
@endforeach