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
            {{ trans('lang.Call_Us') }}
            <small>{{ trans('lang.All') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/call_us/index') }}"><i class="fa fa-permissions"></i>  {{ trans('lang.Call_Us') }}</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" id="status" action="{{ url('/admin/call_us/change_many_status')}}">
            <div class="box">
                    <div class="box-header" align="right">
                        @if(count($datas) > 0)
                            @if(permission_show('call-us-many-status'))
                                <input type="submit" value="{{ trans('lang.Change_Status') }}" class="btn btn-primary">
                            @endif
                        @endif
                    </div>
            <!-- /.box-header -->
                <div class="box-body">
                    @if(count($datas) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="center">{{ trans('lang.Title') }}</th>
                                    <th class="center">{{ trans('lang.Email') }}</th>
                                    <th class="center">{{ trans('lang.Mobile') }}</th>
                                    <th class="center">{{ trans('lang.Detail') }}</th>
                                    @if(permission_show('call-us-delete') || permission_show('call-us-status'))
                                        <th class="center">{{ trans('lang.Controller') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($datas as $data)
                                    <tr>
                                        <td class="center">
                                            @if(permission_show('call-us-many-status'))
                                                <div class="form-group{{ $errors->has('change_status') ? ' has-error' : "" }}">
                                                    <input type="checkbox" name="change_status[]" id="{{$data->id}}" value="{{$data->id}}">
                                                </div>
                                            @endif
                                            {{$i++}}
                                        </td>
                                        <td class="center">{{$data->title}}</td>
                                        <td class="center">{{$data->email}}</td>
                                        <td class="center">{{$data->mobile}}</td>
                                        <td class="center">{{$data->detail}}</td>
                                        @if(permission_show('call-us-delete') || permission_show('call-us-status'))
                                            <td class="center">
                                                @if(permission_show('call-us-status'))
                                                    @if($data->status ==1)
                                                        <a href="{{ url('/admin/call_us/change_status/'.$data->id)}}"><i
                                                                    class="btn btn-danger ace-icon fa fa-close">{{ trans('lang.Read') }}</i></a>
                                                    @elseif($data->status ==0)
                                                        <a href="{{ url('/admin/call_us/change_status/'.$data->id)}}"><i
                                                                    class="btn btn-primary ace-icon fa fa-check-service"> {{ trans('lang.Unread') }}</i></a>
                                                    @endif
                                                @endif
                                                @if(permission_show('call-us-delete'))
                                                    <a href="{{ url('/admin/call_us/delete/'.$data->id)}}"><i class="btn btn-sm btn-danger ace-icon fa fa-delete bigger-120  delete" data-id="">{{ trans('lang.Delete') }}</i></a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="center">{{ trans('lang.Title') }}</th>
                                    <th class="center">{{ trans('lang.Email') }}</th>
                                    <th class="center">{{ trans('lang.Mobile') }}</th>
                                    <th class="center">{{ trans('lang.Detail') }}</th>
                                    @if(permission_show('call-us-delete') || permission_show('call-us-status'))
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
        </form>
    </section>
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
    {!! JsValidator::formRequest('App\Http\Requests\Setting\Call_Us\StatusEditRequest','#status') !!}
@endsection