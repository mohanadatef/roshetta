@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Language') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/circle/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.Language') }}</a></li>
            <li><a href="{{ url('/admin/circle/edit/'.$data->id) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : {{$data->title}} </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }}: {{$data->title }} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/language/update/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : "" }}">
                        {{ trans('lang.Title') }} : <input type="text" value="{{$data->title}}"
                                         class="form-control" name="title" placeholder="{{ trans('lang.Message_Title') }}">
                    </div>
                    <div class="form-group{{ $errors->has('code') ? ' has-error' : "" }}">
                        {{ trans('lang.Code') }} : <input type="text" value="{{$data->code}}"
                                         class="form-control" name="code" placeholder="{{ trans('lang.Message_Code') }}">
                    </div>
                    <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                        {{ trans('lang.Order') }} : <input type="text" value="{{$data->order}}"
                                                          class="form-control" name="order" placeholder="{{ trans('lang.Message_Order') }}">
                    </div>
                    <div align="center">
                    <img src="{{url('public/images/language/'.$data->image)}}" style="width: 50%;height: 50%">
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
                        <table class="table">
                            <tr>
                                <td width="40%" align="right"><label>{{ trans('lang.Message_Image') }}</label></td>
                                <td width="30"><input type="file" value="{{Request::old('image')}}" name="image"/></td>
                            </tr>
                            <tr>
                                <td width="40%" align="right"></td>
                                <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="{{ trans('lang.Edit') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('App\Http\Requests\Core_Data\Language\EditRequest','#edit') !!}
@endsection