<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //
    public function register(Request $request) {
        $fields = $request->validate([
            'username'=>'required',
            'password'=> 'required',
            'email'=>'nullable',
            'manage_pages'=>'nullable',
            'manage_contracts'=>'nullable',
            'create_contract'=>'nullable',
            'manage_promocodes'=>'nullable',
            'manage_members'=>'nullable',
            'view_reports'=>'nullable',
            'view_mail'=>'nullable',
            'profile_pic'=>'nullable'            
        ]);

        if($request->has('manage_pages') == false) {
            $fields['manage_pages'] = null;
        }  if($request->has('manage_contracts') == false) {
            $fields['manage_contracts'] = null;
        
        }  if($request->has('create_contract') == false) {
            $fields['create_contract'] = null;
        
        }  if($request->has('manage_promocodes') == false) {
            $fields['manage_promocodes'] = null;
        
        }  if($request->has('manage_members') == false) {
            $fields['manage_members'] = null;
        
        }  if($request->has('view_reports') == false) {
            $fields['view_reports'] = null;
        }
           if($request->has('view_mail') == false) {
            $fields['view_mail'] = null;
        }

          if($request->has('profile_pic') == false) {
            $fields['profile_pic'] = null;
        }

        $user = User::create([
            'username'=> $fields['username'],
            'password'=> bcrypt($fields['password']),
            'manage_pages'=> $fields['manage_pages'],
            'manage_contracts'=>$fields['manage_contracts'],
            'create_contract'=>$fields['create_contract'],
            'manage_promocodes'=>$fields['manage_promocodes'],
            'manage_members'=>$fields['manage_members'],
            'view_reports'=>$fields['view_reports'],
            'view_mail'=>$fields['view_mail'],
            'profile_pic'=>$fields['profile_pic'],

        ]);

        $token = $user->createToken('vision_things')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout (Request $request) {
        auth()->user()->tokens()->delete();
        return ['message' => 'logged out'];
    }

    public function login (Request $request) {
        $fields = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check email
        $user = User::where('username', $fields['username'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password )) {
            return response([
                'message' => 'Bad Creds'
            ], 401);
        }

        $token = $user->createToken('vision_things_login')->plainTextToken;

        $response = [
            'username' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }
}
