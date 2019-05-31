<div class="ui vertical menu">
    <a href="{{route('admin.index')}}" class="item {{ Request::is('admin') ? 'active' : '' }}">
        Home
        <i class="home icon"></i>
    </a>
    <a href="{{route('admin.users')}}" class="item {{ Request::is('admin/users') || Request::is('admin/users/*') ? 'active' : '' }}">
        <i class="user icon"></i>
        Users
    </a>
    <a href="{{route('admin.users.groups')}}" class="item {{ Request::is('admin/users/groups') || Request::is('admin/users/groups/*') ? 'active' : '' }}">
        <i class="users icon"></i>
        User Groups
    </a>
    <a href="{{route('admin.registrations')}}" class="item {{ Request::is('admin/registrations') || Request::is('admin/registrations/*') ? 'active' : '' }}">
        <i class="envelope open icon"></i>
        Registrations
        @if (count(\App\User::where('activated', false)->get()) >= 1)
        <div class="ui blue label">{{count(\App\User::where('activated', false)->get())}}</div>
        @endif
    </a>
</div>