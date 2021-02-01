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
<body class="hold-transition login-page" style="height: 0% !important;">
<div class="login-box">
    <div class="login-logo">
            <img src="{{asset('public/images/setting/'.$setting->logo)}}" style="width:100px;height: 100px"/>
            <b>{{$setting->title ? $setting->title :"CMS"}}</b>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">{{ trans('lang.Login') }}</p>
        @include('includes.admin.error')
        <form method="get" action="{{ url('forgot_password/validate_code') }}">
            {{csrf_field()}}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                {{ trans('lang.Email') }} : <input type="email" class="form-control" name="email" value="{{Request::old('email')}}"
                                                   placeholder="{{ trans('lang.Message_Email') }}">
            </div>
            <div class="form-group{{ $errors->has('code') ? ' has-error' : "" }}">
                {{ trans('lang.Code') }} : <input type="code" class="form-control" name="code" value="{{Request::old('code')}}"
                                                   placeholder="{{ trans('lang.Message_Code') }}">
            </div>
            <div class="row">
                <div class="col-xs-4">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('lang.Check') }}</button>
                </div>
                <div class="col-xs-4">
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
        </div>
        <!-- /.social-auth-links -->
        <div class="row">
            <div class="col-md-8">
                <a href="{{url('login')}}">{{ trans('lang.Login') }}</a><br>
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
</body>
</html>
