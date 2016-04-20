<li{!! is_current_resource(['forms-state','forms-form','forms-record','forms-preference']) !!}>
    <a href="javascript:void(0)"><i class="icomoon-icon-drawer-3"></i>Forms</a>
    <ul class="sub-menu">
        @if(is_allowed('forms-form', 'access'))
            <li{!! is_current_resource(['forms-form', 'forms-record']) !!}><a href="{{ route('formsForm') }}"><i class="fa fa-file-text-o"></i>{{ trans_choice('pulsar::pulsar.form', 2) }}</a></li>
        @endif
        @if(is_allowed('forms-state', 'access') || is_allowed('forms-preference', 'access'))
        <li{!! is_current_resource(['forms-state','forms-preference'], true) !!}>
            <a href="javascript:void(0)"><i class="icomoon-icon-grid"></i>{{ trans('pulsar::pulsar.master_tables') }}</a>
            <ul class="sub-menu" >
                @if(is_allowed('forms-state', 'access'))
                    <li{!! is_current_resource('forms-state') !!}><a href="{{ route('formsState') }}"><i class="fa fa-fire"></i>{{ trans_choice('pulsar::pulsar.state', 2) }}</a></li>
                @endif
                @if(is_allowed('forms-preference', 'access'))
                    <li{!! is_current_resource('forms-preference') !!}><a href="{{ route('formsPreference') }}"><i class="fa fa-cog"></i>{{ trans_choice('pulsar::pulsar.preference', 2) }}</a></li>
                @endif
            </ul>
        </li>
        @endif
    </ul>
</li>