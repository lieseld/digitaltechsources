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
}
