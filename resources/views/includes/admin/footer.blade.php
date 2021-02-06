<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>{{trans('lang.Copy')}}</b> 1.0.0
    </div>
    <div class="pull-right" style="margin-right: 24px">
    {!! Form::open(['url'=>'admin/language/setLang','method'=>'post']) !!}
        <div class="form-group">
        <select name='lang' onchange="this.form.submit();">
            @foreach(Language() as $lang)
                <option value='{{$lang->code}}'   style="background-image:url({{url('public/images/language/'.$lang->image)}});"
                        @if( \Illuminate\Support\Facades\App::getLocale() == $lang->code )selected @endif >{{$lang->title}}</option>
            @endforeach
        </select>
        </div>
        {!! Form::close() !!}
    </div>

    <strong>{{trans('lang.Copy_Read')}}</strong> <a href="#"> </a>.
</footer>
@yield('footer')