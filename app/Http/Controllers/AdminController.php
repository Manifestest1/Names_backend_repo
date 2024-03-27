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

}
