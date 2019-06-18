<?php

namespace App\Http\Controllers;

use App\ContentReport;
use Illuminate\Http\Request;

class ModerationController extends Controller
{
    public function submitContentReport(Request $request)
    {
//        //$user = User::whereId($request->get('user_id'))->first();
//
//        $report = new ContentReport();
//        //$report->user_id = $user->id;
//        $report->content_url = $request->get('content_url');
//        $report->issue = $request->get('issue');
//        $report->issue_description = $request->get('issue_description');
//        //$report->date_time = date('Y-m-d H:i:s');
//        //$report->save();

        return response()->json('asdasd',200);
    }
}
