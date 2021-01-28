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
                @if(permission_show('about-us-create'))
                <div class="box-header" align="right">
                    @if($datas->count() == 0)
                        <a href="{{  url('/admin/about_us/create') }}" class="btn btn-primary">  {{ trans('lang.Create') }}</a>
                    @endif
                </div>
                @endif
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($datas) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="center">  #</th>
                                    <th class="center">  {{ trans('lang.Detail') }}</th>
                                    <th class="center">{{ trans('lang.Image') }}</th>
                                    @if(permission_show('about-us-edit'))
                                    <th class="center">{{ trans('lang.Controller') }}</th>
                                        @endif
                                </tr>
                                </thead>
                                <tbody>
                                {{$i=1}}
                                @foreach($datas as $data)
                                    <tr>
                                        <td class="center">{{$i++}}</td>
                                        <td class="center">{!! substr($data->detail,0,5)  !!}</td>
                                        <td class="center"><img src="{{ asset('public/images/about_us/' . $data->image ) }}" style="width:100px;height: 100px"></td>
                                        <td class="center">
                                            <a href="{{ url('/admin/about_us/edit/'.$data->id)}}"><i class="btn btn-sm btn-primary ace-icon fa fa-edit bigger-120  edit" data-id=""> {{ trans('lang.Edit') }}</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="center">  #</th>
                                    <th class="center">  {{ trans('lang.Detail') }}</th>
                                    <th class="center">{{ trans('lang.Image') }}</th>
                                    @if(permission_show('about-us-edit'))
                                        <th class="center">{{ trans('lang.Controller') }}</th>
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