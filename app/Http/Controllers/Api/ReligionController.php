<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Religion; // Import the Name model
use Validator;

class ReligionController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5); // Default to 10 items per page
        $items = Religion::paginate($perPage);
        return response()->json($items);
    }

    public function add_religion(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'religion' => 'required|string|between:2,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create the Name instance
        $name = Religion::create([
            'religion' => $request->religion,
        ]);
        return response()->json([
            'message' => 'religion successfully added',
            'religion' => $request->religion
        ], 201);
        $validator = Validator::make($request->all(), [
            'religion' => 'required|string|between:2,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create the Name instance
        $name = Religion::create([
            'religion' => $request->religion,
        ]);

        return response()->json([
            'message' => 'religion successfully added',
            'religion' => $religion
        ], 201);
    }

    public function show_religion()
    {
        $religion = Religion::all();
        return response()->json($religion);
    }

    public function update_religion(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'religion' => 'required|string|between:2,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = Religion::find($id);
        if (!$data) {
            return response()->json(['message' => 'Name not found.'], 404);
        }

        $data->religion = $request->religion;
        $data->save();

        return response()->json([
            'message' => 'Religion updated successfully',
            'data' => $data
        ], 200);
    }

    public function edit_religion($id)
    {
        $data = Religion::find($id);
        if (!$data) {
            return response()->json(['message' => 'religion not found.'], 404);
        }

        return response()->json([
            'message' => 'religion retrieved successfully',
            'data' => $data
        ], 200);
    }

    public function delete_religion(Request $request, $id)
    {
        $religion = Religion::find($id);
        
        if (!$religion) {
            return response()->json(['message' => 'religion not found.'], 404);
        }
        
        $religion->delete();
        
        return response()->json(['message' => 'religion deleted successfully.']);
    }

  
}
