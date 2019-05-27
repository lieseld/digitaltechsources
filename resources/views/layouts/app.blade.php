<!DOCTYPE html>
<html lang="en-gb">
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
</head>
<body>
    <div id="app">
        <div class="ui inverted menu">
            <div class="header item">Brand</div>
            <div class="active item">Link</div>
            <a class="item">Link</a>
            <div class="ui dropdown item">
                Dropdown
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item">Action</div>
                    <div class="item">Another Action</div>
                    <div class="item">Something else here</div>
                    <div class="divider"></div>
                    <div class="item">Separated Link</div>
                    <div class="divider"></div>
                    <div class="item">One more separated link</div>
                </div>
            </div>
            <div class="right menu">
                <div class="item">
                    <div class="ui transparent inverted icon input">
                        <i class="search icon"></i>
                        <input type="text" placeholder="Search">
                    </div>
                </div>
                <a class="item">Link</a>
            </div>
        </div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
