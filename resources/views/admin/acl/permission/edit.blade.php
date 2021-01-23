@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Permission') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/permission/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.Permission') }}</a></li>
            <li><a href="{{ url('/admin/permission/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : @if(isset($data['title'][Language_Locale()])) {{$data['title'][Language_Locale()]}} @endif   </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }}: @if(isset($data['title'][Language_Locale()])) {{$data['title'][Language_Locale()]}} @endif   </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/permission/update/'.$data['id'])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : "" }}">
                        {{  trans('lang.Title') }} : <input type="text"  value="{{$data['title']}}"
                        class="form-control" name="title" placeholder="{{ trans('lang.Message_Title') }}">
                    </div>
                    @foreach(language() as $lang)
                        <div class="form-group{{ $errors->has('display_title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Display_Title') }} : <input type="text" @if(isset($data['display_title'][$lang->code])) value="{{$data['display_title'][$lang->code]}}" @endif
                                                                               class="form-control" name="display_title[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Display_Title') }}">
                        </div>
                    @endforeach
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="{{ trans('lang.Edit') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('App\Http\Requests\Acl\Permission\EditRequest','#edit') !!}
@endsection