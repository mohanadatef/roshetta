@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.User') }}
            <small>{{ trans('lang.Password') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/user/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.User') }}</a>
            </li>
            <li><a href="{{ url('/admin/user/password/'.$data->id) }}"><i
                            class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : {{Auth::user()->first_title}}  </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }}: {{Auth::user()->first_title}}  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="password" action="{{url('admin/user/change_password/'.$data->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                        {{ trans('lang.Password') }} : <input type="password" class="form-control" name="password"
                                                              value="{{Request::old('password')}}"
                                                              placeholder="{{ trans('lang.Message_Password') }}">
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                        {{ trans('lang.Password_Confirmation') }} : <input type="password" class="form-control"
                                                                           name="password_confirmation"
                                                                           value="{{Request::old('password')}}"
                                                                           placeholder="{{ trans('lang.Message_Password') }}">
                    </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="{{ trans('lang.Edit') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('App\Http\Requests\Acl\User\PasswordRequest','#password') !!}
@endsection