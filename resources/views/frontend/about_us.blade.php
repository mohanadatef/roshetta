@extends('includes.frontend.master_frontend')
@section('title')
    {{ trans('lang.Index') }}
@endsection
@section('head_style')
    @include('includes.admin.header_datatable')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.About_Us') }}
            <small>{{ trans('lang.All') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/about_us/index') }}"><i class="fa fa-permissions"></i>  {{ trans('lang.About_Us') }}</a></li>
        </ol>
    </section>
    <section class="content">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td class="center">{!! substr($data->detail,0,5)  !!}</td>
                                        <td class="center"><img src="{{ asset('public/images/about_us/' . $data->image ) }}" style="width:100px;height: 100px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- /.box-body -->
            </div>
    </section>
@endsection
@section('script_style')
@endsection