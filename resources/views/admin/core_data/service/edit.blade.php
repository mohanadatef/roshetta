@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Service') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/service/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.Service') }}</a></li>
            <li><a href="{{ url('/admin/service/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : {{$data['title'][Language_Locale()]}}  </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }}: {{$data['title'][Language_Locale()]}}  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/service/update/'.$data['id'])}}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Title') }} : <input type="text" value="{{$data['title'][$lang->code]}}"
                                                                               class="form-control" name="title[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Title') }}">
                        </div>
                    @endforeach
                    <div class="form-group{{ $errors->has('service_category_id') ? ' has-error' : "" }}">
                        {{ trans('lang.Service_Category') }} :
                        <select id="service_category" class="form-control" data-placeholder="{{trans('lang.Message_Service_Category')}}" name="service_category_id">
                            @foreach($service_category as  $myservice_category)
                                <option value="{{$myservice_category->id}}" @if($myservice_category->id == $data['service_category_id'])selected @endif > {{$myservice_category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                        {{ trans('lang.Order') }} : <input type="text" value="{{$data['order']}}"
                                                          class="form-control" name="order" placeholder="{{ trans('lang.Message_Order') }}">
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
    {!! JsValidator::formRequest('App\Http\Requests\Core_Data\Service\EditRequest','#edit') !!}
@endsection