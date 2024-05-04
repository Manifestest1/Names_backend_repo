<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\God; // Import the Name model
use Validator;

class GodController extends Controller
{
    public function add_godnames(Request $request) 
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            //'description' => 'required|string|between:2,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create the Name instance
        $name = God::create([
            'godname' => $request->name,
           // 'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Name successfully added',
            'name' => $name
        ], 201);
    }

    public function show_godnames()
    {
        $names = God::all();
        return response()->json($names);
    }

    public function update_godnames(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            //'description' => 'required|string|between:2,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = God::find($id);
        if (!$data) {
            return response()->json(['message' => 'Name not found.'], 404);
        }

        $data->godname = $request->name;
        //$description->description = $request->description;
        $data->save();

        return response()->json([
            'message' => 'Name updated successfully',
            'data' => $data
        ], 200);
    }

    public function edit_godnames($id)
    {
        $data = God::find($id);
        if (!$data) {
            return response()->json(['message' => 'Name not found.'], 404);
        }

        return response()->json([
            'message' => 'Name retrieved successfully',
            'data' => $data
        ], 200);
    }

    public function delete_godnames(Request $request, $id)
    {
        $name = God::find($id);
        
        if (!$name) {
            return response()->json(['message' => 'Name not found.'], 404);
        }
        
        $name->delete();
        
        return response()->json(['message' => 'Name deleted successfully.']);
    }

    public function godindex(Request $request)
    {
        $perPage = $request->input('per_page', 5); // Default to 10 items per page
        $items = God::paginate($perPage);
        return response()->json($items);
    }
}
