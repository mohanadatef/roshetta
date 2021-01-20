@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Contact_Us') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/contact_us/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.Contact_Us') }}</a></li>
            <li><a href="{{ url('/admin/contact_us/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/contact_us/update/'.$data['id'])}}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                        {{ trans('lang.Email') }} : <input type="email" class="form-control" name="email" value="{{$data['email']}}"
                                                   placeholder="{{ trans('lang.Message_Email') }}">
                    </div>
                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : "" }}">
                        {{ trans('lang.Mobile') }} : <input type="text" class="form-control" name="mobile" value="{{$data['mobile']}}"
                                                           placeholder="{{ trans('lang.Message_Mobile') }}">
                    </div>
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('address['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Address') }} : <input type="text" @if(isset($data['address'][$lang->code]))  value="{{$data['address'][$lang->code]}}" @endif
                                                                               class="form-control" name="address[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Address') }}">
                        </div>
                    @endforeach
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('time_work['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Time_Work') }} : <input type="text" @if(isset($data['time_work'][$lang->code]))  value="{{$data['time_work'][$lang->code]}}" @endif
                                                                                 class="form-control" name="time_work[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Time_Work') }}">
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
    {!! JsValidator::formRequest('App\Http\Requests\Setting\Contact_Us\EditRequest','#edit') !!}
@endsection