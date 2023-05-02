<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillCollection;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $data = Skills::all();

        return new SkillCollection($data);
    }

    public function show($type)
    {
        $data = Skills::where('type', $type)->get();

        if (is_null($data)) {
            return response()->json([
                'message' => 'Skill not found',
            ], 404);
        }

        return new SkillCollection($data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'icon' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $response = Skills::create($data);

        return response()->json($response, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Skills::find($id);

        if (is_null($data)) {
            return response()->json([
                'message' => 'Skill not found',
            ], 404);
        }

        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Skills::find($id);

        if (is_null($data)) {
            return response()->json([
                'message' => 'Skill not found',
            ], 404);
        }

        $data->delete();

        return response()->json(null, 200);
    }
}
