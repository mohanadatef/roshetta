<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('public/images/user').(auth::user()->image ? '/'.auth::user()->image : '/profile_user.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth::user()->title}}</p>
                @if(auth::user()->doctor)
                    @if(auth::user()->doctor->status_request == 1)
                            <i class="fa fa-circle text-success"> {{trans('lang.Profile') ." : ". trans('lang.Active')}}</i>
                    @elseif(auth::user()->doctor->status_request == 0)
                            <i class="fa fa-circle text-danger"> {{trans('lang.Profile') ." : ". trans('lang.An_active')}}</i>
                    @endif
                @elseif(auth::user()->hospital)
                    @if(auth::user()->hospital->status_request == 1)
                        <i class="fa fa-circle text-success"> {{trans('lang.Profile') ." : ". trans('lang.Active')}}</i>
                    @elseif(auth::user()->hospital->status_request == 0)
                        <i class="fa fa-circle text-danger"> {{trans('lang.Profile') ." : ". trans('lang.An_active')}}</i>
                    @endif
                @endif
            </div>
        </div>
        <!-- Left side column. contains the logo and sidebar -->
        <ul class="sidebar-menu" data-widget="tree">
            @if(permission_show('core-data-list'))
                <li class="treeview">
                    <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Core_Data') }}</span><span
                                class="pull-right-container"><i
                                    class="fa fa-angle-right pull-left"></i></span></a>
                    <ul class="treeview-menu">
                        @if(permission_show('language-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Language') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('language-index'))
                                        <li><a href="{{ url('/admin/language/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('language-create'))
                                        <li><a href="{{ url('/admin/language/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('country-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Country') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('country-index'))
                                        <li><a href="{{ url('/admin/country/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('country-create'))
                                        <li><a href="{{ url('/admin/country/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('city-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.City') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('city-index'))
                                        <li><a href="{{ url('/admin/city/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('city-create'))
                                        <li><a href="{{ url('/admin/city/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('area-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Area') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('area-index'))
                                        <li><a href="{{ url('/admin/area/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('area-create'))
                                        <li><a href="{{ url('/admin/area/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('specialty-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Specialty') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('specialty-index'))
                                        <li><a href="{{ url('/admin/specialty/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('specialty-create'))
                                        <li><a href="{{ url('/admin/specialty/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('sub-specialty-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Sub_Specialty') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('sub-specialty-index'))
                                        <li><a href="{{ url('/admin/sub_specialty/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('sub-specialty-create'))
                                        <li><a href="{{ url('/admin/sub_specialty/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('company-insurance-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Company_Insurance') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('company-insurance-index'))
                                        <li><a href="{{ url('/admin/company_insurance/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('company-insurance-create'))
                                        <li><a href="{{ url('/admin/company_insurance/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('scientific-degree-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Scientific_Degree') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('scientific-degree-index'))
                                        <li><a href="{{ url('/admin/scientific_degree/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('scientific-degree-create'))
                                        <li><a href="{{ url('/admin/scientific_degree/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('service-category-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Service_Category') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('service-category-index'))
                                        <li><a href="{{ url('/admin/service_category/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('service-category-create'))
                                        <li><a href="{{ url('/admin/service_category/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('service-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Service') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('service-index'))
                                        <li><a href="{{ url('/admin/service/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('service-create'))
                                        <li><a href="{{ url('/admin/service/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('product-category-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Product_Category') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('product-category-index'))
                                        <li><a href="{{ url('/admin/product_category/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('product-category-create'))
                                        <li><a href="{{ url('/admin/product_category/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('product-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Product') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('product-index'))
                                        <li><a href="{{ url('/admin/product/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('product-create'))
                                        <li><a href="{{ url('/admin/product/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('medicine-category-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Medicine_Category') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('medicine-category-index'))
                                        <li><a href="{{ url('/admin/medicine_category/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('medicine-category-create'))
                                        <li><a href="{{ url('/admin/medicine_category/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('medicine-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Medicine') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('medicine-index'))
                                        <li><a href="{{ url('/admin/medicine/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('medicine-create'))
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
            @if(permission_show('setting-list'))
                <li class="treeview">
                    <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Setting') }}</span><span
                                class="pull-right-container"><i
                                    class="fa fa-angle-right pull-left"></i></span></a>
                    <ul class="treeview-menu">
                        @if(permission_show('setting-list'))
                            <li class="treeview">
                            @if(permission_show('setting-index'))
                                <li><a href="{{ url('/admin/setting/index') }}"><i
                                                class="fa fa-group"></i><span>{{ trans('lang.Setting') }}</span></a>
                                </li>
                                @endif
                                </li>
                            @endif
                            @if(permission_show('privacy-list'))
                                <li class="treeview">
                                @if(permission_show('privacy-index'))
                                    <li><a href="{{ url('/admin/privacy/index') }}"><i
                                                    class="fa fa-group"></i><span> {{ trans('lang.Privacy') }}</span></a>
                                    </li>
                                    @endif
                                    </li>
                                @endif
                                @if(permission_show('about-us-list'))
                                    <li class="treeview">
                                    @if(permission_show('about-us-index'))
                                        <li><a href="{{ url('/admin/about_us/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.About_Us') }}</span></a>
                                        </li>
                                        @endif
                                        </li>
                                    @endif
                                    @if(permission_show('contact-us-list'))
                                        <li class="treeview">
                                        @if(permission_show('contact-us-index'))
                                            <li><a href="{{ url('/admin/contact_us/index') }}"><i
                                                            class="fa fa-group"></i><span>{{ trans('lang.Contact_Us') }}</span></a>
                                            </li>
                                            @endif
                                            </li>
                                        @endif
                                        @if(permission_show('call-us-list'))
                                            <li class="treeview">
                                                <a href="#">
                                                    <i class="fa fa-circle-o"></i>
                                                    <span> {{ trans('lang.Call_Us') }}</span>
                                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                                </a>
                                                <ul class="treeview-menu">
                                                    @if(permission_show('call-us-read'))
                                                        <li><a href="{{ url('/admin/call_us/read') }}"><i
                                                                        class="fa fa-group"></i><span>{{ trans('lang.Read') }}</span></a>
                                                        </li>
                                                    @endif
                                                    @if(permission_show('call-us-unread'))
                                                        <li><a href="{{ url('/admin/call_us/unread') }}"><i
                                                                        class="fa fa-group"></i><span>{{ trans('lang.Unread') }}</span></a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                    </ul>
                </li>
            @endif
            @if(permission_show('acl-list'))
                <li class="treeview">
                    <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Acl') }}</span><span
                                class="pull-right-container"><i
                                    class="fa fa-angle-right pull-left"></i></span></a>
                    <ul class="treeview-menu">
                        @if(permission_show('permission-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Permission') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('permission-index'))
                                        <li><a href="{{ url('/admin/permission/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('permission-create'))
                                        <li><a href="{{ url('/admin/permission/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('role-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Role') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('role-index'))
                                        <li><a href="{{ url('/admin/role/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('role-create'))
                                        <li><a href="{{ url('/admin/role/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('user-list') &&( auth::user()->role_id == 1 || auth::user()->role_id == 2) )
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.User') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('user-index'))
                                        <li><a href="{{ url('/admin/user/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('user-create'))
                                        <li><a href="{{ url('/admin/user/create') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Create') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                            @if(permission_show('user-list'))
                            @if(permission_show('user-edit'))
                                <li><a href="{{ url('/admin/user/edit/'. auth::user()->id) }}"><i
                                                class="fa fa-group"></i><span>{{ trans('lang.Profile') }}</span></a>
                                </li>
                            @endif
                            @endif
                        @if(permission_show('patient-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Patient') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('patient-index'))
                                        <li><a href="{{ url('/admin/patient/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(permission_show('doctor-list'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Doctor') }}</span>
                                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(permission_show('doctor-index'))
                                        <li><a href="{{ url('/admin/doctor/index') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                        </li>
                                    @endif
                                    @if(permission_show('doctor-index-request'))
                                        <li><a href="{{ url('/admin/doctor/index_request') }}"><i
                                                        class="fa fa-group"></i><span>{{ trans('lang.Index_Request') }}</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                            @if(permission_show('hospital-list'))
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-circle-o"></i> <span> {{ trans('lang.Hospital') }}</span>
                                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        @if(permission_show('hospital-index'))
                                            <li><a href="{{ url('/admin/hospital/index') }}"><i
                                                            class="fa fa-group"></i><span>{{ trans('lang.Index') }}</span></a>
                                            </li>
                                        @endif
                                        @if(permission_show('hospital-index-request'))
                                            <li><a href="{{ url('/admin/hospital/index_request') }}"><i
                                                            class="fa fa-group"></i><span>{{ trans('lang.Index_Request') }}</span></a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                    </ul>
                </li>
            @endif
            @if(permission_show('doctor-list-information'))
                <li class="treeview">
                    <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Core_Data') }}</span><span
                                class="pull-right-container"><i
                                    class="fa fa-angle-right pull-left"></i></span></a>
                    <ul class="treeview-menu">
                        @if(!Auth::user()->doctor)
                        @if(permission_show('doctor-create'))
                            <li><a href="{{ url('/admin/doctor/create') }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Create_Information') }}</span></a>
                            </li>
                        @endif
                        @else
                        @if(permission_show('doctor-edit'))
                            <li><a href="{{ url('/admin/doctor/edit/'. Auth::user()->doctor->id) }}"><i
                                            class="fa fa-group"></i><span>{{ trans('lang.Edit_Information') }}</span></a>
                            </li>
                        @endif
                        @endif
                    </ul>
                </li>
            @endif
                @if(permission_show('hospital-list-information'))
                    <li class="treeview">
                        <a href="#"><i class="fa fa-group"></i> <span> {{ trans('lang.Core_Data') }}</span><span
                                    class="pull-right-container"><i
                                        class="fa fa-angle-right pull-left"></i></span></a>
                        <ul class="treeview-menu">
                            @if(!Auth::user()->hospital)
                                @if(permission_show('hospital-create'))
                                    <li><a href="{{ url('/admin/hospital/create') }}"><i
                                                    class="fa fa-group"></i><span>{{ trans('lang.Create_Information') }}</span></a>
                                    </li>
                                @endif
                            @else
                                @if(permission_show('hospital-edit'))
                                    <li><a href="{{ url('/admin/hospital/edit/'. Auth::user()->hospital->id) }}"><i
                                                    class="fa fa-group"></i><span>{{ trans('lang.Edit_Information') }}</span></a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </li>
                @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@yield('main-sidebar')
