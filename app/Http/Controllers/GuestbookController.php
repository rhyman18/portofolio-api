<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuestbookCollection;
use App\Http\Resources\GuestbookResource;
use App\Models\Guestbooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $data = Guestbooks::orderBy('updated_at', 'desc')->get();

        return new GuestbookCollection($data);
    }

    public function show($id)
    {
        $data = Guestbooks::find($id);

        if (is_null($data)) {
            return response()->json([
                'message' => 'Guest not found',
            ], 404);
        }

        return new GuestbookResource($data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'username' => 'required',
            'platform' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $response = Guestbooks::create($data);

        return response()->json($response, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Guestbooks::find($id);

        if (is_null($data)) {
            return response()->json([
                'message' => 'Guest not found',
            ], 404);
        }

        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Guestbooks::find($id);

        if (is_null($data)) {
            return response()->json([
                'message' => 'Guest not found',
            ], 404);
        }

        $data->delete();

        return response()->json(null, 200);
    }
}
