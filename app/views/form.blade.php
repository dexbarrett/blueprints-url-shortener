<!DOCTYPE html>
<html lang="en">
    <head>
        <title>URL Shortener</title>
        {{ HTML::style('assets/css/styles.css') }}
    </head>
    <body>
        <div id="container">
            <h2>Uber-Shortener</h2>
            @if(Session::has('errors'))
            <h3 class="error">{{ $errors->first('link') }}</h3>
            @endif
            @if(Session::has('link'))
            <h3 class="success">
                Your shortened URL is 
                {{ HTML::link(Session::get('link'), action('LinkController@showUrl', Session::get('link'))) }}
            </h3>
            @endif
            @if(Session::has('message'))
            <h3 class="error">
                {{ Session::get('message') }}
            </h3>
            @endif
            {{ Form::open(array('url' => '/')) }}
            {{ Form::text('link', null, array('placeholder' => 'Insert your URL and press enter')) }}
            {{ Form::close() }}
        </div>
    </body>
</html>