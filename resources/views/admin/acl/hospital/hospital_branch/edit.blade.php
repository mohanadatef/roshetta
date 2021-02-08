@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Hospital_Branch') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            </li>
            <li><a href="{{ url('/admin/hospital/branch/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : {{$data['hospital']['title'][Language_Locale()]}} </a></li>

        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/hospital/branch/update/'.$data['id'])}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{ $lang->title .' '. trans('lang.Title') }} : <input type="text"
                                                                                                 @if(isset($data['title'][$lang->code])) value="{{$data['title'][$lang->code]}}" @endif
                                                                                                 class="form-control"
                                                                                                 name="title[{{$lang->code}}]"
                                                                                                 placeholder="{{ trans('lang.Message_Title') }}">
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('country_id') ? ' has-error' : "" }}">
                                {{ trans('lang.Country') }} :
                                <select id="country_id" class="form-control" data-placeholder="{{trans('lang.Message_Country')}}" name="country_id">
                                    @foreach($country as  $mycountry)
                                        <option value="{{$mycountry->id}}" @if($mycountry->id == $data['country_id'])selected @endif > {{$mycountry->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : "" }}">
                                {{ trans('lang.City') }} :
                                <select id="city_id" class="form-control" data-placeholder="{{trans('lang.Message_City')}}" name="city_id">
                                    @foreach($city as  $mycity)
                                        <option value="{{$mycity->id}}" @if($mycity->id == $data['city_id'])selected @endif > {{$mycity->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('area_id') ? ' has-error' : "" }}">
                                {{trans('lang.Area')}} :
                                <select id="area_id" class="form-control"
                                        data-placeholder="{{trans('lang.Message_Area')}}" name="area_id">
                                    @foreach($area as  $myarea)
                                        <option value="{{$myarea->id}}" @if($myarea->id == $data['area_id'])selected @endif > {{$myarea->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('address['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{  $lang->title .' '. trans('lang.Address') }} : <input type="text" @if(isset($data['address'][$lang->code]))  value="{{$data['address'][$lang->code]}}" @endif
                                    class="form-control" name="address[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Address') }}">
                                </div>
                            </div>
                        @endforeach
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
    {!! JsValidator::formRequest('App\Http\Requests\Acl\Hospital_Branch\EditRequest','#edit') !!}
@endsection