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
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Country') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/country/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/country/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.City') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/city/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/city/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Area') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/area/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/area/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Specialty') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/specialty/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/specialty/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Sub_Specialty') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/sub_specialty/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/sub_specialty/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Company_Insurance') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/company_insurance/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/company_insurance/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Scientific_Degree') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/scientific_degree/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/scientific_degree/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Service_Category') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/service_category/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/service_category/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Service') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/service/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/service/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Product_Category') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/product_category/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/product_category/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Product') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/product/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/product/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Medicine_Category') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/medicine_category/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/medicine_category/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Medicine') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/medicine/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/medicine/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Setting') }}</span><span class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Setting') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/setting/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Privacy') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/privacy/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.About_Us') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/about_us/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/about_us/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li> <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Contact_Us') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/contact_us/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/contact_us/create') }}"><i
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
