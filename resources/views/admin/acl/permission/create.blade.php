@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Create') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Permission') }}
            <small>{{ trans('lang.Create') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/permission/index') }}"><i class="fa fa-permsissions"></i>{{ trans('lang.Index') }}</a></li>
            <li><a href="{{ url('/admin/permission/create') }}"><i class="fa fa-permsission"></i>{{ trans('lang.Create') }}</a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Create') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id='create' action="{{url('admin/permission/store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : "" }}">
                        {{ trans('lang.Title') }} : <input type="text" value="{{Request::old('title')}}"
                                                           class="form-control" name="title" placeholder="{{ trans('lang.Message_Title') }}">
                    </div>
                    @foreach(language() as $lang)
                        <div class="form-group{{ $errors->has('display_title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{ $lang->title .' '. trans('lang.Display_Title') }} : <input type="text" value="{{Request::old('display_title['.$lang->code.']')}}"
                                                                              class="form-control" name="display_title[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Display_Title') }}">
                        </div>
                    @endforeach
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="{{ trans('lang.Create') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('App\Http\Requests\Acl\Permission\CreateRequest','#create') !!}
@endsection