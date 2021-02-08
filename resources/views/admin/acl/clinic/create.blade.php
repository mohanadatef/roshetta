@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Create_Information') }}
@endsection
@section('head_style')
    <link rel="stylesheet" href="{{url('public/AdminLTE/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Clinic') }}
            <small>{{ trans('lang.Create_Information') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            </li>
            <li><a href="{{ url('clinic') }}"><i
                            class="fa fa-permsission"></i>{{ trans('lang.Create_Information') }}
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Create_Information') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id='create' action="{{url('admin/clinic/store')}}" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : "" }}">
                                {{ trans('lang.Mobile') }} : <input type="text" class="form-control" name="mobile"
                                                                    value="{{Request::old('mobile')}}"
                                                                    placeholder="{{ trans('lang.Message_Mobile') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('status_type') ? ' has-error' : "" }}">
                                {{trans('lang.Status_Type')}} :
                                <select id="status_type" class="form-control"
                                        data-placeholder="{{trans('lang.Message_Status_Type')}}" name="status_type">
                                    <option selected>{{trans('lang.Select')}}</option>
                                    <option value="1"> {{trans('lang.Move')}}</option>
                                    <option value="0"> {{trans('lang.Stand')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('license') ? ' has-error' : "" }}">
                                {{ trans('lang.License') }} : <input type="text" class="form-control" name="license"
                                                                     value="{{Request::old('license')}}"
                                                                     placeholder="{{ trans('lang.Message_License') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('date_license_end') ? ' has-error' : "" }}">
                                {{ trans('lang.Date_License_End') }} : <input type="date" class="form-control"
                                                                              name="date_license_end"
                                                                              value="{{Request::old('date_license_end')}}"
                                                                              placeholder="{{ trans('lang.Message_Date_License_End') }}">
                            </div>
                        </div>
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
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('company_insurance') ? ' has-error' : "" }}">
                                {{ trans('lang.Company_Insurance') }} :
                                <select id="company_insurance_id" multiple='multiple' class="form-control select2"
                                        data-placeholder="{{trans('lang.Select')}}" name="company_insurance[]">
                                    @foreach($company_insurance as  $mycompany_insurance)
                                        <option value="{{$mycompany_insurance->id}}"> {{$mycompany_insurance->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('specialty_id') ? ' has-error' : "" }}">
                                {{trans('lang.Specialty')}} :
                                <select id="specialty_id" class="form-control" data-placeholder="{{trans('lang.Message_Specialty')}}" name="specialty_id">
                                    <option value="0" selected>{{trans('lang.Select')}}</option>
                                    @foreach($specialty as  $myspecialty)
                                        <option value="{{$myspecialty->id}}"> {{$myspecialty->title}}</option>
                                    @endforeach
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('image_license') ? ' has-error' : "" }}">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>{{ trans('lang.Image_License') }}</label>
                                        </td>
                                        <td width="30"><input type="file" value="{{Request::old('image_License')}}"
                                                              name="image_license"/></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="right"></td>
                                        <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>{{ trans('lang.Image') }}</label></td>
                                        <td width="30"><input type="file" value="{{Request::old('image')}}"
                                                              name="image"/></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="right"></td>
                                        <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('detail['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{$lang->title.' '. trans('lang.Detail') }} : <textarea type="text"
                                                                                            class="form-control"
                                                                                            name="detail[{{$lang->code}}]"
                                                                                            placeholder="{{ trans('lang.Message_Detail') }}">{{Request::old('detail['.$lang->code.']')}}</textarea>
                                </div>
                            </div>
                        @endforeach
                        <div align="center">
                            <input type="submit" class="btn btn-primary" value="{{ trans('lang.Create') }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('public/js/admin/tinymce.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 200,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample styleselect fontselect fontsizeselect',
            image_advtab: true,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>
    @yield('script_description_language')
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
    <script src="{{url('public/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#company_insurance_id').select2()
        })
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Acl\Clinic\CreateRequest','#create') !!}
@endsection