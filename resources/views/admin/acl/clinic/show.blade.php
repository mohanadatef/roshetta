@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit_Information') }}
@endsection
@section('head_style')
    <link rel="stylesheet" href="{{url('public/AdminLTE/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Clinic') }}
            <small>{{ trans('lang.Edit_Information') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            </li>
            <li><a href="{{ url('/admin/clinic/show/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Show') }} : {{$data['title'][Language_Locale()]}} </a></li>

        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit_Information') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{url('admin/clinic/change_status_request/'.$data['id'])}}" method="Get"
                      enctype="multipart/form-data">
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{ $lang->title .' '. trans('lang.Title') }} : <input type="text"  disabled="disabled"
                                                                                          @if(isset($data['title'][$lang->code])) value="{{$data['title'][$lang->code]}}" @endif
                                                                                          class="form-control"
                                                                                          name="title[{{$lang->code}}]"
                                                                                          placeholder="{{ trans('lang.Message_Title') }}">
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : "" }}">
                                {{ trans('lang.Mobile') }} : <input type="text" class="form-control"  disabled="disabled" name="mobile" value="{{$data['mobile']}}"
                                                                    placeholder="{{ trans('lang.Message_Mobile') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('license') ? ' has-error' : "" }}">
                                {{ trans('lang.License') }} : <input type="text" class="form-control"  disabled="disabled" name="license"
                                                                     value="{{$data['license']}}"
                                                                     placeholder="{{ trans('lang.Message_License') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('date_license_end') ? ' has-error' : "" }}">
                                {{ trans('lang.Date_License_End') }} : <input type="date" class="form-control"
                                                                              name="date_license_end"  disabled="disabled"
                                                                              value="{{$data['date_license_end']}}"
                                                                              placeholder="{{ trans('lang.Message_Date_License_End') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('country_id') ? ' has-error' : "" }}">
                                {{ trans('lang.Country') }} :
                                <select id="country_id" class="form-control"  disabled="disabled" data-placeholder="{{trans('lang.Message_Country')}}" name="country_id">
                                    @foreach($country as  $mycountry)
                                        <option value="{{$mycountry->id}}" @if($mycountry->id == $data['country_id'])selected @endif > {{$mycountry->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('city_id') ? ' has-error' : "" }}">
                                {{ trans('lang.City') }} :
                                <select id="city_id" class="form-control"  disabled="disabled" data-placeholder="{{trans('lang.Message_City')}}" name="city_id">
                                    @foreach($city as  $mycity)
                                        <option value="{{$mycity->id}}" @if($mycity->id == $data['city_id'])selected @endif > {{$mycity->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('area_id') ? ' has-error' : "" }}">
                                {{trans('lang.Area')}} :
                                <select id="area_id" class="form-control"  disabled="disabled"
                                        data-placeholder="{{trans('lang.Message_Area')}}" name="area_id">
                                    @foreach($area as  $myarea)
                                        <option value="{{$myarea->id}}" @if($myarea->id == $data['area_id'])selected @endif > {{$myarea->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('company_insurance') ? ' has-error' : "" }}">
                                {{ trans('lang.Company_Insurance') }} :
                                <select id="company_insurance_id" multiple='multiple' class="form-control select2"  disabled="disabled"
                                        data-placeholder="{{trans('lang.Select')}}" name="company_insurance[]">
                                    @foreach($company_insurance as  $mycompany_insurance)
                                        <option value="{{$mycompany_insurance->id}}" @foreach($data['company_insurance'] as  $mycompany_insurances) @if($mycompany_insurance->id == $mycompany_insurances['id']) selected   @endif @endforeach> {{$mycompany_insurance->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('address['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{  $lang->title .' '. trans('lang.Address') }} : <input  disabled="disabled" type="text" @if(isset($data['address'][$lang->code]))  value="{{$data['address'][$lang->code]}}" @endif
                                    class="form-control" name="address[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Address') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{url('public/images/clinic/'.$data['image_license'])}}" style="width: 50px;height: 50px">
                        </div>
                        <div class="col-md-6">
                            <img src="{{url('public/images/clinic/'.$data['image'])}}" style="width: 50px;height: 50px">
                        </div>
                    </div>
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('detail['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{$lang->title.' '. trans('lang.Detail') }} : <textarea type="text" class="form-control"  disabled="disabled"
                                                                                            name="detail[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Detail') }}" disabled="disabled">@if(isset($data['detail'][$lang->code])) {{$data['detail'][$lang->code]}} @endif</textarea>
                                </div>
                            </div>
                        @endforeach
                            <div align="center">
                                @if($data['status_request'] == 1)
                                    <input type="submit" class="btn btn-danger" value="{{ trans('lang.An_active') }}">
                                    <a href="{{ url('/admin/clinic/index')}}"><i
                                                class="btn btn-primary ">{{ trans('lang.Back') }}</i></a>
                                @elseif($data['status_request'] == 0)
                                    <input type="submit" class="btn btn-danger" value="{{ trans('lang.Active') }}">
                                    <a href="{{ url('/admin/clinic/index_request')}}"><i
                                                class="btn btn-primary ">{{ trans('lang.Back') }}</i></a>
                                @endif
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
    <script src="{{url('public/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#company_insurance_id').select2()
        })
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Acl\Clinic\EditRequest','#edit') !!}
@endsection