<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    
    public function index()
    {
        $data = Projects::orderBy('updated_at', 'desc')->get();

        return new ProjectCollection($data);
    }

    public function show($id)
    {
        $data = Projects::find($id);

        if (is_null($data)) {
            return response()->json([
                'message' => 'Project not found',
            ], 404);
        }

        return new ProjectResource($data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'tags' => 'required',
            'desc' => 'required',
            'repo' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $response = Projects::create($data);

        return response()->json($response, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Projects::find($id);

        if (is_null($data)) {
            return response()->json([
                'message' => 'Project not found',
            ], 404);
        }

        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Projects::find($id);

        if (is_null($data)) {
            return response()->json([
                'message' => 'Project not found',
            ], 404);
        }

        $data->delete();

        return response()->json(null, 200);
    }
}
