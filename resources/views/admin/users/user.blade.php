@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h2 class="ui header">Users</h2>
        <div class="ui grid">
            <div class="four wide column">
                @include('includes.adminsidebar')
            </div>
            <div class="twelve wide column">
                <h3>
                    {{$user->name}}
                    @if ($user->administrator)
                    <div class="ui pink label">Administrator</div>
                    @endif
                </h3>
                <table class="ui celled table">
                    <thead>
                    <th>Variable</th>
                    <th>Value</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Alias</td>
                            <td>{{$user->alias}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>
                                <script>
                                    let countryCode = '{{$user->country}}';
                                    countryCode = countryCode.toUpperCase();
                                    console.log(countryCode);
                                    document.write(getCountryName(countryCode));
                                </script>
                                <i class="{{$user->country}} flag"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Educational institution</td>
                            <td>
                                {{$user->educational_institution}}
                            </td>
                        </tr>
                        <tr>
                            <td>Profession</td>
                            <td>
                                {{$user->profession()}}
                            </td>
                        </tr>
                        <tr>
                            <td>Registered At</td>
                            <td>
                                {{$user->created_at}}
                            </td>
                        </tr>
                        <tr>
                            <td>Activated At</td>
                            <td>
                                {{$user->activated_at}}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="ui green left icon button">
                    <i class="check icon"></i>
                    Activate User
                </a>
                <a href="#" class="ui red left icon button">
                    <i class="times icon"></i>
                    Delete User
                </a>
            </div>
        </div>
    </div>
@endsection
