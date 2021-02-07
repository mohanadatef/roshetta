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
            {{ trans('lang.Hospatil') }}
            <small>{{ trans('lang.Show_Information') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            </li>
            <li><a href="{{ url('hospital'.$data['id']) }}"><i
                            class="fa fa-permsission"></i>{{ trans('lang.Show') }} : {{Auth::user()->title}} </a></li>

        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit_Information') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{url('admin/hospatil/change_status_request/'.$data['id'])}}" method="Get"
                      enctype="multipart/form-data">
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{ $lang->title .' '. trans('lang.Title') }} : <input type="text"
                                                                                                 disabled="disabled"
                                                                                                 @if(isset($data['title'][$lang->code])) value="{{$data['title'][$lang->code]}}"
                                                                                                 @endif
                                                                                                 class="form-control"
                                                                                                 name="title[{{$lang->code}}]"
                                                                                                 placeholder="{{ trans('lang.Message_Title') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('university['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{ $lang->title .' '. trans('lang.University') }} : <input type="text"
                                                                                               disabled="disabled"
                                                                                               @if(isset($data['university'][$lang->code])) value="{{$data['university'][$lang->code]}}"
                                                                                               @endif
                                                                                               class="form-control"
                                                                                               name="university[{{$lang->code}}]"
                                                                                               placeholder="{{ trans('lang.Message_University') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('status_home') ? ' has-error' : "" }}">
                                {{trans('lang.Status_Home')}} :
                                <select id="status_home" class="form-control" disabled="disabled"
                                        data-placeholder="{{trans('lang.Message_Gender')}}" name="status_home">
                                    <option value="1"
                                            @if($data['status_home'] == 1 ) selected @endif> {{trans('lang.Active')}}</option>
                                    <option value="0"
                                            @if($data['status_home'] == 1 ) selected @endif> {{trans('lang.An_active')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('status_mobile') ? ' has-error' : "" }}">
                                {{trans('lang.Status_Mobile')}} :
                                <select id="status_mobile" class="form-control" disabled="disabled"
                                        data-placeholder="{{trans('lang.Message_Gender')}}" name="status_mobile">
                                    <option value="1"
                                            @if($data['status_mobile'] == 1 ) selected @endif> {{trans('lang.Active')}}</option>
                                    <option value="0"
                                            @if($data['status_mobile'] == 1 ) selected @endif> {{trans('lang.An_active')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('license') ? ' has-error' : "" }}">
                                {{ trans('lang.License') }} : <input type="text" class="form-control" name="license"
                                                                     value="{{$data['license']}}" disabled="disabled"
                                                                     placeholder="{{ trans('lang.Message_License') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('date_license_end') ? ' has-error' : "" }}">
                                {{ trans('lang.Date_License_End') }} : <input type="date" class="form-control"
                                                                              name="date_license_end"
                                                                              disabled="disabled"
                                                                              value="{{$data['date_license_end']}}"
                                                                              placeholder="{{ trans('lang.Message_Date_License_End') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('specialty_id') ? ' has-error' : "" }}">
                                {{trans('lang.Specialty')}} :
                                <select id="specialty_id" class="form-control"
                                        data-placeholder="{{trans('lang.Message_Specialty')}}" name="specialty_id"
                                        disabled="disabled">
                                    <option selected> {{$data['specialty']['title'][Language_Locale()]}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('scientific_degree_id') ? ' has-error' : "" }}">
                                {{trans('lang.Scientific_Degree')}} :
                                <select id="scientific_degree" class="form-control" data-placeholder="{{trans('lang.Message_Scientific_Degree')}}" name="scientific_degree_id" disabled="disabled">
                                    <option selected> {{$data['scientific_degree']['title'][Language_Locale()]}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('sub_specialty') ? ' has-error' : "" }}">
                                {{ trans('lang.Sub_Specialty') }} :
                                <select id="sub_specialty_id" multiple='multiple' class="form-control select2"
                                        data-placeholder="{{trans('lang.Select')}}" name="sub_specialty[]"
                                        disabled="disabled">
                                    @foreach($data['sub_specialty'] as  $mysub_specialty)
                                        <option selected> {{$mysub_specialty['title'][Language_Locale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('year_experience') ? ' has-error' : "" }}">
                                {{ trans('lang.Year_Experience') }} : <input type="text" class="form-control"
                                                                             name="year_experience" disabled="disabled"
                                                                             value="{{$data['year_experience']}}"
                                                                             placeholder="{{ trans('lang.Message_Year_Experience') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{url('public/images/user/hospatil/'.$data['image_license'])}}"
                                 style="width: 50px;height: 50px">
                        </div>
                        <div class="col-md-6">
                            <img src="{{url('public/images/user/hospatil/'.$data['image_university'])}}"
                                 style="width: 50px;height: 50px">
                        </div>
                    </div>
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('detail['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{$lang->title.' '. trans('lang.Detail') }} : <textarea type="text"
                                                                                            class="form-control"
                                                                                            disabled="disabled"
                                                                                            name="detail[{{$lang->code}}]"
                                                                                            placeholder="{{ trans('lang.Message_Detail') }}">@if(isset($data['detail'][$lang->code])) {{$data['detail'][$lang->code]}} @endif</textarea>
                                </div>
                            </div>
                        @endforeach
                        <div align="center">
                            @if($data['status_request'] == 1)
                                <input type="submit" class="btn btn-danger" value="{{ trans('lang.An_active') }}">
                                <a href="{{ url('/admin/hospatil/index')}}"><i
                                            class="btn btn-primary ">{{ trans('lang.Back') }}</i></a>
                            @elseif($data['status_request'] == 0)
                                <input type="submit" class="btn btn-danger" value="{{ trans('lang.Active') }}">
                                <a href="{{ url('/admin/hospatil/index_request')}}"><i
                                            class="btn btn-primary ">{{ trans('lang.Back') }}</i></a>
                            @endif
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
            $('#sub_specialty_id').select2()
        })
    </script>
@endsection