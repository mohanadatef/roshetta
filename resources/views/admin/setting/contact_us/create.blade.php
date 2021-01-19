@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Create') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Contact_Us') }}
            <small>{{ trans('lang.Create') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/contact_us/index') }}"><i class="fa fa-permsissions"></i>{{ trans('lang.Index') }}
                </a></li>
            <li><a href="{{ url('/admin/contact_us/create') }}"><i class="fa fa-permsission"></i>{{ trans('lang.Create') }}
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
                <form id='create' action="{{url('admin/contact_us/store')}}" method="POST" >
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                        {{ trans('lang.Email') }} : <input type="email" class="form-control" name="email" value="{{Request::old('email')}}"
                                                           placeholder="{{ trans('lang.Message_Email') }}">
                    </div>
                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : "" }}">
                        {{ trans('lang.Mobile') }} : <input type="text" class="form-control" name="mobile" value="{{Request::old('mobile')}}"
                                                            placeholder="{{ trans('lang.Message_Mobile') }}">
                    </div>
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('address['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title . trans('lang.Address') }} : <input type="text" value="{{Request::old('address['.$lang->code.']')}}"
                                                                                 class="form-control" name="address[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Address') }}">
                        </div>
                    @endforeach
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('time_work['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title . trans('lang.Time_Work') }} : <input type="text" value="{{Request::old('time_work['.$lang->code.']')}}"
                                                                                   class="form-control" name="time_work[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Time_Work') }}">
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
    {!! JsValidator::formRequest('App\Http\Requests\Setting\Contact_Us\CreateRequest','#create') !!}
@endsection