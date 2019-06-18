<?php

namespace App\Http\Controllers;

use App\Resource;
use App\User;
use App\ResourceComment;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function resourcesIndex()
    {
        $resources = Resource::all();
        $latestResources = [];
        /*foreach ($resources as $resource)
        {
            if ($resource->age() <= 10)
            {
                array_push($latestResources, $resource);
            }
        }*/
        return view('resources.index', compact('latestResources', 'resources'));
    }

    public function upvote(Request $request)
    {
        $resource = Resource::whereId($request->get('resource_id'))->firstOrFail();
        $user = User::whereId($request->get('user_id'))->firstOrFail();

        $resource->upvotes++;
        $resource->save();

        return response()->json(['upvotes' => $resource->upvotes], 200);

    }

    public function uploadResource()
    {
        return view('resources.upload');
    }

    public function viewResource($id)
    {
        $resource = Resource::whereId($id)->firstOrFail();
        return view('resources.view', compact('resource'));
    }

    public function topLevelComment(Request $request)
    {   
        $resource = Resource::whereId($request->get('resource_id'))->firstOrFail();
        $user = User::whereId($request->get('user_id'))->firstOrFail();
    
        $comment = new ResourceComment();
        $comment->user_id = $user->id;
        $comment->resource_id = $resource->id;
        $comment->content = $request->get('content');
        $comment->posted_at = date('Y-m-d H:i:s');
        $comment->edited_at = date('Y-m-d H:i:s');
        $comment->hidden = false;

        $comment->save();

        return response()->json(['id' => $comment->id], 200);
    }
}
