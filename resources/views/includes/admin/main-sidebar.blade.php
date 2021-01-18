<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Left side column. contains the logo and sidebar -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Core_Data') }}</span><span class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Language') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/language/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/language/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
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
