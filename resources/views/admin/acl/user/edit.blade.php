@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.User') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/user/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.User') }}</a></li>
            <li><a href="{{ url('/admin/user/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : @if(isset($data['first_title'][Language_Locale()])) {{$data['first_title'][Language_Locale()]}} @endif  @if(isset($data['second_title'][Language_Locale()])) {{$data['second_title'][Language_Locale()]}} @endif  </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }}: @if(isset($data['first_title'][Language_Locale()])) {{$data['first_title'][Language_Locale()]}} @endif  @if(isset($data['second_title'][Language_Locale()])) {{$data['second_title'][Language_Locale()]}} @endif  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/user/update/'.$data['id'])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    @foreach(language() as $lang)
                        <div class="row">
                        <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Title') }} : <input type="text" @if(isset($data['title'][$lang->code])) value="{{$data['title'][$lang->code]}}" @endif
                                                                               class="form-control" name="title[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Title') }}">
                        </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : "" }}">
                                {{ trans('lang.Mobile') }} : <input type="text" class="form-control" name="mobile" value="{{$data['mobile']}}"
                                                                    placeholder="{{ trans('lang.Message_Mobile') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                                {{ trans('lang.Email') }} : <input type="email" class="form-control" name="email" value="{{$data['email']}}"
                                                                   placeholder="{{ trans('lang.Message_Email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : "" }}">
                                {{trans('lang.Gender')}} :
                                <select id="gender" class="form-control select2" data-placeholder="{{trans('lang.Message_Gender')}}" name="gender">
                                    <option value="1" @if($data['gender'] == 1 ) selected @endif> {{trans('lang.Man')}}</option>
                                    <option value="0" @if($data['gender'] == 0 ) selected @endif> {{trans('lang.Woman')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('date_birth') ? ' has-error' : "" }}">
                                {{ trans('lang.Date_Dirth') }} : <input type="date" class="form-control" name="date_birth" value="{{$data['date_birth']}}"
                                                                        placeholder="{{ trans('lang.Message_Date_Dirth') }}">
                            </div>
                        </div>
                    </div>
                    @if(permission_show('role-edit'))
                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : "" }}">
                        {{trans('lang.Role')}} :
                        <select id="role" class="form-control select2" data-placeholder="{{trans('lang.Message_Role')}}" name="role_id">
                            <option value="0" selected>{{trans('lang.Select')}}</option>
                            @foreach($role as  $myrole)
                                <option value="{{$myrole->id}}" @if($data['role_id'] == $myrole->id ) selected @endif> {{$myrole->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div align="center">
                        @if($data['image'])
                        <img src="{{url('public/images/user/'.$data['image'])}}" style="width: 50px;height: 50px">
                        @else
                            <img src="{{ asset('public/images/user/profile_user.jpg' ) }}" style="width:100px;height: 100px">
                        @endif
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
    {!! JsValidator::formRequest('App\Http\Requests\Acl\User\EditRequest','#edit') !!}
@endsection