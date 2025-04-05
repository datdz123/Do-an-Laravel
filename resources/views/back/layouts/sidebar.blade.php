<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('back/dist/img/adminDefault.jpg') }}"
                    class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="{{ route('profile') }}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @foreach ($menuAdmin::menu() as $menuItem)
                <li class="{{ $menuItem['subItems'] ? 'treeview' : ''}}  {{ $menuItem['isActive'] ? 'active menu-open' : '' }}">
                    <a href="{{ $menuItem['link'] }}" class="{{ $menuItem['isActive'] ? 'text-aqua' : '' }}">
                        <i class="{{ $menuItem['icon'] }}"></i> <span>{{ $menuItem['text'] }}</span>
                        <span class="pull-right-container">
                            @if (!empty($menuItem['subItems']))
                                <i class="fa fa-angle-left pull-right"></i>
                            @endif
                        </span>
                    </a>

                    @if (!empty($menuItem['subItems']))
                        <ul class="treeview-menu">
                            @foreach ($menuItem['subItems'] as $subItem)
                                <li>
                                    <a class="{{ $subItem['isActive'] ? 'text-aqua' : '' }}" href="{{ $subItem['link'] }}">
                                        <i class="{{ $subItem['icon'] }}"></i>{{ $subItem['text'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
