<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::where('administrator', false)->get();
        $admins = User::where('administrator', true)->get();
        return view('admin.users.index', compact('users', 'admins'));
    }

    public function registrations()
    {
        $pending = User::where('activated', false)->get();
        return view('admin.registrations.index', compact('pending'));
    }

    public function viewPendingRegistration($id)
    {
        $user = User::find($id)->firstOrfail();
        if ($user->activiated) { abort(404); }
        return view('admin.registrations.pendinguser', compact('user'));
    }
}
