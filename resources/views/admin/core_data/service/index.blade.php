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
            {{ trans('lang.Service') }}
            <small>{{ trans('lang.All') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/service/index') }}"><i class="fa fa-services"></i>{{ trans('lang.Index') }}</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" id="status" action="{{ url('/admin/service/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    @if(permission_show('service-create'))
                    <a href="{{  url('/admin/service/create') }}" class="btn btn-primary">{{ trans('lang.Create') }}</a>
                    @endif
                        @if(permission_show('service-many-status'))
                    <input type="submit" value="{{ trans('lang.Change_Status') }}" class="btn btn-primary">
                            @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($datas) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    @if(permission_show('service-many-status'))
                                    <th align="center">#</th>
                                    @endif
                                    <th align="center">{{ trans('lang.Title') }}</th>
                                    <th class="center">  {{ trans('lang.Detail') }}</th>
                                    <th align="center">{{ trans('lang.Service_Category') }}</th>
                                        @if(permission_show('service-status'))
                                    <th align="center">{{ trans('lang.Status') }}</th>
                                        @endif
                                        @if(permission_show('service-edit'))
                                    <th align="center">{{ trans('lang.Controller') }}</th>
                                            @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        @if(permission_show('service-many-status'))
                                        <td align="center">
                                                    <input type="checkbox" name="change_status[]" id="{{$data->id}}" value="{{$data->id}}">
                                        </td>
                                        @endif
                                        <td align="center">{{ $data->title }}</td>
                                        <td class="center">{!! substr($data->detail,0,5)  !!}</td>
                                        <td align="center">{{ $data->service_category->title }}</td>
                                            @if(permission_show('service-status'))
                                        <td align="center">
                                                @if($data->status ==1)
                                                    <a href="{{ url('/admin/service/change_status/'.$data->id)}}"><i
                                                                class="btn btn-danger ace-icon fa fa-close">{{ trans('lang.An_active') }}</i></a>
                                                @elseif($data->status ==0)
                                                    <a href="{{ url('/admin/service/change_status/'.$data->id)}}"><i
                                                                class="btn btn-primary ace-icon fa fa-check-service"> {{ trans('lang.Active') }}</i></a>
                                                @endif
                                        </td>
                                            @endif
                                            @if(permission_show('service-edit'))
                                        <td align="center">
                                                <a href="{{ url('/admin/service/edit/'.$data->id)}}"><i
                                                            class="btn btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                            data-id=""> {{ trans('lang.Edit') }}</i></a>
                                        </td>
                                                @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    @if(permission_show('service-many-status'))
                                        <th align="center">#</th>
                                    @endif
                                    <th align="center">{{ trans('lang.Title') }}</th>
                                    <th class="center">  {{ trans('lang.Detail') }}</th>
                                    <th align="center">{{ trans('lang.Service_Category') }}</th>
                                    @if(permission_show('service-status'))
                                        <th align="center">{{ trans('lang.Status') }}</th>
                                    @endif
                                    @if(permission_show('service-edit'))
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
        </form>
    </section>
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
    {!! JsValidator::formRequest('App\Http\Requests\Core_Data\Service\StatusEditRequest','#status') !!}
@endsection