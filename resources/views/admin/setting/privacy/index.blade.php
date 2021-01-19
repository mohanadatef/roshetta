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
            {{ trans('lang.Privacy') }}
            <small>{{ trans('lang.All') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/privacy/index') }}"><i class="fa fa-permissions"></i>  {{ trans('lang.Privacy') }}</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" action="{{ url('/admin/privacy/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    @if($datas->count() == 0)
                        <a href="{{  url('/admin/privacy/create') }}" class="btn btn-primary">  {{ trans('lang.Create') }}</a>
                    @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($datas) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="center">  {{ trans('lang.Detail') }}</th>
                                    <th class="center">{{ trans('lang.Controller') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td class="center">{!! $data->detail !!}</td>
                                        <td class="center">
                                            <a href="{{ url('/admin/privacy/edit/'.$data->id)}}"><i class="btn btn-sm btn-primary ace-icon fa fa-edit bigger-120  edit" data-id=""> {{ trans('lang.Edit') }}</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="center">  {{ trans('lang.Detail') }}</th>
                                    <th class="center">{{ trans('lang.Controller') }}</th>
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
        </form>
    </section>
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
@endsection