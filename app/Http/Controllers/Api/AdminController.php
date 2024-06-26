<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Name;
use Validator;

class AdminController extends Controller
{
    public function add_names(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'religion' => 'required|integer',
            'gender' => 'required|string'
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $existingName = Name::where('name', $request->name)->first();
        if ($existingName) {
            return response()->json([
                'message' => 'Name already exists.',
            ], 409); 
        }
    
        $name = Name::create([
            'name' => $request->name,
            'description' => $request->description,
            'religion_id' => $request->religion,
            'gender' => $request->gender,
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
    if (!$data) {
        return response()->json(['message' => 'Name not found.'], 404);
    }
    
    $data->name = $request->name;
    $data->description = $request->description;
    $data->religion_id = $request->religion; 
    $data->gender = $request->gender;
    $data->save();

    return response()->json([
        'message' => 'Name updated successfully',
        'data' => $data
    ], 200);
}

public function edit_names($id)
{
    $data = Name::find($id);
    if (!$data) {
        return response()->json(['message' => 'Name not found.'], 404);
    }
    return response()->json([
        'message' => 'Name retrieved successfully',
        'data' => $data
    ], 200);
}

public function delete_names(Request $request, $id)
{
    $name = Name::find($id);
    if (!$name) {
        return response()->json(['message' => 'Name not found.'], 404);
    }
    
    $name->delete();
    
    return response()->json(['message' => 'Name deleted successfully.'], 200);
}

public function index(Request $request)
{
    $perPage = $request->input('per_page', 15);
    $items = Name::join('religions', 'names.religion_id', '=', 'religions.id')
        ->select('names.id','names.name','names.description','religions.religion','names.gender','names.religion_id')
        ->paginate($perPage);
    
    return response()->json($items);
}
}