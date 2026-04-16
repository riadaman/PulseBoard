<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\DeploymentCheckResource;
use App\Models\Project;
use App\Services\DeploymentCheckServices;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(DeploymentCheckServices $services )
    {
        try {
            $project = $services->getProject();

            return response()->json([

                'message' => 'Project retrieved successfully',
                'status' => 'success',
                'data' => DeploymentCheckResource::collection($services),
                'meta' => [
                'current_page' => $services->currentPage(),
                'last_page' => $services->lastPage(),
                'per_page' => $services->perPage(),
                'total' => $services->total(),
            ],
            'links' => [
                'next' => $services->nextPageUrl(),
                'prev' => $services->previousPageUrl(),
            ]
            ], 200);
        } catch (\Throwable $e) {

            return response()->json([
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }
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

