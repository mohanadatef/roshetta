@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Area') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/area/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.Area') }}</a></li>
            <li><a href="{{ url('/admin/area/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : @if(isset($data['title'][Language_Locale()])) {{$data['title'][Language_Locale()]}} @endif  </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }} : @if(isset($data['title'][Language_Locale()])) {{$data['title'][Language_Locale()]}} @endif  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/area/update/'.$data['id'])}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Title') }} : <input type="text" @if(isset($data['title'][$lang->code])) value="{{$data['title'][$lang->code]}}" @endif
                                                                               class="form-control" name="title[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Title') }}">
                        </div>
                    @endforeach
                    <div class="form-group{{ $errors->has('country_id') ? ' has-error' : "" }}">
                        {{ trans('lang.Country') }} :
                        <select id="country_id" class="form-control" data-placeholder="{{trans('lang.Message_Country')}}" name="country_id">
                            @foreach($country as  $mycountry)
                                <option value="{{$mycountry->id}}" @if($mycountry->id == $data['country_id'])selected @endif > {{$mycountry->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('city_id') ? ' has-error' : "" }}">
                        {{ trans('lang.City') }} :
                        <select id="city_id" class="form-control" data-placeholder="{{trans('lang.Message_City')}}" name="city_id">
                            @foreach($city as  $mycity)
                                <option value="{{$mycity->id}}" @if($mycity->id == $data['city_id'])selected @endif > {{$mycity->title}}</option>
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
    <script type="text/javascript">
        $('#country_id').change(function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('get_list_city_json')}}?country_id=" + countryID,
                    success: function (res) {
                        if (res) {
                            $("#city_id").empty();
                            $("#city_id").append('<option>{{trans('lang.Select')}}</option>');
                            $.each(res, function (key, value) {
                                $("#city_id").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $("#city_id").empty();
                        }
                    }
                });
            } else {
                $("#city_id").empty();
            }
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Core_Data\Area\EditRequest','#edit') !!}
@endsection