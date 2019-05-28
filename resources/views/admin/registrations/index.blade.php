@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h2 class="ui header">Registrations</h2>
        <div class="ui grid">
            <div class="four wide column">
                @include('includes.adminsidebar')
            </div>
            <div class="twelve wide column">
                <h4>Pending Registrations</h4>
                <table id="dataTable" class="ui celled table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Registered At</th>
                        <th>View</th>
                    </thead>
                    <tbody>
                        @foreach ($pending as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.registrations.view', $user->id)}}">
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
                    $('#dataTable').DataTable();
                } );
            </script>
        </div>
    </div>
@endsection
