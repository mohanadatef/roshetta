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
            {{ trans('lang.User') }}
            <small>{{ trans('lang.All') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/user/index') }}"><i class="fa fa-Users"></i>{{ trans('lang.Index') }}</a></li>
        </ol>
    </section>
    <section class="content">
        <form id="status" method="get" action="{{ url('/admin/user/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    @if(permission_show('user-create'))
                    <a href="{{  url('/admin/user/create') }}" class="btn btn-primary">{{ trans('lang.Create') }}</a>
                    @endif
                        @if(permission_show('user-many-status'))
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
                                    <th align="center">#</th>
                                    <th align="center">{{ trans('lang.First_Title') }}</th>
                                    <th align="center">{{ trans('lang.Second_Title') }}</th>
                                    <th align="center">{{ trans('lang.Email') }}</th>
                                    <th align="center">{{ trans('lang.Mobile') }}</th>
                                    <th align="center">{{ trans('lang.Role') }}</th>
                                    <th align="center">{{ trans('lang.Image') }}</th>
                                        @if(permission_show('user-status'))
                                    <th align="center">{{ trans('lang.Status') }}</th>
                                        @endif
                                        @if(permission_show('user-edit') || permission_show('user-password'))
                                    <th align="center">{{ trans('lang.Controller') }}</th>
                                            @endif
                                </tr>
                                </thead>
                                <tbody>
                                {{$i=1}}
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">
                                            @if(permission_show('user-many-status'))
                                            @if(auth::user()->role_id == 1 || $data->role_id != 1)
                                            <input type="checkbox" name="change_status[]"
                                                   id="{{$data->id}}" value="{{$data->id}}">
                                                @endif
                                                @endif
                                            {{$i++}}
                                        </td>

                                        <td align="center">{{ $data->first_title }}</td>
                                        <td align="center">{{ $data->second_title }}</td>
                                        <td align="center">{{ $data->email }}</td>
                                        <td align="center">{{ $data->mobile }}</td>
                                        <td align="center">{{ $data->role->title }}</td>
                                        <td class="center">@if($data->image)
                                                <img src="{{ asset('public/images/user/' . $data->image ) }}" style="width:100px;height: 100px">
                                        @else
                                                <img src="{{ asset('public/images/user/profile_user.jpg' ) }}" style="width:100px;height: 100px">
                                                               @endif
                                        </td>
                                            @if(permission_show('user-status'))
                                        <td align="center">
                                            @if(auth::user()->role_id == 1 || $data->role_id != 1)
                                            @if($data->status ==1)
                                                <a href="{{ url('/admin/user/change_status/'.$data->id)}}"><i
                                                            class="btn btn-danger ace-icon fa fa-close">{{ trans('lang.An_active') }}</i></a>
                                            @elseif($data->status ==0)
                                                <a href="{{ url('/admin/user/change_status/'.$data->id)}}"><i
                                                            class="btn btn-primary ace-icon fa fa-check-country"> {{ trans('lang.Active') }}</i></a>
                                            @endif
                                            @endif
                                        </td>
                                            @endif
                                            @if(permission_show('user-edit') || permission_show('user-password'))
                                        <td align="center">
                                            @if(auth::user()->role_id == 1 || $data->role_id != 1)
                                            @if(permission_show('user-edit') )
                                                <a href="{{ url('/admin/user/edit/'.$data->id)}}"><i
                                                            class="btn btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                            data-id=""> {{ trans('lang.Edit') }}</i></a>
                                            @endif
                                                @if(permission_show('user-password'))
                                            <a href="{{url('admin/user/resat_password/'.$data->id)}}"
                                               class="btn btn-success">{{ trans('lang.Change_Password') }}</a>
                                                    @endif
                                                    @endif
                                        </td>
                                                @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                        <th align="center">#</th>
                                    <th align="center">{{ trans('lang.First_Title') }}</th>
                                    <th align="center">{{ trans('lang.Second_Title') }}</th>
                                    <th align="center">{{ trans('lang.Email') }}</th>
                                    <th align="center">{{ trans('lang.Mobile') }}</th>
                                        <th align="center">{{ trans('lang.Role') }}</th>
                                    <th align="center">{{ trans('lang.Image') }}</th>
                                        @if(permission_show('user-status'))
                                            <th align="center">{{ trans('lang.Status') }}</th>
                                        @endif
                                        @if(permission_show('user-edit') || permission_show('user-password'))
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
    {!! JsValidator::formRequest('App\Http\Requests\Acl\User\StatusEditRequest','#status') !!}
@endsection