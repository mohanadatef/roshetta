@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('head_style')
    <link href="{{url('public/css/admin/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/admin/multi-select.css')}}">
    <style>
        .ms-container {
            width: 50%;
        }
        li.ms-elem-selectable, .ms-selected {
            padding: 5px !important;
        }
        .ms-list {
            height: 250px !important;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Role') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/role/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.Role') }}</a></li>
            <li><a href="{{ url('/admin/role/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : @if(isset($data['title'][Language_Locale()])) {{$data['title'][Language_Locale()]}} @endif   </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }}: @if(isset($data['title'][Language_Locale()])) {{$data['title'][Language_Locale()]}} @endif   </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/role/update/'.$data['id'])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    @foreach(language() as $lang)
                        <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Title') }} : <input type="text" @if(isset($data['title'][$lang->code])) value="{{$data['title'][$lang->code]}}" @endif
                                                                               class="form-control" name="title[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Title') }}">
                        </div>
                    @endforeach
                    <div class="form-group{{ $errors->has('permission_id') ? ' has-error' : "" }}">
                        {{ trans('lang.Permission') }} :
                        <select  id="permission"  multiple='multiple' class="form-control"  name="permission[]">
                            @foreach($permission as  $mypermission)
                                <option value="{{$mypermission['id']}}" @foreach($permission_role as  $mypermission_role) @if($mypermission_role['permission_id'] ==$mypermission['id'])){ selected  } @endif @endforeach > {{$mypermission['display_title']}}</option>
                            @endforeach
                        </select>
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
    <script src="{{url('public/js/admin/jquery.multi-select.js')}}"></script>
    <script type="text/javascript">
        $('#permission').multiSelect();
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Acl\Role\EditRequest','#edit') !!}
@endsection