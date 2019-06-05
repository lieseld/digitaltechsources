<?php

namespace App\Http\Controllers;

use App\User;
use App\TutorialLog;
use App\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function userGroups()
    {
        $groups = UserGroup::all();
        return view('admin.users.groups.index', compact('groups'));
    }

    public function viewUserGroup($id)
    {
        $group = UserGroup::whereId($id)->firstOrFail();
        $members = $group->members;
        return view('admin.users.groups.group', compact('group', 'members'));
    }

    public function

    public function viewUser($id)
    {
        $user = User::whereId($id)->firstOrfail();
        $groups = UserGroup::all();
        if ($user->activiated === false) { abort(404); }
        return view('admin.users.user', compact('user', 'groups'));
    }

    public function editUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'max:255|required',
            'alias' => 'sometimes|max:255',
            'country' => 'max:255|required',
            'educational_institution' => 'max:255|required',
            'profession' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->toJson()], 400);
        }

        $user = User::whereId($request->get('user_id'))->firstOrFail();
        $user->fill($request->all());
        $user->save();


        return response()->json(['msg' => 'Saved changes'], 200);
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
