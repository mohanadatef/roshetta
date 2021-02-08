@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Create_Information') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Hospital_Branch') }}
            <small>{{ trans('lang.Create') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            </li>
            <li><a href="{{ url('/admin/hospital/branch/create') }}"><i class="fa fa-permsission"></i>{{ trans('lang.Create') }}
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
                <form id='create' action="{{url('admin/hospital/branch/store')}}" method="POST" >
                    {{csrf_field()}}
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{ $lang->title .' '. trans('lang.Title') }} : <input type="text"
                                                                                          value="{{Request::old('title['.$lang->code.']')}}"
                                                                                          class="form-control"
                                                                                          name="title[{{$lang->code}}]"
                                                                                          placeholder="{{ trans('lang.Message_Title') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('country_id') ? ' has-error' : "" }}">
                                {{trans('lang.Country')}} :
                                <select id="country_id" class="form-control"
                                        data-placeholder="{{trans('lang.Message_Country')}}" name="country_id">
                                    <option value="0" selected>{{trans('lang.Select')}}</option>
                                    @foreach($country as  $mycountry)
                                        <option value="{{$mycountry->id}}"> {{$mycountry->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : "" }}">
                                {{trans('lang.City')}} :
                                <select id="city_id" class="form-control"
                                        data-placeholder="{{trans('lang.Message_City')}}" name="city_id">
                                    <option value="0" selected>{{trans('lang.Select')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('area_id') ? ' has-error' : "" }}">
                                {{trans('lang.Area')}} :
                                <select id="area_id" class="form-control"
                                        data-placeholder="{{trans('lang.Message_Area')}}" name="area_id">
                                    <option value="0" selected>{{trans('lang.Select')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('address['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{  $lang->title .' '. trans('lang.Address') }} : <input type="text"
                                                                                             value="{{Request::old('address['.$lang->code.']')}}"
                                                                                             class="form-control"
                                                                                             name="address[{{$lang->code}}]"
                                                                                             placeholder="{{ trans('lang.Message_Address') }}">
                                </div>
                            </div>
                        @endforeach
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
            var CountryID = $(this).val();
            if (CountryID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('admin/city/get_list_city_json').'/'}}" + CountryID,
                    success: function (res) {
                        if (res) {
                            $("#city_id").empty();
                            $("#city_id").append('<option>{{trans('lang.Select')}}</option>');
                            $.each(res, function (key, value) {
                                $("#city_id").append('<option value="' + value['id'] + '">' + value['title']['{{language_Locale()}}'] + '</option>');

                            });
                        } else {
                            $("#city_id").empty();
                        }
                    }, error: function (res) {
                        console.log(res);
                    }

                });
            } else {
                $("#city_id").empty();
            }
        });
    </script>
    <script type="text/javascript">
        $('#city_id').change(function () {
            var CountryID = $('#country_id').val();
            var CityID = $(this).val();
            if (CityID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('admin/area/get_list_Area_json').'/'}}" + CountryID + "/" + CityID,
                    success: function (res) {
                        if (res) {
                            $("#area_id").empty();
                            $("#area_id").append('<option>{{trans('lang.Select')}}</option>');
                            $.each(res, function (key, value) {
                                $("#area_id").append('<option value="' + value['id'] + '">' + value['title']['{{language_Locale()}}'] + '</option>');

                            });
                        } else {
                            $("#area_id").empty();
                        }
                    }, error: function (res) {
                        console.log(res);
                    }

                });
            } else {
                $("#area_id").empty();
            }
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Acl\Hospital_Branch\CreateRequest','#create') !!}
@endsection