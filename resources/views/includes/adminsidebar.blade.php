<div class="ui vertical menu">
    <a href="{{route('admin.index')}}" class="item">
        Home
        <i class="home icon"></i>
    </a>
    <a href="{{route('admin.users')}}" class="item">
        <i class="users icon"></i>
        Users
    </a>
    <a href="{{route('admin.registrations')}}" class="item">
        <i class="envelope open icon"></i>
        Registrations
        @if (count(\App\User::where('activated', false)->get()) >= 1)
        <div class="ui blue label">{{count(\App\User::where('activated', false)->get())}}</div>
        @endif
    </a>
</div>