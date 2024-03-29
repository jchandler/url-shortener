<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .form-control {
              padding: 10px 10px;
              font-size: 16px;
            }

            .btn {
              background-color: #AAAAAA;
              border: none;
              color: white;
              padding: 15px 15px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin-top: 40px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    URL Shortener
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                    @endforeach
                </div>
                @endif
                <div>@include('flash::message')</div>

                {!! Form::open(['route' => 'url.save']) !!}
                <div class="form-group">
                  {!! Form::label('longUrl', 'Long URL:') !!}
                  {!! Form::text('longUrl', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Get Short URL', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}

            </div>
        </div>
    </body>
</html>
