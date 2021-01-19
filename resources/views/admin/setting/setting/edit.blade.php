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
            <li><a href="{{ url('/admin/setting/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.Language') }}</a></li>
            <li><a href="{{ url('/admin/setting/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : {{$data['title'][Language_Locale()]}} </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }}: {{$data['title'][Language_Locale()]}} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/setting/update/'.$data['id'])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title . trans('lang.Title') }} : <input type="text" value="{{$data['title'][$lang->code]}}"
                                                               class="form-control" name="title[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Title') }}">
                        </div>
                    @endforeach
                    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : "" }}">
                        {{ trans('lang.Face_Book') }} : <input type="text" value="{{$data['facebook']}}"
                                                               class="form-control" name="facebook" placeholder="{{ trans('lang.Message_Face_Book') }}">
                    </div>
                    <div class="form-group{{ $errors->has('youtube') ? ' has-error' : "" }}">
                        {{ trans('lang.Youtube') }} : <input type="text" value="{{$data['youtube']}}"
                                                             class="form-control" name="youtube" placeholder="{{ trans('lang.Message_Youtube') }}">
                    </div>
                    <div class="form-group{{ $errors->has('twitter') ? ' has-error' : "" }}">
                        {{ trans('lang.Twitter') }} : <input type="text" value="{{$data['twitter']}}"
                                                             class="form-control" name="twitter" placeholder="{{ trans('lang.Message_Twitter') }}">
                    </div>
                    <div class="form-group{{ $errors->has('instagram') ? ' has-error' : "" }}">
                        {{ trans('lang.Instagram') }} : <input type="text" value="{{$data['instagram']}}"
                                                               class="form-control" name="instagram" placeholder="{{ trans('lang.Message_Instagram') }}">
                    </div>
                    <div class="form-group{{ $errors->has('app_google') ? ' has-error' : "" }}">
                        {{ trans('lang.App_Google') }} : <input type="text" value="{{$data['app_google']}}"
                                                                class="form-control" name="app_google" placeholder="{{ trans('lang.Message_App_Google') }}">
                    </div>
                    <div class="form-group{{ $errors->has('app_ios') ? ' has-error' : "" }}">
                        {{ trans('lang.App_Ios') }} : <input type="text" value="{{$data['app_ios']}}"
                                                             class="form-control" name="app_ios" placeholder="{{ trans('lang.Message_App_Ios') }}">
                    </div>
                    <div align="center">
                        <img src="{{url('public/images/setting/'.$data['logo'])}}" style="width: 50%;height: 50%">
                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : "" }}">
                            <table class="table">
                                <tr>
                                    <td width="40%" align="right"><label>{{ trans('lang.Message_Image') }}</label></td>
                                    <td width="30"><input type="file" value="{{Request::old('logo')}}" name="logo"/></td>
                                </tr>
                                <tr>
                                    <td width="40%" align="right"></td>
                                    <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="{{ trans('lang.Create') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Setting\Setting\EditRequest','#edit') !!}
@endsection