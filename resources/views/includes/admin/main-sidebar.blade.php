<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Left side column. contains the logo and sidebar -->
        <ul class="sidebar-menu" data-widget="tree">
            @can('setting-list')
            <li class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span>setting</span><span class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    @can('setting-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>setting</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('setting-index')
                            <li><a href="{{ url('/admin/setting/index') }}"><i
                                            class="fa fa-group"></i><span>index setting</span></a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@yield('main-sidebar')
