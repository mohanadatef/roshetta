@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Create') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Role') }}
            <small>{{ trans('lang.Create') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/clinic/doctor/index') }}"><i class="fa fa-permsissions"></i>{{ trans('lang.Index') }}</a></li>
            <li><a href="{{ url('/admin/clinic/doctor/create') }}"><i class="fa fa-permsission"></i>{{ trans('lang.Create') }}</a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Create') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id='create' action="{{url('admin/clinic/doctor/store')}}" method="POST">
                    {{csrf_field()}}
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : "" }}">
                            {{  trans('lang.Code') }} : <input type="text" value="{{Request::old('code')}}"
                                                                              class="form-control" name="code" placeholder="{{ trans('lang.Message_Code') }}">
                        </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="{{ trans('lang.Create') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
{!! JsValidator::formRequest('App\Http\Requests\Acl\Clinic_Doctor\FindRequest','#create') !!}
@endsection