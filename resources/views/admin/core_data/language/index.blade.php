@extends('includes.admin.master_admin')
@section('title')
    قائمه الدوائر
@endsection
@section('head_style')
    @include('includes.admin.header_datatable')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            الدوائر
            <small>كل الدوائر</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> لوحه التحكم</a></li>
            <li><a href="{{ url('/admin/language/index') }}"><i class="fa fa-languages"></i> الدوائر</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" id="status" action="{{ url('/admin/language/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    <a href="{{  url('/admin/language/create') }}" class="btn btn-primary">اضافه</a>
                    <input type="submit" value="تغير الحاله" class="btn btn-primary">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($datas) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th align="center">#</th>
                                    <th align="center">الاسم</th>
                                    <th align="center">الحاله</th>
                                    <th align="center">التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">
                                                    <input type="checkbox" name="change_status[]" id="{{$data->id}}" value="{{$data->id}}">
                                        </td>
                                        <td align="center">{{ $data->title }}</td>
                                        <td align="center">
                                                @if($data->status ==1)
                                                    <a href="{{ url('/admin/language/change_status/'.$data->id)}}"><i
                                                                class="btn btn-danger ace-icon fa fa-close"> غير مفعل</i></a>
                                                @elseif($data->status ==0)
                                                    <a href="{{ url('/admin/language/change_status/'.$data->id)}}"><i
                                                                class="btn btn-primary ace-icon fa fa-check-language"> مفعل</i></a>
                                                @endif
                                        </td>
                                        <td align="center">
                                                <a href="{{ url('/admin/language/edit/'.$data->id)}}"><i
                                                            class="btn btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                            data-id=""> تعديل</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th align="center">#</th>
                                    <th align="center">الاسم</th>
                                    <th align="center">الحاله</th>
                                    <th align="center">التحكم</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <div align="center">لا يوجد بيانات لعرضها</div>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
        </form>
    </section>
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Core_Data\Language\StatusEditRequest','#status') !!}
@endsection