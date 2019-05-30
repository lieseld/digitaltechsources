<?php

namespace App\Http\Controllers;

use App\User;
use App\TutorialLog;
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

    public function viewUser($id)
    {
        $user = User::whereId($id)->firstOrfail();
        if ($user->activiated === false) { abort(404); }
        return view('admin.users.user', compact('user'));
    }

    public function editUser(Request $request, $id)
    {
        return response()->json(['msg' => $request->all()], 200);
    }

    public function registrations()
    {
        $pending = User::where('activated', false)->get();
        return view('admin.registrations.index', compact('pending'));
    }

    public function viewPendingRegistration($id)
    {
        $user = User::whereId($id)->firstOrfail();
        if ($user->activiated) { abort(404); }
        return view('admin.registrations.pendinguser', compact('user'));
    }

    public function activateUser(Request $request, $id)
    {
        $user = User::whereId($id)->firstOrfail();
        if ($user->activiated) { abort(404); }
        $user->activated = true;
        $user->activated_at = date('Y-m-d H:i:s');
        $user->save();
        $tutorialLog = new TutorialLog([
            'id' => 234,
            'user_id' => $user->id,
            'tutorials_disabled' => false,
            'account_profile' => false,
        ]);
        $tutorialLog->save();
        $request->session()->flash('flash_notification.green', 'User activated!');
        return redirect()->route('admin.users.view', $user->id);
    }
}
