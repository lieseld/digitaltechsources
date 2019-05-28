<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Zip;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userProfile()
    {
        return view('accounts.profile');
    }

    public function changeEmail(Request $request)
    {
        $this->validate($request, [
            'old_email' => 'required|email|max:255',
            'new_email' => 'required|email|unique:users,email|max:255'
        ]);

        $user = Auth::user();

        if ($request->get('old_email') != $user->email)
        {
            $request->session()->flash('flash_notification.changeoldemailinvalid');
            return back();
        }

        $user->email = $request->get('new_email');
        $user->save();

        $request->session()->flash('flash_notification.green', 'Email changed!');
        return back();
    }

    public function processDataDownload(Request $request)
    {
        abort(503);
    }
}
