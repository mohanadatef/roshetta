@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Create') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.User') }}
            <small>{{ trans('lang.Create') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/user/index') }}"><i class="fa fa-permsissions"></i>{{ trans('lang.Index') }}</a>
            </li>
            <li><a href="{{ url('/admin/user/create') }}"><i class="fa fa-permsission"></i>{{ trans('lang.Create') }}
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
                <form id='create' action="{{url('admin/user/store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @foreach(language() as $lang)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('first_title['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{ $lang->title .' '. trans('lang.First_Title') }} : <input type="text"
                                                                                                value="{{Request::old('first_title['.$lang->code.']')}}"
                                                                                                class="form-control"
                                                                                                name="first_title[{{$lang->code}}]"
                                                                                                placeholder="{{ trans('lang.Message_First_Title') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('second_title['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{ $lang->title .' '. trans('lang.Second_Title') }} : <input type="text"
                                                                                                 value="{{Request::old('second_title['.$lang->code.']')}}"
                                                                                                 class="form-control"
                                                                                                 name="second_title[{{$lang->code}}]"
                                                                                                 placeholder="{{ trans('lang.Message_Second_Title') }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : "" }}">
                                {{ trans('lang.Mobile') }} : <input type="text" class="form-control" name="mobile" value="{{Request::old('mobile')}}"
                                                                    placeholder="{{ trans('lang.Message_Mobile') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                                {{ trans('lang.Email') }} : <input type="email" class="form-control" name="email" value="{{Request::old('email')}}"
                                                                   placeholder="{{ trans('lang.Message_Email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                                {{ trans('lang.Password') }} : <input type="password" class="form-control" name="password" value="{{Request::old('password')}}"
                                                                    placeholder="{{ trans('lang.Message_Password') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                                {{ trans('lang.Password_Confirmation') }} : <input type="password" class="form-control" name="password_confirmation" value="{{Request::old('password')}}"
                                                                      placeholder="{{ trans('lang.Message_Password') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : "" }}">
                                {{trans('lang.Gender')}} :
                                <select id="gender" class="form-control select2" data-placeholder="{{trans('lang.Message_Gender')}}" name="gender">
                                    <option  selected>{{trans('lang.Select')}}</option>
                                        <option value="1"> {{trans('lang.Man')}}</option>
                                        <option value="0"> {{trans('lang.Woman')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('date_birth') ? ' has-error' : "" }}">
                                {{ trans('lang.Date_Dirth') }} : <input type="date" class="form-control" name="date_birth" value="{{Request::old('date_birth')}}"
                                                                                   placeholder="{{ trans('lang.Message_Date_Dirth') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : "" }}">
                        {{trans('lang.Role')}} :
                        <select id="role" class="form-control select2" data-placeholder="{{trans('lang.Message_Role')}}" name="role_id">
                            <option value="0" selected>{{trans('lang.Select')}}</option>
                            @foreach($role as  $myrole)
                                <option value="{{$myrole->id}}"> {{$myrole->title}}</option>
                            @endforeach
                        </select>
                    </div>
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
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="{{ trans('lang.Create') }}">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('App\Http\Requests\Acl\User\CreateRequest','#create') !!}
@endsection