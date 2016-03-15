<li{!! Miscellaneous::setCurrentOpenPage(['forms-state','forms-form','forms-record','forms-preference']) !!}>
    <a href="javascript:void(0)"><i class="icomoon-icon-drawer-3"></i>Forms</a>
    <ul class="sub-menu">
        @if(session('userAcl')->allows('forms-form', 'access'))
            <li{!! Miscellaneous::setCurrentPage(['forms-form', 'forms-record']) !!}><a href="{{ route('formsForm') }}"><i class="fa fa-file-text-o"></i>{{ trans_choice('pulsar::pulsar.form', 2) }}</a></li>
        @endif
        @if(session('userAcl')->allows('forms-state', 'access') || session('userAcl')->allows('forms-preference', 'access'))
        <li{!! Miscellaneous::setCurrentOpenPage(['forms-state','forms-preference']) !!}>
            <a href="javascript:void(0)"><i class="icomoon-icon-grid"></i>{{ trans('pulsar::pulsar.master_tables') }}</a>
            <ul class="sub-menu" >
                @if(session('userAcl')->allows('forms-state', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('forms-state') !!}><a href="{{ route('formsState') }}"><i class="fa fa-fire"></i>{{ trans_choice('pulsar::pulsar.state', 2) }}</a></li>
                @endif
                @if(session('userAcl')->allows('forms-preference', 'access'))
                    <li{!! Miscellaneous::setCurrentPage('forms-preference') !!}><a href="{{ route('formsPreference') }}"><i class="fa fa-cog"></i>{{ trans_choice('pulsar::pulsar.preference', 2) }}</a></li>
                @endif
            </ul>
        </li>
        @endif
    </ul>
</li>