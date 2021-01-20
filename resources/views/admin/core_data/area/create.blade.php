@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Create') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Area') }}
            <small>{{ trans('lang.Create') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/area/index') }}"><i class="fa fa-permsissions"></i>{{ trans('lang.Index') }}</a></li>
            <li><a href="{{ url('/admin/area/create') }}"><i class="fa fa-permsission"></i>{{ trans('lang.Create') }}</a>
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
                <form id='create' action="{{url('admin/area/store')}}" method="POST">
                    {{csrf_field()}}
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{ $lang->title .' '. trans('lang.Title') }} : <input type="text" value="{{Request::old('title['.$lang->code.']')}}"
                                                                              class="form-control" name="title[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Title') }}">
                        </div>
                    @endforeach
                    <div class="form-group{{ $errors->has('country_id') ? ' has-error' : "" }}">
                        {{trans('lang.Country')}} :
                        <select id="country_id" class="form-control select2" data-placeholder="{{trans('lang.Message_Country')}}" name="country_id">
                            <option value="0" selected>{{trans('lang.Select')}}</option>
                            @foreach($country as  $mycountry)
                                <option value="{{$mycountry->id}}"> {{$mycountry->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('city_id') ? ' has-error' : "" }}">
                        {{trans('lang.City')}} :
                        <select id="city_id" class="form-control select2" data-placeholder="{{trans('lang.Message_City')}}" name="city_id">
                            <option value="0" selected>{{trans('lang.Select')}}</option>
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                        {{ trans('lang.Order') }} : <input type="text" value="{{Request::old('order')}}"
                                         class="form-control" name="order" placeholder="{{ trans('lang.Message_Order') }}">
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
    <script type="text/javascript">
        $('#country_id').change(function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('admin/city/get_list_city_json').'/'}}" + countryID,
                    success: function (res) {
                        if (res) {
                            $("#city_id").empty();
                            $("#city_id").append('<option>{{trans('lang.Select')}}</option>');
                            $.each(res, function (key, value) {
                                    $("#city_id").append('<option value="' + value['id'] + '">' + value['title']['{{$language_Locale}}'] + '</option>');
                            });
                        } else {
                            $("#city_id").empty();
                        }
                    },error:function(res){
                        console.log(res);
                    }

                });
            } else {
                $("#city_id").empty();
            }
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Core_Data\Area\CreateRequest','#create') !!}
@endsection