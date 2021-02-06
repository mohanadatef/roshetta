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
            {{ trans('lang.Vendor') }}
            <small>{{ trans('lang.All') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/vendor/index') }}"><i class="fa fa-Users"></i>{{ trans('lang.Index') }}</a></li>
        </ol>
    </section>
    <section class="content">
        <form id="status" method="get" action="{{ url('/admin/vendor/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    @if(count($datas) > 0)
                        @if(permission_show('vendor-many-status'))
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
                                    <th align="center">#</th>
                                    <th align="center">{{ trans('lang.Title') }}</th>
                                    <th align="center">{{ trans('lang.Email') }}</th>
                                    <th align="center">{{ trans('lang.Mobile') }}</th>
                                    <th align="center">{{ trans('lang.Image') }}</th>
                                    @if(permission_show('vendor-status'))
                                        <th align="center">{{ trans('lang.Status') }}</th>
                                    @endif
                                    @if(permission_show('vendor-status-request'))
                                        <th align="center">{{ trans('lang.Status_Request') }}</th>
                                    @endif
                                    @if(permission_show('vendor-show-request'))
                                        <th align="center">{{ trans('lang.Show') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">
                                            @if(permission_show('vendor-many-status'))
                                                <div class="form-group{{ $errors->has('change_status') ? ' has-error' : "" }}">
                                                    <input type="checkbox" name="change_status[]"
                                                           id="{{$data->id}}" value="{{$data->id}}">
                                                </div>
                                            @endif
                                            {{$i++}}
                                        </td>
                                        <td align="center">{{ $data->title }}</td>
                                        <td align="center">{{ $data->email }}</td>
                                        <td align="center">{{ $data->mobile }}</td>
                                        <td class="center">
                                            <img src="{{ asset('public/images/user/').($data->image ? '/'.$data->image : '/profile_user.jpg') }}" style="width:100px;height: 100px">
                                        </td>
                                        @if(permission_show('vendor-status'))
                                            <td align="center">
                                                @if($data->status ==1)
                                                    <a href="{{ url('/admin/vendor/change_status/'.$data->id)}}"><i
                                                                class="btn btn-danger ace-icon fa fa-close">{{ trans('lang.An_active') }}</i></a>
                                                @elseif($data->status ==0)
                                                    <a href="{{ url('/admin/vendor/change_status/'.$data->id)}}"><i
                                                                class="btn btn-primary ace-icon fa fa-check-country"> {{ trans('lang.Active') }}</i></a>
                                                @endif
                                            </td>
                                        @endif
                                        @if(permission_show('vendor-status-request'))
                                            <td align="center">
                                                @if($data->vendor->status_request ==1)
                                                    <a href="{{ url('/admin/vendor/change_status_request/'.$data->vendor->id)}}"><i
                                                                class="btn btn-danger ace-icon fa fa-close">{{ trans('lang.An_active') }}</i></a>
                                                @elseif($data->vendor->status_request ==0)
                                                    <a href="{{ url('/admin/vendor/change_status_request/'.$data->vendor->id)}}"><i
                                                                class="btn btn-primary ace-icon fa fa-check-country"> {{ trans('lang.Active') }}</i></a>
                                                @endif
                                            </td>
                                        @endif
                                        @if(permission_show('vendor-show-request'))
                                            <td align="center">
                                                <a href="{{ url('/admin/vendor/show_request/'.$data->vendor->id)}}"><i
                                                            class="btn btn-primary ace-icon fa fa-check-country"> {{ trans('lang.Show') }}</i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th align="center">#</th>
                                    <th align="center">{{ trans('lang.Title') }}</th>
                                    <th align="center">{{ trans('lang.Email') }}</th>
                                    <th align="center">{{ trans('lang.Mobile') }}</th>
                                    <th align="center">{{ trans('lang.Image') }}</th>
                                    @if(permission_show('vendor-status'))
                                        <th align="center">{{ trans('lang.Status') }}</th>
                                    @endif
                                    @if(permission_show('vendor-status-request'))
                                        <th align="center">{{ trans('lang.Status_Request') }}</th>
                                    @endif
                                    @if(permission_show('vendor-show-request'))
                                        <th align="center">{{ trans('lang.Show') }}</th>
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
    {!! JsValidator::formRequest('App\Http\Requests\Acl\Vendor\StatusEditRequest','#status') !!}
@endsection