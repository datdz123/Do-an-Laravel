<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
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
        <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        {{-- <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
                <a class="{{ request()->is('admin') ? 'text-aqua' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>

            </li>
            <li class="treeview {{ request()->is('admin/slider*') ? 'active menu-open' : '' }}">
                <a href="#" class="{{ request()->is('admin/slider*') ? 'text-aqua' : '' }}">
                    <i class="fa fa-window-restore"></i> <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="{{ request()->is('admin/slider') ? 'text-aqua' : '' }}"
                            href="{{ url('admin/slider') }}"><i class="fa fa-list"></i>Danh sách</a></li>
                    <li><a class="{{ request()->is('admin/slider/add') ? 'text-aqua' : '' }}"
                            href="{{ route('slider/add') }}"><i class="fa fa-plus-square"></i>Thêm mới</a></li>

                </ul>
            </li>
            <li class="treeview {{ request()->is('admin/banner*') ? 'active menu-open' : '' }}">
                <a href="#" class="{{ request()->is('admin/banner*') ? 'text-aqua' : '' }}">
                    <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Banner</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="{{ request()->is('admin/banner') ? 'text-aqua' : '' }}" href="{{ route('banner.index') }}"><i class="fa fa-list "></i>Danh sách</a></li>
                    <li><a class="{{ request()->is('admin/banner/create') ? 'text-aqua' : '' }}" href="{{ route('banner.create') }} "><i class="fa fa-plus-square"></i>Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('admin/product_categories*') ? 'active menu-open' : '' }}">
                <a href="#" class="{{ request()->is('admin/product_categories*') ? 'text-aqua' : '' }}">
                    <i class="fa fa-align-left"></i> <span>Danh mục sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="{{ request()->is('admin/product_categories') ? 'text-aqua' : '' }}"
                            href="{{ route('product_categories') }}"><i class="fa fa-list"></i>Danh sách</a></li>
                    <li><a class="{{ request()->is('admin/product_categories/add') ? 'text-aqua' : '' }}"
                            href="{{ route('product_categories/add') }} "><i class="fa fa-plus-square"></i>Thêm mới</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('admin/products*') ? 'active menu-open' : '' }}">
                <a href="#" class="{{ request()->is('admin/products*') ? 'text-aqua' : '' }}">
                    <i class="fa fa-product-hunt"></i> <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="{{ request()->is('admin/products') ? 'text-aqua' : '' }}"
                            href="{{ url('admin/products') }}"><i class="fa fa-list"></i>Danh sách</a></li>
                    <li><a class="{{ request()->is('admin/products/add') ? 'text-aqua' : '' }}"
                            href="{{ route('product/add') }} "><i class="fa fa-plus-square"></i>Thêm mới</a></li>
                    <li><a class="{{ request()->is('admin/products/comments') ? 'text-aqua' : '' }}"
                            href="{{ route('product.comments') }} "><i class="fa fa-comment"
                                aria-hidden="true"></i>Nhận xét</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('admin/order*') ? 'active menu-open' : '' }}">
                <a href="#" class="{{ request()->is('admin/order*') ? 'text-aqua' : '' }}">
                    <i class="fa fa-truck"></i> <span>Đơn hàng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="{{ request()->is('admin/order') ? 'text-aqua' : '' }}"
                            href="{{ route('order') }}"><i class="fa fa-list"></i>Danh sách</a></li>
                </ul>
            </li>
            <li class="">
                <a class="{{ request()->is('admin/users') ? 'text-aqua' : '' }}" href="{{ route('users') }}">
                    <i class="fa fa-user" aria-hidden="true"></i> <span>Người dùng đăng ký</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li class="treeview {{ request()->is('admin/member*') ? 'active menu-open' : '' }}">
                <a href="#" class="{{ request()->is('admin/member*') ? 'text-aqua' : '' }}">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>Thành viên, phân quyền</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="{{ request()->is('admin/member') ? 'text-aqua' : '' }}"
                            href="{{ route('member') }}"><i class="fa fa-list"></i>Danh sách thành viên</a></li>
                    <li><a class="{{ request()->is('admin/member/create') ? 'text-aqua' : '' }}"
                            href="{{ route('member.create') }}"><i class="fa fa-plus-square"></i>Thêm mới thành
                            viên</a></li>
                    <li><a class="{{ request()->is('admin/member/roles*') ? 'text-aqua' : '' }}"
                            href="{{ route('member.roles') }}"><i class="fa fa-flag-o" aria-hidden="true"></i>Vai
                            trò</a></li>
                    <li><a class="{{ request()->is('admin/member/permissions*') ? 'text-aqua' : '' }}"
                            href="{{ route('member.permissions') }}"><i class="fa fa-ban"
                                aria-hidden="true"></i></i>Quyền</a></li>
                </ul>
            </li>

            <li class="">
                <a class="{{ request()->is('admin/file-manager') ? 'text-aqua' : '' }}"
                    href="{{ route('file-manager') }}">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i> <span>Quản lý files</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="treeview {{ request()->is('admin/site-setting*') ? 'active menu-open' : '' }}">
                <a class="{{ request()->is('admin/site-setting') ? 'text-aqua' : '' }}" href="">
                    <i class="fa fa-cog" aria-hidden="true"></i> <span>Cài đặt trang web</span>
                    <span class="pull-right-container">
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="{{ request()->is('admin/site-setting') ? 'text-aqua' : '' }}"
                            href="{{ route('site-setting') }}"><i class="fa fa-info-circle"
                                aria-hidden="true"></i>Thông tin trang web</a></li>
                </ul>
            </li>

        </ul> --}}
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
