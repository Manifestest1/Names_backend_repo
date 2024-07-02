<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nickname;
use Validator;

class NicknameController extends Controller
{
    
    public function add_nicknames(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'nickname' => 'required|string',
            'gender' => 'required|string'
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $existingName = Nickname::where('nickname', $request->nickname)->first();
        if ($existingName) {
            return response()->json([
                'message' => 'Nickname already exists.',
            ], 409); 
        }
    
        $name = Nickname::create([
            'nickname' => $request->nickname,
            'gender' => $request->gender,
        ]);
    
        return response()->json([
            'message' => 'Nickname successfully added',
            'name' => $name
        ], 201);
    }

    
    public function edit_nicknames($id)
    {
        $data = Nickname::find($id);
        
        if (!$data) {
            return response()->json(['message' => 'Name not found.'], 404);
        }
    
        return response()->json([
            'message' => 'Nickname  retrieved successfully',
            'data' => $data
        ], 200);
    }
    public function update_nicknames(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nickname' => 'required|string|between:2,100',
            'gender' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = Nickname::find($id);
        if (!$data) {
            return response()->json(['message' => 'Name not found.'], 404);
        }
        $data->nickname = $request->nickname;
        $data->gender = $request->gender;
        $data->save();

        return response()->json([
            'message' => 'Name updated successfully',
            'data' => $data
        ], 200);
    }
    public function delete_nicknames(Request $request, $id)
    {
        $name = Nickname::find($id);
        if (!$name) {
            return response()->json(['message' => 'Name not found.'], 404);
        }
        
        $name->delete();
        
        return response()->json(['message' => 'Nickname deleted successfully.']);
    }
    public function nicknameindex(Request $request, $id)
    {
        $perPage = $request->input('per_page', 5); 
        $query = Nickname::where('id', $id); 
        $items = $query->paginate($perPage);
        
        return response()->json($items);
    }
    
}
