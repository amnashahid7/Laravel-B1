<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $user= User::with('profile')->get();
        return view('profile.index', compact('user'));
    }

    public function create(){
        return view('profile.create');
    }
    public function store(Request $request){
 $data=$request->validate([
   'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
          'profile_name'=>"required",
        'bio'=>"string|nullable",
        'avatar'=>"nullable|image|mimes:jpg,jpeg,png,gif|max:2048",
 ]);

 $user= User::create([
    "name"=> $data['name'],
    "email"=> $data['email'],
    "password"=> bcrypt($data['password'])
 ]);

 $user->profile()->create([
       'profile_name'=>$data["profile_name"],
        'bio'=>$data["bio"],
        'avatar'=>$data["avatar"],
 ]);
return redirect('profile.index');
    }
}
