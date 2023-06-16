<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use AuthenticatesUsers;
use App\Models\User;


class UsersController extends Controller
{
    public function getUser(User $user){
        // dd(Auth::user()->status);
        if(Auth::user()->status =="admin"){
            $data = DB::table('users')->orderBy('id', 'DESC')->get();
            return view('admin/list',compact('data')); 
        }else{
            return view('admin/nolist'); 
        }
                  
    }

    public function getdetailUser($id=0){
        $data = DB::table('users')->where('id',$id)->get();
        if( $data[0]->status =="surveyor"){
            $status ="ผู้สำรวจ";
        }else if ($data[0]->status =="expert"){
            $status ="ผู้เชี่ยวชาญ";
        }else{
            $status ="ผู้ดูแลระบบ";
        }
        
        return view('admin/edit',compact('data','status'));           
    }

    public function deleteUser(User $user,$id=0){
        $user_d =  DB::table('users')->where('id',$id)->delete();
        if(Auth::user()->status =="admin"){
            $data = DB::table('users')->get();
            return view('admin/list',compact('data')); 
        }else{
            return view('admin/nolist'); 
        }                  
    }

}
