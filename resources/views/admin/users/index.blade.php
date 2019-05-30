@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h2 class="ui header">Users</h2>
        <div class="ui grid">
            <div class="four wide column">
                @include('includes.adminsidebar')
            </div>
            <div class="twelve wide column">`
                <h4>Administrators</h4>
                <table id="adminDataTable" class="ui celled table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Group</th>
                        <th>View</th>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->group}}</td>
                                <td>
                                    <a href="{{route('admin.users.view', $admin->id)}}">
                                        <i class="eye icon"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4>Users</h4>
                <table id="userDataTable" class="ui celled table">
                    <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Group</th>
                    <th>View</th>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->group}}</td>
                            <td>
                                <a href="{{route('admin.users.view', $user->id)}}">
                                    <i class="eye icon"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready(function() {
                    $('#adminDataTable').DataTable();
                    $('#userDataTable').DataTable();
                } );
            </script>
        </div>
    </div>
@endsection
