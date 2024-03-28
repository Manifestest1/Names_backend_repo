<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use DB;

class AdminController extends Controller
{
       public function showuser(Request $request, $letter = null)
    {
        //   $religion_id = $request->input('religion_id');
        // $letter_alph = $request->input('letter_alph');
        

        $religiondata = DB::table('religions')->get();
        
        $user= DB::table('names')->orderBy('name');
        $getletter = null;
    
        if ($request->letter_alph) 
        {   
            $user->where('name', 'LIKE', $request->letter_alph . '%');
            $getletter = $request->letter_alph;
        }

        if($request->religion_id)
        {
           $user->where('religion_id', $request->religion_id);
        }

        if (($request->religion_id) && ($request->letter_alph)) 
        {   
            $user->where('name', 'LIKE', $request->letter_alph . '%')->where('religion_id', $request->religion_id);
            $getletter = $request->letter_alph;
        }

        if($request->search)
        {
           $user->where('name', 'LIKE','%'. $request->search . '%');
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

    

}
