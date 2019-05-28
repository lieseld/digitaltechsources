<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Digitaltechsources</title>

    <!--Stylesheets-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />

    <!--Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>
    <style type="text/css">
        body {
            background-color: #DADADA;
        }
        body > .grid {
            height: 100%;
        }
        .image {
            margin-top: -100px;
        }
        .column {
            max-width: 450px;
        }
    </style>
</head>
<body>

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui blue image header">
            <div class="content">
                Register
            </div>
        </h2>
        <form class="ui large form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="ui stacked segment">
                <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input value="{{ old('name') }}" required type="text" name="name" placeholder="Your full name">
                    </div>
                </div>
                @if ($errors->has('name'))
                    <div class="ui error visible message">
                        <p>{{$errors->first('name')}}</p>
                    </div>
                @endif
                <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="at icon"></i>
                        <input value="{{ old('email') }}" required type="email" name="email" placeholder="Your E-mail address">
                    </div>
                </div>
                @if ($errors->has('email'))
                    <div class="ui error visible message">
                        <p>{{$errors->first('email')}}</p>
                    </div>
                @endif
                <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="key icon"></i>
                        <input required type="password" name="password" placeholder="Enter a password">
                    </div>
                </div>
                @if ($errors->has('password'))
                    <div class="ui error visible message">
                        <p>{{$errors->first('password')}}</p>
                    </div>
                @endif
                <div class="field">
                    <div class="ui left icon input">
                        <i class="key icon"></i>
                        <input required type="password" name="password_confirmation" placeholder="Confirm the password">
                    </div>
                </div>
                <div class="field {{ $errors->has('educational_institution') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <i class="graduation cap icon"></i>
                        <input value="{{ old('educational_institution') }}" required type="text" name="educational_institution" placeholder="Educational institution">
                    </div>
                </div>
                @if ($errors->has('educational_institution'))
                    <div class="ui error visible message">
                        <p>{{$errors->first('educational_institution')}}</p>
                    </div>
                @endif
                <p>
                    Your data will be handled in accordance with the Privacy Policy. All registrations will be approved by administrators.
                </p>
                <input type="submit" class="ui fluid large green submit button" value="Register!">
            </div>
        </form>

        <div class="ui message">
            <a href="{{ route('login') }}">Login</a>
        </div>`
    </div>
</div>

</body>

</html>
