        <li{!! Miscellaneous::setCurrentOpenPage(['forms-environment']) !!}>
            <a href="javascript:void(0);"><i class="icomoon-icon-images"></i>My Package</a>
            <ul class="sub-menu">
                @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'mifinan', 'access'))
                    <li{{ Miscellaneous::setCurrentPage('my-submenu-resource') }}><a href="#"><i class="icomoon-icon-truck"></i>Categoría</a></li>
                @endif
                <li{!! Miscellaneous::setCurrentOpenPage(['my-submenu-resource']) !!}>
                    <a href="javascript:void(0);"><i class="icomoon-icon-grid"></i>Tablas maestras</a>
                    <ul class="sub-menu" >
                        @if(Session::get('userAcl')->isAllowed(Auth::user()->profile_010, 'my-submenu-resourcet', 'access'))
                            <li{!! Miscellaneous::setCurrentPage('my-submenu-resource') !!}><a href="{{ route('Myroute') }}"><i class="icomoon-icon-factory"></i>Subcategorías</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>