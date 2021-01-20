@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Medicine') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/medicine/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.Medicine') }}</a></li>
            <li><a href="{{ url('/admin/medicine/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} : @if(isset($data['title'][Language_Locale()])) {{$data['title'][Language_Locale()]}} @endif   </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }}: @if(isset($data['title'][Language_Locale()])) {{$data['title'][Language_Locale()]}} @endif   </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/medicine/update/'.$data['id'])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('title['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Title') }} : <input type="text" @if(isset($data['title'][$lang->code])) value="{{$data['title'][$lang->code]}}" @endif
                                                                               class="form-control" name="title[{{$lang->code}}]" placeholder="{{ trans('lang.Message_Title') }}">
                        </div>
                    @endforeach
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('detail['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Detail') }} :  <textarea type="text" id="detail" class="form-control"
                                                                                        name="detail"
                                                                                        placeholder="{{ trans('lang.Message_Detail') }}">@if(isset($data['detail'][$lang->code])) {{$data['detail'][$lang->code]}} @endif </textarea>
                        </div>
                    @endforeach
                    <div class="form-group{{ $errors->has('medicine_category_id') ? ' has-error' : "" }}">
                        {{ trans('lang.Medicine_Category') }} :
                        <select id="medicine_category" class="form-control" data-placeholder="{{trans('lang.Message_Medicine_Category')}}" name="medicine_category_id">
                            @foreach($medicine_category as  $mymedicine_category)
                                <option value="{{$mymedicine_category->id}}" @if($mymedicine_category->id == $data['medicine_category_id'])selected @endif > {{$mymedicine_category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                        {{ trans('lang.Order') }} : <input type="text" value="{{$data['order']}}"
                                                          class="form-control" name="order" placeholder="{{ trans('lang.Message_Order') }}">
                    </div>
                    <div align="center">
                        <img src="{{url('public/images/medicine/'.$data['image'])}}" style="width: 50%;height: 50%">
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
    <script>
        CKEDITOR.replace('detail');
    </script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    {{-- <script src="{{asset('public/js/admin/tinymce.js')}}"></script>--}}
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
    {!! JsValidator::formRequest('App\Http\Requests\Core_Data\Medicine\EditRequest','#edit') !!}
@endsection