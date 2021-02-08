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
            {{ trans('lang.Doctor') }}
            <small>{{ trans('lang.Edit_Information') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            </li>
            <li><a href="{{ url('/admin/doctor/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : {{Auth::user()->title}} </a></li>

        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit_Information') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/doctor/update/'.$data['id'])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('title_doctor['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{ $lang->title .' '. trans('lang.Title_Doctor') }} : <input type="text"
                                                                                                 @if(isset($data['title_doctor'][$lang->code])) value="{{$data['title_doctor'][$lang->code]}}" @endif
                                                                                                 class="form-control"
                                                                                                 name="title_doctor[{{$lang->code}}]"
                                                                                                 placeholder="{{ trans('lang.Message_Title_Doctor') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach(language() as $lang)
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('university['.$lang->code.']') ? ' has-error' : "" }}">
                                    {{ $lang->title .' '. trans('lang.University') }} : <input type="text"
                                                                                               @if(isset($data['university'][$lang->code])) value="{{$data['university'][$lang->code]}}" @endif
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
                                <select id="status_home" class="form-control"
                                        data-placeholder="{{trans('lang.Message_Gender')}}" name="status_home">
                                    <option value="1" @if($data['status_home'] == 1 ) selected @endif> {{trans('lang.Active')}}</option>
                                    <option value="0" @if($data['status_home'] == 1 ) selected @endif> {{trans('lang.An_active')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('status_mobile') ? ' has-error' : "" }}">
                                {{trans('lang.Status_Mobile')}} :
                                <select id="status_mobile" class="form-control"
                                        data-placeholder="{{trans('lang.Message_Gender')}}" name="status_mobile">
                                    <option value="1" @if($data['status_mobile'] == 1 ) selected @endif> {{trans('lang.Active')}}</option>
                                    <option value="0" @if($data['status_mobile'] == 1 ) selected @endif> {{trans('lang.An_active')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('license') ? ' has-error' : "" }}">
                                {{ trans('lang.License') }} : <input type="text" class="form-control" name="license"
                                                                     value="{{$data['license']}}"
                                                                     placeholder="{{ trans('lang.Message_License') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('date_license_end') ? ' has-error' : "" }}">
                                {{ trans('lang.Date_License_End') }} : <input type="date" class="form-control"
                                                                              name="date_license_end"
                                                                              value="{{$data['date_license_end']}}"
                                                                              placeholder="{{ trans('lang.Message_Date_License_End') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('specialty_id') ? ' has-error' : "" }}">
                                {{trans('lang.Specialty')}} :
                                <select id="specialty_id" class="form-control" data-placeholder="{{trans('lang.Message_Specialty')}}" name="specialty_id">
                                    <option value="0" selected>{{trans('lang.Select')}}</option>
                                    @foreach($specialty as  $myspecialty)
                                        <option value="{{$myspecialty->id}}" @if($data['specialty_id'] == $myspecialty->id ) selected @endif> {{$myspecialty->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('scientific_degree_id') ? ' has-error' : "" }}">
                                {{trans('lang.Scientific_Degree')}} :
                                <select id="scientific_degree" class="form-control" data-placeholder="{{trans('lang.Message_Scientific_Degree')}}" name="scientific_degree_id">
                                    <option value="0" selected>{{trans('lang.Select')}}</option>
                                    @foreach($scientific_degree as  $myscientific_degree)
                                        <option value="{{$myscientific_degree->id}}" @if($data['scientific_degree_id'] == $myscientific_degree->id ) selected @endif> {{$myscientific_degree->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('sub_specialty') ? ' has-error' : "" }}">
                                {{ trans('lang.Sub_Specialty') }} :
                                <select id="sub_specialty_id" multiple='multiple' class="form-control select2" data-placeholder="{{trans('lang.Select')}}"  name="sub_specialty[]">
                                    @foreach($sub_specialty as  $mysub_specialty)
                                        <option value="{{$mysub_specialty->id}}" @foreach($data['sub_specialty'] as  $mysub) @if($mysub_specialty->id == $mysub['id']) selected   @endif @endforeach  > {{$mysub_specialty->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('company_insurance') ? ' has-error' : "" }}">
                                {{ trans('lang.Company_Insurance') }} :
                                <select id="company_insurance_id" multiple='multiple' class="form-control select2"
                                        data-placeholder="{{trans('lang.Select')}}" name="company_insurance[]">
                                    @foreach($company_insurance as  $mycompany_insurance)
                                        <option value="{{$mycompany_insurance->id}}" @foreach($data['company_insurance'] as  $mycompany_insurances) @if($mycompany_insurance->id == $mycompany_insurances['id']) selected   @endif @endforeach> {{$mycompany_insurance->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('year_experience') ? ' has-error' : "" }}">
                                {{ trans('lang.Year_Experience') }} : <input type="text" class="form-control"
                                                                             name="year_experience"
                                                                             value="{{$data['year_experience']}}"
                                                                             placeholder="{{ trans('lang.Message_Year_Experience') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{url('public/images/user/doctor/'.$data['image_license'])}}" style="width: 50px;height: 50px">
                            <div class="form-group{{ $errors->has('image_license') ? ' has-error' : "" }}">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>{{ trans('lang.Image_License') }}</label></td>
                                        <td width="30"><input type="file" value="{{Request::old('image_license')}}" name="image_license"/></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="right"></td>
                                        <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{url('public/images/user/doctor/'.$data['image_university'])}}" style="width: 50px;height: 50px">
                            <div class="form-group{{ $errors->has('image_university') ? ' has-error' : "" }}">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>{{ trans('lang.Image_University') }}</label></td>
                                        <td width="30"><input type="file" value="{{Request::old('image_university')}}" name="image_university"/></td>
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
                                {{$lang->title.' '. trans('lang.Detail') }} : <textarea type="text" class="form-control"
                                                                                        name="detail[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Detail') }}">@if(isset($data['detail'][$lang->code])) {{$data['detail'][$lang->code]}} @endif</textarea>
                            </div>
                        </div>
                        @endforeach
                        <div align="center">
                        <input type="submit" class="btn btn-primary" value="{{ trans('lang.Edit') }}">
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
        $('#specialty_id').change(function () {
            var SpecialtyID = $(this).val();
            if (SpecialtyID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('admin/sub_specialty/get_list_sub_specialty_json').'/'}}" + SpecialtyID,
                    success: function (res) {
                        if (res) {
                            $("#sub_specialty_id").empty();
                            $.each(res, function (key, value) {
                                $("#sub_specialty_id").append('<option value="' + value['id'] + '">' + value['title']['{{language_Locale()}}'] + '</option>');

                            });
                        } else {
                            $("#sub_specialty_id").empty();
                        }
                    },error:function(res){
                        console.log(res);
                    }

                });
            } else {
                $("#sub_specialty_id").empty();
            }
        });
    </script>
    <script src="{{url('public/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#sub_specialty_id').select2()
        })
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#company_insurance_id').select2()
        })
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Acl\Doctor\EditRequest','#edit') !!}
@endsection