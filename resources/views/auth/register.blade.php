<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @if($setting != null)
        <title>{{$setting->title}} | {{ trans('lang.Login') }}</title>
    @else
        <title>CMS | Log in</title>
    @endif
    @if($setting != null)
        <link rel="icon" type="image/png" href="{{asset('public/images/setting/'.$setting->logo)}}"/>
@endif
<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('public/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('public/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/AdminLTE/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/AdminLTE/plugins/iCheck/square/blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" >
<div class="login-box">
    <div class="login-logo">
            <img src="{{asset('public/images/setting/'.$setting->logo)}}" style="width:100px;height: 100px"/>
            <b>{{$setting->title ? $setting->title :"CMS"}}</b>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">{{trans('lang.Register')}}</p>
        @include('includes.admin.error')
        <form id='create' action="{{url('admin/user/store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                @foreach(language() as $lang)
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{ $lang->title .' '. trans('lang.Title') }} : <input type="text"
                                                                                  value="{{Request::old('title['.$lang->code.']')}}"
                                                                                  class="form-control"
                                                                                  name="title[{{$lang->code}}]"
                                                                                  placeholder="{{ trans('lang.Message_Title') }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : "" }}">
                        {{ trans('lang.Mobile') }} : <input type="text" class="form-control" name="mobile" value="{{Request::old('mobile')}}"
                                                            placeholder="{{ trans('lang.Message_Mobile') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                        {{ trans('lang.Email') }} : <input type="email" class="form-control" name="email" value="{{Request::old('email')}}"
                                                           placeholder="{{ trans('lang.Message_Email') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                        {{ trans('lang.Password') }} : <input type="password" class="form-control" name="password" value="{{Request::old('password')}}"
                                                              placeholder="{{ trans('lang.Message_Password') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                        {{ trans('lang.Password_Confirmation') }} : <input type="password" class="form-control" name="password_confirmation" value="{{Request::old('password')}}"
                                                                           placeholder="{{ trans('lang.Message_Password') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : "" }}">
                        {{trans('lang.Gender')}} :
                        <select id="gender" class="form-control select2" data-placeholder="{{trans('lang.Message_Gender')}}" name="gender">
                            <option  selected>{{trans('lang.Select')}}</option>
                            <option value="1"> {{trans('lang.Man')}}</option>
                            <option value="0"> {{trans('lang.Woman')}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('date_birth') ? ' has-error' : "" }}">
                        {{ trans('lang.Date_Dirth') }} : <input type="date" class="form-control" name="date_birth" value="{{Request::old('date_birth')}}"
                                                                placeholder="{{ trans('lang.Message_Date_Dirth') }}">
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('role_id') ? ' has-error' : "" }}">
                {{trans('lang.Role')}} :
                <select id="role" class="form-control select2" data-placeholder="{{trans('lang.Message_Role')}}" name="role_id">
                    <option value="0" selected>{{trans('lang.Select')}}</option>
                    @foreach($role as  $myrole)
                        <option value="{{$myrole->id}}"> {{$myrole->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
                <table class="table">
                    <tr>
                        <td width="40%" align="right"><label>{{ trans('lang.Message_Image') }}</label></td>
                        <td width="30"><input type="file" value="{{Request::old('image')}}" name="image"/></td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                    </tr>
                </table>
            </div>
            <div align="center">
                <input type="submit" class="btn btn-primary" value="{{ trans('lang.Create') }}">
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            {{-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                 Facebook</a>
             <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                 Google+</a>--}}
        </div>
        <!-- /.social-auth-links -->
        <div class="row">
            <div class="col-md-8">
                <a href="{{url('login')}}">{{ trans('lang.Login') }}</a><br>
                <a href="{{url('forgot_password')}}">{{trans('lang.Forgot')}}</a><br>
            </div>
            <div class="col-md-2">
                {!! Form::open(['url'=>'admin/language/setLang','method'=>'post']) !!}
                <div class="form-group">
                    <select name='lang' onchange="this.form.submit();">
                        @foreach(Language() as $lang)
                            <option value='{{$lang->code}}' @if( \Illuminate\Support\Facades\App::getLocale() == $lang->code )selected @endif >
                                {{$lang->title}}
                               </option>
                        @endforeach
                    </select>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        {{--<a href="register.html" class="text-center">Register a new membership</a>--}}

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('public/AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('public/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
<!-- jsvalidation -->
<script type="text/javascript" src="{{ asset('public/vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Acl\User\CreateRequest','#create') !!}
</body>
</html>
