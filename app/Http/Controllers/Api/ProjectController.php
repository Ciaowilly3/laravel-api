<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){
        $last4 = $request->input("last4");
        if ($last4){
            $projects = Project::with("technologies", "type")->orderBy('created_at', 'DESC')->limit(4)->get();
        }
        else{
            $projects = Project::with("technologies", "type")->get();
        }
        return response()->json($projects);
    }
    public function show($id) {
        $project = Project::findOrFail($id);

        return response()->json($project);
    }
}
