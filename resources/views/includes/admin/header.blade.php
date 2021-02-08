<header class="main-header">
    <!-- Logo -->
    <a href="{{url('/admin')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>{{ $setting->title ? $setting->title : "CMS"}}</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{$setting->title ? $setting->title : "CMS"}}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        {{--  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
          </a>--}}
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
            {{--  <li class="dropdown messages-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-envelope-o"></i>
                      <span class="label label-success">4</span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header">You have 4 messages</li>
                      <li>
                          <!-- inner menu: contains the actual data -->
                          <ul class="menu">
                              <li><!-- start message -->
                                  <a href="#">
                                      <div class="pull-left">
                                          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                      </div>
                                      <h4>
                                          Support Team
                                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                      </h4>
                                      <p>Why not buy a new awesome theme?</p>
                                  </a>
                              </li>
                              <!-- end message -->
                              <li>
                                  <a href="#">
                                      <div class="pull-left">
                                          <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                      </div>
                                      <h4>
                                          AdminLTE Design Team
                                          <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                      </h4>
                                      <p>Why not buy a new awesome theme?</p>
                                  </a>
                              </li>
                              <li>
                                  <a href="#">
                                      <div class="pull-left">
                                          <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                      </div>
                                      <h4>
                                          Developers
                                          <small><i class="fa fa-clock-o"></i> Today</small>
                                      </h4>
                                      <p>Why not buy a new awesome theme?</p>
                                  </a>
                              </li>
                              <li>
                                  <a href="#">
                                      <div class="pull-left">
                                          <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                      </div>
                                      <h4>
                                          Sales Department
                                          <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                      </h4>
                                      <p>Why not buy a new awesome theme?</p>
                                  </a>
                              </li>
                              <li>
                                  <a href="#">
                                      <div class="pull-left">
                                          <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                      </div>
                                      <h4>
                                          Reviewers
                                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                                      </h4>
                                      <p>Why not buy a new awesome theme?</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="footer"><a href="#">See All Messages</a></li>
                  </ul>
              </li>--}}
            <!-- Notifications: style can be found in dropdown.less -->
            {{--  <li class="dropdown notifications-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning">0</span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header">You have 0 notifications</li>
                      <li>
                          <!-- inner menu: contains the actual data -->
                          <ul class="menu">
                              <li>
                                  <a href="#">
                                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                  </a>
                              </li>
                          </ul>
                      </li>
                      --}}{{--<li class="footer"><a href="#">View all</a></li>--}}{{--
                  </ul>
              </li>--}}
            <!-- Tasks: style can be found in dropdown.less -->
            {{--  <li class="dropdown tasks-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-flag-o"></i>
                      <span class="label label-danger">9</span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header">You have 9 tasks</li>
                      <li>
                          <!-- inner menu: contains the actual data -->
                          <ul class="menu">
                              <li><!-- Task item -->
                                  <a href="#">
                                      <h3>
                                          Design some buttons
                                          <small class="pull-right">20%</small>
                                      </h3>
                                      <div class="progress xs">
                                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                              <span class="sr-only">20% Complete</span>
                                          </div>
                                      </div>
                                  </a>
                              </li>
                              <!-- end task item -->
                              <li><!-- Task item -->
                                  <a href="#">
                                      <h3>
                                          Create a nice theme
                                          <small class="pull-right">40%</small>
                                      </h3>
                                      <div class="progress xs">
                                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                              <span class="sr-only">40% Complete</span>
                                          </div>
                                      </div>
                                  </a>
                              </li>
                              <!-- end task item -->
                              <li><!-- Task item -->
                                  <a href="#">
                                      <h3>
                                          Some task I need to do
                                          <small class="pull-right">60%</small>
                                      </h3>
                                      <div class="progress xs">
                                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                              <span class="sr-only">60% Complete</span>
                                          </div>
                                      </div>
                                  </a>
                              </li>
                              <!-- end task item -->
                              <li><!-- Task item -->
                                  <a href="#">
                                      <h3>
                                          Make beautiful transitions
                                          <small class="pull-right">80%</small>
                                      </h3>
                                      <div class="progress xs">
                                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                              <span class="sr-only">80% Complete</span>
                                          </div>
                                      </div>
                                  </a>
                              </li>
                              <!-- end task item -->
                          </ul>
                      </li>
                      <li class="footer">
                          <a href="#">View all tasks</a>
                      </li>
                  </ul>
              </li>--}}
            <!-- User Account: style can be found in dropdown.less -->
                {{--     <li class="dropdown user user-menu" style="color: #fff;padding-top: 15px;padding-bottom: 15px;padding-left: 15px;">
                     @if(auth::user()->doctor)
                             @if(auth::user()->doctor->status_request == 1)
                                <span class="px-4 bg-danger">{{trans('lang.Profile') ." : ". trans('lang.Active')}}</span>
                             @elseif(auth::user()->doctor->status_request == 0)
                             <span>  {{trans('lang.Profile') ." : ". trans('lang.An_active')}}</span>
                             @endif
                         @endif
                     </li>
                     <li class="dropdown user user-menu">
                         <a href="{{ url('/admin/user/edit/'.Auth::user()->id)}}" >
                             @if (Route::has('login'))
                                 @auth
                                     <span class="hidden-xs">{{ Auth::user()->title }}</span>
                                 @endauth
                             @endif
                         </a>
                     </li>
                     <li class="dropdown user user-menu">
                         <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                             {{ trans('lang.Logout') }}
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                     </li>--}}
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('public/images/user').(auth::user()->image ? '/'.auth::user()->image : '/profile_user.jpg') }}"
                             class="user-image" alt="User Image">
                        <span class="hidden-xs">{{auth::user()->title}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('public/images/user').(auth::user()->image ? '/'.auth::user()->image : '/profile_user.jpg') }}"
                                 class="img-circle" alt="User Image">

                            <p>
                                {{auth::user()->title}}
                                @if(auth::user()->role_id == 4)
                                    @if(auth::user()->doctor)
                                    <small>{{auth::user()->doctor->title_doctor}}</small>
                                    @endif
                                @elseif(auth::user()->role_id == 1 || auth::user()->role_id == 2)
                                    <small>{{auth::user()->role->title}}</small>
                                @elseif(auth::user()->role_id == 5)
                                    @if(auth::user()->hospital)
                                    <small>{{auth::user()->hospital->title}}</small>
                                        @endif
                                @elseif(auth::user()->role_id == 6)
                                    @if(auth::user()->clinic)
                                        <small>{{auth::user()->clinic->title}}</small>
                                    @endif
                                @endif
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                @if(auth::user()->doctor)
                                    @if(auth::user()->doctor->status_request == 1)
                                        <div class="col-xs-7 text-center">
                                            <span style="color: green"> {{trans('lang.Profile') ." : ". trans('lang.Active')}}</span>
                                            <br>
                                            <span style="color: red">{{trans('lang.Code_Number') ." : ". auth::user()->doctor->code_number}}</span>
                                        </div>
                                    @elseif(auth::user()->doctor->status_request == 0)
                                        <div class="col-xs-7 text-center">
                                            <span style="color: red">{{trans('lang.Profile') ." : ". trans('lang.An_active')}}</span>
                                            <br>
                                            <span style="color: red">{{trans('lang.Code_Number') ." : ". auth::user()->doctor->code_number}}</span>
                                        </div>
                                    @endif
                                @elseif(auth::user()->hospital)
                                    @if(auth::user()->hospital->status_request == 1)
                                        <div class="col-xs-7 text-center">
                                            <span style="color: green"> {{trans('lang.Profile') ." : ". trans('lang.Active')}}</span>
                                            <br>
                                            <span style="color: red">{{trans('lang.Code_Number') ." : ". auth::user()->hospital->code_number}}</span>
                                        </div>
                                    @elseif(auth::user()->hospital->status_request == 0)
                                        <div class="col-xs-7 text-center">
                                            <span style="color: red">{{trans('lang.Profile') ." : ". trans('lang.An_active')}}</span>
                                            <br>
                                            <span style="color: red">{{trans('lang.Code_Number') ." : ". auth::user()->hospital->code_number}}</span>
                                        </div>
                                    @endif
                                @elseif(auth::user()->clinic)
                                    @if(auth::user()->clinic->status_request == 1)
                                        <div class="col-xs-7 text-center">
                                            <span style="color: green"> {{trans('lang.Profile') ." : ". trans('lang.Active')}}</span>
                                           <br>
                                            <span style="color: red">{{trans('lang.Code_Number') ." : ". auth::user()->clinic->code_number}}</span>
                                        </div>
                                    @elseif(auth::user()->clinic->status_request == 0)
                                        <div class="col-xs-7 text-center">
                                            <span style="color: red">{{trans('lang.Profile') ." : ". trans('lang.An_active')}}</span>
                                            <br>
                                            <span style="color: red">{{trans('lang.Code_Number') ." : ". auth::user()->clinic->code_number}}</span>
                                        </div>
                                    @endif
                                @endif
                                {{--<div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>--}}
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/admin/user/edit/'.Auth::user()->id)}}"
                                   class="btn btn-default btn-flat">{{trans('lang.Profile')}}</a>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ trans('lang.Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{-- <li>
                     <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                 </li>--}}
            </ul>
        </div>
    </nav>
</header>
@yield('header')