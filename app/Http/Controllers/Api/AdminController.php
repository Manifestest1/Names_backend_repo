<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Name; // Import the Name model
use Validator;

class AdminController extends Controller
{
    public function add_names(Request $request) 
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create the Name instance
        $name = Name::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Name successfully added',
            'name' => $name
        ], 201);
    }

    public function show_names(Request $request)
    {
        $names = Name::all();
        return response()->json($names);
    }

    public function update_names(Request $request, $id)
    {
        $data = Name::find($id);
        $data->name = $request->name;
        $data->save();

        return response()->json(['message' => 'name updated successfully',
        'data' => $data
    ], 200);
    }

    public function edit_names($id)
    {
        $data = Name::find($id);
        return response()->json(['message' => 'name get successfully',
        'data' => $data
    ], 200);

    }

    public function delete_names(Request $request, $id)
    {
        $name = name::find($id);
        
        if(!$name) {
            return response()->json(['message' => 'name not found.'], 404);
        }
        
        $name->delete();
        
        return response()->json(['message' => 'name deleted successfully.']);
    }
    
}
