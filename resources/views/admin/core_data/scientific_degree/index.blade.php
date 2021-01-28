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
            {{ trans('lang.Scientific_Degree') }}
            <small>{{ trans('lang.All') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/scientific_degree/index') }}"><i class="fa fa-scientific_degrees"></i>{{ trans('lang.Index') }}</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" id="status" action="{{ url('/admin/scientific_degree/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    @if(permission_show('scientific-degree-create'))
                    <a href="{{  url('/admin/scientific_degree/create') }}" class="btn btn-primary">{{ trans('lang.Create') }}</a>
                    @endif
                        @if(permission_show('scientific-degree-many-status'))
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
                                    <th align="center">{{ trans('lang.Title') }}</th>
                                        @if(permission_show('scientific-degree-status'))
                                    <th align="center">{{ trans('lang.Status') }}</th>
                                        @endif
                                        @if(permission_show('scientific-degree-edit'))
                                    <th align="center">{{ trans('lang.Controller') }}</th>
                                            @endif
                                </tr>
                                </thead>
                                <tbody>
                                {{$i=1}}
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">
                                            @if(permission_show('scientific-degree-many-status'))
                                            <input type="checkbox" name="change_status[]" id="{{$data->id}}" value="{{$data->id}}">
                                            @endif
                                            {{$i++}}
                                        </td>
                                        <td align="center">{{ $data->title }}</td>
                                            @if(permission_show('scientific-degree-status'))
                                        <td align="center">
                                                @if($data->status ==1)
                                                    <a href="{{ url('/admin/scientific_degree/change_status/'.$data->id)}}"><i
                                                                class="btn btn-danger ace-icon fa fa-close">{{ trans('lang.An_active') }}</i></a>
                                                @elseif($data->status ==0)
                                                    <a href="{{ url('/admin/scientific_degree/change_status/'.$data->id)}}"><i
                                                                class="btn btn-primary ace-icon fa fa-check-scientific_degree"> {{ trans('lang.Active') }}</i></a>
                                                @endif
                                        </td>
                                            @endif
                                            @if(permission_show('scientific-degree-edit'))
                                        <td align="center">
                                                <a href="{{ url('/admin/scientific_degree/edit/'.$data->id)}}"><i
                                                            class="btn btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                            data-id=""> {{ trans('lang.Edit') }}</i></a>
                                        </td>
                                                @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                        <th align="center">#</th>
                                    <th align="center">{{ trans('lang.Title') }}</th>
                                    @if(permission_show('scientific-degree-status'))
                                        <th align="center">{{ trans('lang.Status') }}</th>
                                    @endif
                                    @if(permission_show('scientific-degree-edit'))
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
    {!! JsValidator::formRequest('App\Http\Requests\Core_Data\Scientific_Degree\StatusEditRequest','#status') !!}
@endsection