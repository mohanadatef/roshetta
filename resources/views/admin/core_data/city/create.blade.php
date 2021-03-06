@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Create') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.City') }}
            <small>{{ trans('lang.Create') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/city/index') }}"><i class="fa fa-permsissions"></i>{{ trans('lang.Index') }}</a>
            </li>
            <li><a href="{{ url('/admin/city/create') }}"><i class="fa fa-permsission"></i>{{ trans('lang.Create') }}
                </a>
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
                <form id='create' action="{{url('admin/city/store')}}" method="POST">
                    {{csrf_field()}}
                    @foreach(language() as $lang)
                        <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{ $lang->title .' '. trans('lang.Title') }} : <input type="text"
                                                                                  value="{{Request::old('title['.$lang->code.']')}}"
                                                                                  class="form-control"
                                                                                  name="title[{{$lang->code}}]"
                                                                                  placeholder="{{ trans('lang.Message_Title') }}">
                        </div>
                    @endforeach
                    <div class="form-group{{ $errors->has('country_id') ? ' has-error' : "" }}">
                        {{trans('lang.Country')}} :
                        <select id="country" class="form-control select2" data-placeholder="{{trans('lang.Message_Country')}}" name="country_id">
                            <option value="0" selected>{{trans('lang.Select')}}</option>
                            @foreach($country as  $mycountry)
                                <option value="{{$mycountry->id}}"> {{$mycountry->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                        {{ trans('lang.Order') }} : <input type="text" value="{{Request::old('order')}}"
                                                           class="form-control" name="order"
                                                           placeholder="{{ trans('lang.Message_Order') }}">
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
    {!! JsValidator::formRequest('App\Http\Requests\Core_Data\City\CreateRequest','#create') !!}
@endsection