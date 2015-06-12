        <li{!! Miscellaneous::setCurrentOpenPage(['forms-state','forms-form','forms-record','forms-preference']) !!}>
            <a href="javascript:void(0);"><i class="icomoon-icon-drawer-3"></i>Forms</a>
            <ul class="sub-menu">
                @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'forms-form', 'access'))
                    <li{!! Miscellaneous::setCurrentPage(['forms-form', 'forms-record']) !!}><a href="{{ route('FormsForm') }}"><i class="icon-file-text-alt"></i>{{ trans_choice('pulsar::pulsar.form', 2) }}</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['forms-state','forms-preference']) !!}>
                    <a href="javascript:void(0);"><i class="icomoon-icon-grid"></i>{{ trans('pulsar::pulsar.master_tables') }}</a>
                    <ul class="sub-menu" >
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'forms-state', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('forms-state') !!}><a href="{{ route('FormsState') }}"><i class="icon-fire"></i>{{ trans_choice('pulsar::pulsar.state', 2) }}</a></li>
                        @endif
                        @if(session('userAcl')->isAllowed(Auth::user()->profile_010, 'forms-preference', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('forms-preference') !!}><a href="{{ route('FormsPreference') }}"><i class="icon-cog"></i>{{ trans_choice('pulsar::pulsar.preference', 2) }}</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>