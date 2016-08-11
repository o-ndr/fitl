<!-- 
Source of this language switcher code: 
http://www.glutendesign.com/posts/detect-and-change-language-on-the-fly-with-laravel
-->
{!! Form::open(['method' => 'POST', 'route' => 'changelocale', 'class' => 'form-inline navbar-select']) !!}

    <div class="form-group @if($errors->first('locale')) has-error @endif">
        <span aria-hidden="true"><i class="fa fa-flag"></i></span>
        {!! Form::select(
            'locale',
            ['en' => 'English', 'fr' => 'Français'],
            \App::getLocale(),
            [
                'id'       => 'locale',
                'class'    => 'form-control',
                'required' => 'required',
                'onchange' => 'this.form.submit()',
            ]
        ) !!}
        <small class="text-danger">{{ $errors->first('locale') }}</small>
    </div>

    <div class="btn-group pull-right sr-only">
        {!! Form::submit("Change", ['class' => 'btn btn-success']) !!}
    </div>

{!! Form::close() !!}
