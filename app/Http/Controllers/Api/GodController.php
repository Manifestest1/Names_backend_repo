<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\God;
use App\Models\Subgodname;
// Import the Name model
use Validator;

class GodController extends Controller
{
    public function add_godnames(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            //'description' => 'required|string|between:2,100',
        ]);
        $existingodname = God::where('godname', $request->name)->first();
        if ($existingodname) {
            return response()->json([
                'message' => ' godname already exists.',
            ], 409); 
        }

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

    public function add_subgod_names(Request $request) 
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'god_id' => 'required|exists:gods,id'
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $existingSubgodname = Subgodname::where('subgodname', $request->name)->first();
        if ($existingSubgodname) {
            return response()->json([
                'message' => 'Subgodname already exists.',
            ], 409); 
        }
    
        
        $god = God::find($request->god_id);
        if (!$god) {
            return response()->json([
                'message' => 'God not found.',
            ], 404);
        }
    
        $subgodname = $god->subgodnames()->create([
            'subgodname' => $request->name,
        ]);
    
        return response()->json([

            'message' => 'subgodname added',
            'name' => $subgodname
        ], 201);
    }

    public function show_subgodnames()

            'message' => 'Subgodname added',
            'name' => $subgodname
        ], 201);
    }
        public function show_subgodnames()
    {
        $names = Subgodname::all();
       
        if ($names->isEmpty()) {
            return response()->json([
                'message' => 'No subgod names found.',
                'data' => []
            ], 200); 
        }
        return response()->json([
            'message' => 'Subgodnames retrieved successfully.',
            'data' => $names
        ], 200); 
    }
    public function subgodindex(Request $request)
    {
        $perPage = $request->input('per_page', 15); // Default to 10 items per page
        $perPage = $request->input('per_page', 5); 
        $items = Subgodname::paginate($perPage);
        return response()->json($items);
    }
}
