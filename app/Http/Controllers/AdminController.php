<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use DB;

class AdminController extends Controller
{
       public function showuser($letter = null)
    {
         $religiondata = DB::table('religions')->get();
         //dd($religiondata);

        $user= DB::table('names')->orderBy('name');
        $getletter = null;
    
        if ($letter) 
        {
            $user->where('name', 'LIKE', $letter . '%');
            $getletter = $letter;
        }
        
        $show =$user->paginate(5);

        return view('allusers', ['data' => $show,'searchletter'=>$getletter,'religiondata'=>$religiondata]);
    }

    public function search_data(Request $request)
    {
        $search = $request->input('search');
        $data = DB::table('names')->where('name','like','%'.$search.'%')->get();
        return view('allusers',compact('data'));
    }

    public function god()
    {
       $show = DB::table('gods')->get();
        return view('God',['data'=>$show]);
    }

    public function search_godnames(Request $request){
        $search = $request->input('search');
        $data = DB::table('gods')->where('name','like','%'.$search.'%')->get();
        return view('God',compact('data'));
    }

    public function religion()
    {
       $show = DB::table('religions')->get();
        return view('allusers',['data'=>$show]);
    }

}
