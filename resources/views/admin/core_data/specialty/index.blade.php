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
            {{ trans('lang.Specialty') }}
            <small>{{ trans('lang.All') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/specialty/index') }}"><i class="fa fa-specialtys"></i>{{ trans('lang.Index') }}</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" id="status" action="{{ url('/admin/specialty/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    <a href="{{  url('/admin/specialty/create') }}" class="btn btn-primary">{{ trans('lang.Create') }}</a>
                    <input type="submit" value="{{ trans('lang.Change_Status') }}" class="btn btn-primary">
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
                                    <th class="center">{{ trans('lang.Image') }}</th>
                                    <th align="center">{{ trans('lang.Status') }}</th>
                                    <th align="center">{{ trans('lang.Controller') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">
                                                    <input type="checkbox" name="change_status[]" id="{{$data->id}}" value="{{$data->id}}">
                                        </td>
                                        <td align="center">{{ $data->title }}</td>
                                        <td class="center"><img src="{{ asset('public/images/specialty/' . $data->image ) }}" style="width:100px;height: 100px"></td>
                                        <td align="center">
                                                @if($data->status ==1)
                                                    <a href="{{ url('/admin/specialty/change_status/'.$data->id)}}"><i
                                                                class="btn btn-danger ace-icon fa fa-close">{{ trans('lang.An_active') }}</i></a>
                                                @elseif($data->status ==0)
                                                    <a href="{{ url('/admin/specialty/change_status/'.$data->id)}}"><i
                                                                class="btn btn-primary ace-icon fa fa-check-specialty"> {{ trans('lang.Active') }}</i></a>
                                                @endif
                                        </td>
                                        <td align="center">
                                                <a href="{{ url('/admin/specialty/edit/'.$data->id)}}"><i
                                                            class="btn btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                            data-id=""> {{ trans('lang.Edit') }}</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th align="center">#</th>
                                    <th align="center">{{ trans('lang.Title') }}</th>
                                    <th class="center">{{ trans('lang.Image') }}</th>
                                    <th align="center">{{ trans('lang.Status') }}</th>
                                    <th align="center">{{ trans('lang.Controller') }}</th>
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
    {!! JsValidator::formRequest('App\Http\Requests\Core_Data\Specialty\StatusEditRequest','#status') !!}
@endsection