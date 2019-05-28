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
        Log-in to your account
      </div>
    </h2>
    <form class="ui large form" method="POST" action="{{ route('login') }}">
        @csrf
      <div class="ui stacked segment">
        <div class="field {{ $errors->has('email') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field {{ $errors->has('password') ? 'error' : '' }}">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class=field">
            <div class="ui checkbox">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

          @if ($errors->has('email'))
              <div class="ui error visible message">
                  <p>{{$errors->first('email')}}</p>
              </div>
          @endif

          @if ($errors->has('password'))
              <div class="ui error visible message">
                  <p>{{$errors->first('password')}}</p>
              </div>
          @endif
        <br/>
        <input type="submit" class="ui fluid large blue submit button" value="Login">
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      <a href="{{ route('register') }}">Register</a>
    </div>
  </div>
</div>

</body>

</html>
