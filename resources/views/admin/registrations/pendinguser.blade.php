@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h2 class="ui header">Registrations</h2>
        <div class="ui grid">
            <div class="four wide column">
                @include('includes.adminsidebar')
            </div>
            <div class="twelve wide column">
                <h4>Pending User | {{$user->name}}</h4>
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
                            <td>Profession</td>
                            <td>
                                {{$user->profession()}}
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
