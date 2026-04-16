<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function store(ProjectRequest $request){


         try {
           $project = Project::create([
            'name' => $request->name,
            'owner_email' => $request->owner_email,

        ]);


            if ($project) {
                return ResponseHelper::success($project, 'Projet created successfully', 'success', 201);
            }

            return ResponseHelper::error('Project creation failed', 'error', 400);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }



}

