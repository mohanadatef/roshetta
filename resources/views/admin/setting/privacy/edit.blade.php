@extends('includes.admin.master_admin')
@section('title')
    {{ trans('lang.Edit') }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ trans('lang.Privacy') }}
            <small>{{ trans('lang.Edit') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>{{ trans('lang.DashBoard') }}</a></li>
            <li><a href="{{ url('/admin/privacy/index') }}"><i class="fa fa-permsissions"></i> {{ trans('lang.Privacy') }}</a></li>
            <li><a href="{{ url('/admin/privacy/edit/'.$data['id']) }}"><i class="fa fa-permsission"></i>{{ trans('lang.Edit') }} </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>{{ trans('lang.Edit') }} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="edit" action="{{url('admin/privacy/update/'.$data['id'])}}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    @foreach($language as $lang)
                        <div class="form-group{{ $errors->has('detail['.$lang->code.']') ? ' has-error' : "" }}">
                            {{  $lang->title .' '. trans('lang.Detail') }} :  <textarea type="text" id="detail" class="form-control"
                                              name="detail[{{$lang->code}}]"
                                              placeholder="{{ trans('lang.Message_Detail') }}">@if(isset($data['detail'][$lang->code])) {{$data['detail'][$lang->code]}} @endif</textarea>
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
    {!! JsValidator::formRequest('App\Http\Requests\Setting\Privacy\EditRequest','#edit') !!}
@endsection