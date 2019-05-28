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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/se/dt-1.10.18/datatables.min.css"/>

    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/se/dt-1.10.18/datatables.min.js"></script>
    <script src="{{asset('js/countries.js')}}"></script>
    <style>
        .ui.footer.segment {
            margin: 5em 0em 0em;
            padding: 5em 0em;
            height: auto;
        }

        nav.ui.large.menu {
           margin-bottom: 0;
        }

        .ui.main.container {
            margin-top: 25px;
        }

        .no-margin-header {
            margin-top: 0 !important;
        }
    </style>
</head>
<body>
    <app>
        <nav class="ui large menu">
            <div class="ui container">
                <a href="{{ url('/') }}" class="header item">
                    <h3>Digitaltechsources</h3>
                </a>
                <a class="item">
                    Resources
                </a>
                <a class="item">
                    Upload
                </a>
                <a class="item">
                    Tutorials
                </a>
                <div class="right menu">
                    @if (Auth::check())
                    @if (Auth::user()->administrator)
                    <a href="{{route('admin.index')}}" class="{{Request::is('admin') || Request::is('admin/*') ? 'active' : ''}} item ">
                        <i class="cog icon"></i>
                        Admin
                    </a>
                    @endif
                    <div class="ui simple dropdown item">
                        <i class="user icon"></i>
                        {{Auth::user()->name}}
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="{{route('account.profile')}}">
                                My Account
                            </a>
                            <div class="ui divider"></div>
                            <div class="inverted red item">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                    <a href="{{route('login')}}" class="item">
                        <i class="key icon"></i>
                        Login
                    </a>
                    @endif
                </div>
            </div>
        </nav>
        @if (session()->has('flash_notification.green'))
            <div>
                <div class="ui green message" style="border-radius: 0;">
                        <i class="close icon"></i>
                        <div class="header">
                            {{ Session::get('flash_notification.green') }}
                        </div>
                </div>
            </div>
            <script>
                $('.ui.green.message')
                    .on('click', function() {
                        $(this)
                            .closest('.message')
                            .transition('fade')
                        ;
                    })
                ;
            </script>
        @elseif (session()->has('flash_notification.red'))
            <div>
                <div class="ui red message" style="border-radius: 0;">
                    <div class="ui container">
                        <i class="close icon"></i>
                        <p>
                            {{ Session::get('flash_notification.red') }}
                        </p>
                    </div>
                </div>
            </div>
            <script>
                $('.ui.red.message')
                    .on('click', function() {
                        $(this)
                            .closest('.message')
                            .transition('fade')
                        ;
                    })
                ;
            </script>
        @endif
        <main>
            @yield('content')
        </main>
        <footer class="ui inverted vertical footer segment">
            <div class="ui center aligned container">
                <b>Copyright (C) 2019 Liesel Downes, All Rights Reserved</b><br/>
                <div class="ui horizontal inverted small divided link list">
                    <a class="item" href="#">Privacy Policy</a>
                    <a class="item" href="#">
                        <i class="github icon"></i>
                        GitHub
                    </a>
                    <a class="item">
                        Contact Us
                    </a>
                </div>
            </div>
        </footer>
        <script>
            $(document).ready(function(){

                $('.message.close')
                    .on('click', function() {
                        $(this)
                            .closest('.message')
                            .transition('fade')
                        ;
                    })
                ;
            });
        </script>
    </app>
</body>
</html>
