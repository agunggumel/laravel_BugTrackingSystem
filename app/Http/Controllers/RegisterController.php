<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(){
        return view ('register');
    }

    public function postRegister(Request $request){

        $validator = Validator::make($request->all(), [
            'role' => 'required',
            'email' => 'unique:users,email',
            'name' => 'required',
            'password' => 'required|confirmed',


        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = new User();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->role = $request->input('role');
        $data->password = Hash::make($request->input('password'));
        //$data->roles_id = DB::table('master')->select('id')->where('level','admin')->first();
        $data->save();
        return view('home');
    }

}
