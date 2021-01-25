@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Index') }}
@endsection
@section('head_style')
    @include('includes.admin.header_datatable')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Role') }}
            <small>{{ trans('lang.All') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/role/index') }}"><i class="fa fa-Roles"></i>{{ trans('lang.Index') }}</a></li>
        </ol>
    </section>
    <section class="content">
            <div class="box">
                @if(permission_show('role-create'))
                <div class="box-header" align="right">
                    <a href="{{  url('/admin/role/create') }}" class="btn btn-primary">{{ trans('lang.Create') }}</a>
                </div>
                @endif
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($datas) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th align="center">{{ trans('lang.Title') }}</th>
                                    @if(permission_show('role-edit'))
                                    <th align="center">{{ trans('lang.Controller') }}</th>
                                        @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">{{ $data->title }}</td>
                                        @if(permission_show('role-edit'))
                                        <td align="center">
                                                <a href="{{ url('/admin/role/edit/'.$data->id)}}"><i
                                                            class="btn btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                            data-id=""> {{ trans('lang.Edit') }}</i></a>
                                        </td>
                                            @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th align="center">{{ trans('lang.Title') }}</th>
                                    @if(permission_show('role-edit'))
                                    <th align="center">{{ trans('lang.Controller') }}</th>
                                        @endif
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <div align="center">{{ trans('lang.Message_Index') }}</div>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
    </section>
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
@endsection