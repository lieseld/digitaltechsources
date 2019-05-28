@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h1 class="ui header">My Account</h1>
        @if (session()->has('flash_notification.loginsuccess'))
        <div class="ui green message">
            <i class="close icon"></i>
            <div class="header">
                Welcome back, {{Auth::user()->name}}!
            </div>
        </div>
        <script>
            $('.message .close')
                .on('click', function() {
                    $(this)
                        .closest('.message')
                        .transition('fade')
                    ;
                })
            ;
        </script>
        @endif
        <div class="ui grid">
            <div class="four wide column">
                <div class="ui vertical fluid tabular menu">
                    <a class="active item">
                        Profile
                    </a>
                    <a class="item">
                        Data
                    </a>
                </div>
            </div>
            <div class="twelve wide stretched column">
                <div class="ui segment">
                    <h3 class="ui medium header">{{Auth::user()->name}}</h3>
                    <br/>
                    <div class="ui grid">
                        <div class="four wide column">
                            <label>Email</label>
                            <h5 class="ui small header" style="margin-top: 0;">{{Auth::user()->email}}</h5>
                        </div>
                        <div class="four wide column">
                            <label>Alias</label>
                            <h5 class="ui small header" style="margin-top: 0;">{{Auth::user()->alias}}</h5>
                        </div>
                        <div class="four wide column">
                            <label>Group</label>
                            <h5 class="ui small header" style="margin-top: 0;">{{Auth::user()->group}}</h5>
                        </div>
                        <div class="four wide column">
                            <label>Form</label>
                            <h5 class="ui small header" style="margin-top: 0;">{{Auth::user()->form}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
