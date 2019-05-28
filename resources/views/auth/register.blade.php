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
  </script>
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
    <form class="ui large form" method="POST" action="{{ route('login') }}">
        @csrf
      <div class="ui stacked segment">
        <div class="field">
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="name" placeholder="Your full name">
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="at icon"></i>
                <input type="text" name="email" placeholder="Your E-mail address">
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="key icon"></i>
                <input type="password" name="email" placeholder="Enter a password">
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="key icon"></i>
                <input type="password" name="email" placeholder="Confirm the password">
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="graduation cap icon"></i>
                <input type="password" name="email" placeholder="Educational institution">
            </div>
        </div>
        <p>
            Your data will be handled in accordance with the Privacy Policy. All registrations will be approved by administrators.
        </p>
        <input type="submit" class="ui fluid large blue submit button" value="Submit">
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      <a href="{{ route('login') }}">Login</a>
    </div>`
  </div>
</div>

</body>

</html>
