<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Left side column. contains the logo and sidebar -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span>setting</span><span class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>setting</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/setting/index') }}"><i
                                            class="fa fa-group"></i><span>index setting</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@yield('main-sidebar')
