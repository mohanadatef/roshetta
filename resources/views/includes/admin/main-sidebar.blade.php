<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Left side column. contains the logo and sidebar -->
        <ul class="sidebar-menu" data-widget="tree">
            @if(in_array('core-data-list' , $permission_show->toarray()))
                <li class="treeview">
                    <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Core_Data') }}</span><span
                                class="pull-right-container"><i
                                    class="fa fa-angle-right pull-left"></i></span></a>
                    <ul class="treeview-menu">
                        @if(in_array('language-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Language') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('language-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/language/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('language-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/language/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('country-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Country') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('country-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/country/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('country-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/country/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('city-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.City') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('city-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/city/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('city-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/city/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('area-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Area') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('area-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/area/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('area-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/area/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('specialty-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Specialty') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('specialty-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/specialty/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('specialty-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/specialty/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('sub-specialty-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Sub_Specialty') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('sub-specialty-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/sub_specialty/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('sub-specialty-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/sub_specialty/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('company-insurance-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Company_Insurance') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('company-insurance-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/company_insurance/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('company-insurance-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/company_insurance/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('scientific-degree-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Scientific_Degree') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('scientific-degree-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/scientific_degree/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('scientific-degree-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/scientific_degree/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('service-category-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Service_Category') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('service-category-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/service_category/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('service-category-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/service_category/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('service-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Service') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('service-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/service/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('service-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/service/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('product-category-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Product_Category') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('product-category-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/product_category/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('product-category-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/product_category/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('product-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Product') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('product-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/product/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('product-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/product/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('medicine-category-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Medicine_Category') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('medicine-category-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/medicine_category/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('medicine-category-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/medicine_category/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('medicine-list' , $permission_show->toarray()))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Medicine') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(in_array('medicine-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/medicine/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(in_array('medicine-create' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/medicine/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if(in_array('setting-list' , $permission_show->toarray()))
                <li class="treeview">
                    <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Setting') }}</span><span
                                class="pull-right-container"><i
                                    class="fa fa-angle-right pull-left"></i></span></a>
                    <ul class="treeview-menu">
                        @if(in_array('setting-list' , $permission_show->toarray()))
                            <li class="treeview">
                            @if(in_array('setting-index' , $permission_show->toarray()))
                                <li><a href="{{ url('/admin/setting/index') }}"><i
                                                class="fa fa-group"></i><span>{{ trans('lang.Setting') }}</span></a>
                                </li>
                                @endif
                                </li>
                            @endif
                            @if(in_array('privacy-list' , $permission_show->toarray()))
                                <li class="treeview">
                                @if(in_array('privacy-index' , $permission_show->toarray()))
                                    <li><a href="{{ url('/admin/privacy/index') }}"><i
                                                    class="fa fa-group"></i><span> {{ trans('lang.Privacy') }}</span></a>
                                    </li>
                                    @endif
                                    </li>
                                @endif
                                @if(in_array('about-us-list' , $permission_show->toarray()))
                                    <li class="treeview">
                                    @if(in_array('about-us-index' , $permission_show->toarray()))
                                        <li><a href="{{ url('/admin/about_us/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.About_Us') }}</span></a>
                                        </li>
                                        @endif
                                        </li>
                                    @endif
                                    @if(in_array('contact-us-list' , $permission_show->toarray()))
                                        <li class="treeview">
                                        @if(in_array('contact-us-index' , $permission_show->toarray()))
                                            <li><a href="{{ url('/admin/contact_us/index') }}"><i
                                                            class="fa fa-group"></i><span>{{ trans('lang.Contact_Us') }}</span></a>
                                            </li>
                                            @endif
                                            </li>
                                        @endif
                    </ul>
                </li>
            @endif
            <li class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Acl') }}</span><span
                            class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Permission') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/permission/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/permission/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Role') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/role/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/role/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span> {{ trans('lang.User') }}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/admin/user/index') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                            </li>
                            <li><a href="{{ url('/admin/user/create') }}"><i
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
