<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('technologies', 'type')->paginate(3);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }


public function show($id){
    $project = Project::with('technologies', 'type')->where('id', $id)->first();
    if($project) {

        return response()->json([
          'success' => true,
          'response' => $project,  
        ]);
    } else{

        return response()->json([
            'success' => false,
            'response' => '404 not found'
        ]);
    }

}

public function evidence(){
    $project = Project::all();
    $evidence = Project::with('technologies', 'type')->where('in_evidence', 1)->get();
    return response()->json([
        'success' => true,
        'results' => $evidence
    ]);
}

}

