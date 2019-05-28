@extends('layouts.app')

@section('content')
    <div class="ui main container">
        <h2 class="ui header">Admin</h2>
        <div class="ui grid">
            <div class="two wide column">
                @include('includes.adminsidebar')
            </div>
        </div>
    </div>
@endsection
