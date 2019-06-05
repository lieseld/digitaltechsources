<?php

namespace App\Http\Controllers;

use App\Resource;
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
}
