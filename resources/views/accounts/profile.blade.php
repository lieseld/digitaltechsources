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
            <div class="ui top attached secondary  pointing  tabular menu">
                <a class="item active" data-tab="first">Profile</a>
                <a class="item" data-tab="second"></a>
                <a class="item" data-tab="third"></a>
            </div>
            <div class="ui bottom attached  tab segment active" data-tab="first">
                <h3 class="ui medium header">{{Auth::user()->name}}</h3>
                <br/>
                <div class="ui grid">
                    <div class="four wide column">
                        <label>Email</label>
                        <h5 class="ui small header" style="margin-top: 0;">{{Auth::user()->email}}</h5>
                        <a href="#" id="changeemailb" class="ui basic small button">Change Email</a>
                        <script>
                            $(document).on("click", "#changeemailb", function(){
                                $('#changeEmailModal')
                                    .modal('show')
                                ;
                            });
                        </script>
                    </div>
                    <div class="four wide column">
                        <label>Alias</label>
                        <h5 class="ui small header" style="margin-top: 0;">{{Auth::user()->alias}}</h5>
                    </div>
                    <div class="four wide column">
                        <label>Group</label>
                        @if (Auth::user()->group)
                        <div class="{{Auth::user()->group->colour}} text" style="margin-top: 0;">
                            <i class="{{Auth::user()->group->colour}} circle icon"></i>
                            {{Auth::user()->group->name}}
                        </div>
                        @else
                        No group
                        @endif
                    </div>
                    <div class="four wide column">
                        <label>Form</label>
                        <h5 class="ui small header" style="margin-top: 0;">{{Auth::user()->form}}</h5>
                    </div>
                </div>
                <div class="ui divider"></div>
                <a href="#" class="ui button">Change Password</a>
                <div class="ui divider"></div>
                <h3 class="ui medium header">Data Management</h3>
                <a href="{{route('account.datadownload')}}" class="ui button">Download my Data</a>
            </div>
            <div class="ui bottom attached  tab segment" data-tab="second">
                Second
            </div>
            <div class="ui bottom attached tab segment" data-tab="third">
                Third
            </div>
        </div>
        <script>
            $('.tabular.menu .item').tab();
        </script>
    </div>
    <div class="ui small modal" id="changeEmailModal">
        <i class="close icon"></i>
        <div class="header">
            Change my email
        </div>
        <div class="content">
            <form action="{{route('account.changeemail')}}" method="post" class="ui form">
                @csrf
                <div class="field">
                    <label>Current email address</label>
                    <div class="ui input">
                        <input name="old_email" required type="text" placeholder="me@contoso.com">
                    </div>
                </div>
                <div class="field">
                    <label>New email address</label>
                    <div class="ui input">
                        <input name="new_email" required type="email" placeholder="me@contoso.com">
                    </div>
                </div>
                @if ($errors->all())
                    <div class="ui error visible message">
                        <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('flash_notification.changeoldemailinvalid'))
                    <div class="ui error visible message">
                        <p>Your old email is incorrect.</p>
                    </div>
                @endif
                <input type="submit" class="ui green button" value="Change">
            </form>
        </div>
    </div>

    @if (session()->has('flash_notification.changeoldemailinvalid'))
        <script>
            $(document).ready(function() {
                $('#changeEmailModal')
                    .modal('show')
                ;
            });
        </script>
    @endif
    @if ($errors->all())
        <script>
            $(document).ready(function() {
                $('#changeEmailModal')
                    .modal('show')
                ;
            });
        </script>
    @endif
@endsection
