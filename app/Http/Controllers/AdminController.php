<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//use App\Models\User;
use DB;

class AdminController extends Controller
{
    public function showuser()
    {
        //$show = User::get();
       $show = DB::table('names')->get();
        return view('allusers',['data'=>$show]);
    }
    public function search_data(Request $request){
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
}
